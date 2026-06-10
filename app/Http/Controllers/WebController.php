<?php

namespace App\Http\Controllers;

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
}
