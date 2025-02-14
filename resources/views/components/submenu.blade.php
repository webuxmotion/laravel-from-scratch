<ul class="submenu">
    @foreach ($tree as $node)
        <li>
            <a href="/category/{{ $node->alias }}">{{ $node['title'] }}</a>

            @if ($node['children']->isNotEmpty())
                <ul>
                    @include('components.submenu', ['tree' => $node['children']])
                </ul>
            @endif
        </li>
    @endforeach
</ul>
