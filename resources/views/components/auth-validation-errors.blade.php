@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="inner-block center-align teal-text text-darken-4">
            {{ __('入力エラー') }}
        </div>

        <ul class="refusal">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
