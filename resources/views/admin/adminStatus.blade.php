@foreach($statusDescArray as $val)
  <li @if((int)$data['status'] == (($loop->index - 5) * -1)) class="active" @endif
  ><a href="#" data-value="{{ ($loop->index - 5) * -1}}" data-id="{{ $data['id'] }}">@if($val == '最終確認済み')完了@else{{ $val }}@endif</a></li>
@endforeach
