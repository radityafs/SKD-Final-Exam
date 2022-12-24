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
    <link rel="stylesheet" href="{{ url('landing/styles/bootstrap.min.css') }}">
    <script src="{{ url('landing/js/bootstrap.bundle.min.js') }}"></script>
    <title>Resepku</title>
</head>


<body>

    @include('partials.navbar')

    <div className="container-fluid" style="position: relative;">
        <section class="hero row">
            <div class="content col-10 col-sm-9 d-flex flex-column justify-content-center ff-airbnb">
                <h1 class="display-5 mb-3">Discover Recipe & Delicious Food</h1>
                <form class="search mb-3" action="List.php" method="POST">
                    <label class="py-2 px-4" htmlFor="search">
                        <img src="{{ url('landing/icons/search.svg') }}" style="width: 25px; height:25px;"></i>
                    </label>
                    <input type="search" name="search" class="form-control p-3" id="search"
                        placeholder="Search food you want to ...">
                </form>
            </div>
            <div class="decoration col-2 col-sm-3 d-flex align-items-center back-primary">
                <img class="d-none d-md-block" src="{{ url('landing/images/landing-hero.webp') }}" alt="Hero" />
            </div>
        </section>

        <section class="suggestion ff-airbnb mb-10">
            <div class="title-section mb-4 mb-md-5">
                <h1>Popular For You!</h1>
            </div>
            <div class="row">
                <div class="left col-12 col-md-6">
                    <img src="" alt="Suggestion" />
                    <div></div>
                </div>
                <div class="right col-12 col-md-6">
                    <div>
                        <h1></h1>
                        <hr />
                        <p>

                        </p>
                        <a href="" class="btn back-primary text-light" style="width: 150px;">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>

        </section>


        <section class="new ff-airbnb mb-10">
            <div class="title-section mb-4 mb-md-5">
                <h1>New Recipe</h1>
            </div>
            <div class="row">
                <div class="left col-12 col-md-6">
                    <img src="" alt="New Recipe" />
                    <div></div>
                </div>
                <div class="right col-12 col-md-6">
                    <div>
                        <h1></h1>
                        <hr />
                        <p>

                        </p>
                        <a href="" class="btn back-primary text-light" style="width: 150px;">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </section>


        <section class="popular ff-airbnb mb-10">
            <div class="title-section mb-4 mb-md-5">
                <h1>Latest Recipe</h1>
            </div>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">

                </div>
            </div>
        </section>

    </div>

    @include('partials.footer')

</body>
