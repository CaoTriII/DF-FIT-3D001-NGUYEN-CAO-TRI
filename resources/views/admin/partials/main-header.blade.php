<section class="dashboard-area">
    <div class="dashboard-nav dashboard--nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-wrapper">
                        <div class="logo mr-5">
                            <a href="{{route('client.index')}}"><img src="{{asset('clients/images/logo2.png') }}" alt="logo"></a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div><!-- end menu-toggler -->
                            <div class="user-menu-open">
                                <i class="la la-user"></i>
                            </div><!-- end user-menu-open -->
                        </div>

                        <div class="nav-btn ml-auto">
                            <div class="notification-wrap d-flex align-items-center" id="userDropdownMenu">
                                <div class="notification-item">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" id="userDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm flex-shrink-0 mr-2"><img src="{{asset('uploads/'.Auth::user()->image)}}" alt="team-img"></div>
                                                <span class="font-size-14 font-weight-bold">{{Auth::user()->full_name}}</span>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-reveal dropdown-menu-md dropdown-menu-right">
                                            <div class="dropdown-item drop-reveal-header user-reveal-header">
                                                <h6 class="title text-uppercase">Welcome!</h6>
                                            </div>
                                            <div class="list-group drop-reveal-list user-drop-reveal-list">
                                                <a href="{{route('user.edit',['id'=>Auth::user()->id])}}" class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i class="la la-user mr-2"></i> Edit Profile</h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                @if(Auth::user()->level ==4)
                                                <a href="{{route('bookinglist')}}" class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i class="la la-shopping-cart mr-2"></i>Booking</h3>
                                                        </div>
                                                    </div><!-- end msg-body -->
                                                </a>
                                                @endif
                                                <a id="notificationDropdown" class="list-group-item list-group-item-action">
                                                    <div class="msg-body">
                                                        <div class="msg-content">
                                                            <h3 class="title"><i class="la la-bell mr-2"></i>Notification</h3>
                                                        </div>
                                                    </div>
                                                </a>

                                                <!-- Thêm vào nơi bạn muốn hiển thị dropdown nhỏ -->
                                                <div class="notification-small-dropdown" id="notificationSmallDropdown"></div>

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
                        </div><!-- end nav-btn -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-nav -->

</section><!-- end dashboard-area -->
