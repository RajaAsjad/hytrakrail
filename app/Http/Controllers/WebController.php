<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function Index()
    {
        $page_title = 'Hytrak Rail Corporation — Get Places Faster!';
        $meta_description = 'Hytrak Rail is a revolutionary inverted monorail elevated high-speed rail system. Private 4-passenger pods, 250 mph, zero emissions, 50x cheaper than traditional HSR. Point-to-point city-to-city travel, reimagined.';
        $meta_keywords = 'Hytrak Rail, high speed rail, elevated monorail, sustainable transportation, Mark Mitchell, private rail pods, zero emissions transit';

        return view('website.index', compact('page_title', 'meta_description', 'meta_keywords'));
    }

    public function About()
    {
        $page_title = 'About — Patrick Okeke';
        $meta_description = 'The story behind Patrick Okeke — books and essays on culture, technology, and the craft of a thinking life.';

        return view('website.about', compact('page_title', 'meta_description'));
    }

    public function Books()
    {
        $page_title = 'Books — Patrick Okeke';
        $meta_description = 'All books by Patrick Okeke — independently published works on culture, technology, and craft.';
        $books = config('website.books');

        return view('website.books', compact('page_title', 'meta_description', 'books'));
    }

    public function Contact()
    {
        $page_title = 'Contact — Patrick Okeke';
        $meta_description = 'Write to Patrick Okeke — reader letters, press, speaking and rights inquiries.';

        return view('website.contact', compact('page_title', 'meta_description'));
    }

    public function submitQuickContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:200',
            'email' => 'required|email|max:100',
            'type' => 'nullable|string|max:50',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->to(url('/') . '#quick-contact')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $typeLabels = [
            'investor' => 'Investment Opportunity',
            'partnership' => 'Government / Agency Partnership',
            'pilot' => 'Pilot Corridor Proposal',
            'demo' => 'Request a Demo',
            'media' => 'Press / Media',
            'other' => 'General Inquiry',
        ];

        $inquiryType = $typeLabels[$validated['type'] ?? ''] ?? 'General Inquiry';

        $fullName = trim($validated['name']);
        $parts = preg_split('/\s+/', $fullName, 2);
        $firstName = $parts[0] ?? $fullName;
        $lastName = $parts[1] ?? '';

        $model = new ContactUs();
        $model->first_name = $firstName;
        $model->last_name = $lastName;
        $model->email = $validated['email'];
        $model->phone = null;
        $model->address = $inquiryType;
        $model->message = $validated['message'];
        $model->save();

        $contactData = [
            'full_name' => $fullName,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $validated['email'],
            'phone' => '—',
            'venue_event' => $inquiryType,
            'message' => $validated['message'],
        ];

        $adminEmail = 'asjadmmc67@gmail.com';
        try {
            Mail::to($adminEmail)->send(new ContactFormMail($contactData));
            Log::info('Hytrak quick contact email sent to ' . $adminEmail);
        } catch (\Exception $e) {
            Log::error('Hytrak quick contact email failed', [
                'to' => $adminEmail,
                'message' => $e->getMessage(),
            ]);
        }

        return redirect()
            ->to(url('/') . '#quick-contact')
            ->with('contact_success', 'Thank you! Your message has been sent. We will respond within 48 hours.');
    }
}
