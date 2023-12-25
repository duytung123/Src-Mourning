@extends('layout')
@section('title', '丸井グループ 弔事連絡表')
@section('content')
<section class="section card grey lighten-5 center-align">
    <div class="card-content">
        <h4 class="">弔事連絡の新規登録
        </h4>
        <p class="subheader">弔事連絡の新規登録を行う場合は、こちらから</p>

    </div>
    <div class="card-action">
        <a href="{{ route('create.show') }}" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2" role="button"><span>弔事連絡を入力する
</span><i class="material-icons right">edit</i></a>
    </div>
</section>
<section class="section card grey lighten-5 center-align">
    <div class="card-content">
        <h4 class="">弔事連絡の確認①<span>弔事当事者・職場担当者用</span></h4>
        <p class="subheader">弔事連絡の登録内容の確認を行う場合は、こちらから</p>
        <p class="subheader">職場担当者(上司等)が確認登録を完了するまでは編集が可能です。</p>
    </div>
@if($error)
    <div class="card-content">
        <div class="card-panel teal lighten-5">
        <span class="teal-text text-darken-2">{{ $error }}</span>
        </div>
    </div>
@endif
    <div class="card-action">
        <form action="{{ route('postLogin') }}" method="POST" onSubmit="return">
        @csrf
            <div class="row">
                <div class="input-field col push-l3 s12 l6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="related_employee_no" type="text" name="related_employee_no" class="validate text-xLarge zen2half" value="{{old('related_employee_no')}}" pattern="[0-9]{7}" maxlength="7" minlength="7" required autofocus />
                    <label for="related_employee_no" class="">弔事当事者 社員番号</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col push-l3 s12 l6">
                    <i class="material-icons prefix">assignment_turned_in</i>
                    <input id="password" type="text" name="password" class="validate zen2half text-xLarge" pattern="[0-9]{4}" maxlength="4" minlength="4" required autocomplete="current-password" />
                    <label for="password" class="">パスワード</label>
                </div>
            </div>
            <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2" role="button">弔事連絡を呼び出す<i class="material-icons right">assignment</i></button>
        </form>
    </div>
</section>
@endsection

