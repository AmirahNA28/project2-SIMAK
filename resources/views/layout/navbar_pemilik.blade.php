<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Pemilik</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard_pemilik') }}">Dashboard</a></li>
            </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light">Logout</button>
            </form>
        </div>
    </div>
</nav>
