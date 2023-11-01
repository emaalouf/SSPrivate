<div class="app-sidebar sidebar-shadow bg-asteroid sidebar-text-light">
    <div class="app-header__logo">
        <div></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{route('admin.index')}}" class="sidebar-item">
                        <i class="metismenu-icon pe-7s-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">History</li>
                <li>
                    <a href="{{route('admin.client-users.index')}}" class="sidebar-item">
                        <i class="metismenu-icon pe-7s-users"></i>
                        History
                    </a>
                </li>
                <li class="app-sidebar__heading">Alerts</li>
                <li>
                    <a href="{{route('admin.categories.index')}}" class="sidebar-item">
                        <i class="metismenu-icon pe-7s-menu"></i>
                        Alerts
                    </a>
                </li>
                <li class="app-sidebar__heading">User</li>
                <li>
                    <a href="{{route('admin.client-users.index')}}" class="sidebar-item">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Logout
                    </a>
                </li>
               

               
            </ul>
        </div>
    </div>
</div>