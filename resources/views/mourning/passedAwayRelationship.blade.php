<option value="">選択してください</option>
@foreach($passedAwayRelationshipArray as $val)
<option value="{{$loop->index + 1}}" @if (old('passed_away_relationship') == $loop->index + 1) selected @endif
    @if(array_key_exists('passed_away_relationship', $session))
        @if($session['passed_away_relationship'] == $loop->index + 1) selected @endif
    @endif>{{ $val }}</option>
@endforeach
