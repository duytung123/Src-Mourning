@foreach($statusArray as $val)
    <li class="@if((int)$input['status'] > ($loop->index + 1)) is-complete @endif @if((int)$input['status'] == ($loop->index + 1) ) is-active @endif"><span>{{ $val  }}</span></li>
@endforeach
