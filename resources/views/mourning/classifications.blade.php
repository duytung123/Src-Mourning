<option value="">選択してください</option>
@foreach($classificationsArray as $val)
<option value="{{$loop->index + 1}}" @if (old('classification') == $loop->index + 1) selected @endif
    @if(array_key_exists('classification', $session))
        @if($session['classification'] == $loop->index + 1) selected @endif
    @endif>{{ $val }}</option>
@endforeach
