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
                                    <h1>Data Category</h1>
                                    <span>Berikut data Category</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header w-100 d-flex justify-content-between">
                                        <h5 class="card-title">Data Category</h5>

                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-action="Add">Add</button>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable1" class="display" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @if(count($categories) > 0)
                                                @foreach($categories as $category)
                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-action="Edit" data-bs-category="{{ json_encode($category) }}">Edit</button>
                                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-action="Delete" data-bs-category="{{ json_encode($category) }}">Delete</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3" class="text-center">Tidak ada data</td>
                                                </tr>
                                            @endif

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
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


  <script>
    const BASE_URL = "{{ url('/') }}";
    //on modal show
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var action = button.data('bs-action') // Extract info from data-* attributes
      var category = button.data('bs-category') // Extract info from data-* attributes


      
      var modal = $(this)

      modal.find('.modal-title').text(action + ' Category')
      modal.find('.modal-body input[name="id"]').val(category?.id || '')
      modal.find('.modal-body input[name="name"]').val(category?.name || '')
      modal.find('.modal-footer button[type="submit"]').text(action + ' Category')
    
      if(action == 'Delete') {
        $(this).find('form').attr('action', `${BASE_URL}/category/${category?.id}/delete`)
        $(this).find('form').attr('method', 'GET')
        $(this).find('input').attr('disabled', true)

      }else if(action == 'Edit') {
        $(this).find('form').attr('action', `${BASE_URL}/category/${category?.id}/update`)
        $(this).find('form').attr('method', 'POST')

        $(this).find('input').attr('disabled', false)

      }else{
        $(this).find('form').attr('action', `${BASE_URL}/category`)
        $(this).find('form').attr('method', 'POST')

        $(this).find('input').attr('disabled', false)
      }
      

    })
  </script>
</body>
