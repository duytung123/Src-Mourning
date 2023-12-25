<option value="">選択してください</option>
@foreach($companiesArray as $val)
    <option value="{{$loop->index + 1}}"
            @if (old('supervisor_company') == $loop->index + 1) selected @endif
            @if(array_key_exists('supervisor_company', $session))
            @if($session['supervisor_company'] == $loop->index + 1) selected @endif
        @endif>{{ $val }}</option>
@endforeach
