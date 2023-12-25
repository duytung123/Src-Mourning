@extends('layout')
@section('title', '弔事連絡表 確認画面 | 丸井グループ 弔事連絡表')
@section('content')
<form method="post" action="{{ route('edit.confirm.post') }}" name="form1">
@csrf

    <!-- 基本情報 -->
    <section class="section card grey lighten-5">
        <div class="card-content">
            <span class="card-title">基本情報</span>
            <div class="divider"></div>
            <div class="section text-small">
                <div class="row res-block">
                    <strong class="col s12 m4">入力者</strong>
                    <p class="col s12 m8 wb">{{ $entrantArray[$input['entrant']] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">弔事当事者の社員番号</strong>
                    <p class="col s12 m8 wb">{{ $input['related_employee_no'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">f10</strong>
                    <p class="col s12 m8 wb">{{ $input['membership_year'] }}</p>
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

                @if($input['entrant'] == 1)
                    <div class="grey lighten-3">
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
                    <strong class="col s12 m4">逝去時</strong>
                    <p class="col s12 m8 wb">{{ $passedAwayDate }}</p>
                </div>
                <div class="divider"></div>
            </div>
        </div>
    </section>

    <!-- 社内親族 -->
    <section class="section card grey lighten-5">
        <div class="card-content">
            <span class="card-title">社内親族</span>
            <div class="divider"></div>
            <div class="section text-small">
                <div class="row res-block">
                    <strong class="col s12 m4">社内親族</strong>
                    <p class="col s12 m8 wb">{{ $inlawsArray[$input['inlaws']] }}</p>
                </div>
                <div class="divider"></div>
                @if($input['inlaws'] == 1)
                    <div class="row res-block">
                        <strong class="col s12 m4">社内親族の社員番号</strong>
                        <p class="col s12 m8 wb">{{ $input['inlaws_employee_no'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">氏名</strong>
                        <p class="col s12 m8 wb">{{ $input['inlaws_name'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">フリガナ</strong>
                        <p class="col s12 m8 wb">{{ $input['inlaws_kana'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">就業会社</strong>
                        <p class="col s12 m8 wb">{{ $companiesArray[$input['inlaws_company']] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">所属①</strong>
                        <p class="col s12 m8 wb">{{ $input['inlaws_member1'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">所属②</strong>
                        <p class="col s12 m8 wb">{{ $input['inlaws_member2'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">供花/弔電の手配</strong>
                        <p class="col s12 m8 wb">{{ $inlaws_condolenceArray[$input['inlaws_condolence']] }}</p>
                    </div>
                    <div class="divider"></div>
                @endif
            </div>
        </div>
    </section>

    <!-- 通夜 -->
    <section class="section card grey lighten-5">
        <div class="card-content">
            <span class="card-title">通夜</span>
            <div class="divider"></div>
            <div class="section text-small">
                <div class="row res-block">
                    <strong class="col s12 m4">通夜を行う</strong>
                    <p class="col s12 m8 wb">{{ $wakeArray[$input['wake']] }}</p>
                </div>
                <div class="divider"></div>
                @if($input['wake'] == 0)
                    <div class="row res-block">
                        <strong class="col s12 m4">通夜の日付</strong>
                        <p class="col s12 m8 wb">{{ $wakeDate }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">通夜の時間</strong>
                        <p class="col s12 m8 wb">{{ $input['wake_time_start'] .'〜'. $input['wake_time_end'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">通夜の式場名</strong>
                        <p class="col s12 m8 wb">{{ $input['wake_ceremony'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">郵便番号</strong>
                        <p class="col s12 m8 wb">{{ $input['wake_ceremony_zip'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">住所</strong>
                        <p class="col s12 m8 wb">{{ $input['wake_ceremony_addr1'].$input['wake_ceremony_addr2'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">電話番号</strong>
                        <p class="col s12 m8 wb">{{ $input['wake_ceremony_tel'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">URL</strong>
                        <p class="col s12 m8 wb">{{ $input['wake_ceremony_url'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">交通手段</strong>
                        <p class="col s12 m8 wb">{!! nl2br(e($input['wake_ceremony_access'] )) !!}</p>
                    </div>
                    <div class="divider"></div>
                @endif
            </div>
        </div>
    </section>

    <!-- 告別式 -->
    <section class="section card grey lighten-5">
        <div class="card-content">
            <span class="card-title">告別式</span>
            <div class="divider"></div>
            <div class="section text-small">
                <div class="row res-block">
                    <strong class="col s12 m4">告別式を行う</strong>
                    <p class="col s12 m8 wb">{{ $funeralArray[$input['funeral']] }}</p>
                </div>
                <div class="divider"></div>
                @if($input['funeral'] == 0)
                    <div class="row res-block">
                        <strong class="col s12 m4">告別式の日付</strong>
                        <p class="col s12 m8 wb">{{ $funeralDate }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">告別式の時間</strong>
                        <p class="col s12 m8 wb">{{ $input['funeral_time_start'] .'〜'. $input['funeral_time_end']}}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">通夜と同じ式場</strong>
                        <p class="col s12 m8 wb">{{ $funeral_same_ceremonyArray[$input['funeral_same_ceremony']] }}</p>
                    </div>
                    <div class="divider"></div>
                    @if($input['funeral_same_ceremony'] == 1)

                        <div class="row res-block">
                            <strong class="col s12 m4">告別式の式場名</strong>
                            <p class="col s12 m8 wb">{{ $input['funeral_ceremony'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">郵便番号</strong>
                            <p class="col s12 m8 wb">{{ $input['funeral_ceremony_zip'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">住所</strong>
                            <p class="col s12 m8 wb">{{ $input['funeral_ceremony_addr1'].$input['funeral_ceremony_addr2'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">電話番号</strong>
                            <p class="col s12 m8 wb">{{ $input['funeral_ceremony_tel'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">URL</strong>
                            <p class="col s12 m8 wb">{{ $input['funeral_ceremony_url'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">交通手段</strong>
                            <p class="col s12 m8 wb">{!! nl2br(e($input['funeral_ceremony_access'] )) !!}</p>
                        </div>
                        <div class="divider"></div>
                    @endif
                @endif
            </div>
        </div>
    </section>

    <!-- 喪主 -->
    <section class="section card grey lighten-5">
        <div class="card-content">
            <span class="card-title">喪主</span>
            <div class="divider"></div>
            <div class="section text-small">
                <div class="row res-block">
                    <strong class="col s12 m4">本人(弔事当事者)喪主</strong>
                    <p class="col s12 m8 wb">{{ $chief_mournerArray[$input['chief_mourner']] }}</p>
                </div>
                <div class="divider"></div>
                @if($input['chief_mourner'] == 1)
                    <div class="row res-block">
                        <strong class="col s12 m4">喪主の氏名</strong>
                        <p class="col s12 m8 wb">{{ $input['chief_mourner_name'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">喪主のフリガナ</strong>
                        <p class="col s12 m8 wb">{{ $input['chief_mourner_kana'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">本人(弔事当事者)と喪主の続柄</strong>
                        <p class="col s12 m8 wb">{{ $chiefMournerRelationshipArray[$input['chief_mourner_relationship']] }}</p>
                    </div>
                    <div class="divider"></div>
                @endif
            </div>
        </div>
    </section>

    <!-- その他 -->
    <section class="section card grey lighten-5">
        <div class="card-content">
            <span class="card-title">その他</span>
            <div class="divider"></div>
            <div class="section text-small">
                @if(array_key_exists('condolence',$input))
                    @if($input['condolence'] == 1)
                        <div class="row res-block"><strong class="col s12 wb">弔問を辞退します</strong></div>
                        <div class="divider"></div>
                    @endif
                @endif
                @if(array_key_exists('floral_tribute',$input))
                    @if($input['floral_tribute'] == 1)
                        <div class="row res-block"><strong class="col s12 wb">供花を辞退します</strong></div>
                        <div class="divider"></div>
                    @endif
                @endif
                @if(array_key_exists('telegram',$input))
                    @if($input['telegram'] == 1)
                        <div class="row res-block"><strong class="col s12 wb">弔電を辞退します</strong></div>
                        <div class="divider"></div>
                    @endif
                @endif
                @if(array_key_exists('fax_posting',$input))
                    <div class="row res-block"><strong class="col s12 wb">{{ $fax_postingArray[$input['fax_posting']] }}</strong></div>
                    <div class="divider"></div>
                @endif
                @if($input['remarks'])
                    <div class="row res-block">
                        <strong class="col s12 m4">備考</strong>
                        <p class="col s12 m8 wb">{!! nl2br(e($input['remarks'] )) !!}</p>
                    </div>
                    <div class="divider"></div>
                @endif

            </div>
        </div>
    </section>


    <section class="section center-align">
        <div class="">
            <a class="waves-effect waves-light btn btn-large white grey-text text-darken-2" onclick="history.back()">戻る<i class="material-icons left">chevron_left</i></a>
            <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2" role="button">登録<i class="material-icons right">chevron_right</i></button>
        </div>
    </section>
</form>
@endsection
