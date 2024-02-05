<div>
    <ul class="d-flex flex-column gap-4 p-0">
        <li class="btn-sidebar text-lg-start">
            <a href="{{route('dashboard', $user->slug)}}">
                <span class="sidebar-icon px-lg-2"><i class="fa-solid fa-table-cells-large"></i></span>
                <p class="d-none d-lg-inline-block mb-0">Dashboard</p>
            </a>
        </li>
        <li class="btn-sidebar text-lg-start">
            <a href="{{route('admin.items.index', $user->slug)}}">
                <span class="sidebar-icon px-lg-2"><i class="fa-solid fa-rectangle-list"></i></span>
                <p class="d-none d-lg-inline-block mb-0">Menu</p>
            </a>
        </li>
        <li class="btn-sidebar text-lg-start">
            <a href="#">
                <span class="sidebar-icon px-lg-2"><i class="fa-solid fa-clipboard-list"></i></span>
                <p class="d-none d-lg-inline-block mb-0">Ordini</p>
            </a>
        </li>
        <li class="btn-sidebar text-lg-start">
            <a href="#">
                <span class="sidebar-icon px-lg-2"><i class="fa-solid fa-square-poll-vertical"></i></span>
                <p class="d-none d-lg-inline-block mb-0">Statistiche</p>
            </a>
        </li>
        <li class="btn-sidebar text-lg-start">
            <a href="{{route('admin.items.create', $user->slug)}}">
                <span class="sidebar-icon px-lg-2"><i class="fa-solid fa-plus-minus"></i></span>
                <p class="d-none d-lg-inline-block mb-0">Crea Piatto</p>
            </a>
        </li>
        <li class="btn-sidebar text-lg-start">
            <a href="#">
                <span class="sidebar-icon px-lg-2">&homtht;</span>
                <p class="d-none d-lg-inline-block mb-0">Qualcosa</p>
            </a>
        </li>
    </ul>
</div>

<style>

.btn-sidebar {
    /* width: 50px; */
    /* border: 1px solid salmon; */
    border-radius: 10px;
    padding: 10px 5px;
    text-align: center;
}

.sidebar-icon {
    width: 30px;
    /* padding: 10px */
}

.btn-sidebar:hover {
    background-color: #FC8019;
    color: white;
}

</style>