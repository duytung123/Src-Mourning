@extends('layoutManager')
@section('title', '所属長確認場面 | 丸井グループ 弔事連絡表')
@section('content')
    <form method="post" action="{{ route('supervisor.confirm.post') }}" name="form1">
    @csrf
    <!-- 所属長の確認 -->
        <section class="section card grey lighten-5">
            <div class="card-content">
                <span class="card-title">所属長の確認</span>
                <div class="divider"></div>
                <div class="section text-small">
                    <div class="row res-block">
                        <strong class="col s12 m4">確認</strong>
                        <p class="col s12 m8 wb">@if((int)$input['supervisor_confirmation'] == 0)未確認@else確認済み@endif</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">社員番号</strong>
                        <p class="col s12 m8 wb">{{ $input['supervisor_employee_no'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">氏名</strong>
                        <p class="col s12 m8 wb">{{ $input['supervisor_name'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">フリガナ</strong>
                        <p class="col s12 m8 wb">{{ $input['supervisor_kana'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">就業会社</strong>
                        <p class="col s12 m8 wb">{{ $companiesArray[$input['supervisor_company']] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">所属</strong>
                        <p class="col s12 m8 wb">{{ $input['supervisor_member1'] }}</p>
                    </div>
                    <div class="divider"></div>
{{--                    <div class="row res-block">--}}
{{--                        <strong class="col s12 m4">所属②</strong>--}}
{{--                        <p class="col s12 m8 wb">{{ $input['supervisor_member2'] }}</p>--}}
{{--                    </div>--}}
{{--                    <div class="divider"></div>--}}
                </div>
            </div>
        </section>

        <section class="section center-align">
            <div class="">
                <a class="waves-effect waves-light btn btn-large white grey-text text-darken-2" onclick="history.back()">
                    戻る<i class="material-icons left">chevron_left</i></a>
                <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2" role="button">
                    登録<i class="material-icons right">chevron_right</i></button>
            </div>
        </section>
    </form>
@endsection
