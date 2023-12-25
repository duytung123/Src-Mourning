@extends('layout')
@section('title', '最終確認場面 | 丸井グループ 弔事連絡表')
@section('content')
    <form method="post" action="{{ route('final.confirm.post') }}" name="form1">
    @csrf
        <!-- 支部委員長の確認 -->
        <section class="section card grey lighten-5">
            <div class="card-content">
                <span class="card-title">最終確認</span>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <div class="justify col s12 bg2-2 text-small">
                            完了するとその後は編集できなくなります。
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section center-align">
            <div class="">
                <a class="waves-effect waves-light btn btn-large white grey-text text-darken-2"  onclick="history.back()">
                    戻る<i class="material-icons left">chevron_left</i></a>
                <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2" role="button">
                    登録<i class="material-icons right">chevron_right</i></button>
            </div>
        </section>
    </form>
@endsection
