<div class="sidebar-nav sidebar--nav">
    <div class="sidebar-nav-body">
        <div class="side-menu-close">
            <i class="la la-times"></i>
        </div><!-- end menu-toggler -->
        <div class="author-content">
            <div class="d-flex align-items-center">
                <div class="author-img avatar-sm">
                    <img src="{{asset('uploads/'.Auth::user()->image)}}" alt="testimonial image">
                </div>
                <div class="author-bio">
                    <h4 class="author__title">{{Auth::user()->full_name}}</h4>
                    <span class="author__meta">Welcome to Admin Panel</span>
                </div>
            </div>
        </div>
        <div class="sidebar-menu-wrap">
            <ul class="sidebar-menu toggle-menu list-items">
                @if (Auth::user()->level ==1 || Auth::user()->level ==3)
                    <li>
                        <span class="side-menu-icon toggle-menu-icon">
                        </span>
                        <a href="{{route('dashboard')}}"><i class="la la-dashboard mr-2"></i>DashBoard</a>
                    </li>
                    <li>
                        <span class="side-menu-icon toggle-menu-icon">
                        </span>
                        <a href="{{route('user.index')}}"><i class="la la-dashboard mr-2"></i>User List</a>
                    </li>
                    <li>

                        <a href="{{route('admin.hotel.index')}}"><i class="la la-list mr-2 text-color-2"></i>Hotel List</a>

                    </li>

                    <li>

                        <a href="{{route('admin.room.index')}}"><i class="la la-users mr-2 text-color-3"></i>Room List</a>

                    </li>


                    <li><a href="{{route('logout')}}"><i class="la la-power-off mr-2 text-color-11"></i>Logout</a></li>

                @elseif (Auth::user()->level ==2 )
                    <li>
                        <span class="side-menu-icon toggle-menu-icon">
                        </span>
                        <a href="{{route('dashboard')}}"><i class="la la-dashboard mr-2"></i>DashBoard</a>
                    </li>
                    <li>
                        <span class="side-menu-icon toggle-menu-icon">
                            <i class="la la-angle-down"></i>
                        </span>
                        <a href="{{route('admin.hotel.index')}}"><i class="la la-list mr-2 text-color-2"></i>Hotel List</a>
                        <ul class="toggle-drop-menu">
                            <li><a href="{{route('admin.hotel.create')}}">Hotel Create</a></li>
                        </ul>
                        <ul class="toggle-drop-menu">
                            <li><a href="{{route('admin.room.create')}}">Room Create</a></li>
                        </ul>
                    </li>


                    <li><a href="{{route('logout')}}"><i class="la la-power-off mr-2 text-color-11"></i>Logout</a></li>

                @endif

            </ul>
        </div><!-- end sidebar-menu-wrap -->
    </div>
</div><!-- end sidebar-nav -->
