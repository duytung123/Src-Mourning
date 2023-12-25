@extends('layout')
@section('title', '弔事連絡表 登録完了 | 丸井グループ 弔事連絡表')
@section('content')
    <section class="section card grey lighten-5">
        <div class="card-content">
          @if(isset($input['superior_name']))
            <h4 class="center-align">職場担当者(上司等)による登録が完了しました。</h4>
          @else
            <h4 class="center-align">弔事当事者による登録が完了しました。</h4>
          @endif

          <div class="text-small mt20">
            @if(isset($input['superior_name']))
              <p>手配担当者(総務/業務担当等)へ、下記パスワードを連絡してください。</p>
            @else
              <p>■弔事当事者の入力の場合<br>
                職場担当者(上司等)、手配担当者(総務/業務担当等)へ下記パスワードを連絡してください。</p>
              <p>■職場担当者(上司等)による代理入力の場合<br>
              職場担当者(上司等)による確認を実施してください。</p>
              <p>登録内容の修正にもパスワードは必要です。</p>
            @endif

            <blockquote class="finish-block">
                <p>弔事当事者 社員番号</p>
                <strong class="text-xlarge" id="js_id" data-id="{{ $input['related_employee_no'] }}">{{ $input['related_employee_no'] }}</strong>
            </blockquote>
            <blockquote class="finish-block">
                <p>パスワード</p>
                <strong class="text-xlarge" id="js_pwd" data-pwd="1234">{{ $input['password'] }}</strong>
            </blockquote>
            <p class="caution text-small justify">
                パスワードは紛失しないようご注意ください。<br>
                画面のスクリーンショットを撮っておくと後から確認ができます。
            </p>
            </div>
        </div>
    </section>
    <section class="section center-align">
        <div class="">
            <a href="{{ route('index') }}" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2 w-full" role="button"><i class="material-icons left">home</i>TOPに戻る</a>
        </div>
    </section>
@endsection
