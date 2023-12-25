<option value="">選択してください</option>
@foreach($companiesArray as $val)
<option value="{{$loop->index + 1}}"
    @if (old('general_affairs_company') == $loop->index + 1) selected @endif
    @if(array_key_exists('general_affairs_company', $session))
        @if($session['general_affairs_company'] == $loop->index + 1) selected @endif
    @endif>{{ $val }}</option>
@endforeach
