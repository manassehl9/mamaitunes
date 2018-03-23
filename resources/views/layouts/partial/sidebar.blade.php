<div class="sidebar" data-color="purple" data-image="{{asset('backend/img/sidebar-1.jpg')}}">
              
    <div class="logo">
        <a href="{{ route('dashboard.admin')}}">
            <h4>Mama Itunu Kitchen</h4>
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
            <li class="{{Request::is('dashboard/reservation*') ? 'active': ''}}">
                <a href="{{ route('reservation.index') }}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Reservations</p>
                </a>
            </li>
            <li class="{{Request::is('dashboard/contact*') ? 'active': ''}}">
                <a href="{{ route('contact.index') }}">
                    <i class="material-icons">message</i>
                    <p>Contacts Message</p>
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