<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                @foreach ($breadcrumbs as $item)
                    @if ($item->alias)
                        <li><a href="/category/{{ $item->alias }}">{{ $item->title }}</a></li>
                    @else
                        <li class="active">{{ $item->title }}</li>
                    @endif
                @endforeach
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
