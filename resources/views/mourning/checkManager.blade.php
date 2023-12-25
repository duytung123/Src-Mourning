@extends('layoutManager')
@section('title', '総務・支部役員・所属長用 確認画面 | 丸井グループ 弔事連絡表')
@section('content')

    <!-- 受付状況 -->
    <section class="section card grey lighten-5">
        <div class="card-content">
            <p class="card-title">受付状況</p>
            <div class="divider"></div>
            <div class=" text-small">
                <div class="row res-block">
                    <strong class="col s12 m4">ステイタス</strong>
                    <p class="col s12 m8 wb">
                        {{ $statusArray[$session['status']] }}
                    </p>
                </div>
                <div class="divider"></div>

                <div class="row res-block">
                    <strong class="col s12 m4">総務受付日時</strong>
                    <p class="col s12 m8 wb">
                        @if($session['reception_datetime'])
                            {{ $reception_datetime }}
                        @else
                            未受付
                        @endif
                    </p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">総務連絡先（トール）</strong>
                    <p class="col s12 m8 wb">
                        @if($session['general_affairs_name'])
                            <ruby>{{ $session['general_affairs_name'] }}
                                <rp>(</rp>
                                <rt>{{ $session['general_affairs_kana'] }}</rt>
                                <rp>)</rp>
                            </ruby><br>
                            {{ $session['general_affairs_contact_info'] }}
                        @else
                            未受付
                        @endif
                    </p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">総務担当</strong>
                    <p class="col s12 m8 wb">
                        {{ $confirmArray[$session['general_affairs_confirmation']] }}
                    </p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">支部委員長/分会長</strong>
                    <p class="col s12 m8 wb">
                        {{ $confirmArray[$session['branch_chief_confirmation']] }}
                    </p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">所属長</strong>
                    <p class="col s12 m8 wb">
                        {{ $confirmArray[$session['supervisor_confirmation']] }}
                    </p>
                </div>
                <div class="divider"></div>
            </div>

        </div>
    </section>

    <!-- 基本情報 -->
    <section class="section card grey lighten-5">
        <div class="card-content">
            <span class="card-title">基本情報</span>
            <div class="divider"></div>
            <div class="section text-small">
                <div class="row res-block">
                    <strong class="col s12 m4">入力者</strong>
                    <p class="col s12 m8 wb">{{ $entrantArray[$session['entrant']] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">弔事当事者の社員番号</strong>
                    <p class="col s12 m8 wb">{{ $session['related_employee_no'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">氏名</strong>
                    <p class="col s12 m8 wb">{{ $session['related_name'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">フリガナ</strong>
                    <p class="col s12 m8 wb">{{ $session['related_kana'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">社員区分</strong>
                    <p class="col s12 m8 wb">{{ $classificationsArray[$session['classification']] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">就業会社</strong>
                    <p class="col s12 m8 wb">{{ $companiesArray[$session['company']] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">所属①</strong>
                    <p class="col s12 m8 wb">{{ $session['member1'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">所属②</strong>
                    <p class="col s12 m8 wb">{{ $session['member2'] }}</p>
                </div>
                <div class="divider"></div>

                @if((int)$session['entrant'] == 1)
                    <div class="grey lighten-3">
                        <div class="row res-block">
                            <strong class="col s12 m4">代理者の社員番号</strong>
                            <p class="col s12 m8 wb">{{ $session['entrant_employee_no'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">氏名</strong>
                            <p class="col s12 m8 wb">{{ $session['entrant_name'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">フリガナ</strong>
                            <p class="col s12 m8 wb">{{ $session['entrant_kana'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">社員区分</strong>
                            <p class="col s12 m8 wb">{{ $classificationsArray[$session['entrant_classification']] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">就業会社</strong>
                            <p class="col s12 m8 wb">{{ $companiesArray[$session['entrant_company']] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">所属①</strong>
                            <p class="col s12 m8 wb">{{ $session['entrant_member1'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">所属②</strong>
                            <p class="col s12 m8 wb">{{ $session['entrant_member2'] }}</p>
                        </div>
                    </div>
                    <div class="divider"></div>
                @endif

                <div class="row res-block">
                    <strong class="col s12 m4">故人様氏名</strong>
                    <p class="col s12 m8 wb">{{ $session['passed_away_name'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">故人様フリガナ</strong>
                    <p class="col s12 m8 wb">{{ $session['passed_away_kana'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">逝去日時</strong>
                    <p class="col s12 m8 wb">{{ $passedAwayDate }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">本人(弔事当事者)との続柄</strong>
                    <p class="col s12 m8 wb">{{ $passedAwayRelationshipArray[$session['passed_away_relationship']] }}</p>
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
                    <strong class="col s12">@if((int)$session['inlaws'] == 0)
                            社内親族なし
                        @else
                            社内親族あり
                        @endif</strong>
                </div>
                <div class="divider"></div>
                @if((int)$session['inlaws'] == 1)
                    <div class="row res-block">
                        <strong class="col s12 m4">社内親族の社員番号</strong>
                        <p class="col s12 m8 wb">{{ $session['inlaws_employee_no'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">氏名</strong>
                        <p class="col s12 m8 wb">{{ $session['inlaws_name'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">フリガナ</strong>
                        <p class="col s12 m8 wb">{{ $session['inlaws_kana'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">就業会社</strong>
                        <p class="col s12 m8 wb">{{ $companiesArray[$session['inlaws_company']] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">所属①</strong>
                        <p class="col s12 m8 wb">{{ $session['inlaws_member1'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">所属②</strong>
                        <p class="col s12 m8 wb">{{ $session['inlaws_member2'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">供花/弔電の手配</strong>
                        <p class="col s12 m8 wb">
                            @if((int)$session['inlaws_condolence'] == 0)
                                {{ $inlaws_condolenceArray[$session['inlaws_condolence']] }}
                            @elseif($session['inlaws_condolence'] == 1)
                                {{ $inlaws_condolenceArray[$session['inlaws_condolence']] }}<br>
                                <span class="bg1 text-small">親族が所属する事業所の総務担当へ確認連絡をお願いします。</span>
                            @endif
                        </p>
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
                    <strong class="col s12 wb">{{ $wakeArray[$session['wake']] }}</strong>
                </div>
                <div class="divider"></div>
                @if((int)$session['wake'] == 0)
                    <div class="row res-block">
                        <strong class="col s12 m4">通夜の日付</strong>
                        <p class="col s12 m8 wb">{{ $wakeDate }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">通夜の時間</strong>
                        <p class="col s12 m8 wb">{{ $session['wake_time_start'] .'〜'. $session['wake_time_end'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">通夜の式場名</strong>
                        <p class="col s12 m8 wb">{{ $session['wake_ceremony'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">郵便番号</strong>
                        <p class="col s12 m8 wb">{{ $session['wake_ceremony_zip'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">住所</strong>
                        <p class="col s12 m8 wb">{{ $session['wake_ceremony_addr1'].$session['wake_ceremony_addr2'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">電話番号</strong>
                        <p class="col s12 m8 wb">{{ $session['wake_ceremony_tel'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">URL</strong>
                        <p class="col s12 m8 wb">{{ $session['wake_ceremony_url'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">交通手段</strong>
                        <p class="col s12 m8 wb">{!! nl2br(e($session['wake_ceremony_access'] )) !!}</p>
                    </div>
                    <div class="divider"></div>

                    @if(array_key_exists('condolence',$session))
                        @if((int)$session['condolence'] == 1)
                            <div class="card section teal lighten-4">
                                <div class="inner-block center-align teal-text text-darken-4">
                                    弔問を辞退しています
                                </div>
                            </div>
                            <div class="refusal">
                                <div class="row res-block">
                                    <strong for="wake_attendees1" class="bg1">参列予定者①</strong>
                                    <p class="col s12 m8 wb">{{ $session[''] }}</p>
                                    <input id="wake_attendees1" name="wake_attendees1" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['wake_attendees1']){{$session['wake_attendees1']}}@endif" form="general_affairs">
                                </div>
                                <div class="input-field row res-block">
                                    <input id="wake_attendees2" name="wake_attendees2" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['wake_attendees2']){{$session['wake_attendees2']}}@endif" form="general_affairs">
                                    <label for="wake_attendees2" class="bg1">参列予定者②</label>
                                </div>
                                <div class="input-field row res-block">
                                    <input id="wake_attendees3" name="wake_attendees3" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['wake_attendees3']){{$session['wake_attendees3']}}@endif" form="general_affairs">
                                    <label for="wake_attendees3" class="bg1">参列予定者③</label>
                                </div>
                            </div>
                        @else
                            <div>
                                <div class="input-field row res-block">
                                    <input id="wake_attendees1" name="wake_attendees1" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['wake_attendees1']){{$session['wake_attendees1']}}@endif" form="general_affairs">
                                    <label for="wake_attendees1" class="bg1">参列予定者①</label>
                                </div>
                                <div class="input-field row res-block">
                                    <input id="wake_attendees2" name="wake_attendees2" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['wake_attendees2']){{$session['wake_attendees2']}}@endif" form="general_affairs">
                                    <label for="wake_attendees2" class="bg1">参列予定者②</label>
                                </div>
                                <div class="input-field row res-block">
                                    <input id="wake_attendees3" name="wake_attendees3" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['wake_attendees3']){{$session['wake_attendees3']}}@endif" form="general_affairs">
                                    <label for="wake_attendees3" class="bg1">参列予定者③</label>
                                </div>
                            </div>
                        @endif
                    @endif
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
                    <strong class="col s12 wb">{{ $funeralArray[$session['funeral']] }}</strong>
                </div>
                <div class="divider"></div>
                @if((int)$session['funeral'] == 0)
                    <div class="row res-block">
                        <strong class="col s12 m4">告別式の日付</strong>
                        <p class="col s12 m8 wb">{{ $funeralDate }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">告別式の時間</strong>
                        <p class="col s12 m8 wb">{{ $session['funeral_time_start'] .'〜'. $session['funeral_time_end']}}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">通夜と同じ式場</strong>
                        <p class="col s12 m8 wb">{{ $funeral_same_ceremonyArray[$session['funeral_same_ceremony']] }}</p>
                    </div>
                    <div class="divider"></div>
                    @if((int)$session['funeral_same_ceremony'] == 1)

                        <div class="row res-block">
                            <strong class="col s12 m4">告別式の式場名</strong>
                            <p class="col s12 m8 wb">{{ $session['funeral_ceremony'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">郵便番号</strong>
                            <p class="col s12 m8 wb">{{ $session['funeral_ceremony_zip'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">住所</strong>
                            <p class="col s12 m8 wb">{{ $session['funeral_ceremony_addr1'].$session['funeral_ceremony_addr2'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">電話番号</strong>
                            <p class="col s12 m8 wb">{{ $session['funeral_ceremony_tel'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">URL</strong>
                            <p class="col s12 m8 wb">{{ $session['funeral_ceremony_url'] }}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="row res-block">
                            <strong class="col s12 m4">交通手段</strong>
                            <p class="col s12 m8 wb">{!! nl2br(e($session['funeral_ceremony_access'] )) !!}</p>
                        </div>
                        <div class="divider"></div>

                    @endif
                    @if(array_key_exists('condolence',$session))
                        @if((int)$session['condolence'] == 1)
                            <div class="card section teal lighten-4">
                                <div class="inner-block center-align teal-text text-darken-4">
                                    弔問を辞退しています
                                </div>
                            </div>
                            <div class="refusal">
                                <div class="input-field row res-block">
                                    <input id="funeral_attendees1" name="funeral_attendees1" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['funeral_attendees1']){{$session['funeral_attendees1']}}@endif" form="general_affairs">
                                    <label for="funeral_attendees1" class="bg1">参列予定者①</label>
                                </div>
                                <div class="input-field row res-block">
                                    <input id="funeral_attendees2" name="funeral_attendees2" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['funeral_attendees2']){{$session['funeral_attendees2']}}@endif" form="general_affairs">
                                    <label for="funeral_attendees2" class="bg1">参列予定者②</label>
                                </div>
                                <div class="input-field row res-block">
                                    <input id="funeral_attendees3" name="funeral_attendees3" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['funeral_attendees3']){{$session['funeral_attendees3']}}@endif" form="general_affairs">
                                    <label for="funeral_attendees3" class="bg1">参列予定者③</label>
                                </div>
                            </div>
                        @else
                            <div>
                                <div class="input-field row res-block">
                                    <input id="funeral_attendees1" name="funeral_attendees1" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['funeral_attendees1']){{$session['funeral_attendees1']}}@endif" form="general_affairs">
                                    <label for="funeral_attendees1" class="bg1">参列予定者①</label>
                                </div>
                                <div class="input-field row res-block">
                                    <input id="funeral_attendees2" name="funeral_attendees2" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['funeral_attendees2']){{$session['funeral_attendees2']}}@endif" form="general_affairs">
                                    <label for="funeral_attendees2" class="bg1">参列予定者②</label>
                                </div>
                                <div class="input-field row res-block">
                                    <input id="funeral_attendees3" name="funeral_attendees3" type="text" class="validate" placeholder="総務担当が入力" value="@if($session['funeral_attendees3']){{$session['funeral_attendees3']}}@endif" form="general_affairs">
                                    <label for="funeral_attendees3" class="bg1">参列予定者③</label>
                                </div>
                            </div>
                        @endif
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
                    <strong class="col s12 wb">{{ $chief_mournerArray[$session['chief_mourner']] }}</strong>
                </div>
                <div class="divider"></div>
                @if((int)$session['chief_mourner'] == 1)
                    <div class="row res-block">
                        <strong class="col s12 m4">喪主の氏名</strong>
                        <p class="col s12 m8 wb">{{ $session['chief_mourner_name'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">喪主のフリガナ</strong>
                        <p class="col s12 m8 wb">{{ $session['chief_mourner_kana'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">本人(弔事当事者)と喪主の続柄</strong>
                        <p class="col s12 m8 wb">{{ $chiefMournerRelationshipArray[$session['chief_mourner_relationship']] }}</p>
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
                @if(array_key_exists('condolence',$session))
                    @if((int)$session['condolence'] == 1)
                        <div class="row res-block"><strong class="col s12 wb">弔問を辞退します</strong></div>
                        <div class="divider"></div>
                    @endif
                @endif
                @if(array_key_exists('floral_tribute',$session))
                    @if((int)$session['floral_tribute'] == 1)
                        <div class="row res-block"><strong class="col s12 wb">供花を辞退します</strong></div>
                        <div class="divider"></div>
                    @endif
                @endif
                @if(array_key_exists('telegram',$session))
                    @if((int)$session['telegram'] == 1)
                        <div class="row res-block"><strong class="col s12 wb">弔電を辞退します</strong></div>
                        <div class="divider"></div>
                    @endif
                @endif
                @if(array_key_exists('fax_posting',$session))
                    <div class="row res-block">
                        <strong class="col s12 wb">{{ $fax_postingArray[$session['fax_posting']] }}</strong></div>
                    <div class="divider"></div>
                @endif
                @if((int)$session['remarks'])
                    <div class="row res-block">
                        <strong class="col s12 m4">備考</strong>
                        <p class="col s12 m8 wb">{!! nl2br(e($session['remarks'] )) !!}</p>
                    </div>
                    <div class="divider"></div>
                @endif

            </div>
        </div>
    </section>

    <!-- 直属の上司 -->
    <section class="section card grey lighten-5">
        <div class="card-content">
            <span class="card-title">直属の上司の確認</span>
            <div class="divider"></div>
            <div class="section text-small">
                <div class="row res-block">
                    <strong class="col s12 m4">確認</strong>
                    <p class="col s12 m8 wb">{{ $statusArray[$session['status']] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">直属の上司の社員番号</strong>
                    <p class="col s12 m8 wb">{{ $session['superior_employee_no'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">氏名</strong>
                    <p class="col s12 m8 wb">{{ $session['superior_name'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">フリガナ</strong>
                    <p class="col s12 m8 wb">{{ $session['superior_kana'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">就業会社</strong>
                    <p class="col s12 m8 wb">{{ $companiesArray[$session['superior_company']] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">所属①</strong>
                    <p class="col s12 m8 wb">{{ $session['superior_member1'] }}</p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">所属②</strong>
                    <p class="col s12 m8 wb">{{ $session['superior_member2'] }}</p>
                </div>
                <div class="divider"></div>
            </div>
        </div>
    </section>

    <!-- 弔電・供花・弔慰金 -->
    <section class="section card grey lighten-5 mt100" id="anc1">
        <div class="card-content">
            <span class="card-title">弔電・供花・弔慰金</span>
            <div class="divider"></div>
            <div class="section text-small grey lighten-2">
                <div class="inner-block">
                    <div><strong class="text-large">福祉会規定</strong></div>
                    <div class="section grey lighten-5">
                        <div class="row">
                            <label for="social_name1" class="col s12 m2 text-small sender bg1">差出人１</label>
                            <input type="text" name="social_name1" id="social_name1" form="general_affairs" class="col s12 m10 text-small" value="{{$session['social_name1']}}" placeholder="差出人名">
                        </div>
                        <div class="row">
                            <strong class="col s4">弔電</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['social_telegram1_flg'] == 1)
                                    <i class="material-icons">remove</i>
                                @else
                                    {{$session['social_telegram1']}} 通
                                @endif</strong>
                            <input type="hidden" value="{{$session['social_telegram1']}}" name="social_telegram1" form="general_affairs">
                            <div class="divider col s10 push-s1"></div>
                            <strong class="col s4">供花</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['social_floral_tribute1_flg'] == 1)
                                    <i class="material-icons">remove</i>
                                @else
                                    {{$session['social_floral_tribute1']}} 本
                                @endif</strong>
                            <input type="hidden" value="{{$session['social_floral_tribute1']}}" name="social_floral_tribute1" form="general_affairs">
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <label for="social_name2" class="col s12 m2 text-small sender bg1">差出人２</label>
                            <input type="text" name="social_name2" id="social_name2" form="general_affairs" class="col s12 m10 text-small" value="{{$session['social_name2']}}" placeholder="差出人名">
                        </div>
                        <div class="row ">
                            <strong class="col s4">弔電</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['social_telegram2_flg'] == 1)
                                    <i class="material-icons">remove</i>
                                @else
                                    {{$session['social_telegram2']}} 通
                                @endif</strong>
                            <input type="hidden" value="1" name="social_telegram2" form="general_affairs">
                            <div class="divider col s10 push-s1"></div>
                            <strong class="col s4">供花</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['social_floral_tribute2_flg'] == 1)
                                    <i class="material-icons">remove</i>
                                @else
                                    {{$session['social_floral_tribute2']}} 本
                                @endif</strong>
                            <input type="hidden" value="1" name="social_floral_tribute2" form="general_affairs">
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <label for="social_name3" class="col s12 m2 text-small sender bg1">差出人３</label>
                            <input type="text" name="social_name3" id="social_name3" form="general_affairs" class="col s12 m10 text-small" value="{{$session['social_name3']}}" placeholder="差出人名">
                        </div>

                        <div class="row ">
                            <strong class="col s4">弔慰金</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['social_condolence_money3_flg'] == 1)
                                    <i class="material-icons">remove</i>
                                @else
                                    {{$session['social_condolence_money3']}} 万円
                                @endif</strong>
                            <input type="hidden" value="{{$session['social_condolence_money3']}}" name="social_condolence_money3" form="general_affairs">
                        </div>
                    </div>
                </div>
            </div>
            <div class="section text-small grey lighten-2">
                <div class="inner-block">

                    <div><strong class="text-large">会社規定</strong></div>
                    @if((int)$session['company'] == 8)
                        <div class="section grey lighten-5">
                            <div class="row">
                                <label for="company_name1" class="col s12 m2 text-small sender bg1">差出人１</label>
                                <input type="text" name="company_name1" id="company_name1" form="general_affairs" class="col s12 m10 text-small" placeholder="差出人名" value="{{ $session['company_name1'] }}">

                            </div>
                            <div class="row ">
                                <label class="col">
                                    <input type="radio" name="company_attend1" class="js-attend" value="1" data-val="1" data-tgt="1" required @if((int)$session['company_attend1'] != 2) checked @endif form="general_affairs">
                                    <span>参列しない</span>
                                </label>
                                <label class="col">
                                    <input type="radio" name="company_attend1" class="js-attend" value="2" data-val="0" data-tgt="1" form="general_affairs" @if((int)$session['company_attend1'] == 2) checked @endif>
                                    <span>参列する</span>
                                </label>
                                <div class="divider col s10 push-s1"></div>
                            </div>

                            <div class="row">
                                <label for="company_telegram1" class="col s4"><strong>弔電<sup><i class="tiny material-icons">lens</i></sup></strong></label>
                                <input class="col s1 zen2half" type="text" name="company_telegram1" id="company_telegram1" form="general_affairs" placeholder="0" required maxlength="2" pattern="[0-9]" value="{{ $session['company_telegram1'] }}">
                                <strong class="col s7 wb deep-purple-text">通</strong>
                                <div class="divider col s10 push-s1"></div>
                            </div>
                            <div class="row">
                                <label for="company_floral_tribute1" class="col s4"><strong>供花<sup><i class="tiny material-icons">lens</i></sup></strong></label>
                                <input class="col s1 zen2half" type="text" name="company_floral_tribute1" id="company_floral_tribute1" form="general_affairs" placeholder="0" required maxlength="2" pattern="[0-9]" value="{{ $session['company_floral_tribute1'] }}">
                                <strong class="col s7 wb deep-purple-text">本</strong>
                                <div class="divider col s10 push-s1"></div>
                            </div>
                            <div class="row">
                                <label for="company_condolence_money1" class="col s4"><strong>弔慰金<sup><i class="tiny material-icons">lens</i></sup></strong></label>
                                <input class="col s1 zen2half" type="text" name="company_condolence_money1" id="company_condolence_money1" form="general_affairs" placeholder="0" required maxlength="2" pattern="[0-9]" value="{{ $session['company_condolence_money1'] }}">
                                <strong class="col s7 wb deep-purple-text">万円</strong>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <label for="company_name2" class="col s12 m2 text-small sender bg1">差出人２</label>
                                <input type="text" name="company_name2" id="company_name2" form="general_affairs" class="col s12 m10 text-small" placeholder="差出人名" value="{{ $session['company_name2'] }}">
                            </div>
                            <div class="row ">
                                <label class="col">
                                    <input type="radio" name="company_attend2" class="js-attend" value="1" data-val="1" data-tgt="2" required @if((int)$session['company_attend1'] != 2) checked @endif form="general_affairs">
                                    <span>参列しない</span>
                                </label>
                                <label class="col">
                                    <input type="radio" name="company_attend2" class="js-attend" value="2" data-val="0" data-tgt="2" @if((int)$session['company_attend1'] == 2) checked @endif form="general_affairs">
                                    <span>参列する</span>
                                </label>
                                <div class="divider col s10 push-s1"></div>
                            </div>
                            <div class="row">
                                <label class="col s4" for="company_telegram2"><strong>弔電</strong><sup><i class="tiny material-icons">lens</i></sup></label>
                                <input class="col s1 zen2half" type="text" name="company_telegram2" id="company_telegram2" form="general_affairs" placeholder="0" required maxlength="2" pattern="[0-9]" value="{{ $session['company_telegram2'] }}">
                                <strong class="col s7 wb deep-purple-text">通</strong>
                                <div class="divider col s10 push-s1"></div>
                            </div>
                            <div class="row">
                                <label class="col s4" for="company_condolence_money2"><strong>弔慰金</strong><sup><i class="tiny material-icons">lens</i></sup></label>
                                <input class="col s1 zen2half" type="text" name="company_condolence_money2" id="company_condolence_money2" form="general_affairs" placeholder="0" required maxlength="2" pattern="[0-9]" value="{{ $session['company_condolence_money2'] }}">
                                <strong class="col s7 wb deep-purple-text">万円</strong>
                            </div>
                        </div>
                    @elseif((int)$session['company'] != 8 && (int)$session['company'] != 10)
                        <div class="section grey lighten-5">
                            <div class="row">
                                <label for="company_name1" class="col s12 m2 text-small sender bg1">差出人１</label>
                                <input type="text" name="company_name1" id="company_name1" form="general_affairs" class="col s12 m10 text-small" value="{{$session['company_name1']}}" placeholder="差出人名">

                            </div>
                            <div class="row" data-company-attend1="{{$session['company_attend1']}}">
                                <label class="col">
                                    <input type="radio" name="company_attend1" class="js-attend" value="1" data-val="1" data-tgt="1" required form="general_affairs" @if((int)$session['company_attend1'] == 1) checked @endif>
                                    <span>参列しない</span>
                                </label>
                                <label class="col">
                                    <input type="radio" name="company_attend1" class="js-attend" value="2" data-val="0" data-tgt="1" form="general_affairs" @if((int)$session['company_attend1'] == 2) checked @endif>
                                    <span>参列する</span>
                                </label>
                            </div>
                            <div class="divider col s10 push-s1"></div>
                            {{--                                <p>company_attend1 {{ (int)$session['company_attend1'] }}</p>--}}
                            {{--                                <p>company_attend2 {{ (int)$session['company_attend2'] }}</p>--}}
                            {{--                                <p>condolence {{ (int)$session['condolence'] }}</p>--}}
                            {{--                                <p>telegram {{ (int)$session['telegram'] }}</p>--}}
                            {{--                                <p>company_telegram1 {{ (int)$session['company_telegram1'] }}</p>--}}
                            {{--                                <p>company_telegram2 {{ (int)$session['company_telegram2'] }}</p>--}}
                            {{--                                <p>company_telegram1_flg {{ (int)$session['company_telegram1_flg'] }}</p>--}}
                            {{--                                <p>company_telegram2_flg {{ (int)$session['company_telegram2_flg'] }}</p>--}}
                            <div class="row">
                                <strong class="col s4">弔電</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['company_telegram1_flg'] == 1)
                                        <i class="material-icons">remove</i>
                                    @else
                                        <span id="js_company_attend1">{{$session['company_telegram1']}}</span> 通
                                    @endif</strong>
                                <input type="hidden" value="{{$session['company_telegram1']}}" name="company_telegram1" id="company_telegram1" form="general_affairs">
                                <div class="divider col s10 push-s1"></div>
                                <strong class="col s4">供花</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['company_floral_tribute1_flg'] == 1)
                                        <i class="material-icons">remove</i>
                                    @else
                                        {{$session['company_floral_tribute1']}} 本
                                    @endif</strong>
                                <input type="hidden" value="{{$session['company_floral_tribute1']}}" name="company_floral_tribute1" form="general_affairs">
                                <div class="divider col s10 push-s1"></div>
                                <strong class="col s4">弔慰金@if((int)$session['company'] == 1)
                                        <br>差出人（G代表）
                                    @endif</strong>
                                <strong class="col s78 wb deep-purple-text">@if((int)$session['company_condolence_money1_flg'] == 1)
                                        <i class="material-icons">remove</i>
                                    @else
                                        {{$session['company_condolence_money1']}} 万円
                                    @endif</strong>
                                <input type="hidden" value="{{$session['company_condolence_money1']}}" name="company_condolence_money1" form="general_affairs">
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <label for="company_name2" class="col s12 m2 text-small sender bg1">差出人２</label>
                                <input type="text" name="company_name2" id="company_name2" form="general_affairs" class="col s12 m10 text-small" value="{{$session['company_name2']}}" placeholder="差出人名">
                            </div>
                            <div class="row ">
                                <label class="col">
                                    <input type="radio" name="company_attend2" class="js-attend" value="1" data-val="1" data-tgt="2" required form="general_affairs" @if((int)$session['company_attend2'] == 1) checked @endif>
                                    <span>参列しない</span>
                                </label>
                                <label class="col">
                                    <input type="radio" name="company_attend2" class="js-attend" value="2" data-val="0" data-tgt="2" form="general_affairs" @if((int)$session['company_attend2'] == 2) checked @endif>
                                    <span>参列する</span>
                                </label>
                            </div>
                            <div class="divider col s10 push-s1"></div>
                            <div class="row">
                                <strong class="col s4">弔電</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['company_telegram2_flg'] == 1)
                                        <i class="material-icons">remove</i>
                                    @else
                                        <span id="js_company_attend2">{{$session['company_telegram2']}}</span> 通
                                    @endif</strong>
                                <input type="hidden" value="{{$session['company_telegram2']}}" name="company_telegram2" id="company_telegram2" form="general_affairs">
                                <div class="divider col s10 push-s1"></div>
                                <strong class="col s4">弔慰金</strong><strong class="col s78 wb deep-purple-text">@if((int)$session['company_condolence_money2_flg'] == 1)
                                        <i class="material-icons">remove</i>
                                    @else
                                        {{$session['company_condolence_money2']}} 万円
                                    @endif</strong>
                                <input type="hidden" value="{{$session['company_condolence_money2']}}" name="company_condolence_money2" form="general_affairs">
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>

    <!-- 総務担当、支部委員長、所属長 -->
    <div class="row mt50"><i class="material-icons">lens</i> <strong>必須項目</strong></div>
    <ul class="collapsible collapsible-custom" id="js-manager-content">
        <li class="section active">
            <div class="collapsible-header bg1-2"><span>総務担当</span>
                @if((int)$session['general_affairs_confirmation'] == 1)<span>【確認済み】</span>@else<span class="toggle"></span>@endif</div>
            <div class="collapsible-body grey lighten-5 bd1">
                <form action="{{ route('general_affairs.post') }}" id="general_affairs" name="general_affairs" method="post">
                    @csrf
                    <input type="radio" name="previous" @if (old('previous')) checked @endif style="display: none">
                    <input type="hidden" name="id" value="{{ $session['id'] }}">
                    <input type="hidden" name="related_employee_no" value="{{ $session['related_employee_no'] }}">
                    <input type="hidden" name="password" value="{{ $session['password'] }}">
                    <input type="hidden" name="supervisor_confirmation" value="{{ $session['supervisor_confirmation'] }}">
                    <input type="hidden" name="branch_chief_confirmation" value="{{ $session['branch_chief_confirmation'] }}">
                    <input type="hidden" name="social_telegram1_flg" value="{{ $session['social_telegram1_flg'] }}">
                    <input type="hidden" name="social_telegram2_flg" value="{{ $session['social_telegram2_flg'] }}">
                    <input type="hidden" name="social_floral_tribute1_flg" value="{{ $session['social_floral_tribute1_flg'] }}">
                    <input type="hidden" name="social_floral_tribute2_flg" value="{{ $session['social_floral_tribute2_flg'] }}">
                    <input type="hidden" name="social_condolence_money3_flg" value="{{ $session['social_condolence_money3_flg'] }}">
                    <input type="hidden" name="company_telegram1_flg" value="{{ $session['company_telegram1_flg'] }}">
                    <input type="hidden" name="company_telegram2_flg" value="{{ $session['company_telegram2_flg'] }}">
                    <input type="hidden" name="company_floral_tribute1_flg" value="{{ $session['company_floral_tribute1_flg'] }}">
                    <input type="hidden" name="company_floral_tribute2_flg" value="{{ $session['company_floral_tribute2_flg'] }}">
                    <input type="hidden" name="company_condolence_money1_flg" value="{{ $session['company_condolence_money1_flg'] }}">
                    <input type="hidden" name="company_condolence_money2_flg" value="{{ $session['company_condolence_money2_flg'] }}">
                    <input type="hidden" name="company" value="{{ $session['company'] }}">
                    <input type="hidden" name="status" value="3">

                    <div class="row">
                        <div class="col s12 m6">
                            <label>
                                <input type="checkbox" class="filled-in" name="reception" value="1" id="reception" required @if($session['reception']) checked @endif @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                <span class="col">受付<sup><i class="tiny material-icons">lens</i></sup></span>
                            </label>
                        </div>
                        <div class="col s12 m6">
                            <label for="reception_datetime">受付日時</label>
                            <input id="reception_datetime" name="reception_datetime" type="datetime-local" class="validate" required disabled value="{{ $session['reception_datetime'] }}">
                        </div>
                        <div class="col s12">
                            <label>
                                <input type="checkbox" class="filled-in" name="general_affairs_confirmation" value="1" required required @if($session['general_affairs_confirmation']) checked @endif @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                <span class="col">確認<sup><i class="tiny material-icons">lens</i></sup></span>
                            </label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="general_affairs_employee_no" name="general_affairs_employee_no" type="text" class="validate zen2half" pattern="[0-9]+" required value="{{ $session['general_affairs_employee_no'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                            <label for="general_affairs_employee_no">社員番号<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="general_affairs_name" name="general_affairs_name" type="text" class="validate" required value="{{ $session['general_affairs_name'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                            <label for="general_affairs_name">氏名<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="general_affairs_kana" name="general_affairs_kana" type="text" class="validate hira2kana" pattern="[ 　\u30A0-\u30FF]+" required value="{{ $session['general_affairs_kana'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                            <label for="general_affairs_kana">フリガナ<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field2 col s12 m6">
                            <label for="general_affairs_company">就業会社<sup><i class="tiny material-icons">lens</i></sup></label>
                            <select name="general_affairs_company" id="general_affairs_company" class="required browser-default text-xSmall" required @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                @include('mourning.generalAffairsCompanies')
                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="general_affairs_member1" name="general_affairs_member1" type="text" class="validate" placeholder="店/部/事業所を自由入力" required value="{{ $session['general_affairs_member1'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                            <label for="general_affairs_member1">所属①</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="general_affairs_member2" name="general_affairs_member2" type="text" class="validate" placeholder="ｼｮｯﾌﾟ/課/室/担当を自由入力" required value="{{ $session['general_affairs_member2'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                            <label for="general_affairs_member2">所属②</label>
                        </div>
                    </div>
                    <div class="row text-small">
                        <div class="col s12">
                            <label for="general_affairs_contact_info">連絡先（トール）<sup><i class="tiny material-icons">lens</i></sup></label>
                            <textarea class="text-small grey lighten-5" name="general_affairs_contact_info" id="general_affairs_contact_info" rows="5" required @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>{{ $session['general_affairs_contact_info'] }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2 w-full" role="button" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                登録<i class="material-icons right">chevron_right</i></button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="section" id="anc3">
            <div class="collapsible-header bg2-2"><span>支部委員長</span>
                @if((int)$session['branch_chief_confirmation'] == 1)<span>【確認済み】</span>@else<span class="toggle"></span>@endif</div>
            <div class="collapsible-body grey lighten-5 bd2">
                <form action="{{ route('branch_chief.post') }}" id="branch_chief" method="post">
                    @csrf
                    <input type="radio" name="previous" @if (old('previous')) checked @endif style="display: none">
                    <input type="hidden" name="id" value="{{ $session['id'] }}">
                    <input type="hidden" name="related_employee_no" value="{{ $session['related_employee_no'] }}">
                    <input type="hidden" name="password" value="{{ $session['password'] }}">
                    <input type="hidden" name="general_affairs_confirmation" value="{{ $session['general_affairs_confirmation'] }}">
                    <input type="hidden" name="supervisor_confirmation" value="{{ $session['supervisor_confirmation'] }}">

                    <input type="hidden" name="status" value="3">

                    <div class="row">
                        <div class="col s12">
                            <label>
                                <input type="checkbox" class="filled-in" name="branch_chief_confirmation" value="1" @if((int)$session['branch_chief_confirmation'] == 1) checked @endif @if((int)$session['branch_chief_confirmation'] == 1) disabled @endif>
                                <span class="col s4">確認</span>
                            </label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="branch_chief_employee_no" name="branch_chief_employee_no" type="text" class="validate zen2half" pattern="[0-9]+" value="{{ $session['branch_chief_employee_no'] }}" @if((int)$session['branch_chief_confirmation'] == 1) disabled @endif>
                            <label for="branch_chief_employee_no">社員番号</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="branch_chief_name" name="branch_chief_name" type="text" class="validate" value="{{ $session['branch_chief_name'] }}" @if((int)$session['branch_chief_confirmation'] == 1) disabled @endif>
                            <label for="branch_chief_name">氏名</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="branch_chief_kana" name="branch_chief_kana" type="text" class="validate hira2kana" pattern="[ 　\u30A0-\u30FF]+" value="{{ $session['branch_chief_kana'] }}" @if((int)$session['branch_chief_confirmation'] == 1) disabled @endif>
                            <label for="branch_chief_kana">フリガナ</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field2 col s12 m6">
                            <label for="branch_chief_company">就業会社</label>
                            <select name="branch_chief_company" id="branch_chief_company" class="required browser-default text-xSmall" @if((int)$session['branch_chief_confirmation'] == 1) disabled @endif>
                                @include('mourning.branchChiefCompanies')
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="branch_chief_member1" name="branch_chief_member1" type="text" class="validate" placeholder="支部名を自由入力" value="{{ $session['branch_chief_member1'] }}" @if((int)$session['branch_chief_confirmation'] == 1) disabled @endif>
                            <label for="branch_chief_member1">所属</label>
                        </div>
                        {{--                            <div class="input-field col s12 m6">--}}
                        {{--                                <input id="branch_chief_member2" name="branch_chief_member2" type="text" class="validate" placeholder="ｼｮｯﾌﾟ/課/室">--}}
                        {{--                                <label for="branch_chief_member2">所属②</label>--}}
                        {{--                            </div>--}}
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2 w-full" role="button" @if((int)$session['branch_chief_confirmation'] == 1) disabled @endif>
                                登録<i class="material-icons right">chevron_right</i></button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="section" id="anc2">
            <div class="collapsible-header bg3-2"><span>所属長</span>@if((int)$session['supervisor_confirmation'] == 1)<span>【確認済み】</span>@else<span class="toggle"></span>@endif</div>
            <div class="collapsible-body grey lighten-5 bd3">
                <form action="{{ route('supervisor.post') }}" id="supervisor" method="post">
                    @csrf
                    <input type="radio" name="previous" @if (old('previous')) checked @endif style="display: none">
                    <input type="hidden" name="id" value="{{ $session['id'] }}">
                    <input type="hidden" name="related_employee_no" value="{{ $session['related_employee_no'] }}">
                    <input type="hidden" name="password" value="{{ $session['password'] }}">
                    <input type="hidden" name="general_affairs_confirmation" value="{{ $session['general_affairs_confirmation'] }}">
                    <input type="hidden" name="branch_chief_confirmation" value="{{ $session['branch_chief_confirmation'] }}">
                    <input type="hidden" name="status" value="3">

                    <div class="row">
                        <div class="col s12">
                            <label>
                                <input type="checkbox" class="filled-in" name="supervisor_confirmation" value="1" required @if((int)$session['supervisor_confirmation'] == 1) checked @endif @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                <span class="col s4">確認<sup><i class="tiny material-icons">lens</i></sup></span>
                            </label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="supervisor_employee_no" name="supervisor_employee_no" type="text" class="validate zen2half" pattern="[0-9]+" required value="{{ $session['supervisor_employee_no'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                            <label for="supervisor_employee_no">社員番号<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="supervisor_name" name="supervisor_name" type="text" class="validate" required value="{{ $session['supervisor_name'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                            <label for="supervisor_name">氏名<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="supervisor_kana" name="supervisor_kana" type="text" class="validate hira2kana" pattern="[ 　\u30A0-\u30FF]+" required value="{{ $session['supervisor_kana'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                            <label for="supervisor_kana">フリガナ<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field2 col s12 m6">
                            <label for="supervisor_company">就業会社<sup><i class="tiny material-icons">lens</i></sup></label>
                            <select name="supervisor_company" id="supervisor_company" class="required browser-default text-xSmall" required @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                @include('mourning.supervisorCompanies')
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="supervisor_member1" name="supervisor_member1" type="text" class="validate" placeholder="店/部/事業所を自由入力" required value="{{ $session['supervisor_member1'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                            <label for="supervisor_member1">所属<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                        {{--                            <div class="input-field col s12 m6">--}}
                        {{--                                <input id="supervisor_member2" name="supervisor_member2" type="text" class="validate" placeholder="ｼｮｯﾌﾟ/課/室/担当を自由入力" required>--}}
                        {{--                                <label for="supervisor_member2">所属②</label>--}}
                        {{--                            </div>--}}
                    </div>


                    <div class="row">
                        <div class="col s12">
                            <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2 w-full" role="button" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                登録<i class="material-icons right">chevron_right</i></button>
                        </div>
                    </div>
                </form>
            </div>

        </li>

    </ul>

    <!-- 最終確認 -->
    <section class=" card grey lighten-5 mt100 bd1">
        <form action="{{ route('final.post') }}" method="post" id="" name="">
            @csrf
            <input type="radio" name="previous" @if (old('previous')) checked @endif style="display: none">
            <input type="hidden" name="id" value="{{ $session['id'] }}">
            <input type="hidden" name="related_employee_no" value="{{ $session['related_employee_no'] }}">
            <input type="hidden" name="general_affairs_employee_no" value="{{ $session['related_employee_no'] }}">
            <input type="hidden" name="password" value="{{ $session['password'] }}">

            <div class="card-title p-10 bg1-2">状態　総務入力</div>
            <div class="card-content">
                <div class="row">
                    <div class="justify col s12 bg2-2 text-small">
                        所属長、支部委員長/分会長ともに確認しないと完了にはできません。<br>
                        完了するとその後は編集できなくなります。
                    </div>
                </div>
                <div class="section text-small">
                    <div class="row">
                        <strong class="col s5">総務担当</strong>
                        <span class="mt5 s7">@if((int)$session['general_affairs_confirmation'] == 1)
                                確認済み
                            @else
                                未確認
                            @endif</span>
                    </div>
                    <div class="row">
                        <strong class="col s5">支部委員長/分会長</strong>
                        <span class="mt5 s7">@if((int)$session['branch_chief_confirmation'] == 1)
                                確認済み
                            @else
                                未確認
                            @endif</span>
                    </div>
                    <div class="row">
                        <strong class="col s5">所属長</strong>
                        <span class="mt5 s7">@if((int)$session['supervisor_confirmation'] == 1)
                                確認済み
                            @else
                                未確認
                            @endif</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <label>
                            <input type="checkbox" class="filled-in" name="final_confirmation" value="1" required @if((int)$session['status'] < 4) disabled @endif>
                            <span class="text-large mt5">完了</span>
                        </label>
                    </div>

                    <div class="col s12">
                        <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2 w-full" role="button" @if((int)$session['status'] < 4) disabled @endif>
                            登録<i class="material-icons right">chevron_right</i></button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
