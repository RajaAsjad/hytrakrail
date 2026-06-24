<aside class="main-sidebar" style="margin-top: 55px;">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('dashboard') }}"
                    class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active blk' : '' }}">
                    <i class="fa fa-laptop"></i> <span>Dashboard</span>
                </a>
            </li>
            {{-- @can('role-list')
                <li class="treeview">
                    <a href="{{ route('role.index') }}"
                        class="{{ request()->is('role') || request()->is('role/create') || request()->is('role/*/edit') ? 'active blk' : '' }}">
                        <i class="fa fa-user-plus"></i> <span>Roles</span>
                    </a>
                </li>
            @endcan
            @can('permission-list')
                <li class="treeview">
                    <a href="{{ route('permission.index') }}"
                        class="{{ request()->is('permission') || request()->is('permission/create') || request()->is('permission/*/edit') ? 'active blk' : '' }}">
                        <i class="fa fa-lock"></i> <span>Permissions</span>
                    </a>
                </li>
            @endcan --}}
            @can('page-list')
                <li class="treeview">
                    <a href="{{ route('page.index') }}"
                        class="{{ request()->is('page') || request()->is('page/*') || request()->is('page_setting/*') ? 'active blk' : '' }}">
                        <i class="fa fa-cog"></i> <span>Settings</span>
                    </a>
                </li>
            @endcan  
          
            {{-- @can('banner-list')
                <li class="treeview mt-2">
                    <a href="{{ route('banner.index') }}" class="{{ request()->is('banner') || request()->is('banner/create') || request()->is('banner/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-picture-o"></i> <span>All Banners</span>
                    </a>
                </li>
            @endcan

            @can('homeslider-list')
                <li class="treeview mt-2">
                    <a href="{{ route('homeslider.index') }}" class="{{ request()->is('homeslider') || request()->is('homeslider/create') || request()->is('homeslider/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-tasks"></i> <span>Home Banner Slider</span>
                    </a>
                </li>
            @endcan --}}  
            
            {{-- @can('testimonial-list')
                <li class="treeview mt-2">
                    <a href="{{ route('testimonial.index') }}" class="{{ request()->is('testimonial') || request()->is('testimonial/create') || request()->is('testimonial/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-tasks"></i> <span>Testimonials</span>
                    </a>
                </li>
            @endcan   --}}

            

            {{-- @can('shopcontact-list')
                <li class="treeview mt-2">
                    <a href="{{ route('shopcontact.index') }}" class="{{ request()->is('shopcontact') || request()->is('shopcontact/create') || request()->is('shopcontact/*/edit') || request()->is('shopcontact/*') ? 'active' : '' }}">
                        <i class="fa fa-envelope"></i> <span>Shop & Contact Form</span>
                    </a>
                </li>
            @endcan --}}

            
                
            @can('contactus-list')
                <li class="treeview mt-2">
                    <a href="{{ route('contactus.index') }}" class="{{ request()->is('contactus') || request()->is('contactus/create') || request()->is('contactus/*/edit') || request()->is('contactus/*') ? 'active' : '' }}">
                        <i class="fa fa-envelope"></i> <span>All Contact Us</span>
                    </a>
                </li>
            @endcan
             
            {{-- @can('brands-list')
                <li class="treeview">
                    <a href="{{ route('brands.index') }}"
                        class="{{ request()->is('brands') || request()->is('brands/create') || request()->is('brands/*/edit') ? 'active blk' : '' }}">
                        <i class="fa fa-pencil-square-o"></i> <span>All Brands</span>
                    </a>
                </li>
            @endcan
            @can('weblinks-list')
                <li class="treeview">
                    <a href="{{ route('weblinks.index') }}"
                        class="{{ request()->is('weblinks') || request()->is('weblinks/create') || request()->is('weblinks/*/edit') ? 'active blk' : '' }}">
                        <i class="fa fa-pencil-square-o"></i> <span>All Web Links</span>
                    </a>
                </li>
            @endcan --}}
        </ul>
    </section>
</aside>
