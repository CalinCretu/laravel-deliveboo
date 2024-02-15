<div>
    <ul class="d-flex flex-column gap-4 p-0">
        <li class="btn-sidebar text-sm-start">
            <a href="{{route('dashboard', $user->slug)}}">
                <span class="sidebar-icon px-sm-2"><i class="fa-solid fa-table-cells-large"></i></span>
                <p class="d-none d-sm-inline-block mb-0">Dashboard</p>
            </a>
        </li>
        <li class="btn-sidebar text-sm-start">
            <a href="{{route('admin.items.index', $user->slug)}}">
                <span class="sidebar-icon px-sm-2"><i class="fa-solid fa-rectangle-list"></i></span>
                <p class="d-none d-sm-inline-block mb-0">Menu</p>
            </a>
        </li>
        <li class="btn-sidebar text-sm-start">
            <a href="{{route('admin.orders', $user->slug)}}">
                <span class="sidebar-icon px-sm-2"><i class="fa-solid fa-clipboard-list"></i></span>
                <p class="d-none d-sm-inline-block mb-0">Ordini</p>
            </a>
        </li>
        <li class="btn-sidebar text-sm-start">
            <a href="{{route('admin.items.statistics', ['slug'=> $user->slug, 'year'=> 2024 ])}}">
                <span class="sidebar-icon px-sm-2"><i class="fa-solid fa-square-poll-vertical"></i></span>
                <p class="d-none d-sm-inline-block mb-0">Statistiche</p>
            </a>
        </li>
        <li class="btn-sidebar text-sm-start">
            <a href="{{route('admin.items.create', $user->slug)}}">
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