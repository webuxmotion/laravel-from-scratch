<div class="w_sidebar">
    @foreach ($groups as $group)
        <section class="sky-form">
            <h4>{{ $group->title }}</h4>
            <div class="row1 scroll-pane">
                @foreach ($group->attributeValues as $value)
                    <label class="checkbox">
                        <input type="checkbox" name="checkbox" value="{{ $value->id }}"
                            @if (in_array($value->id, $filters)) checked @endif><i></i>{{ $value->value }}</label>
                @endforeach
            </div>
        </section>
    @endforeach
</div>
