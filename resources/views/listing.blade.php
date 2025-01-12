@if ($listing == null)
    Nothing Found
@else
    <h2>
        <a href="/listings/{{ $listing['id'] }}">
            {{ $listing['title'] }}
        </a>
    </h2>
    <p>{{ $listing['description'] }}</p>
@endif
