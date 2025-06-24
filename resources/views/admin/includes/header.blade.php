<header>
    <div id="top-navbar" class="container-fluid">
        <div class="left-header-content">
            <div>
                <i class="ri-menu-2-line" id="btn" style="font-size: 22px;"></i>
            </div>
            <a target="_blank" href="{{ route('home') }}" class="website-visit">
                <i class="ri-global-line"></i>
            </a>
            <a href="{{ route('cache-clear') }}" class="clear-cache"><i class="ri-hard-drive-3-line"></i> Clear Cache</a>
        </div>
        
        <ul>
            {{-- <li>
                <a href="#" id="openFullScreen" class="icon" onclick="openFullscreen()">
                    <i class="ri-fullscreen-line"></i>
                </a>
                <a href="#" id="exitFullScreen" class="icon d-none" onclick="removeFullScreen()">
                    <i class="ri-fullscreen-exit-line" ></i>
                </a>
            </li> --}}
            <li>
                <a href="#" class="dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center"> 
                        <div class="me-sm-2 me-0">
                            <img id="profileImage" class="d-none" src="" alt="img" width="30" height="30" class="rounded-circle"> 
                            
                            @if(Auth::user()->image)
                                <img id="profileImageDB" src="{{ asset(Auth::user()->image) }}" alt="img" width="30" height="30" class="rounded-circle"> 
                            @else
                                <i class="ri-user-3-line profile-icon"></i>
                            @endif
                        </div> 
                        <div> 
                            <p class="fw-semibold mb-0 lh-1">{{ Auth::user()->name }}</p>
                            <span class="op-7 fw-normal d-block fs-11">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </a>

                <ul class="main-header-dropdown dropdown-menu">
                    <li>
                        <a class="dropdown-item d-flex" href="{{route('profile.edit')}}">
                            <i class="ri-user-3-line fs-18 me-3 op-7"></i>Update Profile
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item d-flex" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="ri-logout-box-r-line fs-18 me-3 op-7"></i>Log Out
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
