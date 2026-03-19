<nav class="topbar navbar shadow-sm px-3">

    <button class="btn btn-outline-light" @click="toggleSidebar">
        <i class="bi bi-list"></i>
    </button>

    <div class="ms-auto dropdown">
        <button class="btn btn-light dropdown-toggle d-flex align-items-center justify-content-center gap-1" data-bs-toggle="dropdown">
            <i class="bi bi-person-fill"></i> <?= ucwords($_SESSION['username']); ?>
        </button>

        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="javascript:void(0)" @click="handleLogout">Logout</a></li>
        </ul>
    </div>

</nav>
