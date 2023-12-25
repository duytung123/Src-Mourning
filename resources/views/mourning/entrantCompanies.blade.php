<option value="">選択してください</option>
@foreach($companiesArray as $val)
<option value="{{$loop->index + 1}}" @if (old('entrant_company') == $loop->index + 1) selected @endif
    @if(array_key_exists('entrant_company', $session))
        @if($session['entrant_company'] == $loop->index + 1) selected @endif
    @endif>{{ $val }}</option>
@endforeach
