<div class="app-sidebar">
    <div class="logo">
        <a href="index.html" class="logo-icon"><span class="logo-text">Kelompok 2</span></a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="#">
                <span class="user-info-text">{{ $name ?? 'Admin' }}</span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">Apps</li>
            <li>
                <a href="<?= url("/admin/dashboard") ?>"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
            </li>
            @if(Auth::user()->role == "super_admin")
            <li>
                <a href="<?= url("/admin/dashboard/user") ?>"><i class="material-icons-two-tone">person</i>User</a>
            </li>
            <li>
                <a href="<?= url("/admin/dashboard/category") ?>"><i class="material-icons-two-tone">cloud</i>Category</a>
            </li>
            @endif
            <li>
                <a href="<?= url("/admin/dashboard/recipe") ?>"><i class="material-icons-two-tone">cloud</i>Recipe</a>
            </li>
            <li>
                <a href="<?= url("/logout") ?>"><i class="material-icons-two-tone">cloud</i>Logout</a>
            </li>
        </ul>
    </div>
</div>
