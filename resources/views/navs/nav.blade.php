<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ url('images/logo.png') }}" alt=""> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <form  action="{{ url('search') }}" method="GET">
      <input  type="search" name="search" placeholder="Search" aria-label="Search">
      <!-- <button  type="submit">Search</button> -->
    </form>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav nav-left">
        <a class="nav-item nav-link" href="{{ url('/catalog') }}">Features</a>
        <div class="dropdown">
          <a class="nav-item nav-link dropdown-toggle" type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Category</a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('category.filter',['nama_barang' => 'Man']) }}">Man</a>
            <a class="dropdown-item" href="{{ route('category.filter',['nama_barang' =>  'Woman']) }}">Woman</a>
            <a class="dropdown-item" href="{{ route('category.filter',['nama_barang' => 'Accessories']) }}">Accessories</a>
            <a class="dropdown-item" href="{{ route('category.filter',['nama_barang' => 'Bag']) }}">Bag</a>
          </div>
        </div>



        @if (Auth::check() && Auth::user()->role == 0)
          <a class="nav-item nav-link" href="{{ url('/file') }}">File</a>
        @endif
        @if (Auth::guest())
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          <a class="nav-item nav-link" href="{{ url('/register') }}">register</a>

        @else
        <a class="nav-item nav-link" href="{{ route('catalog.shopcart.get') }}">My Shopcart</a>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @endif

        </form>
      </div>
    </div>
</nav>
</header>
