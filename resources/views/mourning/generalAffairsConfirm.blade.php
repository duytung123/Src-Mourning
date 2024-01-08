@extends('layoutManager')
@section('title', '総務担当確認場面 | 丸井グループ 弔事連絡表')
@section('content')
    <form method="post" action="{{ route('general_affairs.confirm.post') }}" name="form1">
    @csrf
    <!-- 総務担当の確認 -->
        <section class="section card grey lighten-5">
            <div class="card-content">
                <span class="card-title">総務担当の確認</span>
                <div class="divider"></div>
                <div class="section text-small">
                    <div class="row res-block">
                        <strong class="col s12 m4">@if((int)$input['reception'] == 0)未受付@else受付済み@endif</strong>
                        <p class="col s12 m8 wb">{{ $reception_datetime }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">確認</strong>
                        <p class="col s12 m8 wb">@if((int)$input['general_affairs_confirmation'] == 0)未確認@else確認済み@endif</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">社員番号</strong>
                        <p class="col s12 m8 wb">{{ $input['general_affairs_employee_no'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">氏名</strong>
                        <p class="col s12 m8 wb">{{ $input['general_affairs_name'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">フリガナ</strong>
                        <p class="col s12 m8 wb">{{ $input['general_affairs_kana'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">就業会社</strong>
                        <p class="col s12 m8 wb">{{ $companiesArray[$input['general_affairs_company']] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">所属①</strong>
                        <p class="col s12 m8 wb">{{ $input['general_affairs_member1'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">所属②</strong>
                        <p class="col s12 m8 wb">{{ $input['general_affairs_member2'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">連絡先（トール）</strong>
                        <p class="col s12 m8 wb">8 - {{ $input['general_affairs_contact_toll1'] }} - {{ $input['general_affairs_contact_toll2'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">外線</strong>
                        <p class="col s12 m8 wb">{{ $input['general_affairs_contact_info'] }}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">備考</strong>
                        <p class="col s12 m8 wb">{{ $input['general_affairs_misc'] }}</p>
                    </div>
                    <div class="divider"></div>
                </div>
            </div>
        </section>

        <section class="section card grey lighten-5">
            <div class="card-content">
                <span class="section card-title bg1-2">入力項目の確認</span>
                <div class="section text-small">
                    <div class="row res-block">
                        <strong class="col s12 m4">通夜の参列者</strong>
                        <p class="col s12 m8 wb">
                            @if(!$input['wake_attendees1'] && !$input['wake_attendees2'] && !$input['wake_attendees3'])参列なし@endif
                            @if($input['wake_attendees1']){{$input['wake_attendees1']}}<br>@endif
                            @if($input['wake_attendees2']){{$input['wake_attendees2']}}<br>@endif
                            @if($input['wake_attendees3']){{$input['wake_attendees3']}}<br>@endif
                            @if($input['wake_attendees']){{$input['wake_attendees']}}@endif
                        </p>
                    </div>
                    <div class="divider"></div>
                    <div class="row res-block">
                        <strong class="col s12 m4">告別式の参列者</strong>
                        <p class="col s12 m8 wb">
                            @if(!$input['funeral_attendees1'] && !$input['funeral_attendees2'] && !$input['funeral_attendees3'])参列なし@endif
                            @if($input['funeral_attendees1']){{$input['funeral_attendees1']}}<br>@endif
                            @if($input['funeral_attendees2']){{$input['funeral_attendees2']}}<br>@endif
                            @if($input['funeral_attendees3']){{$input['funeral_attendees3']}}<br>@endif
                            @if($input['funeral_attendees']){{$input['funeral_attendees']}}@endif
                        </p>
                    </div>
                    <div class="divider"></div>
                </div>
                <span class="mt50 card-title text-small">弔電・供花・弔慰金</span>
                <div class="section text-small grey lighten-2">
                    <div class="inner-block res-block">
                        <div><strong class="">福祉会規定</strong></div>
                        <div class="bd1"></div>
                        <div class="section grey lighten-5 bd1 text-small">
                            <div class="row">
                                <strong class="col s2 bg1">差出人１</strong>
                                <p class="col s10">{{ $input['social_name1'] }}</p>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2">弔電</strong>
                                <p class="col s10 wb deep-purple-text">@if((int)$input['social_telegram1_flg'] == 1)<i class="material-icons">remove</i>@else{{$input['social_telegram1']}} 通@endif</p>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2">供花</strong>
                                <p class="col s10 wb deep-purple-text">@if((int)$input['social_floral_tribute1_flg'] == 1)<i class="material-icons">remove</i>@else{{$input['social_floral_tribute1']}} 本@endif</p>
                            </div>
                            <div class="divider"></div>

                            <div class="row">
                                <strong class="col s2 bg1">差出人２</strong>
                                <p class="col s10">{{ $input['social_name2'] }}</p>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2">弔電</strong>
                                <p class="col s10 wb deep-purple-text">@if((int)$input['social_telegram2_flg'] == 1)<i class="material-icons">remove</i>@else{{$input['social_telegram2']}} 通@endif</p>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2">供花</strong>
                                <p class="col s10 wb deep-purple-text">@if((int)$input['social_floral_tribute2_flg'] == 1)<i class="material-icons">remove</i>@else{{$input['social_floral_tribute2']}} 本@endif</p>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2 bg1">差出人３</strong>
                                <p class="col s10">{{ $input['social_name2'] }}</p>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2">弔慰金</strong>
                                <p class="col s10 wb deep-purple-text">@if((int)$input['social_condolence_money3_flg'] == 1)<i class="material-icons">remove</i>@else{{$input['social_condolence_money3']}} 万円@endif</p>
                            </div>
                        </div>
                    </div>
                    <div class="inner-block res-block">
                        <div><strong class="">会社規定</strong></div>
                        <div class="bd1"></div>
                        <div class="section grey lighten-5 bd1 text-small">

                            <div class="row">
                                <strong class="col s2 bg1">差出人１</strong>
                                {{-- <p class="col s10">{{ $input['company_name1'] }}</p> --}}
                                 {{-- Edit by IVS 08/01/2024 --}}
                                @if ($input['company_name1'] == '')
                                    <p class="col s10">ー</p>
                                @endif
                                {{-- End edit by IVS 08/01/2024 --}}
                            </div>

                            @if((int)$input['company'] != 8 && (int)$input['company'] != 10)
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s12 wb deep-purple-text">@if((int)$input['company_attend1'] == 1)参列しない@elseif((int)$input['company_attend1'] == 2)参列する@endif</strong>
                            </div>
                            @endif
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2">弔電</strong>
                                {{-- Edit by IVS 01/12/2023 --}}
                                <p class="col s10 wb deep-purple-text">@if((int)$input['company_telegram1_flg'] == 1 || (int)$input['company_attend1'] == 2 )<i class="material-icons">remove</i>@elseif((int)$input['company_telegram2_flg'] == 0 || (int)$input['company_attend2'] == 1){{$input['company_telegram1']}} 通@endif</p>
                                {{-- End edit by IVS 01/12/2023 --}}
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2">供花</strong>
                                <p class="col s10 wb deep-purple-text">@if((int)$input['company_floral_tribute1_flg'] == 1)<i class="material-icons">remove</i>@else{{$input['company_floral_tribute1']}} 本@endif</p>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2">弔慰金@if((int)$input['company'] == 1) <br>差出人（G代表）@endif</strong>
                                <p class="col s10 wb deep-purple-text">@if((int)$input['company_condolence_money1_flg'] == 1)<i class="material-icons">remove</i>@else{{$input['company_condolence_money1']}} 万円@endif</p>
                            </div>
                            <div class="divider"></div>

                            <div class="row">
                                <strong class="col s2 bg1">差出人２</strong>
                                {{-- Edit by IVS 08/01/2024 --}}
                                {{-- <p class="col s10">{{ $input['company_name2'] }}</p> --}}
                                @if ($input['company_name2'] == '')
                                    <p class="col s10">ー</p>
                                @endif
                                {{-- End edit by IVS 08/01/2024 --}}
                            </div>

                            @if((int)$input['company'] != 8 && (int)$input['company'] != 10)
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s12 wb deep-purple-text">@if((int)$input['company_attend2'] == 1)参列しない@elseif((int)$input['company_attend2'] == 2)参列する@endif</strong>
                            </div>
                            @endif

                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2">弔電</strong>
                                {{-- Edit by IVS 01/12/2023 --}}
                                <p class="col s10 wb deep-purple-text">@if((int)$input['company_telegram2_flg'] == 1 || (int)$input['company_attend2'] == 2)<i class="material-icons">remove</i>@elseif((int)$input['company_telegram2_flg'] == 0 || (int)$input['company_attend2'] == 1) {{$input['company_telegram2']}} 通@endif</p>
                                {{-- End edit by IVS 01/12/2023 --}}
                            </div>
                            @if((int)$input['company'] == 8 || (int)$input['company'] == 10 || (int)$input['classification'] == 6)
                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2">供花</strong>
                                <p class="col s10 wb deep-purple-text">@if((int)$input['company_floral_tribute2_flg'] == 1)<i class="material-icons">remove</i>@else{{$input['company_floral_tribute2']}} 本@endif</p>
                            </div>
                            @endif

                            <div class="divider"></div>
                            <div class="row">
                                <strong class="col s2">弔慰金</strong>
                                <p class="col s10 wb deep-purple-text">@if((int)$input['company_condolence_money2_flg'] == 1)<i class="material-icons">remove</i>@else{{$input['company_condolence_money2']}} 万円@endif</p>
                            </div>
                            <div class="divider"></div>


                        </div>
                    </div>
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
