@extends('layoutAuthenticate')
@section('title', '管理者⽤ ログイン画⾯')
@section('content')
<section class="section card grey lighten-5 center-align">
    <div class="card-content">
        <h4 class="">管理者⽤ ログイン画⾯</h4>
    </div>
@if($error)
    <div class="card-content">
        <div class="card-panel teal lighten-5">
        <span class="teal-text text-darken-2">{{ $error }}</span>
        </div>
    </div>
@endif
    <div class="card-action">
        <form action="{{ route('postUserAuthenticate') }}" method="POST" onSubmit="return">
        @csrf
            <div class="row">
                <div class="input-field col push-l3 s12 l6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="login_id" type="text" name="login_id" class="validate text-xLarge zen2half" value="{{old('login_id')}}" pattern="{10}" maxlength="10" minlength="10" required autofocus />
                    <label for="login_id" class="">ユーザーID</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col push-l3 s12 l6">
                    <i class="material-icons prefix">assignment_turned_in</i>
                    <input id="password" type="password" name="password" class="validate zen2half text-xLarge" pattern="{8}" maxlength="8" minlength="8" required autocomplete="current-password" />
                    <label for="password" class="">パスワード</label>
                </div>
            </div>
            <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2" role="button">ログイン<i class="material-icons right">assignment</i></button>
        </form>
    </div>
</section>
@endsection

