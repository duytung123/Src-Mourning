@extends('layout')
@section('title', '弔事連絡表 登録完了 | 丸井グループ 弔事連絡表')
@section('content')
  <section class="section card grey lighten-5">
    <div class="card-content">
      <h5 class="center-align">手配担当者による最終登録が完了しました。</h5>
      <h5 class="center-align">丸井グループ総務部総務課とマルイグループ福祉会にメール通知されます。</h5>
      <div class="">
        <blockquote class="finish-block mt50 text-xsmall">
          <p>弔事当事者 社員番号</p>
          <strong class="text-xlarge" id="js_id" data-id="{{ $input['related_employee_no'] }}">{{ $input['related_employee_no'] }}</strong>
        </blockquote>
        <blockquote class="finish-block text-xsmall">
          <p>パスワード</p>
          <strong class="text-xlarge" id="js_pwd" data-pwd="1234">{{ $input['password'] }}</strong>
        </blockquote>
      </div>
    </div>
  </section>
  <section class="section center-align">
    <div class="">
      <a href="{{ route('manager.login') }}" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2 w-full" role="button"><i class="material-icons left">home</i>TOPに戻る</a>
    </div>
  </section>
@endsection
