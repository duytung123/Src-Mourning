@extends('layoutManager')
@section('title', '総務・支部委員長/分会長・所属長用 編集画面 | 丸井グループ 弔事連絡表')
@section('content')
    <div class="section row text-xsmall">
        <div class="col s12">
            <div class="card-panel teal lighten-5">
            <span class="teal-text text-darken-2">
            弔事連絡の内容を確認の上、ご担当の各入力エリアに確認入力をしてください。<br>

              <strong class="bg1" id="bg1_1">手配担当者(総務/業務担当等) 入力エリア</strong>・<strong class="bg2">所属組合役員入力エリア</strong>・<strong class="bg3">所属長 入力エリア</strong>

              <!-- <br>ごとに確認入力をお願いします。 -->
            </span>
            </div>
        </div>
    </div>

    <!-- 受付状況 -->
    <section class="section card grey lighten-5">
        <div class="card-content">
            <strong class="card-title">登録・確認状況</strong>
            <div class="divider"></div>
            <div class=" text-small">
                <div class="row res-block">
                    <strong style="margin-left: 33.33333%" class="">ステイタス</strong>
                    {{-- <p class="col s12 m8 wb">
                        {{ $statusArray[$session['status']] }}
                    </p> --}}
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">弔事当事者</strong>
                    <p class="col s12 m8 wb">
                        登録済
                    </p>
                </div>
                {{-- <div class="divider"></div>

                <div class="row res-block">
                    <strong class="col s12 m4">総務受付日時</strong>
                    <p class="col s12 m8 wb">
                        @if($session['reception_datetime'])
                            {{ $reception_datetime }}
                        @else
                            <strong class="purple-accent-3">未受付</strong>
                        @endif
                    </p>
                </div>
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">総務連絡先</strong>
                    <p class="col s12 m8 wb">
                        @if($session['general_affairs_name'])
                            <ruby>{{ $session['general_affairs_name'] }}
                                <rp>(</rp>
                                <rt>{{ $session['general_affairs_kana'] }}</rt>
                                <rp>)</rp>
                            </ruby><br>
                            8-{{ $session['general_affairs_contact_toll1'] }}-{{ $session['general_affairs_contact_toll1'] }}（トール）<br>
                            {{ $session['general_affairs_contact_info'] }}（外線）<br>
                            {{ $session['general_affairs_misc'] }}
                        @else
                            <strong class="purple-accent-3">未受付</strong>
                        @endif
                    </p>
                </div> --}}
                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">手配担当者(総務/業務担当等)</strong>
                    <p class="col s12 m8 wb">
                        @if((int)$session['general_affairs_confirmation'] == 1)
                            受付登録済
                        @else
                            <strong class="purple-accent-3">未受付登録</strong>
                        @endif
                    </p>
                </div>
                @if((int)$session['classification'] != 6)
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">所属組合役員</strong>
                        <p class="col s12 m8 wb">
                            @if((int)$session['branch_chief_confirmation'] == 1)
                                確認済み
                            @else
                                <strong class="purple-accent-3">未確認</strong>
                            @endif
                        </p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">所属長</strong>
                        <p class="col s12 m8 wb">
                            @if((int)$session['supervisor_confirmation'] == 1)
                                確認済み
                            @else
                                <strong class="purple-accent-3">未確認</strong>
                            @endif
                        </p>
                    </div>
                @endif

                <div class="divider"></div>
                <div class="row res-block">
                    <strong class="col s12 m4">手配担当者(総務/業務担当等)</strong>
                    <p class="col s12 m8 wb">
                        @if((int)$session['final_confirmation'] == 1 && (int)$session['status'] > 4)
                        最終確認済
                        @else
                        <strong class="purple-accent-3">最終未確認</strong>
                        @endif
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- 基本情報 -->
    <section class="section card grey lighten-5">
        <form action="{{ route('manager.information.confirm.show') }}" method="GET" name="managerInformation">
            @csrf
            <div class="card-content">
                <div id="collapsible-header-infor" class="collapsible-header-2 bg1-2">
                <span style="border-bottom:none"  class="card-title collapsible-header-2 bg1-2">基本情報</span>
                <span class="toggle"></span>
                </div>
                <div class="divider"></div>
                <div id = 'collapsible-body-infor' style="display: block" class="section text-small collapsible-body grey lighten-5 bd1">
                    <div class="row res-block">
                        <strong class="col s12 m4">入力者</strong>
                        <p class="col s12 m8 wb">{{ $entrantArray[$session['entrant']] }}</p>
                        {{-- <label class="col">
                            <input onclick="checkEntrant()" type="radio" name="entrant" class="is-toggle" data-tgt="js_entrant" data-state="false" value="0" @if (old('entrant') == '0' || (int)$session['entrant'] == '0' || ((old('entrant') != '1' && (int)$session['entrant'] != '1'))) checked @endif required>
                            <span>本人(弔事当事者)</span>
                        </label>
                        <label class="col">
                            <input onclick="checkEntrant()" type="radio" name="entrant" class="is-toggle" data-tgt="js_entrant" data-state="true" value="1" @if (old('entrant') == '1' || (int)$session['entrant'] == '1') checked @endif>
                            <span>代理者の入力</span>
                        </label> --}}
                        @if ($session['entrant'] === 1)
                            <input type="hidden" name="entrant" value="1">
                        @else
                            <input type="hidden" name="entrant" value="0">
                        @endif

                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">弔事当事者の社員番号</strong>

                        <p class="col s12 m8 wb"><input type="text" name="related_employee_no" value="{{ $session['related_employee_no'] }}"></p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">弔事当事者の入社年度</strong>
                        <p class="col s12 m8 wb"> <input type="text" name="membership_year" value="{{ $session['membership_year'] }}"></p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">氏名</strong>

                        <p class="col s12 m8 wb"> <input type="text" name="related_name" value="{{ $session['related_name'] }}"></p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">フリガナ</strong>

                        <p class="col s12 m8 wb"><input type="text" name="related_kana" value="{{ $session['related_kana'] }}"></p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block classification-manager">
                        <strong class="col s12 m4">社員区分</strong>
                        {{-- <p class="col s12 m8 wb">{{ $classificationsArray[$session['classification']] }}</p> --}}
                        <select style="width: 67%;" name="classification" id="classification" class="required browser-default text-xSmall" required data-title="本人(弔事当事者)社員区分">
                            @include('mourning.classifications')
                        </select>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block company-manager">
                        <strong class="col s12 m4">就業会社</strong>
                        {{-- <p class="col s12 m8 wb">{{ $companiesArray[$session['company']] }}</p> --}}
                        <select style="width: 67%;" name="company" id="company" class="required browser-default text-xSmall" required  data-title="本人(弔事当事者)就業会社">
                            @include('mourning.companies')
                        </select>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">所属①</strong>

                        <p class="col s12 m8 wb"><input type="text" name="member1" value="{{ $session['member1'] }}"></p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">所属②</strong>

                        <p class="col s12 m8 wb"> <input type="text" name="member2" value="{{ $session['member2'] }}"></p>
                    </div>
                    <div class="divider"></div>

                    @if((int)$session['entrant'] == 1)
                            <div class="row res-block">
                                <strong class="col s12 m4">代理者の社員番号</strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_employee_no" value="{{ $session['entrant_employee_no'] }}"></p>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block">
                                <strong class="col s12 m4">氏名</strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_name" value="{{ $session['entrant_name'] }}"></p>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block">
                                <strong class="col s12 m4">フリガナ</strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_kana" value="{{ $session['entrant_kana'] }}"></p>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block">
                                <strong class="col s12 m4">社員区分</strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_classification" value="{{ $classificationsArray[$session['entrant_classification']] }}"></p>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block">
                                <strong class="col s12 m4">就業会社</strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_company" value="{{ $companiesArray[$session['entrant_company']] }}"></p>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block">
                                <strong class="col s12 m4">所属①</strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_member1" value="{{ $session['entrant_member1'] }}"></p>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block">
                                <strong class="col s12 m4">所属②</strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_member2" value="{{ $session['entrant_member2'] }}"></p>
                            </div>
                        <div class="divider"></div>
                    @endif

                    <div class="row res-block">
                        <strong class="col s12 m4">故人様氏名</strong>
                        <p class="col s12 m8 wb"><input type="text" name="passed_away_name" value="{{ $session['passed_away_name'] }}"></p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">故人様フリガナ</strong>
                        <p class="col s12 m8 wb"> <input type="text" name="passed_away_kana" value="{{ $session['passed_away_kana'] }}"></p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block passed-date-manager">
                        <strong class="col s12 m4">逝去日時</strong>
                        {{-- <p class="col s12 m8 wb"><input type="text" name="passed_away_date" value=""></p> --}}
                        <input id="passed_away_date" name="passed_away_date" type="date" class="validate" required @if(old('passed_away_date')) value="old('passed_away_date')" @endif @if($session['passed_away_date']) value="{{$session['passed_away_date']}}" @endif required>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block passed-manager">
                        <strong class="col s12 m4">本人(弔事当事者)との続柄</strong>
                        {{-- <p class="col s12 m8 wb">{{ $passedAwayRelationshipArray[$session['passed_away_relationship']] }}</p> --}}
                        <select style="width:67%" name="passed_away_relationship" id="passed_away_relationship" class="required browser-default text-xSmall" required>
                            @include('mourning.passedAwayRelationship')
                        </select>
                    </div>
                    <br>
                    {{-- When 入力者 is 代理者の入力 --}}
                    <div class="entrant-information hidden-entrants" id="entrant-information">
                        <span>代理者</span>
                            <div class="row res-block">
                                <strong class="col s12 m4">代理者の社員番号<sup><i class="tiny material-icons">lens</i></sup></strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_employee_no" id="entrant_employee_no" value="{{ $session['entrant_employee_no'] }}"></p>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block">
                                <strong class="col s12 m4">氏名<sup><i class="tiny material-icons">lens</i></sup></strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_name" id="entrant_name" value="{{ $session['entrant_name'] }}"></p>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block">
                                <strong class="col s12 m4">フリガナ<sup><i class="tiny material-icons">lens</i></sup></strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_kana" id="entrant_kana" value="{{ $session['entrant_kana'] }}"></p>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block classification-manager">
                                <strong class="col s12 m4">社員区分<sup><i class="tiny material-icons">lens</i></sup></strong>
                                {{-- <p class="col s12 m8 wb"><input type="text" name="entrant_classification" value="" required></p> --}}
                                <select style="width:67%" name="entrant_classification" id="entrant_classification" class="required browser-default text-xSmall">
                                    @include('mourning.entrantClassifications')
                                </select>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block company-manager">
                                <strong class="col s12 m4">就業会社<sup><i class="tiny material-icons">lens</i></sup></strong>
                                {{-- <p class="col s12 m8 wb"><input type="text" name="entrant_company" value="" required></p> --}}
                                <select style="width:67%" name="entrant_company" id="entrant_company" class="required browser-default text-xSmall" >
                                    @include('mourning.entrantCompanies')
                                </select>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block">
                                <strong class="col s12 m4">所属①<sup><i class="tiny material-icons">lens</i></sup></strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_member1" id="entrant_member1" value="{{ $session['entrant_member1'] }}"></p>
                            </div>
                            <div class="divider"></div>
                            <div class="row res-block">
                                <strong class="col s12 m4">所属②<sup><i class="tiny material-icons">lens</i></sup></strong>
                                <p class="col s12 m8 wb"><input type="text" name="entrant_member2" id="entrant_member2" value="{{ $session['entrant_member2'] }}"></p>
                            </div>
                        <div class="divider"></div>
                    </div>
                    <input type="hidden" name="id" value="{{ $session['id'] }}">
                    <div class="row">
                        <div class="col s12">
                            <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2 w-full" role="button">
                                情報を編集する<i class="material-icons right">chevron_right</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

                @if((int)$session['inlaws'] == 1)
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">社内親族の社員番号</strong>
                        <p class="col s12 m8 wb">{{ $session['inlaws_employee_no'] }}</p>
                    </div>
                    <div class="divider"></div>
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

                @if((int)$session['wake'] == 0)
                    <div class="divider"></div>
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
                                <div class="input-field row res-block">
                                    <input id="wake_attendees1" name="wake_attendees1" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['wake_attendees1']){{$session['wake_attendees1']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                    <label for="wake_attendees1" class="bg1">参列予定者①（手配担当者(総務/業務担当等)入力）</label>
                                </div>
                                <div class="input-field row res-block">
                                    <input id="wake_attendees2" name="wake_attendees2" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['wake_attendees2']){{$session['wake_attendees2']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                    <label for="wake_attendees2" class="bg1">参列予定者②（手配担当者(総務/業務担当等)入力）</label>
                                </div>
                                <div class="input-field row res-block">
                                    <input id="wake_attendees3" name="wake_attendees3" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['wake_attendees3']){{$session['wake_attendees3']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                    <label for="wake_attendees3" class="bg1">参列予定者③（手配担当者(総務/業務担当等)入力）</label>
                                </div>
                                <div class="input-field row res-block">
                                    <label for="wake_attendees" class="bg1">備考（手配担当者(総務/業務担当等)入力）</label>
                                    <textarea id="wake_attendees" name="wake_attendees" type="text" class="validate" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>@if($session['wake_attendees']){{$session['wake_attendees']}}@endif</textarea>
                                </div>
                            </div>
                        @else
                            <div>
                                <div class="input-field row res-block">
                                    <input id="wake_attendees1" name="wake_attendees1" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['wake_attendees1']){{$session['wake_attendees1']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                    <label for="wake_attendees1" class="bg1">参列予定者①（手配担当者(総務/業務担当等)入力）</label>
                                </div>
                                <div class="input-field row res-block">
                                    <input id="wake_attendees2" name="wake_attendees2" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['wake_attendees2']){{$session['wake_attendees2']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                    <label for="wake_attendees2" class="bg1">参列予定者②（手配担当者(総務/業務担当等)入力）</label>
                                </div>
                                <div class="input-field row res-block">
                                    <input id="wake_attendees3" name="wake_attendees3" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['wake_attendees3']){{$session['wake_attendees3']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                    <label for="wake_attendees3" class="bg1">参列予定者③（手配担当者(総務/業務担当等)入力）</label>
                                </div>
                                <div class="input-field row res-block">
                                    <label for="wake_attendees" class="bg1">備考（手配担当者(総務/業務担当等)入力）</label>
                                    <textarea id="wake_attendees" name="wake_attendees" type="text" class="validate" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>@if($session['wake_attendees']){{$session['wake_attendees']}}@endif</textarea>
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

                @if((int)$session['funeral'] == 0)
                    <div class="divider"></div>
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

                                    <input id="funeral_attendees1" name="funeral_attendees1" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['funeral_attendees1']){{$session['funeral_attendees1']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>

                                    <label for="funeral_attendees1" class="bg1">参列予定者①</label>
                                </div>
                                <div class="input-field row res-block">

                                    <input id="funeral_attendees2" name="funeral_attendees2" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['funeral_attendees2']){{$session['funeral_attendees2']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>

                                    <label for="funeral_attendees2" class="bg1">参列予定者②</label>
                                </div>
                                <div class="input-field row res-block">

                                    <input id="funeral_attendees3" name="funeral_attendees3" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['funeral_attendees3']){{$session['funeral_attendees3']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>

                                    <label for="funeral_attendees3" class="bg1">参列予定者③</label>
                                </div>
                                <div class="input-field row res-block">

                                    <label for="wake_attendees" class="bg1">備考（手配担当者(総務/業務担当等)入力）</label>

                                    <textarea id="funeral_attendees" name="funeral_attendees" type="text" class="validate" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>@if($session['funeral_attendees']){{$session['funeral_attendees']}}@endif</textarea>
                                </div>

                            </div>
                        @else
                            <div>
                                <div class="input-field row res-block">

                                    <input id="funeral_attendees1" name="funeral_attendees1" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['funeral_attendees1']){{$session['funeral_attendees1']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>

                                    <label for="funeral_attendees1" class="bg1">参列予定者①</label>
                                </div>
                                <div class="input-field row res-block">

                                    <input id="funeral_attendees2" name="funeral_attendees2" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['funeral_attendees2']){{$session['funeral_attendees2']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>

                                    <label for="funeral_attendees2" class="bg1">参列予定者②</label>
                                </div>
                                <div class="input-field row res-block">

                                    <input id="funeral_attendees3" name="funeral_attendees3" type="text" class="validate" placeholder="手配担当者(総務/業務担当等)が入力" value="@if($session['funeral_attendees3']){{$session['funeral_attendees3']}}@endif" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>

                                    <label for="funeral_attendees3" class="bg1">参列予定者③</label>
                                </div>
                                <div class="input-field row res-block">

                                    <label for="wake_attendees" class="bg1">備考（手配担当者(総務/業務担当等)入力）</label>

                                    <textarea id="funeral_attendees" name="funeral_attendees" type="text" class="validate" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>@if($session['funeral_attendees']){{$session['funeral_attendees']}}@endif</textarea>
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

                @if((int)$session['chief_mourner'] == 1)
                    <div class="divider"></div>
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
                @endif

            </div>
        </div>
    </section>

    @if((int)$session['superior_employee_no'])
    <!-- 直属の上司 -->
    <section class="section card grey lighten-5">
        <div class="card-content">
            <span class="card-title">職場担当者(上司等)の確認</span>
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
    @endif

    <!-- 弔電・供花・弔慰金 -->
    <section class="section card grey lighten-5 mt100" id="anc1">
        <div class="card-content">
            <div class="card-title">弔電・供花・弔慰金</div>
            <div class="divider"></div>

{{--            福祉会規定--}}
            <div class="section text-small grey lighten-2">
                <div class="inner-block">
                    <div><strong class="text-large">福祉会規定</strong></div>
                    <div class="section grey lighten-5">
                        <div class="row text-small teal lighten-5">
                            <strong class="col s12 m2">差出人１</strong>
                            <span class="col s12 m9">{{$session['social_name1']}}</span>
                            <input type="hidden" name="social_name1" form="general_affairs" value="{{$session['social_name1']}}">
                            <div class="divider col"></div>
                        </div>
                        <div class="row">
                            <strong class="col s4">弔電</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['social_telegram1_flg'] == 1)
                                    <i class="material-icons">remove</i>
                                @else
                                    {{$session['social_telegram1']}} 通
                                @endif</strong>
                            <input type="hidden" value="{{$session['social_telegram1']}}" name="social_telegram1" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                            <div class="divider col s10 push-s1"></div>
                            <strong class="col s4">供花</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['social_floral_tribute1_flg'] == 1)
                                    <i class="material-icons">remove</i>
                                @else
                                    {{$session['social_floral_tribute1']}} 本
                                @endif</strong>
                            <input type="hidden" value="{{$session['social_floral_tribute1']}}" name="social_floral_tribute1" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                        </div>
                        <div class="divider"></div>
                        <div class="row text-small teal lighten-5">
                            <strong class="col s12 m2">差出人２</strong>
                            <span class="col s12 m9">{{$session['social_name2']}}</span>
                            <input type="hidden" name="social_name2" form="general_affairs" value="{{$session['social_name2']}}">

                        </div>
                        <div class="row ">
                            <strong class="col s4">弔電</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['social_telegram2_flg'] == 1)
                                    <i class="material-icons">remove</i>
                                @else
                                    {{$session['social_telegram2']}} 通
                                @endif</strong>
                            <input type="hidden" value="1" name="social_telegram2" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                            <div class="divider col s10 push-s1"></div>
                            <strong class="col s4">供花</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['social_floral_tribute2_flg'] == 1)
                                    <i class="material-icons">remove</i>
                                @else
                                    {{$session['social_floral_tribute2']}} 本
                                @endif</strong>
                            <input type="hidden" value="1" name="social_floral_tribute2" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                        </div>
                        <div class="divider"></div>
                        <div class="row text-small teal lighten-5">
                            <strong class="col s12 m2">差出人３</strong>
                            <span class="col s12 m9">{{$session['social_name3']}}</span>
                            <input type="hidden" name="social_name3" form="general_affairs" value="{{$session['social_name3']}}">

                        </div>

                        <div class="row ">
                            <strong class="col s4">弔慰金</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['social_condolence_money3_flg'] == 1)
                                    <i class="material-icons">remove</i>
                                @else
                                    {{$session['social_condolence_money3']}} 万円
                                @endif</strong>
                            <input type="hidden" value="{{$session['social_condolence_money3']}}" name="social_condolence_money3" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                        </div>
                    </div>
                </div>
            </div>

{{--            会社規定--}}
            <div class="section text-small grey lighten-2">
                <div class="inner-block">

                    <div class="flex"><strong class="text-large">会社規定</strong>　<span class="bg1 text-small">手配担当者(総務/業務担当等)</span><i class="material-icons purple-accent-1">lens</i> <strong>必須項目</strong></div>

                    @if((int)$session['company'] == 8 || (int)$session['company'] == 10 || (int)$session['classification'] == 6 || (int)$session['classification'] == 5)
                        <input type="hidden" name="company_attend1" form="general_affairs" value="">
                        <input type="hidden" name="company_attend2" form="general_affairs" value="">
                        <div class="section grey lighten-5 bd1-a">
                            <div class="row">
                                <label for="company_name1" class="col s12 m2 text-small sender bg1">差出人１<sup><i class="tiny material-icons purple-text text-lighten-4">lens</i></sup></label>
                                <input type="text" name="company_name1" id="company_name1" form="general_affairs" class="col s12 m10 text-small" placeholder="差出人名を入力" @if((int)$session['general_affairs_confirmation'] == 1 || ((int)$session['floral_tribute'] == 1 && (int)$session['telegram'] == 1)) disabled @endif required value=" @if ((int)$session['floral_tribute'] == 1 && (int)$session['telegram'] == 1) ー @else {{ $session['company_name1'] }} @endif ">
                            </div>
                            <div class="row" data-company-attend1="{{$session['company_attend1']}}">

                                @if((int)$session['general_affairs_confirmation'] == 1)
                                    @if((int)$session['company_attend1'] != 2)
                                        <span class="col">参列しない</span>
                                    @else
                                        <span class="col">参列する</span>
                                    @endif

                                @else
                                    <label class="col">
                                        <input type="radio" name="company_attend1" class="js-attend" value="1" data-val="1" data-tgt="1" required form="general_affairs" @if((int)$session['company_attend1'] == 1) checked @endif>
                                        <span>参列しない</span>
                                    </label>
                                    <label class="col">
                                        <input type="radio" name="company_attend1" class="js-attend" value="2" data-val="0" data-tgt="1" form="general_affairs" @if((int)$session['company_attend1'] == 2) checked @endif>
                                        <span>参列する</span>
                                    </label>
                                @endif
                            </div>

                            <div class="row">
                                <label for="company_telegram1" class="col s4"><strong>弔電</strong></label>
                                <input class="col s1 zen2half" type="text" name="company_telegram1" id="company_telegram1" form="general_affairs" placeholder="0" required maxlength="2" pattern="[0-9]" value="{{ $session['company_telegram1'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                <strong class="col s7 wb deep-purple-text">通</strong>
                                <div class="divider col s10 push-s1"></div>
                            </div>
                            <div class="row">
                                <label for="company_floral_tribute1" class="col s4"><strong>供花</strong></label>
                                <input class="col s1 zen2half" type="text" name="company_floral_tribute1" id="company_floral_tribute1" form="general_affairs" placeholder="0" required maxlength="2" pattern="[0-9]" value="{{ $session['company_floral_tribute1'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                <strong class="col s7 wb deep-purple-text">本</strong>
                                <div class="divider col s10 push-s1"></div>
                            </div>
                            <div class="row">
                                <label for="company_condolence_money1" class="col s4"><strong>弔慰金</strong></label>
                                <input class="col s1 zen2half" type="text" name="company_condolence_money1" id="company_condolence_money1" form="general_affairs" placeholder="0" required maxlength="2" pattern="[0-9]*" value="{{ (int)$session['company_condolence_money1'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                <strong class="col s7 wb deep-purple-text">万円</strong>
                            </div>

                            <div class="divider"></div>
                            <div class="row">
                                <label for="company_name2" class="col s12 m2 text-small sender bg1">差出人２<sup><i class="tiny material-icons purple-text text-lighten-4">lens</i></sup></label>
                                <input type="text" name="company_name2" id="company_name2" form="general_affairs" class="col s12 m10 text-small" placeholder="差出人名を入力" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif required value="{{ $session['company_name2'] }}">
                            </div>
                            <div class="row" data-company-attend2="{{$session['company_attend2']}}">

                                @if((int)$session['general_affairs_confirmation'] == 1)
                                    @if((int)$session['company_attend2'] != 2)
                                        <span class="col">参列しない</span>
                                    @else
                                        <span class="col">参列する</span>
                                    @endif

                                @else
                                    <label class="col">
                                        <input type="radio" name="company_attend2" class="js-attend" value="1" data-val="1" data-tgt="2" required form="general_affairs" @if((int)$session['company_attend2'] == 1) checked @endif>
                                        <span>参列しない</span>
                                    </label>
                                    <label class="col">
                                        <input type="radio" name="company_attend2" class="js-attend" value="2" data-val="0" data-tgt="2" form="general_affairs" @if((int)$session['company_attend2'] == 2) checked @endif>
                                        <span>参列する</span>
                                    </label>
                                @endif
                            </div>
                            <div class="row">
                                <label class="col s4" for="company_telegram2"><strong>弔電</strong></label>
                                <input class="col s1 zen2half" type="text" name="company_telegram2" id="company_telegram2" form="general_affairs" placeholder="0" required maxlength="2" pattern="[0-9]" value="{{ $session['company_telegram2'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                <strong class="col s7 wb deep-purple-text">通</strong>
                                <div class="divider col s10 push-s1"></div>
                            </div>

                            <div class="row">
                                <label for="company_floral_tribute2" class="col s4"><strong>供花</strong></label>
                                <input class="col s1 zen2half" type="text" name="company_floral_tribute2" id="company_floral_tribute2" form="general_affairs" placeholder="0" required maxlength="2" pattern="[0-9]" value="{{ $session['company_floral_tribute2'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                <strong class="col s7 wb deep-purple-text">本</strong>
                                <div class="divider col s10 push-s1"></div>
                            </div>

                            <div class="row">
                                <label class="col s4" for="company_condolence_money2"><strong>弔慰金</strong></label>
                                <input class="col s1 zen2half" type="text" name="company_condolence_money2" id="company_condolence_money2" form="general_affairs" placeholder="0" required maxlength="2" pattern="[0-9]*" value="{{ $session['company_condolence_money2'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                <strong class="col s7 wb deep-purple-text">万円</strong>
                            </div>

                        </div>
                    @else
                        <input type="hidden" name="company_floral_tribute2" form="general_affairs" value="{{$session['company_floral_tribute2']}}">
                        <div class="section grey lighten-5">
                            <div class="row">
                                <label for="company_name1" class="col s12 m2 text-small sender bg1">差出人１</label>
                                {{-- <input type="text" name="company_name1" id="company_name1" form="general_affairs" class="col s12 m10 text-small" value="{{$session['company_name1']}}" placeholder="差出人名" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif required> --}}
                                <input type="text" name="company_name1" id="copany_name1" form="general_affairs" class="col s12 m10 text-small" placeholder="差出人名を入力"
                                @if((int)$session['general_affairs_confirmation'] == 1 || ((int)$session['floral_tribute'] == 1 && (int)$session['telegram'] == 1 && (int)$session['company_condolence_money1_flg'] == 1) || ((int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 0) || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 0) || ((int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 1) || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 1) || ((int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] == 6) || ((int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] == 7)) disabled @endif required
                                value="@if((int)$session['floral_tribute'] == 1 && (int)$session['telegram'] == 1 && (int)$session['company_condolence_money1_flg'] == 1 || (int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 0 || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 0) || ((int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 1) || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 1)|| ((int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] == 6) || ((int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] == 7))ー@else{{ $session['company_name1'] }}@endif">
                            </div>
                            <div class="row" data-company-attend1="{{$session['company_attend1']}}">

                                @if((int)$session['general_affairs_confirmation'] == 1)
                                    @if((int)$session['company_attend1'] != 2)
                                        <span class="col">参列しない</span>
                                    @else
                                        <span class="col">参列する</span>
                                    @endif

                                @else
                                {{-- Edit by IVS 2023/12/01 --}}
                                    <label class="col">
                                        <input type="radio" name="company_attend1" onclick="displayMoney()" class="js-attend" value="1" data-val="1" data-tgt="1" required form="general_affairs" @if((int)$session['company_attend1'] == 1) checked @endif>
                                        <span>参列しない</span>
                                    </label>
                                    <label class="col">
                                        <input type="radio" name="company_attend1" onclick="hiddenMoney()" class="js-attend" value="2" data-val="0" data-tgt="1" form="general_affairs" @if((int)$session['company_attend1'] == 2) checked @endif>
                                        <span>参列する</span>
                                    </label>
                                {{-- End edit IVS 2023/12/01 --}}
                                @endif
                            </div>
                            <div class="divider col s10 push-s1"></div>
                            <div class="row">
                                <strong class="col s4">弔電</strong><strong class="col s8 wb deep-purple-text">
                                    @if((int)$session['company_telegram1_flg'] == 1)
                                    {{-- Edit by IVS 2023/12/01 --}}
                                        <i id="dash1" class="material-icons">remove</i>
                                        <span style="opacity: 0" id="display-telegram1"><span>1</span> 通</span>
                                    @else
                                        @if((int)$session['telegram'] == 1)
                                            <span>0</span> 通
                                        @else
                                            <span id="js_company_attend1">{{$session['company_telegram1']}}</span> <span id="hiddenMoney">通</span>
                                        @endif
                                    {{-- End edit IVS 2023/12/01 --}}
                                    @endif</strong>
                                <input type="hidden" value="{{$session['company_telegram1']}}" name="company_telegram1" id="company_telegram1" form="general_affairs">
                                <div class="divider col s10 push-s1"></div>
                                <strong class="col s4">供花</strong><strong class="col s8 wb deep-purple-text">
                                    @if((int)$session['company_floral_tribute1_flg'] == 1)
                                        <i class="material-icons">remove</i>
                                    @else
                                        {{$session['company_floral_tribute1']}} 本
                                    @endif</strong>
                                <input type="hidden" value="{{$session['company_floral_tribute1']}}" name="company_floral_tribute1" form="general_affairs">
                                <div class="divider col s10 push-s1"></div>

                                @if((int)$session['company'] == 1)
                                    <div class="row col s12">
                                        <strong class="col s12 m2 text-small">差出人</strong>
                                        <span class="col s12 m10 text-small">{{$session['social_name1']}}</span>
                                    </div>
                                @endif
                                <strong class="col s4">弔慰金</strong>

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
                                {{-- <input type="text" name="company_name2" id="company_name2" form="general_affairs" class="col s12 m10 text-small" value="{{$session['company_name2']}}" placeholder="差出人名" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif required> --}}
                                <input type="text" name="company_name2" id="copany_name2" form="general_affairs" class="col s12 m10 text-small" placeholder="差出人名を入力"
                                @if((int)$session['general_affairs_confirmation'] == 1 || ((int)$session['floral_tribute'] == 1 && (int)$session['telegram'] == 1 && (int)$session['company_condolence_money2_flg'] == 1) || ((int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 0) || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 0) || ((int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] != 1) || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] != 1) || ((int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] == 7)) disabled @endif required
                                value="@if((int)$session['floral_tribute'] == 1 && (int)$session['telegram'] == 1 && (int)$session['company_condolence_money2_flg'] == 1 || (int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 0 || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 0)|| ((int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] == 7) || ((int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] != 1) || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] != 1))ー@else{{ $session['company_name2'] }}@endif">
                            </div>
                            <div class="row ">
                                @if((int)$session['general_affairs_confirmation'] == 1)
                                    @if((int)$session['company_attend2'] != 2)
                                        <span class="col">参列しない</span>
                                    @else
                                        <span class="col">参列する</span>
                                    @endif
                                @else
                                {{-- Edit by IVS 2023/12/01 --}}
                                    <label class="col">
                                        <input type="radio" name="company_attend2" onclick="displayMoney2()" class="js-attend" value="1" data-val="1" data-tgt="2" required form="general_affairs" @if((int)$session['company_attend2'] == 1) checked @endif>
                                        <span>参列しない</span>
                                    </label>
                                    <label class="col">
                                        <input type="radio" name="company_attend2" onclick="hiddenMoney2()" class="js-attend" value="2" data-val="0" data-tgt="2" form="general_affairs" @if((int)$session['company_attend2'] == 2) checked @endif>
                                        <span>参列する</span>
                                    </label>
                                {{-- End edit IVS 2023/12/01 --}}
                                @endif
                            </div>
                            <div class="divider col s10 push-s1"></div>
                            <div class="row">
                                <strong class="col s4">弔電</strong><strong class="col s8 wb deep-purple-text">@if((int)$session['company_telegram2_flg'] == 1)
                                    {{-- Edit by IVS 2023/12/01 --}}
                                        <i id="dash2" class="material-icons">remove</i>
                                        <span style="opacity: 0" id="display-telegram2"><span>1</span> 通</span>
                                    @else
                                        @if((int)$session['telegram'] == 1)
                                            <span>0</span> 通
                                        @else
                                            <span id="js_company_attend2">{{$session['company_telegram2']}}</span> <span id="hiddenMoney2">通</span>
                                        @endif
                                    {{-- End edit IVS 2023/12/01 --}}
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

    <input type="hidden" name="accordion-state" id="accordion-state" value="">
    <!-- 総務担当、支部委員長、所属長 -->
    <div class="row mt50 flex"><i class="material-icons">lens</i> <strong>必須項目</strong></div>
    <ul class="collapsible collapsible-custom" id="js-manager-content">

{{--        <!-- 総務担当／秘書室 確認入力 --> --}}
        <li class="section " data-type="1">

            <div class="collapsible-header bg1-2"><span>手配担当者(総務/業務担当等) 最終確認入力</span>

                @if((int)$session['general_affairs_confirmation'] == 1)
                    <span>【確認済み】</span>
                @else
                    <span class="toggle"></span>
                @endif</div>
            <div class="collapsible-body grey lighten-5 bd1">
                <form action="{{ route('general_affairs.post') }}" id="general_affairs" name="general_affairs" method="post">
                    @csrf
                    <input type="radio" name="previous" @if (old('previous')) checked @endif style="display: none">
                    <input type="hidden" name="accordion" value="general_affairs">
                    <input type="hidden" name="id" value="{{ $session['id'] }}">
                    <input type="hidden" name="classification" value="{{ $session['classification'] }}">
                    <input type="hidden" name="passed_away_relationship" value="{{ $session['passed_away_relationship'] }}">
                    <input type="hidden" name="chief_mourner" value="{{ $session['chief_mourner'] }}">
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
                    <input type="hidden" name="telegram" value="{{ $session['telegram'] }}">
                    <input type="hidden" name="floral_tribute" value="{{ $session['floral_tribute'] }}">
                    <input type="hidden" name="status" value="3">
                    @if ((int)$session['floral_tribute'] == 1 && (int)$session['telegram'] == 1)
                        <input type="hidden" value = "" name = "company_name1">
                        <input type="hidden" value = "" name = "company_name2">
                    @endif
                    @if ((int)$session['general_affairs_confirmation'] == 1 || ((int)$session['floral_tribute'] == 1 && (int)$session['telegram'] == 1 && (int)$session['company_condolence_money1_flg'] == 1) || ((int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 0) || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 0) || ((int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 1 ) || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 1) || ((int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] == 6) || ((int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] == 7))
                        <input type="hidden" name="company_name1" value="">
                    @endif
                    @if((int)$session['floral_tribute'] == 1 && (int)$session['telegram'] == 1 && (int)$session['company_condolence_money2_flg'] == 1 || (int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 0 || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 0)|| ((int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] == 7) || ((int)$session['classification'] == 7 && (int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] != 1) || ((int)$session['classification'] == 8 && (int)$session['chief_mourner'] == 1 && (int)$session['passed_away_relationship'] != 1))
                        <input type="hidden" name="company_name2" value="">
                    @endif

                    <div class="row">
                        <div class="col s12 m6">
                            <label>
                                <input type="checkbox" class="filled-in" name="reception" value="1" id="reception" required @if($session['reception']) checked @endif @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                <span class="col">受付<sup><i class="tiny material-icons">lens</i></sup></span>
                            </label>
                        </div>
                        <div class="col s12 m6">
                            <label for="reception_datetime">受付日時</label>
                            <input id="reception_datetime" name="reception_datetime" type="datetime-local" class="validate" required readonly value="{{ $session['reception_datetime'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                        </div>
                        <div class="col s12">
                            <label>
                                <input type="checkbox" class="filled-in" name="general_affairs_confirmation" value="1" required required @if($session['general_affairs_confirmation']) checked @endif @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                <span class="col">確認<sup><i class="tiny material-icons">lens</i></sup></span>
                            </label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="general_affairs_employee_no" name="general_affairs_employee_no" type="text" class="validate zen2half" pattern="[0-9]{7}" maxlength="7" minlength="7" required value="{{ $session['general_affairs_employee_no'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
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
                            <input id="general_affairs_member1" name="general_affairs_member1" type="text" class="validate" placeholder="店/部/事業所を自由入力" value="{{ $session['general_affairs_member1'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                            <label for="general_affairs_member1">所属①</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="general_affairs_member2" name="general_affairs_member2" type="text" class="validate" placeholder="ｼｮｯﾌﾟ/課/室/担当を自由入力" value="{{ $session['general_affairs_member2'] }}" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                            <label for="general_affairs_member2">所属②</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <label for="general_affairs_contact_toll1">連絡先（トール）</label>
                            <div class="flex pt10">
                                <span class="mb10">8 - </span>
                                <input class="text-small grey lighten-5 zen2half w-rem p-h center-align" style="--w-rem:4rem;--p-h:0.5em" name="general_affairs_contact_toll1" id="general_affairs_contact_toll1" maxlength="2" pattern="[0-9]{2}" placeholder="00" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif value="{{ $session['general_affairs_contact_toll1'] }}">
                                <span class="mb10"> - </span>
                                <input class="text-small grey lighten-5 zen2half w-rem p-h center-align" style="--w-rem:6rem;--p-h:0.5em" name="general_affairs_contact_toll2" id="general_affairs_contact_toll2" maxlength="4" pattern="[0-9]{4}" placeholder="0000" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif value="{{ $session['general_affairs_contact_toll2'] }}">
                            </div>
                        </div>
                        <div class="input-field col s12 m6">
                            <label for="general_affairs_contact_info">外線</label>
                            <input class="text-small grey lighten-5 zen2half mt10 p-h" style="--p-h:0.5em" name="general_affairs_contact_info" id="general_affairs_contact_info" pattern="[0-9]*" placeholder="ハイフン無しの数字" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif value="{{ $session['general_affairs_contact_info'] }}">
                        </div>
                    </div>

                    <div>
                        <label for="general_affairs_misc">備考</label>
                        <textarea id="general_affairs_misc" name="general_affairs_misc" type="text" class="validate" form="general_affairs" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>@if($session['general_affairs_misc']){{$session['general_affairs_misc']}}@endif</textarea>
                    </div>


                    <div class="row">
                        <div class="col s12">
                            <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2 w-full" role="button" @if((int)$session['general_affairs_confirmation'] == 1) disabled @endif>
                                最終登録<i class="material-icons right">chevron_right</i></button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

{{--        <!-- 支部委員長/分会長 確認入力 -->--}}
        <li class="section" id="anc3" data-type="3">
            <div class="collapsible-header bg2-2"><span>支部委員長/分会長 確認入力</span>
                @if((int)$session['branch_chief_confirmation'] == 1)
                    <span>【確認済み】</span>
                @else
                    <span class="toggle"></span>
                @endif</div>
            <div class="collapsible-body grey lighten-5 bd2">
                <form action="{{ route('branch_chief.post') }}" id="branch_chief" method="post">
                    @csrf
                    <input type="radio" name="previous" @if (old('previous')) checked @endif style="display: none">
                    <input type="hidden" name="accordion" value="branch_chief">
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
                            <input id="branch_chief_employee_no" name="branch_chief_employee_no" type="text" class="validate zen2half" pattern="[0-9]{7}" maxlength="7" minlength="7" value="{{ $session['branch_chief_employee_no'] }}" @if((int)$session['branch_chief_confirmation'] == 1) disabled @endif>
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

{{--        <!-- 所属長 確認入力 -->--}}
        @if((int)$session['classification'] == 5 || (int)$session['classification'] == 6)
            <li class="section" id="anc2" data-type="2">
                <div class="collapsible-header bg3-2"><span>所属長 確認入力</span>@if((int)$session['supervisor_confirmation'] == 1)
                        <span>【確認済み】</span>
                    @else
                        <span class="toggle"></span>
                    @endif</div>
                <div class="collapsible-body grey lighten-5 bd3">
                    <form action="{{ route('supervisor.post') }}" id="supervisor" method="post">
                        @csrf
                        <input type="radio" name="previous" @if (old('previous')) checked @endif style="display: none">
                        <input type="hidden" name="accordion" value="supervisor">
                        <input type="hidden" name="id" value="{{ $session['id'] }}">
                        <input type="hidden" name="related_employee_no" value="{{ $session['related_employee_no'] }}">
                        <input type="hidden" name="password" value="{{ $session['password'] }}">
                        <input type="hidden" name="general_affairs_confirmation" value="{{ $session['general_affairs_confirmation'] }}">
                        <input type="hidden" name="branch_chief_confirmation" value="{{ $session['branch_chief_confirmation'] }}">
                        <input type="hidden" name="status" value="3">

                        <div class="row">
                            <div class="col s12">
                                <label>
                                    <input type="checkbox" class="filled-in" name="supervisor_confirmation" value="1" @if((int)$session['supervisor_confirmation'] == 1) checked @endif @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                    <span class="col s4">確認</span>
                                </label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="supervisor_employee_no" name="supervisor_employee_no" type="text" class="validate zen2half" pattern="[0-9]{7}" maxlength="7" minlength="7" value="{{ $session['supervisor_employee_no'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                <label for="supervisor_employee_no">社員番号</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="supervisor_name" name="supervisor_name" type="text" class="validate" value="{{ $session['supervisor_name'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                <label for="supervisor_name">氏名</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="supervisor_kana" name="supervisor_kana" type="text" class="validate hira2kana" pattern="[ 　\u30A0-\u30FF]+" value="{{ $session['supervisor_kana'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                <label for="supervisor_kana">フリガナ</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field2 col s12 m6">
                                <label for="supervisor_company">就業会社</label>
                                <select name="supervisor_company" id="supervisor_company" class="required browser-default text-xSmall" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                    @include('mourning.supervisorCompanies')
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="supervisor_member1" name="supervisor_member1" type="text" class="validate" placeholder="店/部/事業所を自由入力" value="{{ $session['supervisor_member1'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                <label for="supervisor_member1">所属</label>
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
        @else
            <li class="section" id="anc2" data-type="2">
                <div class="collapsible-header bg3-2"><span>所属長 確認入力</span>@if((int)$session['supervisor_confirmation'] == 1)
                        <span>【確認済み】</span>
                    @else
                        <span class="toggle"></span>
                    @endif</div>
                <div class="collapsible-body grey lighten-5 bd3">
                    <form action="{{ route('supervisor.post') }}" id="supervisor" method="post">
                        @csrf
                        <input type="radio" name="previous" @if (old('previous')) checked @endif style="display: none">
                        <input type="hidden" name="accordion" value="supervisor">
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
                                <input id="supervisor_employee_no" name="supervisor_employee_no" type="text" class="validate zen2half" pattern="[0-9]{7}" maxlength="7" minlength="7" value="{{ $session['supervisor_employee_no'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                <label for="supervisor_employee_no">社員番号<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="supervisor_name" name="supervisor_name" type="text" class="validate"  value="{{ $session['supervisor_name'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                <label for="supervisor_name">氏名<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="supervisor_kana" name="supervisor_kana" type="text" class="validate hira2kana" pattern="[ 　\u30A0-\u30FF]+"  value="{{ $session['supervisor_kana'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                <label for="supervisor_kana">フリガナ<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field2 col s12 m6">
                                <label for="supervisor_company">就業会社<sup><i class="tiny material-icons">lens</i></sup></label>
                                <select name="supervisor_company" id="supervisor_company" class=" browser-default text-xSmall"  @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                    @include('mourning.supervisorCompanies')
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="supervisor_member1" name="supervisor_member1" type="text" class="validate" placeholder="店/部/事業所を自由入力" value="{{ $session['supervisor_member1'] }}" @if((int)$session['supervisor_confirmation'] == 1) disabled @endif>
                                <label for="supervisor_member1">所属</label>
                            </div>
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
        @endif

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

            <div class="card-title p-10 bg1-2">総務／秘書室 最終確認</div>
            <div class="card-content">
                <div class="row">
                    <div class="justify col s12 bg2-2 text-small">
                        所属長の確認後、下の完了ボックスにチェックを入れてください。<br>
                        登録が終わると入力完了となり、データがグループ総務部と福祉会に送信されます。<br>
                        完了するとその後の編集はできなくなります。

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
                    @if((int)$session['classification'] != 6)
                        <div class="row">
                            <strong class="col s5">所属組合役員</strong>
                            <span class="mt5 s7">
                                @if((int)$session['branch_chief_confirmation'] == 1)
                                確認済
                                @else
                                未確認
                                @endif</span>
                        </div>
                        <div class="row">
                            <strong class="col s5">所属長</strong>
                            <span class="mt5 s7">
                                @if((int)$session['supervisor_confirmation'] == 1)
                                確認済
                                @else
                                未確認
                                @endif</span>
                        </div>
                    @endif

                </div>
                <div class="row">
                    <div class="col s12">
                        <label>
                            @if((int)$session['classification'] == 6 || (int)$session['classification'] == 5)
                                <input type="checkbox" class="filled-in" name="final_confirmation" value="1" required @if((int)$session['final_confirmation'] ==1 ) checked @endif @if((int)$session['final_confirmation'] ==1 || (int)$session['general_affairs_confirmation'] != 1) disabled @endif>
                            @else
                                <input type="checkbox" class="filled-in" name="final_confirmation" value="1" required @if((int)$session['final_confirmation'] ==1 ) checked @endif @if( ( (int)$session['status'] > 4 ) || ((int)$session['general_affairs_confirmation'] != 1 || (int)$session['supervisor_confirmation'] != 1)) disabled @endif>
                            @endif
                            <span class="text-large mt5">完了<sup><i class="tiny material-icons">lens</i></sup></span>
                        </label>
                    </div>

                    <div class="col s12">
                        @if((int)$session['classification'] == 6 || (int)$session['classification'] == 5)
                            <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2 w-full" role="button" @if((int)$session['final_confirmation'] == 1 || $session['general_affairs_confirmation'] != 1) disabled @endif>登録<i class="material-icons right">chevron_right</i></button>
                        @else
                            <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2 w-full" role="button" @if( ( (int)$session['status'] > 4 ) || ((int)$session['general_affairs_confirmation'] != 1 || (int)$session['supervisor_confirmation'] != 1)) disabled @endif>登録<i class="material-icons right">chevron_right</i></button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </section>
    {{-- Edit by IVS 01/12/2023 --}}
    <script>
        var id =  document.getElementById("hiddenMoney");
        var id2 =  document.getElementById("hiddenMoney2");
        var icon = document.getElementById("dash2");

        function hiddenMoney(params) {
            if(id){
                document.getElementById("hiddenMoney").style.opacity="0";
            }else{
                if(icon){
                    document.getElementById("dash1").style.display="contents";
                    document.getElementById("display-telegram1").style.opacity="0";
                }
            }
        }
        function displayMoney(params) {
            if(id){
                document.getElementById("hiddenMoney").style.opacity="1";
            }else{
                if(icon){
                    document.getElementById("dash1").style.display="none";
                    document.getElementById("display-telegram1").style.opacity="1";
                }
            }
        }
        function hiddenMoney2(params) {
            if(id2){
                document.getElementById("hiddenMoney2").style.opacity="0";
            }else{
                if(icon){
                    document.getElementById("dash2").style.display="contents";
                    document.getElementById("display-telegram2").style.opacity="0";
                }
            }
        }
        function displayMoney2(params) {
            if(id2){
                document.getElementById("hiddenMoney2").style.opacity="1";
            }else{
                if(icon){
                    document.getElementById("dash2").style.display="none";
                    document.getElementById("display-telegram2").style.opacity="1";
                }
            }
        }

        const collapsible = document.querySelectorAll('.collapsible-header-2');
        if(collapsible){
            collapsible.forEach( el=>{
                el.addEventListener('click', (ev)=>{
                    document.getElementById('collapsible-body-infor').style.display = document.getElementById('collapsible-body-infor').style.display === 'block' ? '' : 'block';
                    document.getElementById('collapsible-header-infor').classList.toggle("active");
                })
            })
        }
        // Set required for 入力者
        function checkEntrant() {
            var val = document.querySelector('input[name="entrant"]:checked').value;
            if(val === '1'){
                document.getElementById('entrant-information').classList.remove("hidden-entrants");
                document.getElementById('entrant_employee_no').setAttribute('required', '');
                document.getElementById('entrant_name').setAttribute('required', '');
                document.getElementById('entrant_kana').setAttribute('required', '');
                document.getElementById('entrant_classification').setAttribute('required', '');
                document.getElementById('entrant_company').setAttribute('required', '');
                document.getElementById('entrant_member1').setAttribute('required', '');
                document.getElementById('entrant_member2').setAttribute('required', '');
            }else{
                document.getElementById('entrant-information').classList.add("hidden-entrants");
                console.log(document.getElementById('entrant_employee_no'));
                document.getElementById('entrant_employee_no').removeAttribute('required');
            }


    }
    $(function(){
        var valEntrant = document.querySelector('input[name="entrant"]').value;
        if (valEntrant === '1') {
            document.querySelector('select[id="passed_away_relationship"] option[value="1"]').disabled = false;
        }
        else{
            document.querySelector('select[id="passed_away_relationship"] option[value="1"]').disabled = true;
            if(valRelationship === '1'){
                $("#passed_away_relationship").val('')
            }
        }
    })
    </script>
     {{-- End edit by IVS 23/11/2023 --}}
@endsection
