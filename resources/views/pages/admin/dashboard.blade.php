@include('partials.header')

<body>
    <div class="app align-content-stretch d-flex flex-wrap">

        @include('partials.sidebar')

        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i
                                            class="material-icons">first_page</i></a>
                                </li>

                            </ul>

                        </div>
                    </div>
                </nav>
            </div>
            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="page-description">
                                    <h1>Dashboard</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card widget widget-stats">
                                    <div class="card-body">
                                        <div class="widget-stats-container d-flex">
                                            <div class="widget-stats-icon widget-stats-icon-primary">
                                                <i class="material-icons-outlined">person</i>
                                            </div>
                                            <div class="widget-stats-content flex-fill">
                                                <span class="widget-stats-title">Total User</span>
                                                <span class="widget-stats-amount"><?= $user[0] ?? 0 + $user[1] ?? 0 ?></span>
                                                <span class="widget-stats-info"><?= $user[1] ?? 0 ?> Aktif , <?= $user[0] ?? 0 ?> Belum Aktif </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card widget widget-stats">
                                    <div class="card-body">
                                        <div class="widget-stats-container d-flex">
                                            <div class="widget-stats-icon widget-stats-icon-warning">
                                                <i class="material-icons-outlined">cloud</i>
                                            </div>
                                            <div class="widget-stats-content flex-fill">
                                                <span class="widget-stats-title">Total Category</span>
                                                <span class="widget-stats-amount"><?= $category ?></span>
                                                <span class="widget-stats-info"><?= $category ?> Kategori</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card widget widget-stats">
                                    <div class="card-body">
                                        <div class="widget-stats-container d-flex">
                                            <div class="widget-stats-icon widget-stats-icon-danger">
                                                <i class="material-icons-outlined">cloud</i>
                                            </div>
                                            <div class="widget-stats-content flex-fill">
                                                <span class="widget-stats-title">Total Recipe</span>
                                                <span class="widget-stats-amount"><?= $recipe[0] ?? 0 + $recipe[1] ?? 0 ?></span>
                                                <span class="widget-stats-info"><?= $recipe[1] ?? 0 ?> Aktif , <?= $recipe[0] ?? 0 ?> Belum Aktif</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(Auth::user()->role == 'super_admin')
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Aktivasi User</h5>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable1" class="display" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($user_non_active) > 0)
                                                    @foreach ($user_non_active as $user)
                                                        <tr>
                                                            <td>{{ $user['id'] }}</td>
                                                            <td>{{ $user['name'] }}</td>
                                                            <td>{{ $user['email'] }}</td>
                                                            <td>
                                                                <a href="{{ url("/users/{$user['id']}/status ") }}"
                                                                    class="btn btn-primary btn-sm">Aktifkan</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="4" class="text-center">Tidak ada data</td>
                                                    </tr>
                                                @endif
                                                

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    @include('partials.script')
</body>

</html>
