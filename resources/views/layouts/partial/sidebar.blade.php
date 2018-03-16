<div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
              
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{Request::is('dashboard/admin*') ? 'active': ''}}">
                <a href="{{ route('dashboard.admin') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{Request::is('dashboard/slider*') ? 'active': ''}}">
                <a href="{{ route('slider.index') }}">
                    <i class="material-icons">Slideshow</i>
                    <p>Slider</p>
                </a>
            </li>
            <li class="{{Request::is('dashboard/category*') ? 'active': ''}}">
                <a href="{{ route('category.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="{{Request::is('dashboard/item*') ? 'active': ''}}">
                <a href="{{ route('item.index') }}">
                    <i class="material-icons">library_books</i>
                    <p>Items</p>
                </a>
            </li>
            
            <li>
                <a href="./notifications.html">
                    <i class="material-icons text-gray">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="active-pro">
                <a href="upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>
        </ul>
    </div>
</div>