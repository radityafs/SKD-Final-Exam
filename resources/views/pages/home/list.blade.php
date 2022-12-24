<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url('landing/images/Logo.png') }}" />
    <link rel="stylesheet" href="{{ url('landing/styles/navbar.css') }}">
    <link rel="stylesheet" href="{{ url('landing/styles/footer.css') }}">
    <link rel="stylesheet" href="{{ url('landing/styles/utility.css') }}">
    <link rel="stylesheet" href="{{ url('landing/styles/bootstrap.min.css') }}">
    <script src="{{ url('landing/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ url('landing/styles/profile.css') }}" />

    <title>List Resep Masakan</title>
</head>

<body style="overflow-x:hidden;">

    @include('partials.navbar')

    <div class="container" style="padding-top: 150px; margin-bottom:120px;">

        <div class="search w-100">
            <form class="search mx-auto mb-5" action="List.php" method="POST">
                <label class="px-4 py-3" style="position: absolute;" htmlFor="search">
                    <img class="image-card" src="./landing/icons/search.svg" style="width: 25px; height:25px;"></i>
                </label>
                <input style="padding-left: 55px !important;" type="search" name="search" class="form-control p-3"
                    placeholder="Find your recipe..">
            </form>
        </div>


        <div class="row list-recipe">

            @if (count($recipe) > 0)
                @foreach ($recipe as $item)
                    @if ($item->isActive == 1)
                        
                      <div class="col-md-3">
                            <a class="card" href="{{ url('recipe/detail/' . $item->id) }}">
                                <img class="image-card" src="{{ url("/uploads/{$item->photo}") }}" alt="Food Image" />
                                <p class="carousel-caption">{{ $item->title }}</p>
                            </a>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-md-12">
                    <h1 class="text-center">Data Kosong</h1>
                </div>
            @endif

        </div>
    </div>


    @include('partials.footer')

</body>

</html>
