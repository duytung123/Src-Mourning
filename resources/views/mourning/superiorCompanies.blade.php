<option value="">選択してください</option>
@foreach($companiesArray as $val)
<option value="{{$loop->index + 1}}" @if (old('superior_company') == $loop->index + 1) selected @endif
    @if(array_key_exists('superior_company', $session))
        @if($session['superior_company'] == $loop->index + 1) selected @endif>{{ $val }}</option>
    @endif
@endforeach
