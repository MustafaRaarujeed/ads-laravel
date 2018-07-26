<nav class="navbar navbar-expand-lg navbar-light raar-nav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('ads.index') }}">Raar Ads</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cat.getAdd') }}">Add Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Add Banner</a>
                </li>
            </ul>
            {{ auth()->user()->name }}
            <a class="btn btn-success" href="{{ route('logout') }}">
                <b>Logout</b>
            </a>
        </div>
    </div>
</nav>