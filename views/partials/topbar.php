<nav class="topbar navbar navbar-light bg-light shadow-sm px-3">

    <button class="btn btn-outline-secondary" @click="toggleSidebar">
        <i class="bi bi-list"></i>
    </button>

    <div class="ms-auto dropdown">
        <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
            <?= ucwords($_SESSION['username']); ?>
        </button>

        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="javascript:void(0)" @click="handleLogout">Logout</a></li>
        </ul>
    </div>

</nav>
