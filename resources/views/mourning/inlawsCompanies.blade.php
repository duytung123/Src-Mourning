<option value="">選択してください</option>
@foreach($companiesArray as $val)
<option value="{{$loop->index + 1}}" @if (old('inlaws_company') == $loop->index + 1) selected @endif
    @if(array_key_exists('inlaws_company', $session))
        @if($session['inlaws_company'] == $loop->index + 1) selected @endif>{{ $val }}</option>
    @endif
@endforeach
