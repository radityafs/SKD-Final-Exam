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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="page-description">
                                    <h1>Data Recipe</h1>
                                    <span>Berikut data recipe yang diunggah user</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header w-100 d-flex justify-content-between">
                                        <h5 class="card-title">Data Recipe</h5>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-action="Add">Add</button>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable1" class="display" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Kategori</th>
                                                    <th>Creator</th>
                                                    <th style="width: 250px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($recipes) > 0)
                                                    @foreach($recipes as $recipe)
                                                        <tr>
                                                            <td>{{ $recipe->id }}</td>
                                                            <td>{{ $recipe->title }}</td>
                                                            <td>{{ $recipe->category->name }}</td>
                                                            <td>{{ $recipe->user->name }}</td>
                                                            <td>
                                                                @if($recipe['isActive'] == 1)
                                                                    <a href="{{ url("/recipe/{$recipe['id']}/status") }}" class="btn btn-success mr-2">Nonaktif</a>
                                                                @else
                                                                    <a href="{{ url("/recipe/{$recipe['id']}/status") }}" class="btn btn-warning">Aktifkan</a>
                                                                @endif
                                                                <a href="{{ url("/recipe/{$recipe['id']}/delete") }}" class="btn btn-danger">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="5" class="text-center">Tidak ada data</td>
                                                    </tr>
                                                @endif

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Kategori</th>
                                                    <th>Creator</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
    class="modal fade"
    id="exampleModal"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Tambahkan Category
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
      <form action="{{ url("/category") }}" method="POST">
        
        <div class="modal-body">
            @csrf

            <input type="hidden" name="id" value="">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Category</label>
                <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Nama Category"
                />
            </div>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            Close
          </button>
          <button type="submit" class="btn btn-primary">
            Tambahkan
          </button>
        </div>
     </form>
      </div>
    </div>
  </div>


  @include('partials.script')

</body>
