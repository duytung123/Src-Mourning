@extends('layoutManager')
@section('title', '支部委員長/分会長確認場面 | 丸井グループ 弔事連絡表')
@section('content')
    <form method="POST" action="{{ route('manager.information.post') }}">
    @csrf
    <section class="section card grey lighten-5">
        <div class="card-content">
            <span class="card-title">基本情報</span>
            <div class="divider"></div>
            <div class="section text-small">
                <div class="row res-block">
                    <strong class="col s12 m4">入力者</strong>
                    @if ($input['entrant'] === 0) {
                        <p class="col s12 m8 wb">本人(弔事当事者)</p>
                    }@else
                        <p class="col s12 m8 wb">代理者の入力</p>
                    @endif
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">弔事当事者の社員番号</strong>
                    <p class="col s12 m8 wb">{{ $input['related_employee_no'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">弔事当事者の入社年度</strong>
                    <p class="col s12 m8 wb">{{ $input['membership_year'] }} 年</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">氏名</strong>
                    <p class="col s12 m8 wb">{{ $input['related_name'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">フリガナ</strong>
                    <p class="col s12 m8 wb">{{ $input['related_kana'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">社員区分</strong>
                    <p class="col s12 m8 wb">{{ $classificationsArray[$input['classification']] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">就業会社</strong>
                    <p class="col s12 m8 wb">{{ $companiesArray[$input['company']] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">所属①</strong>
                    <p class="col s12 m8 wb">{{ $input['member1'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">所属②</strong>
                    <p class="col s12 m8 wb">{{ $input['member2'] }}</p>
                </div>
                <div class="divider"></div>

                @if((int)$input['entrant'] == 1)
                        <div class="row res-block">
                            <strong class="col s12 m4">代理者の社員番号</strong>
                            <p class="col s12 m8 wb">{{ $input['entrant_employee_no'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">氏名</strong>
                            <p class="col s12 m8 wb">{{ $input['entrant_name'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">フリガナ</strong>
                            <p class="col s12 m8 wb">{{ $input['entrant_kana'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">社員区分</strong>
                            <p class="col s12 m8 wb">{{ $classificationsArray[$input['entrant_classification']] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">就業会社</strong>
                            <p class="col s12 m8 wb">{{ $companiesArray[$input['entrant_company']] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">所属①</strong>
                            <p class="col s12 m8 wb">{{ $input['entrant_member1'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">所属②</strong>
                            <p class="col s12 m8 wb">{{ $input['entrant_member2'] }}</p>
                        </div>
                    <div class="divider"></div>
                @endif

                <div class="row res-block">
                    <strong class="col s12 m4">故人様氏名</strong>
                    <p class="col s12 m8 wb">{{ $input['passed_away_name'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">故人様フリガナ</strong>
                    <p class="col s12 m8 wb">{{ $input['passed_away_kana'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">逝去日時</strong>
                    <p class="col s12 m8 wb">{{ $input['passed_away_date'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">本人(弔事当事者)との続柄</strong>
                    <p class="col s12 m8 wb">{{ $passedAwayRelationshipArray[$input['passed_away_relationship']] }}</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="entrant-information off" id="entrant-information">
            <span>代理者</span>
                <div class="row res-block">
                    <strong class="col s12 m4">代理者の社員番号</strong>
                    <p class="col s12 m8 wb"><input type="text" name="entrant_employee_no" value="{{ $input['entrant_employee_no'] }}"></p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">氏名</strong>
                    <p class="col s12 m8 wb"><input type="text" name="entrant_name" value="{{ $input['entrant_name'] }}"></p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">フリガナ</strong>
                    <p class="col s12 m8 wb"><input type="text" name="entrant_kana" value="{{ $input['entrant_kana'] }}"></p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">社員区分</strong>
                    <p class="col s12 m8 wb"><input type="text" name="entrant_classification" value="{{ $input['entrant_classification'] }}"></p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">就業会社</strong>
                    <p class="col s12 m8 wb"><input type="text" name="entrant_company" value="{{ $input['entrant_company'] }}"></p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">所属①</strong>
                    <p class="col s12 m8 wb"><input type="text" name="entrant_member1" value="{{ $input['entrant_member1'] }}"></p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">所属②</strong>
                    <p class="col s12 m8 wb"><input type="text" name="entrant_member2" value="{{ $input['entrant_member2'] }}"></p>
                </div>
            <div class="divider"></div>
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
