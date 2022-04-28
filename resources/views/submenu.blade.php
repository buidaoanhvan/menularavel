<ul>
    @foreach($submenu as $menu)
        <li>
            <a href="#">{{ $menu->name }}</a>
            @include('submenu', ['submenu' => $menu->subMenu])
        </li>
    @endforeach
</ul>
