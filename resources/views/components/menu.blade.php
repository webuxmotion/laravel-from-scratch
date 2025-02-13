<ul class="menu">
    @foreach($tree as $node)
        <li>
            <a href="#">{{ $node['title'] }}</a>

            @if($node['children']->isNotEmpty())
                <ul class="submenu">
                    @include('components.menu', ['tree' => $node['children']])
                </ul>
            @endif
        </li>
    @endforeach
</ul>