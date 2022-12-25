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

    <section style="padding-top: 70px;">
        <div class="container-md w-full justify-content-center">
            <h1 class="title mb-2 text-center">{{ $recipe['title'] }}</h1>
            <div class="content-img" style="margin-top:20px">
                <img src="{{ url("uploads/$recipe->photo") }}" style="width:500px; height:350px; border-radius:25px; display: block; margin-left:auto; margin-right:auto;" alt="Food Image" />
            </div>
        </div>
    </section>

    <section style="margin-top:100px; margin-bottom: 150px;">
        <div class="container">
            <div class="ingridients">
                <h2>Ingriedients</h2>

                @php
                $ingridients = preg_split('/\r\n|\r|\n/', $recipe['ingridients']);
                @endphp

                <ul>
                    @foreach ($ingridients as $ingridient)
                    <li>{{ $ingridient }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
