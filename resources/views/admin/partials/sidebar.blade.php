<div>
    <ul class="d-flex flex-md-column gap-4 p-0 mobile">
        <li class="btn-sidebar    text-sm-start {{ request()->url() == route('dashboard', Auth::user()->slug) ? 'active' : '' }}">
            <a href="{{route('dashboard', Auth::user()->slug)}}" class="d-flex flex-column align-items-center d-md-inline-block">
                <span class="sidebar-icon px-sm-2"><i class="fa-solid fa-table-cells-large"></i></span>
                <p class="d-none d-sm-inline-block mb-0">Dashboard</p>
            </a>
        </li>
        <li class="btn-sidebar text-sm-start {{ request()->url() == route('admin.items.index', Auth::user()->slug) ? 'active' : '' }}">
            <a href="{{route('admin.items.index', Auth::user()->slug)}}" class="d-flex flex-column align-items-center d-md-inline-block">
                <span class="sidebar-icon px-sm-2"><i class="fa-solid fa-rectangle-list"></i></span>
                <p class="d-none d-sm-inline-block mb-0">Menu</p>
            </a>
        </li>
        <li class="btn-sidebar text-sm-start {{ request()->url() == route('admin.orders', Auth::user()->slug) ? 'active' : '' }}">
            <a href="{{route('admin.orders', Auth::user()->slug)}}" class="d-flex flex-column align-items-center d-md-inline-block">
                <span class="sidebar-icon px-sm-2"><i class="fa-solid fa-clipboard-list"></i></span>
                <p class="d-none d-sm-inline-block mb-0">Ordini</p>
            </a>
        </li>
        <li class="btn-sidebar text-sm-start {{ request()->url() == route('admin.items.statistics', ['slug'=> Auth::user()->slug, 'year'=> 2024 ]) ? 'active' : '' }}">
            <a href="{{route('admin.items.statistics', ['slug'=> Auth::user()->slug, 'year'=> 2024 ])}}" class="d-flex flex-column align-items-center d-md-inline-block">
                <span class="sidebar-icon px-sm-2"><i class="fa-solid fa-square-poll-vertical"></i></span>
                <p class="d-none d-sm-inline-block mb-0">Statistiche</p>
            </a>
        </li>
        <li class="btn-sidebar text-sm-start {{ request()->url() == route('admin.items.create', Auth::user()->slug) ? 'active' : '' }}">
            <a href="{{route('admin.items.create', Auth::user()->slug)}}" class="d-flex flex-column align-items-center d-md-inline-block">
                <span class="sidebar-icon px-sm-2"><i class="fa-solid fa-plus-minus"></i></span>
                <p class="d-none d-sm-inline-block mb-0">Crea Piatto</p>
            </a>
        </li>
    </ul>
</div>

<style>
    a {
        text-decoration: none;
        color: currentColor;
    }
</style>