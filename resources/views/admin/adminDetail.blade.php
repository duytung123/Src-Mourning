@extends('layoutAdmin')
@section('title', '詳細画面 | 管理画面 | 丸井グループ 弔事連絡表')
@section('mainClass', 'row')
@section('content')
    <main class="main container @yield('mainClass')">
    <script>
        const $STATUS_ARRAY = {1:'入力中', 2:'直属の上司の確認済み', 3:'総務、支部役員、所属長 確認中', 4:'総務、支部役員、所属長 確認済み', 5:'完了'}
    </script>
    <a class="btn-floating btn-large waves-effect waves-light" id="back-button" href="{{ route('admin.list') }}"><i class="material-icons">arrow_back</i></a>

    <!--  左カラム-->
    <div class="col s8">
        <div class="card">
            <div class="card-content">
                <span class="card-title">基本情報</span>

                <div class="row">
                    <div class="col s6">
                        <strong class="text-large">本人(弔事当事者)</strong>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">入社年度</strong>
                            <span class="col s8">{{ $data['membership_year'] }}</span>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">社員番号</strong>
                            <span class="col s8">{{ $data['related_employee_no'] }}</span>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">弔事当事者名</strong>
                            <span class="col s8 text-xlarge">
                                <ruby>{{ $data['related_name'] }}<rt>{{ $data['related_kana'] }}</rt></ruby>
                            </span>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">社員区分</strong>
                            <span class="col s8">{{ $classificationsArray[$data['classification']] }}</span>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">就業会社</strong>
                            <span class="col s8">{{ $companiesArray[$data['company']] }}</span>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">所属①</strong>
                            <span class="col s8">{{ $data['member1'] }}</span>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">所属②</strong>
                            <span class="col s8">{{ $data['member2'] }}</span>
                        </div>
                    </div>
                    <div class="col s6 inner-block">
{{--                        @if((int)$data['entrant'] == 1)--}}
                        <strong class="text-large">代理入力者</strong>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">&nbsp;</strong>m
                        </div>

                        <div class="divider"></div>
                            <div class="row">
                                <strong class="col s4">社員番号</strong>
                                <span class="col s8">@if((int)$data['entrant'] == 1){{ $data['entrant_employee_no'] }}@endif</span>
                            </div>
                            <div class="divider"></div>
                            <div class="row" style="min-height: 43px;">
                                <strong class="col s4">代理入力者名</strong>
                                <span class="col s8 text-xlarge">@if((int)$data['entrant'] == 1)<ruby>{{ $data['entrant_name'] }}<rt>{{ $data['entrant_kana'] }}</rt></ruby>@endif</span>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s4">社員区分</strong>
                                <span class="col s8">@if((int)$data['entrant'] == 1){{ $classificationsArray[$data['entrant_classification']] }}@endif</span>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s4">就業会社</strong>
                                <span class="col s8">@if((int)$data['entrant'] == 1){{ $companiesArray[$data['entrant_company']] }}@endif</span>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s4">所属①</strong>
                                <span class="col s8">@if((int)$data['entrant'] == 1){{ $data['entrant_member1'] }}@endif</span>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s4">所属②</strong>
                                <span class="col s8">@if((int)$data['entrant'] == 1){{ $data['entrant_member2'] }}@endif</span>
                            </div>
{{--                        @endif--}}
                    </div>
                </div>

                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">故人様氏名</strong>
                    <span class="col s8">{{ $data['passed_away_name'] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">故人様のフリガナ</strong>
                    <span class="col s8">{{ $data['passed_away_kana'] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">逝去日</strong>
                    <span class="col s8">{{ $passedAwayDate }}</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">社内親族</span>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">社内親族</strong>
                    <span class="col s8">{{ $inlawsArray[$data['inlaws']] }}</span>
                </div>
                @if((int)$data['inlaws'] == 1)
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">社内親族の社員番号</strong>
                        <span class="col s8">{{ $data['inlaws_employee_no'] }}</span>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">
                            <ruby>氏名
                                <rt>&nbsp;</rt>
                            </ruby>
                        </strong>
                        <span class="col s8 text-xlarge">
                <ruby>{{ $data['inlaws_name'] }}<rt>{{ $data['inlaws_kana'] }}</rt></ruby>
              </span>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">就業会社</strong>
                        <spa class="col s8">{{ $companiesArray[$data['inlaws_company']] }}</spa>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">所属①</strong>
                        <spa class="col s8">{{ $data['inlaws_member1'] }}</spa>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">所属②</strong>
                        <spa class="col s8">{{ $data['inlaws_member2'] }}</spa>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">供花/弔電の手配</strong>
                        <spa class="col s8">{{ $inlaws_condolenceArray[$data['inlaws_condolence']]  }}</spa>
                    </div>

                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">通夜</span>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">通夜を行う</strong>
                    <span class="col s8">{{ $wakeArray[$data['wake']] }}</span>
                </div>
                @if((int)$data['wake'] == 0)
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">通夜の日付</strong>
                        <span class="col s8">{{ $wakeDate }}</span>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">通夜の時間</strong>
                        <span class="col s8">{{ $data['wake_time_start'] }}〜{{ $data['wake_time_end'] }}</span>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">通夜の式場名</strong>
                        <span class="col s8">{{ $data['wake_ceremony'] }}</span>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">住所</strong>
                        <span class="col s8">
              〒{{ $data['wake_ceremony_zip'] }}<br>
              {{ $data['wake_ceremony_addr1'] }}{{ $data['wake_ceremony_addr2'] }}
            </span>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">電話番号</strong>
                        <span class="col s8">{{ $data['wake_ceremony_tel'] }}</span>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">URL</strong>
                        <span class="col s8"><a href="{{ $data['wake_ceremony_url'] }}">{{ $data['wake_ceremony_url'] }}</a></a>
            </span>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">交通手段</strong>
                        <span class="col s8">{{ $data['wake_ceremony_access'] }}</span>
                    </div>
                    <div class="inner-block">
                        <div class="row">
                            <strong class="col s4">参列予定者①</strong>
                            <span class="col s8">{{ $data['wake_attendees1'] }}</span>
                        </div>
                        <div class="row">
                            <strong class="col s4">参列予定者②</strong>
                            <span class="col s8">{{ $data['wake_attendees2'] }}</span>
                        </div>
                        <div class="row">
                            <strong class="col s4">参列予定者③</strong>
                            <span class="col s8">{{ $data['wake_attendees3'] }}</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">告別式</span>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">告別式を行う</strong>
                    <span class="col s8">{{ $funeralArray[$data['funeral']] }}</span>
                </div>
                @if((int)$data['funeral'] == 0)
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">告別式の日付</strong>
                        <span class="col s8">{{ $data['funeral_date'] }}</span>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">告別式の時間</strong>
                        <span class="col s8">{{ $data['funeral_time_start'] }}〜{{ $data['funeral_time_end'] }}</span>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">通夜と同じ式場</strong>
                        <span class="col s8">{{ $funeral_same_ceremonyArray[$data['funeral_same_ceremony']] }}</span>
                    </div>
                    @if((int)$data['funeral_same_ceremony'] == 1)
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">通夜の式場名</strong>
                            <span class="col s8">{{ $data['funeral_ceremony'] }}</span>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">住所</strong>
                            <span class="col s8">
                〒{{ $data['funeral_ceremony_zip'] }}<br>
                {{ $data['funeral_ceremony_addr1'] }}{{ $data['funeral_ceremony_addr2'] }}
              </span>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">電話番号</strong>
                            <span class="col s8">{{ $data['funeral_ceremony_tel'] }}</span>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">URL</strong>
                            <span class="col s8"><a href="{{ $data['funeral_ceremony_url'] }}">{{ $data['funeral_ceremony_url'] }}</a></a>
              </span>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <strong class="col s4">交通手段</strong>
                            <span class="col s8">{{ $data['funeral_ceremony_access'] }}</span>
                        </div>
                        <div class="inner-block">
                            <div class="row">
                                <strong class="col s4">参列予定者①</strong>
                                <span class="col s8">{{ $data['funeral_attendees1'] }}</span>
                            </div>
                            <div class="row">
                                <strong class="col s4">参列予定者②</strong>
                                <span class="col s8">{{ $data['funeral_attendees2'] }}</span>
                            </div>
                            <div class="row">
                                <strong class="col s4">参列予定者③</strong>
                                <span class="col s8">{{ $data['funeral_attendees3'] }}</span>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">喪主</span>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">本人喪主</strong>
                    <span class="col s8">{{ $chief_mournerArray[$data['chief_mourner']] }}</span>
                </div>
                @if($data['chief_mourner'] == 1)

                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">
                            <ruby>喪主の氏名
                                <rt>&nbsp;</rt>
                            </ruby>
                        </strong>
                        <span class="col s8"><ruby>{{ $data['chief_mourner_name'] }}<rt>{{ $data['chief_mourner_kana'] }}</rt></ruby></span>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">社員と喪主の続柄</strong>
                        <span class="col s8">{{ $passedAwayRelationshipArray[$data['chief_mourner_relationship']] }}</span>
                    </div>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">その他</span>
                <div class="divider"></div>
                @if((int)$data['condolence']== 1)
                    <div class="row">
                        <strong class="col s12">弔問を辞退する</strong>
                    </div>
                    <div class="divider"></div>
                @endif
                @if((int)$data['floral_tribute']== 1)
                    <div class="row">
                        <strong class="col s12">供花を辞退する</strong>
                    </div>
                    <div class="divider"></div>
                @endif
                @if((int)$data['telegram']== 1)
                    <div class="row">
                        <strong class="col s12">弔電を辞退する</strong>
                    </div>
                    <div class="divider"></div>
                @endif
                <div class="row">
                    <strong class="col s12">{{ $fax_postingArray[$data['fax_posting']] }}</strong>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <div class="col s4">備考</div>
                    <div class="col s8">{{ $data['remarks'] }}</div>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">弔電・供花・弔慰金</span>
                <div class="divider"></div>

                <div><strong class="">福祉会規定</strong></div>
                <div class="section inner-block ">
                    <div class="row">
                        <strong class="col s4 bg1">差出人１</strong>
                        <p class="col s8">{{ $data['social_name1'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">弔電</strong>
                        <p class="col s8 wb deep-purple-text">@if((int)$data['social_telegram1_flg'] == '1')<i class="material-icons">remove</i>@else{{$data['social_telegram1']}} 通@endif</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">供花</strong>
                        <p class="col s8 wb deep-purple-text">@if((int)$data['social_floral_tribute1_flg'] == 1)<i class="material-icons">remove</i>@else{{$data['social_floral_tribute1']}} 本@endif</p>
                    </div>
                    <div class="divider"></div>

                    <div class="row">
                        <strong class="col s4 bg1">差出人２</strong>
                        <p class="col s8">{{ $data['social_name2'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">弔電</strong>
                        <p class="col s8 wb deep-purple-text">@if((int)$data['social_telegram2_flg'] == 1)<i class="material-icons">remove</i>@else{{$data['social_telegram2']}} 通@endif</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">供花</strong>
                        <p class="col s8 wb deep-purple-text">@if((int)$data['social_floral_tribute2_flg'] == 1)<i class="material-icons">remove</i>@else{{$data['social_floral_tribute2']}} 本@endif</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4 bg1">差出人３</strong>
                        <p class="col s8">{{ $data['social_name2'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <strong class="col s4">弔慰金</strong>
                        <p class="col s8 wb deep-purple-text">@if((int)$data['social_condolence_money3_flg'] == 1)<i class="material-icons">remove</i>@else{{$data['social_condolence_money3']}} 万円@endif</p>
                    </div>
                </div>


                <div class="divider"></div>
                <div><strong class="">会社規定</strong>
                    <p class="right" id="edit-buttons">
                        <span class="btn waves-effect waves-light hoverable active" id="edit-regulation-edit">編集</span>
                        <span class="btn waves-effect hoverable white black-text" id="edit-regulation-cancel">キャンセル</span>
                        <span class="btn waves-effect waves-light hoverable green lighten-1" id="edit-regulation-save" data-id="{{ $data['id'] }}">保存</span>
                    </p>
                </div>
                <div class="section inner-block ">
                    <form action="{{ route('provisions.post') }}" id="provisions" name="provisions" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data['id'] }}">
                        <div class="flex">
                            <label for="company_name1">差出人１</label>
                            <input type="text" name="company_name1" id="company_name1" value="{{ $data['company_name1'] }}" data-val="{{ $data['company_name1'] }}" disabled>
                        </div>
                        <div class="divider"></div>
                        <div class="flex">
                            <label for="company_telegram1">弔電</label>
                            <input type="text" name="company_telegram1" id="company_telegram1" value="{{$data['company_telegram1']}}" data-val="{{$data['company_telegram1']}}" disabled>
                            <span> 通</span>
                        </div>
                        <div class="divider"></div>
                        <div class="flex">
                            <label for="company_floral_tribute1">供花</label>
                            <input type="text" name="company_floral_tribute1" id="company_floral_tribute1" value="{{$data['company_floral_tribute1']}}" data-val="{{$data['company_floral_tribute1']}}" disabled>
                            <span> 本</span>
                        </div>
                        @if((int)$data['company'] == 1)
                        <div class="divider"></div>
                        <div class="flex">
                            <label for="company_name1">差出人</label>
                            <input type="text" name="company_floral_tribute1" id="company_floral_tribute1" value="株式会社丸井グループ代表取締役" data-val="株式会社丸井グループ代表取締役" disabled>
                            <span> 本</span>
                        </div>
                        @endif
                        <div class="divider"></div>
                        <div class="flex">
                            <label for="company_condolence_money1">弔慰金</label>
                            <input type="text" name="company_condolence_money1" id="company_floral_tribute1" value="{{$data['company_condolence_money1']}}" data-val="{{$data['company_condolence_money1']}}" disabled>
                            <span> 万円</span>
                        </div>

                        <div class="divider mtb10"></div>
                        <div class="flex">
                            <label for="company_name2">差出人２</label>
                            <input type="text" name="company_name2" id="company_name2" value="{{ $data['company_name2'] }}" data-val="{{ $data['company_name2'] }}" disabled>
                        </div>
                        <div class="divider"></div>
                        <div class="flex">
                            <label for="company_telegram2">弔電</label>
                            <input type="text" name="company_telegram2" id="company_telegram2" value="{{$data['company_telegram2']}}" data-val="{{$data['company_telegram2']}}" disabled>
                            <span> 通</span>
                        </div>
                        <div class="divider"></div>
                        <div class="flex">
                            <label for="company_floral_tribute2">供花</label>
                            <input type="text" name="company_floral_tribute2" id="company_floral_tribute2" value="{{$data['company_floral_tribute2']}}" data-val="{{$data['company_floral_tribute2']}}" disabled>
                            <span> 本</span>
                        </div>
                        <div class="divider"></div>
                        <div class="flex">
                            <label for="company_condolence_money2">弔慰金</label>
                            <input type="text" name="company_condolence_money2" id="company_condolence_money2" value="{{$data['company_condolence_money2']}}" data-val="{{$data['company_condolence_money2']}}" disabled>
                            <span> 万円</span>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--  右カラム-->
    <div class="col s4">
        <div class="card bdt-1">
            <div class="card-content">
                <div class="row">
                    <strong class="col s4">状態</strong>
                    <span class="col s5" id="js-status-str">@if($statusArray[$data['status']] == '最終確認済み')
                            完了
                        @else
                            {{ $statusArray[$data['status']] }}
                        @endif</span>
                    <span class="col s3"><a href="#" class="dropdown-trigger btn" data-target='dropdown1'>変更</a></span>
                    <!-- Dropdown Structure -->
                    <ul id='dropdown1' class='dropdown-content'>
                        @include('admin.adminStatus')
                    </ul>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s5">総務確認</strong>
                    <div class="switch col s7">
                        <label class="text-small">
                            未確認
                            <input type="checkbox" class="js-checker" name="general_affairs_confirmation" data-id="{{ $data['id'] }}" @if((int)$data['general_affairs_confirmation']==1) checked @endif>
                            <span class="lever"></span>
                            確認済み
                        </label>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s5 cyotai"><span style="--c:0.9">支部委員長/分会長</span></strong>
                    <div class="switch col s7">
                        <label class="text-small">
                            未確認
                            <input type="checkbox" class="js-checker" name="branch_chief_confirmation" data-id="{{ $data['id'] }}" @if((int)$data['branch_chief_confirmation']==1) checked @endif>
                            <span class="lever"></span>
                            確認済み
                        </label>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s5">所属長確認</strong>
                    <div class="switch col s7">
                        <label class="text-small">
                            未確認
                            <input type="checkbox" class="js-checker" name="supervisor_confirmation" data-id="{{ $data['id'] }}" @if((int)$data['supervisor_confirmation']==1) checked @endif>
                            <span class="lever"></span>
                            確認済み
                        </label>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">パスワード</strong>
                    <span class="col s8">{{ $data['password'] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">PDF</strong>
                    <span class="col s8">
                        @if((int)$data['final_confirmation']==1)
                            <a href="{{ route('admin.pdf',['id' => encrypt($data['id']), 'no'=>encrypt($data['related_employee_no']) ]) }}" class="waves-effect waves-light btn" target="_blank">PDF<i class="material-icons right">cloud_download</i></a>
                        @else
                            ー
                        @endif
                    </span>
                </div>

                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">登録日時</strong>
                    <span class="col s8">{{ $created_at }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">受付日時</strong>
                    <span class="col s8">{{ $reception_datetime }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">更新日時</strong>
                    <span class="col s8">{{ $updated_at }}</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">総務担当／秘書室</span>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">確認</strong>
                    <span class="col s8">{{ $general_affairs_confirmationArray[(int)$data['general_affairs_confirmation']] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">社員番号</strong>
                    <span class="col s8">{{ $data['general_affairs_employee_no'] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">
                        <ruby>氏名
                            <rt>&nbsp;</rt>
                        </ruby>
                    </strong>
                    <span class="col s8"><ruby>{{ $data['general_affairs_name'] }}<rt>{{ $data['general_affairs_kana'] }}</rt></ruby></span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">就業会社</strong>
                    <span class="col s8">@if($data['general_affairs_company'])
                            {{ $companiesArray[(int)$data['general_affairs_company']] }}
                        @endif</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">所属①</strong>
                    <span class="col s8">{{ $data['general_affairs_member1'] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">所属②</strong>
                    <span class="col s8">{{ $data['general_affairs_member021'] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">連絡先</strong>
                    <span class="col s8">
                        8-{{ $data['general_affairs_contact_toll1'] }}-{{ $data['general_affairs_contact_toll2'] }}（トール）<br>
                        {{ $data['general_affairs_contact_info'] }}（外線）<br>
                    </span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">備考</strong>
                    <span class="col s8">
                        {{ $data['general_affairs_misc'] }}
                    </span>
                </div>
            </div>
        </div>
        @if((int)$data['classification'] == 5 || (int)$data['classification'] == 6)
        @else
        <div class="card">
            <div class="card-content">
                <span class="card-title">直属の上司</span>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">確認</strong>
                    <span class="col s8">{{ $superiorArray[(int)$data['superior']] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">社員番号</strong>
                    <span class="col s8">{{ $data['superior_employee_no'] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">
                        <ruby>氏名
                            <rt>&nbsp;</rt>
                        </ruby>
                    </strong>
                    <span class="col s8"><ruby>{{ $data['superior_name'] }}<rt>{{ $data['superior_kana'] }}</rt></ruby></span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">就業会社</strong>
                    <span class="col s8">@if($data['superior_company'])
                            {{ $companiesArray[(int)$data['superior_company']] }}
                        @endif</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">所属①</strong>
                    <span class="col s8">{{ $data['superior_member1'] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">所属②</strong>
                    <span class="col s8">{{ $data['superior_member2'] }}</span>
                </div>
            </div>
        </div>
        @endif

        @if((int)$data['classification'] != 6)
        <div class="card">
            <div class="card-content">
                <span class="card-title">支部委員長/分会長</span>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">確認</strong>
                    <span class="col s8">{{ $branch_chief_confirmationArray[(int)$data['branch_chief_confirmation']] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">社員番号</strong>
                    <span class="col s8">{{ $data['branch_chief_employee_no'] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">
                        <ruby>氏名
                            <rt>&nbsp;</rt>
                        </ruby>
                    </strong>
                    <span class="col s8"><ruby>{{ $data['branch_chief_name'] }}<rt>{{ $data['branch_chief_kana'] }}</rt></ruby></span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">就業会社</strong>
                    <span class="col s8">@if($data['branch_chief_company'])
                            {{ $companiesArray[(int)$data['branch_chief_company']] }}
                        @endif</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">所属</strong>
                    <span class="col s8">{{ $data['branch_chief_member1'] }}</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">所属長</span>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">確認</strong>
                    <span class="col s8">{{ $supervisor_confirmationArray[(int)$data['supervisor_confirmation']] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">社員番号</strong>
                    <span class="col s8">{{ $data['supervisor_employee_no'] }}</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">
                        <ruby>氏名
                            <rt>&nbsp;</rt>
                        </ruby>
                    </strong>
                    <span class="col s8"><ruby>{{ $data['supervisor_name'] }}<rt>{{ $data['supervisor_kana'] }}</rt></ruby></span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">就業会社</strong>
                    <span class="col s8">@if($data['supervisor_company'])
                            {{ $companiesArray[(int)$data['supervisor_company']] }}
                        @endif</span>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <strong class="col s4">所属</strong>
                    <span class="col s8">{{ $data['supervisor_member1'] }}</span>
                </div>
            </div>
        </div>
        @endif

    </div>
    </main>
@endsection
