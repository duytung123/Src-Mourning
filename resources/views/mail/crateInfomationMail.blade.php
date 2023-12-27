<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail final</title>
</head>
<body>
    <div>
        <h4 class="center-align">弔事当事者による登録が完了しました。</h4>
        <div class="text-small mt20">
            <p>■弔事当事者の入力の場合<br>
  職場担当者(上司等)、手配担当者(総務/業務担当等)へ下記パスワードを連絡してください。</p>
<p>■職場担当者(上司等)による代理入力の場合<br>
職場担当者(上司等)による確認を実施してください。</p>
<p>登録内容の修正にもパスワードは必要です。</p>
    </div>
    <section class="section card grey lighten-5">
        <div class="card-content">
          <h4 class="center-align">登録が完了しました</h4>
          <div class="">
            <blockquote class="finish-block mt50 text-xsmall">
              <p>弔事当事者 社員番号</p>
              <strong class="text-xlarge"> @if($mailData['related_employee_no']) {{ $mailData['related_employee_no'] }} @endif</strong>
            </blockquote>
            <blockquote class="finish-block text-xsmall">
              <p>パスワード</p>
              <strong class="text-xlarge">@if($mailData['password']) {{ $mailData['password'] }} @endif</strong>
            </blockquote>
          </div>
        </div>
      </section>
</body>
</html>
