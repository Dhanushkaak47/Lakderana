<style>
    body {
    margin: 0;
    padding: 0;
    font-family: 'ABeeZee';
    }

    header {
    padding: 10px 100px;
    box-sizing: border-box;
    }

    nav {
        width: 100%;
        background: rgba(0,0,0, .8);
        border-top: 1px solid rgba(255,255,255, .2);
        border-bottom: 1px solid rgba(255,255,255, .2);
        top: 0;
        }

    nav ul {
    display: flex;
    margin: 0;
    justify-content: flex-end;
    }

    nav ul li {
    list-style: none;
    }

    nav ul li a {
    display: block;
    color: #fff;
    padding: 0 10px;
    text-decoration: none;
    }

    nav ul li a:hover,
    nav ul li a.active {
    background: #f00;
    
    } 
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark">
<a class="navbar-brand" href="/">Lak Derana</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/adver">Advertisement</a>
        </li>
      @guest
        @if (Route::has('login'))
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item dropdown nav-item active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sign up as
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/signup">Traveller</a>
                <a class="dropdown-item" href="/hotel">Accommodation</a>
                <a class="dropdown-item" href="/transportsignup">Transport service</a>
              </div>
            </li>
        @endif
        @else
          <li class="nav-item active">
            <a class="nav-link" href="/community">Community</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/cpack">Create Packages</a>
          </li>
            <li class="nav-item active">
                <a class="nav-link" href="/profile">Profile</a>
            </li>
            <li class="nav-item dropdown active">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
    </ul>
  </div>
</nav>
<script>
    document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener('scroll', function() {
      if (window.scrollY > 60) {
        document.getElementById('navbar_top').classList.add('fixed-top');
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
      } else {
        document.getElementById('navbar_top').classList.remove('fixed-top');
         // remove padding top from body
        document.body.style.paddingTop = '0';
      } 
  });
}); 
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
