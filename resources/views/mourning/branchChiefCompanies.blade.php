<option value="">選択してください</option>
@foreach($companiesArray as $val)
    <option value="{{$loop->index + 1}}"
            @if (old('branch_chief_company') == $loop->index + 1) selected @endif
            @if(array_key_exists('branch_chief_company', $session))
            @if($session['branch_chief_company'] == $loop->index + 1) selected @endif
        @endif>{{ $val }}</option>
@endforeach
