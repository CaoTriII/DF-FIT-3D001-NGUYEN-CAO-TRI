<header class="header-area">

    <div class="header-menu-wrapper padding-right-100px padding-left-100px">
       <div class="container-fluid">
          <div class="row">
             <div class="col-lg-12">
                <div class="menu-wrapper">

                   <div class="logo">
                      <a href="{{route('client.index')}}"
                         ><img src="{{asset('clients/images/logo.png') }}" alt="logo"
                         /></a>
                      <div class="menu-toggler">
                         <i class="la la-bars"></i>
                         <i class="la la-times"></i>
                      </div>
                      <!-- end menu-toggler -->
                   </div>
                   <!-- end logo -->
                   <div class="main-menu-content">
                      <nav>
                         <ul>
                            <li>
                                <div class="header-top-content">
                                    @if (Auth::check())
                                     <div class="notification-wrap d-flex justify-content-between" id="userDropdownMenu" >
                                         <div class="notification-item">
                                             <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" id="userDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <div class="d-flex align-items-center position-relative">
                                                        <div class="avatar avatar-sm flex-shrink-0 mr-2">
                                                            <img src="{{ asset('uploads/' . Auth::user()->image) }}" alt="team-img">
                                                            <!-- Chấm đỏ để hiển thị thông báo mới -->
                                                            <div class="notification-dot"></div>
                                                        </div>
                                                        <span class="font-size-14 font-weight-bold" style="color: black">{{ Auth::user()->full_name }}</span>
                                                    </div>
                                                </a>

                                                 <div class="dropdown-menu dropdown-reveal dropdown-menu-md dropdown-menu-right">
                                                     <div class="list-group drop-reveal-list user-drop-reveal-list">
                                                         <a href="{{route('user.edit',['id'=>Auth::user()->id])}}" class="list-group-item list-group-item-action">
                                                             <div class="msg-body">
                                                                 <div class="msg-content">
                                                                     <h3 class="title"><i class="la la-user mr-2"></i> Edit Profile</h3>
                                                                 </div>
                                                             </div><!-- end msg-body -->
                                                         </a>
                                                         @php
                                                             $level = Auth::user()->level;
                                                         @endphp
                                                         @if ($level == 4)
                                                         <a href="{{route('bookinglist')}}" class="list-group-item list-group-item-action">
                                                             <div class="msg-body">
                                                                 <div class="msg-content">
                                                                     <h3 class="title"><i class="la la-shopping-cart mr-2"></i>Bookings</h3>
                                                                 </div>
                                                             </div><!-- end msg-body -->
                                                         </a>
                                                         @else
                                                         <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action">
                                                            <div class="msg-body">
                                                                <div class="msg-content">
                                                                    <h3 class="title"><i class="la la-shopping-cart mr-2"></i>Management</h3>
                                                                </div>
                                                            </div>
                                                        </a>
                                                         @endif
                                                         <!-- Thêm vào nơi bạn muốn hiển thị dropdown nhỏ -->
                                                         <div class="section-block"></div>
                                                         <a href="{{route('logout')}}" class="list-group-item list-group-item-action">
                                                             <div class="msg-body">
                                                                 <div class="msg-content">
                                                                     <h3 class="title"><i class="la la-power-off mr-2"></i>Logout</h3>
                                                                 </div>
                                                             </div><!-- end msg-body -->
                                                         </a>
                                                     </div>
                                                 </div><!-- end dropdown-menu -->
                                             </div>
                                         </div><!-- end notification-item -->
                                     </div>
                                    @else
                                      <div class="header-right d-flex align-items-center justify-content-end" >
                                        <a href="{{route('user.create')}}" class="theme-btn theme-btn-small" style="height: 40px;width:85px;text-decoration:none;text-align:center;margin-right:5px;color:white">Sign Up</a>
                                        <a href="{{route('login')}}" class="theme-btn theme-btn-small" style="height: 40px;width:85px;text-decoration:none;text-align:center;color:white">Login</a>
                                    </div>
                                    @endif
                                 </div>
                             </li>
                         </ul>
                      </nav>
                   </div>

                   <!-- end main-menu-content -->
                   <!-- end nav-btn -->
                </div>
                <!-- end menu-wrapper -->
             </div>
             <!-- end col-lg-12 -->
          </div>
          <!-- end row -->
       </div>
       <div class="col-lg-6">

     </div>
       <!-- end container-fluid -->
    </div>
    <!-- end header-menu-wrapper -->
 </header>
 <div class="preloader" id="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
