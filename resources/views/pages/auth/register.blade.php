@include('partials.header', ['title' => 'Register Page - Kelompok 2'])

<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background"></div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="{{ url('/') }}">Kelompok 2</a>
            </div>
            <p class="auth-description">
                Please enter your credentials to create an account.<br />Already have
                an account? <a href="{{ url('/login') }}">Sign In</a>
            </p>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/register') }}" method="POST">
                @csrf
                <div class="auth-credentials m-b-xxl">
                    <label for="signUpUsername" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control m-b-md" id="signUpUsername"
                        aria-describedby="signUpUsername" placeholder="Enter your name" />

                    <label for="signUpEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control m-b-md" id="signUpEmail"
                        aria-describedby="signUpEmail" placeholder="example@neptune.com" />

                    <label for="signUpPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="signUpPassword"
                        aria-describedby="signUpPassword"
                        placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" />
                    <div id="emailHelp" class="form-text">
                        Password must be minimum 8 characters length*
                    </div>


                    {!! RecaptchaV3::field('register') !!}
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>


            <div class="divider"></div>
            <div class="auth-alts">
                <a href="{{ url('/auth/google') }}" class="auth-alts-google"></a>
                <a href="{{ url('/auth/github') }}"
                    style="background:url('https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png'); background-size:cover;"></a>
                <a href="{{ url('/auth/twitter') }}" class="auth-alts-twitter"></a>
            </div>
        </div>
    </div>

    @include('partials.script')
</body>
