<option value="">選択してください</option>
@foreach($chiefMournerRelationshipArray as $val)
<option value="{{$loop->index + 1}}" @if (old('chief_mourner_relationship') == $loop->index + 1) selected @endif
    @if(array_key_exists('chief_mourner_relationship', $session))
        @if($session['chief_mourner_relationship'] == $loop->index + 1) selected @endif
    @endif>{{ $val }}</option>
@endforeach
