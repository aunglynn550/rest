<nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        
        </form>
        <ul class="navbar-nav navbar-right">
              @php 
                $notifications = \App\Models\OrderPlacedNotification::where('seen',0)->latest()->take(10)->get();
                $unseenMessages = \App\Models\Chat::where(['receiver_id' => auth()->user()->id, 'seen' => 0])->count();
              @endphp

              @if(auth()->user()->id === 1)
              <li class="dropdown dropdown-list-toggle"><a href="{{ route('admin.chat.index') }}" data-toggle="dropdown" 
                class="nav-link nav-link-lg message-envelope {{ $unseenMessages > 0 ? 'beep' : '' }}">
                <i class="far fa-envelope"></i></a>                             
              </li>
              @endif
           
            
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg 
              notification_beep {{ count($notifications) > 0 ? 'beep' : '' }}"><i class="far fa-bell"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                  <div class="dropdown-header">Notifications
                    <div class="float-right">
                      <a href="{{ route('admin.clear-notification') }}">Mark All As Read</a>
                    </div>
                  </div>
                  <div class="dropdown-list-content dropdown-list-icons rt_notification">
                    @foreach($notifications as $notification)
                        <a href="{{ route('admin.orders.show', $notification->order_id) }}" class="dropdown-item">
                          <div class="dropdown-item-icon bg-info text-white">
                            <i class="fas fa-bell"></i>
                          </div>
                          <div class="dropdown-item-desc">
                           {{ $notification->message }}
                            <div class="time">{{date('h:i A | d-F-Y', strtotime($notification->created_at)) }}</div>
                          </div>
                        </a>
                    @endforeach
                   
                  </div>
                  <div class="dropdown-footer text-center">
                    <a href="{{ 'admin.orders.index' }}">View All <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </li>
         
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset(auth()->user()->avatar) }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi,{{ auth()->user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">             
              <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>            
              <a href="{{ route('admin.setting.index') }}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf                   
                    <a href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">  
          <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{ config('settings.site_name') }}</a>
          </div>       
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>                                   
            <li class="{{ setSidebarActive(['admin.dashboard']) }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i>Dashboard</a></li>                                  
            <li class="menu-header">Starter</li>
            <li class="{{ setSidebarActive(['admin.slider.*']) }}"><a class="nav-link" href="{{ route('admin.slider.index') }}"><i class="far fa-image"></i> <span>Slider</span></a></li> 
            <li class="{{ setSidebarActive(['admin.daily-offer.*']) }}"><a class="nav-link" href="{{ route('admin.daily-offer.index') }}"><i class="far fa-clock"></i> <span>Daily Offers</span></a></li>          
                  
            <li class="dropdown {{ setSidebarActive([
                  'admin.orders.index',
                  'admin.pending-orders',
                  'admin.inprocess-orders',
                  'admin.delivered-orders',
                  'admin.declined-orders',
                  
                  ]) }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i> <span>Orders</span></a>
              <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.orders.index']) }}"><a class="nav-link" href="{{ route('admin.orders.index') }}">All Orders</a></li>                                         
                <li class="{{ setSidebarActive(['admin.pending-orders']) }}"><a class="nav-link" href="{{ route('admin.pending-orders') }}">Pending Orders</a></li>                                                                                             
                <li class="{{ setSidebarActive(['admin.inprocess-orders']) }}"><a class="nav-link" href="{{ route('admin.inprocess-orders') }}">InProcess Orders</a></li>                                                                                             
                <li class="{{ setSidebarActive(['admin.delivered-orders']) }}"><a class="nav-link" href="{{ route('admin.delivered-orders') }}">Delivered Orders</a></li>                                                                                             
                <li class="{{ setSidebarActive(['admin.declined-orders']) }}"><a class="nav-link" href="{{ route('admin.declined-orders') }}">Declined Orders</a></li>                                                                                             
              </ul>
           </li>

           <li class="dropdown {{ setSidebarActive([
                  'admin.category.*',
                  'admin.product.*',
                  'admin.product-reviews.index'               
                  ]) }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-cart"></i> <span>Manage Products</span></a>
              <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.category.*']) }}"><a class="nav-link" href="{{ route('admin.category.index') }}">Product Categories</a></li>              
                <li class="{{ setSidebarActive(['admin.product.*']) }}"><a class="nav-link" href="{{ route('admin.product.index') }}">Products</a></li>              
                <li class="{{ setSidebarActive(['admin.product-reviews.index']) }}"><a class="nav-link" href="{{ route('admin.product-reviews.index') }}">Products Reviews</a></li>              
              </ul>
           </li>
           

           <li class="dropdown {{ setSidebarActive([
                  'admin.coupon.*',
                  'admin.delivery-area.*',
                  'admin.payment-setting.index'               
                  ]) }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store"></i> <span>Manage Ecommerce</span></a>
              <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.coupon.*']) }}"><a class="nav-link" href="{{ route('admin.coupon.index') }}">Coupons</a></li>                                         
                <li class="{{ setSidebarActive(['admin.delivery-area.*']) }}"><a class="nav-link" href="{{ route('admin.delivery-area.index') }}">Delivery Area</a></li>                                         
                <li class="{{ setSidebarActive(['admin.payment-setting.index']) }}"><a class="nav-link" href="{{ route('admin.payment-setting.index') }}">Payment Gatways</a></li>                                         
              </ul>
           </li>
           <li class="dropdown {{ setSidebarActive([
                  'admin.reservation-time.*',
                  'admin.reservation.index',                             
                  ]) }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chair"></i> <span>Reservations</span></a>
              <ul class="dropdown-menu">                                                    
                <li class="{{ setSidebarActive(['admin.reservation-time.*']) }}"><a class="nav-link" href="{{ route('admin.reservation-time.index') }}">Reservation Times</a></li>                           
                <li class="{{ setSidebarActive(['admin.reservation.index']) }}"><a class="nav-link" href="{{ route('admin.reservation.index') }}">Reservations</a></li>                                           
              </ul>
           </li> 
              @if(auth()->user()->id === 1)
                <li class="{{ setSidebarActive(['admin.chat.index']) }}"><a class="nav-link" href="{{ route('admin.chat.index') }}"><i class="fas fa-comment-dots"></i>Message</a></li>
              @endif

            <li class="dropdown {{ setSidebarActive([
                  'admin.blog-category.*',
                  'admin.blogs.index',                             
                  'admin.blogs.comments.index',                             
                  ]) }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cubes"></i> <span>Blog</span></a>
              <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.blog-category.*']) }}"><a class="nav-link" href="{{ route('admin.blog-category.index') }}">Categories</a></li>                                         
                <li class="{{ setSidebarActive(['admin.blog.*']) }}"><a class="nav-link" href="{{ route('admin.blogs.index') }}">Blog</a></li>                                                                                                 
                <li class="{{ setSidebarActive(['admin.blogs.comments.index']) }}"><a class="nav-link" href="{{ route('admin.blogs.comments.index') }}">Comments</a></li>                                                                                                 
              </ul>
           </li>

           <li class="{{ setSidebarActive(['admin.news-letter.index']) }}"><a class="nav-link" href="{{ route('admin.news-letter.index') }}"><i class="far fa-newspaper"></i> <span>News Letter</span></a></li> 
           <li class="{{ setSidebarActive(['admin.social-link.index']) }}"><a class="nav-link" href="{{ route('admin.social-link.index') }}"><i class="far fa-link"></i> <span>Social Links</span></a></li> 
        

            <li class="dropdown {{ setSidebarActive([
                  'admin.why-choose-us.*',
                  'admin.banner-slider.*',                             
                  'admin.chef.*',                             
                  'admin.app-download.*',                             
                  'admin.testimonial.*',                             
                  'admin.counter.*',                             
                  ]) }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-stream"></i> <span>Sections</span></a>
              <ul class="dropdown-menu">                                                    
                <li class="{{ setSidebarActive(['admin.why-choose-us.index']) }}"><a class="nav-link" href="{{ route('admin.why-choose-us.index') }}">Why Choose Us</a></li>
                <li class="{{ setSidebarActive(['admin.banner-slider.index']) }}"><a class="nav-link" href="{{ route('admin.banner-slider.index') }}">Banner Slider</a></li>
                <li class="{{ setSidebarActive(['admin.chef.index']) }}"><a class="nav-link" href="{{ route('admin.chef.index') }}">Chef</a></li>
                <li class="{{ setSidebarActive(['admin.app-download.index']) }}"><a class="nav-link" href="{{ route('admin.app-download.index') }}">App Download</a></li>
                <li class="{{ setSidebarActive(['admin.testimonial.index']) }}"><a class="nav-link" href="{{ route('admin.testimonial.index') }}">Testimonial</a></li>             
                <li class="{{ setSidebarActive(['admin.counter.index']) }}"><a class="nav-link" href="{{ route('admin.counter.index') }}">Counter</a></li>
                                                                                                           
              </ul>
           </li> 
           
           <li class="dropdown {{ setSidebarActive([
                  'admin.custom-page-builder.*',
                  'admin.about.*',                             
                  'admin.privacy-policy.*',                             
                  'admin.terms-and-conditions.*',                             
                  'admin.contact.*',                                                                        
                  ]) }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-alt"></i> <span>Pages</span></a>
              <ul class="dropdown-menu">                                                    
                <li class="{{ setSidebarActive(['admin.custom-page-builder.index']) }}"><a class="nav-link" href="{{ route('admin.custom-page-builder.index') }}">Custom Page</a></li>   
                <li class="{{ setSidebarActive(['admin.about.index']) }}"><a class="nav-link" href="{{ route('admin.about.index') }}">About</a></li>   
                <li class="{{ setSidebarActive(['admin.privacy-policy.index']) }}"><a class="nav-link" href="{{ route('admin.privacy-policy.index') }}">Privacy Policy</a></li>
                <li class="{{ setSidebarActive(['admin.terms-and-conditions.index']) }}"><a class="nav-link" href="{{ route('admin.terms-and-conditions.index') }}">Terms And COnditions</a></li>              
                <li class="{{ setSidebarActive(['admin.contact.index']) }}"><a class="nav-link" href="{{ route('admin.contact.index') }}">Contact</a></li>              
              </ul>
           </li> 

  
        
            <li class="{{ setSidebarActive(['admin.footer-info.index']) }}"><a class="nav-link" href="{{ route('admin.footer-info.index') }}"><i class="fas fa-info-circle"></i> <span> Footer Info</span></a></li>    

            <li class="{{ setSidebarActive(['admin.menu-builder.index']) }}"><a class="nav-link" href="{{ route('admin.menu-builder.index') }}"><i class="fas fa-list-alt"></i> <span>Menu Builder</span></a></li> 
            <li class="{{ setSidebarActive(['admin.admin-management.index']) }}"><a class="nav-link" href="{{ route('admin.admin-management.index') }}"><i class="fas fa-user-shield"></i> <span>Admin Management</span></a></li> 
            <li class="{{ setSidebarActive(['admin.admin-management.index']) }}"><a class="nav-link" href="{{ route('admin.user-management.index') }}"><i class="fas fa-user-shield"></i> <span>User Management</span></a></li> 
            <li class="{{ setSidebarActive(['admin.setting.index']) }}"><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="fas fa-cogs"></i>Settings</a></li>              
            <!-- <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
              </ul>
            </li> -->
            <!-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> -->      

           
          </ul>

         </aside>
      </div>