<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('welcome') }}">Post</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('welcome') }}">Home</a>
        </li>
        <li class="nav-item {{ request()->is('/post/create') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('post.create') }}">Create</a>
        </li>
        <li class="nav-item {{ request()->is('/about') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('about') }}">About</a>
        </li>
      </ul>
    </div>
</nav>
