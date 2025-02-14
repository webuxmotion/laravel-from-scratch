<div class="top-nav">
    <ul class="memenu skyblue">
        <li class="active"><a href="/">Home</a></li>
        @foreach ($tree as $node)
            @if ($node['children']->isNotEmpty())
                <li class="grid"><a href="#">{{ $node->title }}</a>
                    <div class="mepanel">
                        <div class="row">
                            <div class="col1 me-one">
                                @include('components.submenu', ['tree' => $node['children']])
                            </div>
                        </div>
                    </div>
                </li>
            @else
                <li class="grid"><a href="/category/{{ $node->alias }}">{{ $node->title }}</a></li>
            @endif
        @endforeach
    </ul>
</div>
