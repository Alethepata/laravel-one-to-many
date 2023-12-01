<header>
    <nav class="navbar bg-black">
        <div class="container-fluid">
          <a class="navbar-brand text-light"  href="{{route('home')}}" target="_blank">Vai al sito</a>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-light" type="submit">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </button>
        </form>
        </div>
      </nav>
</header>
