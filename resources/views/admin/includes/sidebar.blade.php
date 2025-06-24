<div class="sidebar sidebar-navigation active">
    <div class="logo_content">
        <a href="{{ route('dashboard') }}" class="logo">
            Inventory
            <div class="logo_name">
                System
            </div>
        </a>
    </div>
    <ul class="nav_list ps-0 scrollbar">
        <li class="category-li">
            <span class="link_names">Dashboard</span>
        </li>
        <li>
            <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? ' active-focus' : '' }}">
                <i class="ri-home-4-line"></i>
                <span class="link_names">Dashboard</span>
            </a>
        </li>


        <li class="category-li">
            <span class="link_names">Main</span>
        </li>
        
        @php
            $current = Route::currentRouteName();
        @endphp

        {{-- products --}}
        <li>
            <a href="{{ route('products.index') }}"
            class="{{ Route::is('products.*') ? 'active-focus' : '' }}">
                <i class="ri-list-check-2"></i>
                <span class="link_names">Manage Products</span>
            </a>
        </li>

        <!-- Sales -->
        <li>
            <a href="{{ route('sales.index') }}"
            class="{{ Route::is('sales.*') ? 'active-focus' : '' }}">
                <i class="ri-shopping-cart-line"></i>
                <span class="link_names">Sales</span>
            </a>
        </li>

        <!-- Payments -->
        <li>
            <a href="{{ route('payments.index') }}"
            class="{{ Route::is('payments.*') ? 'active-focus' : '' }}">
                <i class="ri-wallet-line"></i>
                <span class="link_names">Payments</span>
            </a>
        </li>

        <!-- Reports -->
        <li>
            <a href="{{ route('reports.index') }}"
            class="{{ Route::is('reports.*') ? 'active-focus' : '' }}">
                <i class="ri-bar-chart-line"></i>
                <span class="link_names">Reports</span>
            </a>
        </li>

        <!-- Journals (Optional) -->
        <li>
            <a href="{{ route('journals.index') }}"
            class="{{ Route::is('journals.*') ? 'active-focus' : '' }}">
                <i class="ri-book-open-line"></i>
                <span class="link_names">Journals</span>
            </a>
        </li>
    </ul>

    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">

                @if (Auth::user()->image)
                    <img id="sidebarImageDB" src="{{ asset(Auth::user()->image) }}" alt="img" width="30"
                        height="30" class="rounded-circle">
                @else
                    <i class="ri-user-3-line profile-icon"></i>
                @endif

                <div class="name_job">
                    <div class="name">{{ Auth::user()->name }}</div>
                    <div class="job">{{ Auth::user()->designation }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="d-flex"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="ri-logout-box-r-line" id="log_out"></i>
                </a>
            </form>
        </div>
    </div>
</div>
