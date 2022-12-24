<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url('landing/images/Logo.png') }}" />
    <link rel="stylesheet" href="{{ url('landing/styles/navbar.css') }}">
    <link rel="stylesheet" href="{{ url('landing/styles/landing.css') }}">
    <link rel="stylesheet" href="{{ url('landing/styles/utility.css') }}">
    <link rel="stylesheet" href="{{ url('landing/styles/footer.css') }}">
    <link rel="stylesheet" href="{{ url('landing/styles/utility.css') }}">
    <link rel="stylesheet" href="{{ url("landing/styles/add.css") }}">

    <link rel="stylesheet" href="{{ url('landing/styles/bootstrap.min.css') }}">
    <script src="{{ url('landing/js/bootstrap.bundle.min.js') }}"></script>
    <title>Resepku</title>
</head>

<body>
    @include('partials.navbar')

    <div class="container mb-5">
        <section class="add ff-airbnb">
            @if (isset($recipe))
            <form action="" method="POST" enctype="multipart/form-data">
            @else
            <form action="" method="POST"
                enctype="multipart/form-data">
            @endif
                @csrf
                <div class="mb-3">
                    <label htmlFor="photo" class="form-label me-2">
                        Photo
                    </label>
                    <input type="file" class="form-control form-control-sm p-3" name="photo" placeholder="Photo" />
                </div>

                <div class="mb-3">
                    <label htmlFor="title" class="form-label me-2">
                        Title
                    </label>
                    <input type="text" class="form-control form-control-sm p-3" name="title" placeholder="Title" value="<?= isset($recipe['title']) ? $recipe['title'] : '' ?>"
                        required />
                </div>
                <div class="mb-3">
                    <label htmlFor="title" class="form-label me-2">
                        Kategori
                    </label>

                    <select name="kategori" style="width: 100%;" class="form-control form-control-sm p-3">
                    
                        @foreach ($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label me-2" title="Required">
                        Ingredients
                    </label>
                    <textarea class="form-control" name="ingredients" rows="10" placeholder="Ingredients" required><?= isset($recipe['ingredients']) ? $recipe['ingredients'] : '' ?></textarea>
                </div>


                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn back-primary w-100 text-light mb-2">
                        Post
                    </button>
                </div>
            </form>
        </section>
    </div>
</body>
@include('partials.footer')

</html>
