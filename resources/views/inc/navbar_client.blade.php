<!-- Start Top Bar -->
<div class="top-bar" id="mainNavigation">
    <div class="top-bar-left">
        <ul class="menu vertical medium-horizontal">
            <li class="menu-text hide-for-small-only"><a href="/home_client_dash">Client &centerdot; Dashboard</a> </li>
            <li class="menu-text"><a href="/view_client_advisor">Profile</a></li>
        </ul>
    </div>
    <div class="top-bar-right">
        <ul class="menu vertical medium-horizontal">
            <li class="menu-text">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
<!-- End Top Bar -->