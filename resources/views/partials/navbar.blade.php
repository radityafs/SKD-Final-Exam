<nav class='navbar nav-wrapper navbar-expand-lg navbar-light bg-light bg-white py-40 w-100'>
    <div class='container-md'>
        <a class='navbar-brand' href='{{ url("") }}'>
            <img src="{{ url("assets/images/logo.png") }}" style="width: 40px; height:40px;" alt='dssds' />
        </a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav'
            aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav ms-auto text-lg gap-lg-0 gap-2'>
                <li class='nav-item my-auto me-lg-20'>
                    <a class='nav-link' href='{{ url('list-recipe') }}'>
                        Find Recipe
                    </a>
                </li>
                <li class='nav-item my-auto me-lg-20'>
                    <a class='nav-link' href='{{ url('add-recipe') }}'>
                        Add Recipe
                    </a>
                </li>

                @if(Auth::check())

                <li class="nav-item my-auto dropdown d-flex">
                    <div class="vertical-line d-lg-block d-none"></div>
                    <div>
                      <a
                        class="dropdown-toggle ms-lg-40"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <img
                          src="{{ Auth::user()->photo == null ? asset('images/avatars/avatar.png') : asset('uploads/'.Auth::user()->photo) }}"
                          class="rounded-circle"
                          width="40"
                          height="40"
                          alt=""
                        />
                      </a>
  
                      <ul
                        class="dropdown-menu border-0"
                        aria-labelledby="dropdownMenuLink"
                      >
                        <li>
                          <a
                            class="dropdown-item text-lg color-palette-2"
                            href="{{ url("/my-profile") }}"
                          >
                            My Profile
                          </a>

                          <a
                          class="dropdown-item text-lg color-palette-2"
                          href="{{ url("/logout") }}"
                        >
                          Log out
                        </a>
                        </li>
                      </ul>
                    </div>
                  </li>

                @else
                <li class="nav-item my-auto me-lg-20">
                    <a style="text-decoration: none;" class="btn-nav" href="{{ 'register' }}">
                        Sign Up
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
