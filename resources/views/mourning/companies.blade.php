<option value="">選択してください</option>
@foreach($companiesArray as $val)
<option value="{{$loop->index + 1}}" @if (old('company') == $loop->index + 1) selected @endif
    @if(array_key_exists('company', $session))
        @if($session['company'] == $loop->index + 1) selected @endif>{{ $val }}</option>
    @endif
@endforeach
