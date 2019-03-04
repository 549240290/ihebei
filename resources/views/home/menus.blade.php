<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">首页</a>
    <ul class="navbar-nav mr-auto">
        @foreach($channel as $item)
            <li class="nav-item">
                <a class="nav-link" href="{{ url("/channel/{$item->id}") }}">{{ $item->title }}</a>
            </li>
        @endforeach
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
</nav>

