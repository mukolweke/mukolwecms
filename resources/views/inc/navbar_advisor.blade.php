<!-- Start Top Bar -->
<div class="top-bar" id="mainNavigation">
    <div class="top-bar-left">
        <ul class="menu vertical medium-horizontal">
            <li class="menu-text hide-for-small-only"><a href="/home_advisor">Advisor &centerdot; Dashboard</a> </li>
            <li class="menu-text"><a href="/view_client">Clients Dashboard</a></li>
            <li class="menu-text"><a href="#">Leads Dashboard</a></li>
            <li class="menu-text"><a href="#">Followups Dashboard</a></li>
            <li class="menu-text"><a href="/view_schedule_index">Calender Dashboard</a></li>
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