<div class="menu-btn">&#9776;</div>
<nav class="pushy pushy-left">
    <ul class="side_menu">
        <li><a href="/" class="animsition-link"><i class="fa fa-map-marker"></i>Map</a></li>
        @if (!Auth::guest())
            <li><a href="/settings"><i class="fa fa-user"></i>User settings</a></li>
        @endif
        <li><a href="/"><i class="fa fa-list"></i>Place list</a></li>
        <li><a href="/"><i class="fa fa-th"></i>Place grid</a></li>
        <li><a href="/"><i class="fa fa-building-o"></i>Place</a></li>
    </ul>
</nav>