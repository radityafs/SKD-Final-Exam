@include('partials.header', ['title' => 'Login Page - Kelompok 2'])

<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background"></div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="{{ url('/') }}">Kelompok 2</a>
            </div>
            <p class="auth-description">
                Please sign-in to your account and continue to the dashboard.<br />Don't
                have an account? <a href="{{ url('/register') }}">Sign Up</a>
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



            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="auth-credentials m-b-xxl">
                    <label for="signInEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control m-b-md" id="signInEmail"
                        aria-describedby="signInEmail" placeholder="example@neptune.com" />

                    <label for="signInPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="signInPassword"
                        aria-describedby="signInPassword"
                        placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" />

                    {!! RecaptchaV3::field('login') !!}

                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    <a href="{{ url('forget-password') }}" class="auth-forgot-password float-end">Forgot password?</a>
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

    @include('partials.footer')
</body>
