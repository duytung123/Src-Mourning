@extends('layout')
@section('title', '弔事連絡表 編集画面 | 丸井グループ 弔事連絡表')
@section('content')
    <div class="section row text-xsmall">
        <div class="col s12">
            <div class="card-panel teal lighten-5">
        <span class="teal-text text-darken-2">
            入力された情報の修正または、直属の上司の方の確認入力が可能です。 <br>
            内容を確認していただき、入力内容確認へお進みください。修正も可能です。
        </span>
            </div>
        </div>
    </div>
    <div class="row purple-accent-3"><i class="material-icons purple-accent-3">lens</i> 必須項目</div>
    <form action="{{ route('edit.post') }}" method="POST" onSubmit="return" id="related_employee_input" name="related_employee_input">
        @csrf
        <input type="radio" name="previous" @if (old('previous')) checked @endif style="display: none">
        <input type="hidden" name="id" value="{{ $session['id'] }}">
        <input type="hidden" name="password" value="{{ $session['password'] }}">
        <input type="hidden" name="status" value="1">
        <!-- 基本情報 -->
        <section class="section card grey lighten-5" id="js_create">
            <div class="card-content">
                <span class="card-title">基本情報</span>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <p class="col s12">入力者<sup><i class="tiny material-icons">lens</i></sup></p>
                        <label class="col">
                            <input type="radio" name="entrant" class="is-toggle" data-tgt="js_entrant" data-state="false" value="0" @if (old('entrant') == '0' || $session['entrant'] == '0' || ((old('entrant') != '1' && $session['entrant'] != '1'))) checked @endif required>
                            <span>本人(弔事当事者)</span>
                        </label>
                        <label class="col">
                            <input type="radio" name="entrant" class="is-toggle" data-tgt="js_entrant" data-state="true" value="1" @if (old('entrant') == '1' || $session['entrant'] == '1') checked @endif>
                            <span>代理者の入力@if (old('entrant') == '1' || $session['entrant'] == '1') active @endif</span>
                        </label>
                        @if ($errors->has('entrant'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('entrant') }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col m12 l6">

                            <!-- ▼▼弔事当事者情報▼▼ -->
                            <div class="white">
                                <div class="row">
                                    <span class="card-title text-small">本人(弔事当事者)</span>
                                    <div class="input-field col s12 m6">
                                        <input id="related_employee_no" name="related_employee_no" type="text" class="validate zen2half" pattern="[0-9]{7}" maxlength="7" minlength="7" required @if(old('related_employee_no')) value="old('related_employee_no')" @endif @if($session['related_employee_no']) value="{{$session['related_employee_no']}}" @endif>
                                        <label for="related_employee_no">社員番号<sup><i class="tiny material-icons">lens</i></sup></label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <input id="membership_year" name="membership_year" type="text" class="validate zen2half" pattern="[0-9]{4}" maxlength="4" minlength="4" required @if(old('membership_year')) value="old('membership_year')" @endif @if($session['membership_year']) value="{{$session['membership_year']}}" @endif>
                                        <label for="membership_year">入社年度<sup><i class="tiny material-icons">lens</i></sup></label>
                                    </div>
                                    @if ($errors->has('related_employee_no'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('related_employee_no') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="related_name" name="related_name" type="text" class="validate" required @if(old('related_name')) value="old('related_name')" @endif @if($session['related_name']) value="{{$session['related_name']}}" @endif>
                                        <label for="related_name">氏名<sup><i class="tiny material-icons">lens</i></sup></label>
                                    </div>
                                    @if ($errors->has('related_name'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('related_name') }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="input-field col s12 m6">
                                        <input id="related_kana" name="related_kana" type="text" class="validate hira2kana" pattern="[ 　\u30A0-\u30FF]+" required @if(old('related_kana')) value="old('related_kana')" @endif @if($session['related_kana']) value="{{$session['related_kana']}}" @endif>
                                        <label for="related_kana">フリガナ<sup><i class="tiny material-icons">lens</i></sup></label>
                                    </div>
                                    @if ($errors->has('related_kana'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('related_kana') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="input-field2 col s12 m6">
                                        <label for="classification">社員区分<sup><i class="tiny material-icons">lens</i></sup></label>
                                        <select name="classification" id="classification" class="required browser-default text-xSmall" required data-title="本人(弔事当事者)社員区分">
                                            @include('mourning.classifications')
                                        </select>
                                    </div>
                                    @if ($errors->has('classification'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('classification') }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="input-field2 col s12 m6">
                                        <label for="company">就業会社<sup><i class="tiny material-icons">lens</i></sup></label>
                                        <select name="company" id="company" class="required browser-default text-xSmall" required  data-title="本人(弔事当事者)就業会社">
                                            @include('mourning.companies')
                                        </select>
                                    </div>
                                    @if ($errors->has('company'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('company') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row" id="js_classification_check" style="display: none">
                                    <p class="col s12 text-small">直属の上司の確認<sup><i class="tiny material-icons">lens</i></sup></p>
                                    <label class="col">
                                        <input type="radio" name="classification_check" class="required" value="1" @if (old('classification_check') == '1' || (int)$session['classification_check'] == '1' || (int)$session['classification_check'] != '2') checked @endif>
                                        <span>必要</span>
                                    </label>
                                    <label class="col">
                                        <input type="radio" name="classification_check" class="" value="2" @if (old('classification_check') == '2' || (int)$session['classification_check'] == '2') checked @endif>
                                        <span>必要ない</span>
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="member1" name="member1" type="text" class="validate" placeholder="店/部/事業所を自由入力" @if(old('member1')) value="old('member1')" @endif @if($session['member1']) value="{{$session['member1']}}" @endif>
                                        <label for="member1">所属①</label>
                                    </div>
                                    @if ($errors->has('member1'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('member1') }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="input-field col s12 m6">
                                        <input id="member2" name="member2" type="text" class="validate" placeholder="ｼｮｯﾌﾟ/課/室/担当を自由入力" @if(old('member2')) value="old('member2')" @endif @if($session['member2']) value="{{$session['member2']}}" @endif>
                                        <label for="member2">所属②</label>
                                    </div>
                                    @if ($errors->has('member2'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('member2') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- ▲▲弔事当事者情報▲▲ -->
                        </div>
                        <div class="col m12 l6">
                            <!-- ▼▼代理入力の時表示▼▼ -->
                            <div id="js_entrant" class="grey lighten-3 toggle-body js-previous @if (old('entrant') == '1' || $session['entrant'] == '1') active @endif" data-previous="entrant">
                                <span class="card-title text-small">代理者</span>
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="entrant_employee_no" name="entrant_employee_no" type="text" class="validate zen2half required" pattern="[0-9]{7}" maxlength="7" minlength="7"  @if(old('entrant_employee_no')) value="old('entrant_employee_no')" @endif @if($session['entrant_employee_no']) value="{{$session['entrant_employee_no']}}" @endif>
                                        <label for="entrant_employee_no" class="@if(old('entrant_employee_no')) active @endif @if($session['entrant_employee_no'])  active @endif">社員番号<sup><i class="tiny material-icons">lens</i></sup></label>
                                    </div>
                                    @if ($errors->has('entrant_employee_no'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('entrant_employee_no') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="entrant_name" name="entrant_name" type="text" class="validate required" @if(old('entrant_name')) value="old('entrant_name')" @endif @if($session['entrant_name']) value="{{$session['entrant_name']}}" @endif>
                                        <label for="entrant_name" @if (old('entrant_name')) class="active" @endif>氏名<sup><i class="tiny material-icons">lens</i></sup></label>
                                    </div>
                                    @if ($errors->has('entrant_name'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('entrant_name') }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="input-field col s12 m6">
                                        <input id="entrant_kana" name="entrant_kana" type="text" class="validate hira2kana required" pattern="[ 　\u30A0-\u30FF]+" @if(old('entrant_kana')) value="old('entrant_kana')" @endif @if($session['entrant_kana']) value="{{$session['entrant_kana']}}" @endif>
                                        <label for="entrant_kana">フリガナ<sup><i class="tiny material-icons">lens</i></sup></label>
                                    </div>
                                    @if ($errors->has('entrant_kana'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('entrant_kana') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="input-field2 col s12 m6">
                                        <label for="entrant_classification">社員区分<sup><i class="tiny material-icons">lens</i></sup></label>
                                        <select name="entrant_classification" id="entrant_classification" class="required browser-default text-xSmall">
                                            @include('mourning.entrantClassifications')
                                        </select>
                                    </div>
                                    @if ($errors->has('entrant_classification'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('entrant_classification') }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="input-field2 col s12 m6">
                                        <label for="entrant_company">就業会社<sup><i class="tiny material-icons">lens</i></sup></label>
                                        <select name="entrant_company" id="entrant_company" class="required browser-default text-xSmall">
                                            @include('mourning.entrantCompanies')
                                        </select>
                                    </div>
                                    @if ($errors->has('entrant_company'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('entrant_company') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="entrant_member1" name="entrant_member1" type="text" class="validate" placeholder="店/部/事業所を自由入力" @if(old('entrant_member1')) value="old('entrant_member1')" @endif @if(array_key_exists('entrant_member1',$session )) value="{{$session['entrant_member1']}}" @endif>
                                        <label for="entrant_member1">所属①</label>
                                    </div>
                                    @if ($errors->has('entrant_member1'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('entrant_member1') }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="input-field col s12 m6">
                                        <input id="entrant_member2" name="entrant_member2" type="text" class="validate" placeholder="ｼｮｯﾌﾟ/課/室/担当を自由入力" @if(old('entrant_member2')) value="old('entrant_member2')" @endif @if(array_key_exists('entrant_member2',$session)) value="{{$session['entrant_member2']}}" @endif>
                                        <label for="entrant_member2">所属②</label>
                                    </div>
                                    @if ($errors->has('entrant_member2'))
                                        <div class="card section teal lighten-4 col s12">
                                            <div class="inner-block teal-text text-darken-4">
                                                {{ $errors->first('entrant_member2') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- ▲▲代理入力の時表示▲▲ -->
                        </div>
                    </div>
                    <!-- ▼▼故人様情報▼▼ -->
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="passed_away_name" name="passed_away_name" type="text" class="validate" required @if(old('passed_away_name')) value="old('passed_away_name')" @endif @if($session['passed_away_name']) value="{{$session['passed_away_name']}}" @endif>
                            <label for="passed_away_name">故人様氏名<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                        @if ($errors->has('passed_away_name'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('passed_away_name') }}
                                </div>
                            </div>
                        @endif
                        <div class="input-field col s12 m6">
                            <input id="passed_away_kana" name="passed_away_kana" type="text" class="validate hira2kana" pattern="[ 　\u30A0-\u30FF]+" required @if(old('passed_away_kana')) value="old('passed_away_kana')" @endif @if($session['passed_away_kana']) value="{{$session['passed_away_kana']}}" @endif>
                            <label for="passed_away_kana">故人様フリガナ<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                        @if ($errors->has('passed_away_kana'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('passed_away_kana') }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class=" col s12 m6">
                            <label for="passed_away_date">逝去日<sup><i class="tiny material-icons">lens</i></sup></label>
                            <input id="passed_away_date" name="passed_away_date" type="date" class="validate" required @if(old('passed_away_date')) value="old('passed_away_date')" @endif @if($session['passed_away_date']) value="{{$session['passed_away_date']}}" @endif required>
                        </div>
                        @if ($errors->has('passed_away_date'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('passed_away_date') }}
                                </div>
                            </div>
                        @endif
                        <div class=" col s12 m6">
                            <label for="passed_away_relationship">本人(弔事当事者)との続柄<sup><i class="tiny material-icons">lens</i></sup></label>
                            <select name="passed_away_relationship" id="passed_away_relationship" class="required browser-default text-xSmall" required>
                                @include('mourning.passedAwayRelationship')
                            </select>
                        </div>
                        @if ($errors->has('passed_away_relationship'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('passed_away_relationship') }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- ▲▲故人様情報▲▲ -->

                </div>
            </div>
        </section>

        <!-- 社内親族 -->
        <section class="section card grey lighten-5">
            <div class="card-content">
                <span class="card-title">社内親族</span>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <p class="col s12">社内親族<sup><i class="tiny material-icons">lens</i></sup></p>
                        <label class="col">
                            <input type="radio" name="inlaws" class="is-toggle" data-tgt="js_inlaws" data-state="false" value="0" required @if(old('inlaws') =='0' || $session['inlaws'] == '0' || (old('inlaws') !='1' && $session['inlaws'] != '1')) checked @endif>
                            <span>なし</span>
                        </label>
                        <label class="col">
                            <input type="radio" name="inlaws" class="is-toggle" data-tgt="js_inlaws" data-state="true" value="1" @if(old('inlaws') == '1' || $session['inlaws'] == '1') checked @endif>
                            <span>あり</span>
                        </label>
                        @if ($errors->has('inlaws'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('inlaws') }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- ▼▼社内親族の時表示▼▼ -->
                    <div id="js_inlaws" class="grey lighten-3 toggle-body @if(old('inlaws') == '1' || $session['inlaws'] == '1') active @endif">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="inlaws_employee_no" name="inlaws_employee_no" type="text" class="validate zen2half required" pattern="[0-9]{7}" maxlength="7" minlength="7"  @if(old('inlaws_employee_no')) value="old('inlaws_employee_no')" @endif @if($session['inlaws_employee_no']) value="{{$session['inlaws_employee_no']}}" @endif>
                                <label for="inlaws_employee_no">社内親族の社員番号<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('inlaws_employee_no'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('inlaws_employee_no') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="inlaws_name" name="inlaws_name" type="text" class="validate required" @if(old('inlaws_name')) value="old('inlaws_name')" @endif @if($session['inlaws_name']) value="{{$session['inlaws_name']}}" @endif>
                                <label for="inlaws_name">氏名<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('inlaws_name'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('inlaws_name') }}
                                    </div>
                                </div>
                            @endif
                            <div class="input-field col s12 m6">
                                <input id="inlaws_kana" name="inlaws_kana" type="text" class="validate hira2kana required" pattern="[ 　\u30A0-\u30FF]+" @if(old('inlaws_kana')) value="old('inlaws_kana')" @endif @if($session['inlaws_kana']) value="{{$session['inlaws_kana']}}" @endif>
                                <label for="inlaws_kana">フリガナ<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('inlaws_kana'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('inlaws_kana') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="input-field2 col s12 m6">
                                <label for="inlaws_company">就業会社<sup><i class="tiny material-icons">lens</i></sup></label>
                                <select name="inlaws_company" id="inlaws_company" class="required browser-default text-xSmall">
                                    @include('mourning.inlawsCompanies')
                                </select>
                            </div>
                            @if ($errors->has('inlaws_company'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('inlaws_company') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="inlaws_member1" name="inlaws_member1" type="text" class="validate" placeholder="店/部/事業所を自由入力" @if(old('inlaws_member1')) value="old('inlaws_member1')" @endif @if($session['inlaws_member1']) value="{{$session['inlaws_member1']}}" @endif>
                                <label for="inlaws_member1">所属①</label>
                            </div>
                            @if ($errors->has('inlaws_member1'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('inlaws_member1') }}
                                    </div>
                                </div>
                            @endif
                            <div class="input-field col s12 m6">
                                <input id="inlaws_member2" name="inlaws_member2" type="text" class="validate" placeholder="ｼｮｯﾌﾟ/課/室/担当を自由入力" @if(old('inlaws_member2')) value="old('inlaws_member2')" @endif @if($session['inlaws_member2']) value="{{$session['inlaws_member2']}}" @endif>
                                <label for="inlaws_member2">所属②</label>
                            </div>
                            @if ($errors->has('inlaws_member2'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('inlaws_member2') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <p class="col s12">供花/弔電の手配<sup><i class="tiny material-icons">lens</i></sup></p>
                            <label class="col s12">
                                <input type="radio" name="inlaws_condolence" class="required" value="0" @if(old('inlaws_condolence') == '0') checked @endif @if($session['inlaws_condolence'] == '0') checked @endif>
                                <span>自分の事業所からの手配を優先する</span>
                            </label>
                            <label class="col s12">
                                <input type="radio" name="inlaws_condolence" value="1" @if(old('inlaws_condolence') == '1') checked @endif @if($session['inlaws_condolence'] == '1') checked @endif>
                                <span>親族の事業所からの手配を優先する</span>
                            </label>
                            @if ($errors->has('inlaws_condolence'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('inlaws_condolence') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- ▲▲社内親族の時表示▲▲ -->

                </div>
            </div>
        </section>

        <!-- 通夜 -->
        <section class="section card grey lighten-5">
            <div class="card-content">
                <span class="card-title">通夜</span>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <p class="col s12">通夜を行う<sup><i class="tiny material-icons">lens</i></sup></p>
                        <label class="col">
                            <input type="radio" name="wake" class="is-toggle" data-tgt="js_wake" data-state="true" value="0" required @if(old('wake') == '0' || $session['wake'] == '0' || (old('wake') != '1' && $session['wake'] != '1')) checked @endif>
                            <span>通夜を行う</span>
                        </label>
                        <label class="col">
                            <input type="radio" name="wake" class="is-toggle" data-tgt="js_wake" data-state="false" value="1" @if(old('wake') == '1' || $session['wake'] == '1') checked @endif>
                            <span>通夜を行なわない</span>
                        </label>
                        @if ($errors->has('wake'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('wake') }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- ▼▼通夜を行う場合の表示▼▼ -->
                    <div id="js_wake" class="grey lighten-3 toggle-body @if(old('wake') == '0' || $session['wake'] == '0' || (old('wake') != '1' && $session['wake'] != '1')) active @endif">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="wake_date" name="wake_date" type="date" class="validate required" @if(old('wake_date')) value="old('wake_date')" @endif @if($session['wake_date']) value="{{$session['wake_date']}}" @endif{{$disabled['wake_req']}}>
                                <label for="wake_date">通夜の日付<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('wake_date'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('wake_date') }}
                                    </div>
                                </div>
                            @endif
                            <div class="input-field col s6 m3">
                                <input id="wake_time_start" name="wake_time_start" type="time" class="validate required" @if(old('wake_time_start')) value="old('wake_time_start')" @endif @if($session['wake_time_start']) value="{{$session['wake_time_start']}}" @endif{{$disabled['wake_req']}}>
                                <label for="wake_time_start">通夜の開始時刻<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('wake_time_start'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('wake_time_start') }}
                                    </div>
                                </div>
                            @endif
                            <div class="input-field col s6 m3">
                                <input id="wake_time_end" name="wake_time_end" type="time" class="validate required" @if(old('wake_time_end')) value="old('wake_time_end')" @endif @if($session['wake_time_end']) value="{{$session['wake_time_end']}}" @endif{{$disabled['wake_req']}}>
                                <label for="wake_time_end">通夜の終了時刻<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('wake_time_end'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('wake_time_end') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="wake_ceremony" name="wake_ceremony" type="text" class="validate text-small required" @if(old('wake_ceremony')) value="old('wake_ceremony')" @endif @if($session['wake_ceremony']) value="{{$session['wake_ceremony']}}" @endif{{$disabled['wake_req']}}>
                                <label for="wake_ceremony">通夜の式場名<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('wake_ceremony'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('wake_ceremony') }}
                                    </div>
                                </div>
                            @endif
                            <div class="input-field col s12 m6">
                                <input id="wake_ceremony_zip" name="wake_ceremony_zip" type="text" class="validate zen2half zip required" pattern="[0-9]{3}[-−ー]?[0-9]{4}" minlength="7" maxlength="8" onfocusout="AjaxZip3.zip2addr(this,'','wake_ceremony_addr1','wake_ceremony_addr1');" @if(old('wake_ceremony_zip')) value="old('wake_ceremony_zip')" @endif @if($session['wake_ceremony_zip']) value="{{$session['wake_ceremony_zip']}}" @endif{{$disabled['wake_req']}}>
                                <label for="wake_ceremony_zip">通夜の式場の郵便番号<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('wake_ceremony_zip'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('wake_ceremony_zip') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="wake_ceremony_addr1" name="wake_ceremony_addr1" type="text" class="validate text-small required" @if(old('wake_ceremony_addr1')) value="old('wake_ceremony_addr1')" @endif @if($session['wake_ceremony_addr1']) value="{{$session['wake_ceremony_addr1']}}" @endif{{$disabled['wake_req']}}>
                                <label for="wake_ceremony_addr1">住所<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('wake_ceremony_addr1'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('wake_ceremony_addr1') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="wake_ceremony_addr2" name="wake_ceremony_addr2" type="text" class="validate text-small required" @if(old('wake_ceremony_addr2')) value="old('wake_ceremony_addr2')" @endif @if($session['wake_ceremony_addr2']) value="{{$session['wake_ceremony_addr2']}}" @endif{{$disabled['wake_req']}}>
                                <label for="wake_ceremony_addr2">番地以降<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('wake_ceremony_addr2'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('wake_ceremony_addr2') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="wake_ceremony_tel" name="wake_ceremony_tel" type="text" class="validate zen2half required" pattern="[0-9\-−ー\+＋ 　]+" @if(old('wake_ceremony_tel')) value="old('wake_ceremony_tel')" @endif @if($session['wake_ceremony_tel']) value="{{$session['wake_ceremony_tel']}}" @endif{{$disabled['wake_req']}}>
                                <label for="wake_ceremony_tel">電話番号<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('wake_ceremony_tel'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('wake_ceremony_tel') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="wake_ceremony_url" name="wake_ceremony_url" type="url" class="validate zen2half" @if(old('wake_ceremony_url')) value="old('wake_ceremony_url')" @endif @if($session['wake_ceremony_url']) value="{{$session['wake_ceremony_url']}}" @endif placeholder="https://">
                                <label for="wake_ceremony_url">URL</label>
                                <div class="url-cyeck text-xSmall" id="wake_ceremony_url_check" style="display: none"><a href="" target="_blank" class="btn btn-small waves-effect waves-light deep-purple lighten-4 grey-text text-darken-2">サイトチェック</a></div>
                            </div>
                            @if ($errors->has('wake_ceremony_url'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('wake_ceremony_url') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <label class="col s12 label" for="wake_ceremony_access">交通手段</label>
                            <div class="col s12">
                                <textarea id="wake_ceremony_access" name="wake_ceremony_access" class="validate text-small grey lighten-5" rows="5">@if(old('wake_ceremony_access'))old('wake_ceremony_access')@elseif($session['wake_ceremony_access']){{$session['wake_ceremony_access']}}@endif</textarea>
                            </div>
                            @if ($errors->has('wake_ceremony_access'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('wake_ceremony_access') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- ▲▲通夜を行う場合の表示▲▲ -->

                </div>
            </div>
        </section>

        <!-- 告別式 -->
        <section class="section card grey lighten-5">
            <div class="card-content">
                <span class="card-title">告別式</span>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <p class="col s12">告別式を行う<sup><i class="tiny material-icons">lens</i></sup></p>
                        <label class="col">
                            <input type="radio" name="funeral" class="is-toggle" data-tgt="js_funeral" data-state="true" value="0" required @if(old('funeral') == '0' || $session['funeral'] == '0' || (old('funeral') != '1' && $session['funeral'] != '1')) checked @endif>
                            <span>告別式を行う</span>
                        </label>
                        <label class="col">
                            <input type="radio" name="funeral" class="is-toggle" data-tgt="js_funeral" data-state="false" value="1" @if(old('funeral') == '1' || $session['funeral'] == '1') checked @endif>
                            <span>告別式を行わない</span>
                        </label>
                        @if ($errors->has('funeral'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('funeral') }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- ▼▼告別式を行う場合の表示▼▼ -->
                    <div id="js_funeral" class="grey lighten-3 toggle-body @if(old('funeral') == '0' || $session['funeral'] == '0' || (old('funeral') != '1' && $session['funeral'] != '1')) active @endif">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="funeral_date" name="funeral_date" type="date" class="validate required" @if(old('funeral_date')) value="old('funeral_date')" @endif @if($session['funeral_date']) value="{{$session['funeral_date']}}" @endif{{$disabled['funeral_req']}}>
                                <label for="funeral_date">告別式の日付<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('funeral_date'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('funeral_date') }}
                                    </div>
                                </div>
                            @endif
                            <div class="input-field col s6 m3">
                                <input id="funeral_time_start" name="funeral_time_start" type="time" class="validate required" @if(old('funeral_time_start')) value="old('funeral_time_start')" @endif @if($session['funeral_time_start']) value="{{$session['funeral_time_start']}}" @endif{{$disabled['funeral_req']}}>
                                <label for="funeral_time_start">告別式の開始時刻<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('funeral_time_start'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('funeral_time_start') }}
                                    </div>
                                </div>
                            @endif
                            <div class="input-field col s6 m3">
                                <input id="funeral_time_end" name="funeral_time_end" type="time" class="validate required" @if(old('funeral_time_end')) value="old('funeral_time_end')" @endif @if($session['funeral_time_end']) value="{{$session['funeral_time_end']}}" @endif{{$disabled['funeral_req']}}>
                                <label for="funeral_time_end">告別式の終了時刻<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            @if ($errors->has('funeral_time_end'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('funeral_time_end') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <p class="col s12">通夜と同じ式場<sup><i class="tiny material-icons">lens</i></sup></p>
                            <label class="col">
                                <input type="radio" name="funeral_same_ceremony" class="is-toggle" data-tgt="js_funeral_same_ceremony" data-state="false" value="0" class="required" @if(old('funeral_same_ceremony') == '0' || $session['funeral_same_ceremony'] == '0' || (old('funeral_same_ceremony') != '1' && $session['funeral_same_ceremony'] != '1')) checked @endif{{$disabled['funeral_req']}}>
                                <span>通夜と同じ式場</span>
                            </label>
                            <label class="col">
                                <input type="radio" name="funeral_same_ceremony" class="is-toggle" data-tgt="js_funeral_same_ceremony" data-state="true" value="1" @if(old('funeral_same_ceremony') == '1' || $session['funeral_same_ceremony'] == '1') checked @endif{{$disabled['funeral_req']}}>
                                <span>通夜と異なる式場</span>
                            </label>
                            @if ($errors->has('funeral_same_ceremony'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('funeral_same_ceremony') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div id="js_funeral_same_ceremony" class="grey lighten-3 toggle-body @if(old('funeral_same_ceremony') == '1' || $session['funeral_same_ceremony'] == '1') active @endif">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="funeral_ceremony" name="funeral_ceremony" type="text" class="validate text-small required" @if(old('funeral_ceremony')) value="old('funeral_ceremony')" @endif @if($session['funeral_ceremony']) value="{{$session['funeral_ceremony']}}" @endif{{$disabled['funeral_req']}}>
                                    <label for="funeral_ceremony">告別式の式場名<sup><i class="tiny material-icons">lens</i></sup></label>
                                </div>
                                @if ($errors->has('funeral_ceremony'))
                                    <div class="card section teal lighten-4 col s12">
                                        <div class="inner-block teal-text text-darken-4">
                                            {{ $errors->first('funeral_ceremony') }}
                                        </div>
                                    </div>
                                @endif
                                <div class="input-field col s12 m6">
                                    <input id="funeral_ceremony_zip" name="funeral_ceremony_zip" type="text" class="validate zen2half zip required" pattern="[0-9]{3}[-−ー]?[0-9]{4}" minlength="7" maxlength="8" onfocusout="AjaxZip3.zip2addr(this,'','funeral_ceremony_addr1','funeral_ceremony_addr1');" @if(old('funeral_ceremony_zip')) value="old('funeral_ceremony_zip')" @endif @if($session['funeral_ceremony_zip']) value="{{$session['funeral_ceremony_zip']}}" @endif{{$disabled['funeral_req']}}>
                                    <label for="funeral_ceremony_zip">告別式の式場の郵便番号<sup><i class="tiny material-icons">lens</i></sup></label>
                                </div>
                                @if ($errors->has('funeral_ceremony_zip'))
                                    <div class="card section teal lighten-4 col s12">
                                        <div class="inner-block teal-text text-darken-4">
                                            {{ $errors->first('funeral_ceremony_zip') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="funeral_ceremony_addr1" name="funeral_ceremony_addr1" type="text" class="validate text-small required" @if(old('funeral_ceremony_addr1')) value="old('funeral_ceremony_addr1')" @endif @if($session['funeral_ceremony_addr1']) value="{{$session['funeral_ceremony_addr1']}}" @endif{{$disabled['funeral_req']}}>
                                    <label for="funeral_ceremony_addr1">住所<sup><i class="tiny material-icons">lens</i></sup></label>
                                </div>
                                @if ($errors->has('funeral_ceremony_addr1'))
                                    <div class="card section teal lighten-4 col s12">
                                        <div class="inner-block teal-text text-darken-4">
                                            {{ $errors->first('funeral_ceremony_addr1') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="funeral_ceremony_addr2" name="funeral_ceremony_addr2" type="text" class="validate text-small required" @if(old('funeral_ceremony_addr2')) value="old('funeral_ceremony_addr2')" @endif @if($session['funeral_ceremony_addr2']) value="{{$session['funeral_ceremony_addr2']}}" @endif{{$disabled['funeral_req']}}>
                                    <label for="funeral_ceremony_addr2">番地以降<sup><i class="tiny material-icons">lens</i></sup></label>
                                </div>
                                @if ($errors->has('funeral_ceremony_addr2'))
                                    <div class="card section teal lighten-4 col s12">
                                        <div class="inner-block teal-text text-darken-4">
                                            {{ $errors->first('funeral_ceremony_addr2') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="funeral_ceremony_tel" name="funeral_ceremony_tel" type="text" class="validate zen2half required" pattern="[0-9\-−ー\+＋ 　]+" @if(old('funeral_ceremony_tel')) value="old('funeral_ceremony_tel')" @endif @if($session['funeral_ceremony_tel']) value="{{$session['funeral_ceremony_tel']}}" @endif{{$disabled['funeral_req']}}>
                                    <label for="funeral_ceremony_tel">電話番号<sup><i class="tiny material-icons">lens</i></sup></label>
                                </div>
                                @if ($errors->has('funeral_ceremony_tel'))
                                    <div class="card section teal lighten-4 col s12">
                                        <div class="inner-block teal-text text-darken-4">
                                            {{ $errors->first('funeral_ceremony_tel') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="funeral_ceremony_url" name="funeral_ceremony_url" type="url" class="validate zen2half" @if(old('funeral_ceremony_url')) value="old('funeral_ceremony_url')" @endif @if($session['funeral_ceremony_url']) value="{{$session['funeral_ceremony_url']}}" @endif placeholder="https://">
                                    <label for="funeral_ceremony_url">URL</label>
                                    <div class="url-cyeck text-xSmall" id="funeral_ceremony_url_check" style="display: none"><a href="" target="_blank" class="btn btn-small waves-effect waves-light deep-purple lighten-4 grey-text text-darken-2">サイトチェック</a></div>

                                </div>
                                @if ($errors->has('funeral_ceremony_url'))
                                    <div class="card section teal lighten-4 col s12">
                                        <div class="inner-block teal-text text-darken-4">
                                            {{ $errors->first('funeral_ceremony_url') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <label for="funeral_ceremony_access" class="col s12 label">交通手段</label>
                                <div class="col s12">
                                    <textarea id="funeral_ceremony_access" name="funeral_ceremony_access" class="validate text-small grey lighten-5">@if(old('funeral_ceremony_access'))old('funeral_ceremony_access')@elseif($session['funeral_ceremony_access']){{$session['funeral_ceremony_access']}}@endif</textarea>
                                </div>
                                @if ($errors->has('funeral_ceremony_access'))
                                    <div class="card section teal lighten-4 col s12">
                                        <div class="inner-block teal-text text-darken-4">
                                            {{ $errors->first('funeral_ceremony_access') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <input id="funeral_attendees" name="funeral_attendees" type="hidden" class="validate">
                    </div>
                    <!-- ▲▲告別式を行う場合の表示▲▲ -->
                </div>
            </div>
        </section>

        <!-- 喪主 -->
        <section class="section card grey lighten-5">
            <div class="card-content">
                <span class="card-title">喪主</span>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <p class="col s12">本人(弔事当事者)喪主<sup><i class="tiny material-icons">lens</i></sup></p>
                        <label class="col">
                            <input type="radio" name="chief_mourner" id="chief_mourner0" class="is-toggle" data-tgt="js_chief_mourner" data-state="false" value="0" required @if(old('chief_mourner') == '0' || $session['chief_mourner'] == '0') checked @endif>
                            <span>本人喪主</span>
                        </label>
                        <label class="col">
                            <input type="radio" name="chief_mourner" id="chief_mourner1" class="is-toggle" data-tgt="js_chief_mourner" data-state="true" value="1" @if(old('chief_mourner') == '1' || $session['chief_mourner'] == '1') checked @endif>
                            <span>本人以外が喪主</span>
                        </label>
                    </div>

                    <div id="js_chief_mourner" class="grey lighten-3 toggle-body @if(old('chief_mourner') == '1' || $session['chief_mourner'] == '1') active @endif">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="chief_mourner_name" name="chief_mourner_name" type="text" class="validate required" @if(old('chief_mourner_name')) value="old('chief_mourner_name')" @endif @if($session['chief_mourner_name']) value="{{$session['chief_mourner_name']}}" @endif>
                                <label for="chief_mourner_name">喪主の氏名<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="chief_mourner_kana" name="chief_mourner_kana" type="text" class="validate hira2kana required" pattern="[ 　\u30A0-\u30FF]+" @if(old('chief_mourner_kana')) value="old('chief_mourner_kana')" @endif @if($session['chief_mourner_kana']) value="{{$session['chief_mourner_kana']}}" @endif>
                                <label for="chief_mourner_kana">喪主のフリガナ<sup><i class="tiny material-icons">lens</i></sup></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field2 col s12 m6">
                                <label for="chief_mourner_relationship">本人(弔事当事者)と喪主の続柄<sup><i class="tiny material-icons">lens</i></sup></label>
                                <select id="chief_mourner_relationship" name="chief_mourner_relationship" class="required browser-default text-xSmall">
                                    @include('mourning.chiefMournerRelationship')
                                </select>
                            </div>
                            @if ($errors->has('chief_mourner_relationship'))
                                <div class="card section teal lighten-4 col s12">
                                    <div class="inner-block teal-text text-darken-4">
                                        {{ $errors->first('chief_mourner_relationship') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- その他 -->
        <section class="section card grey lighten-5">
            <div class="card-content">
                <span class="card-title">その他</span>
                <div class="divider"></div>
                <div class="section">

                    <div class="row">
                        <p class="col s12">弔問を辞退します</p>
                        <label class="col">
                            <input type="radio" name="condolence" value="1" @if(old('condolence') == '1') checked @endif @if(array_key_exists('condolence', $session)) @if($session['condolence'] == '1') checked @endif @endif>
                            <span>はい</span>
                        </label>
                        <label class="col">
                            <input type="radio" name="condolence" value="2" @if(old('condolence') == '2') checked @endif @if(array_key_exists('condolence', $session)) @if($session['condolence'] == '2') checked @endif @endif>
                            <span>いいえ</span>
                        </label>
                    </div>
                    <div class="row">
                        <p class="col s12">供花を辞退します</p>
                        <label class="col">
                            <input type="radio" name="floral_tribute" value="1" @if(old('floral_tribute') == '1') checked @endif @if(array_key_exists('floral_tribute', $session)) @if($session['floral_tribute'] == '1') checked @endif @endif>
                            <span>はい</span>
                        </label>
                        <label class="col">
                            <input type="radio" name="floral_tribute" value="2" @if(old('floral_tribute') == '2') checked @endif @if(array_key_exists('floral_tribute', $session)) @if($session['floral_tribute'] == '2') checked @endif @endif>
                            <span>いいえ</span>
                        </label>
                    </div>
                    <div class="row">
                        <p class="col s12">弔電を辞退します</p>
                        <label class="col">
                            <input type="radio" name="telegram" value="1" @if(old('telegram') == '1') checked @endif @if(array_key_exists('telegram', $session)) @if($session['telegram'] == '1') checked @endif @endif>
                            <span>はい</span>
                        </label>
                        <label class="col">
                            <input type="radio" name="telegram" value="2" @if(old('telegram') == '2') checked @endif @if(array_key_exists('telegram', $session)) @if($session['telegram'] == '2') checked @endif @endif>
                            <span>いいえ</span>
                        </label>
                    </div>
                    <div class="row">
                        <p class="col s12 label">全社FAX/Gネット掲示へ掲載を希望します<sup><i class="tiny material-icons">lens</i></sup>
                        </p>
                        <label class="col">
                            <input type="radio" name="fax_posting" value="0" required @if(old('fax_posting') == '0' || $session['fax_posting'] == '0') checked @endif>
                            <span>はい</span>
                        </label>
                        <label class="col">
                            <input type="radio" name="fax_posting" value="1" @if(old('fax_posting') == '1' || $session['fax_posting'] == '1') checked @endif>
                            <span>いいえ</span>
                        </label>
                        <div class="col s12 caption text-xsmall">※逝去者が「別居祖父母・義兄弟姉妹」の場合は原則として「いいえ」を選択してください</div>
                    </div>
                    <div class="row">
                        <label for="remarks" class="col s12 label">備考</label>
                        <div class="col s12">
                            <textarea class="text-small" name="remarks" id="remarks" rows="5">@if(old('remarks'))old('remarks')@elseif($session['remarks']){{$session['remarks']}}@endif</textarea>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <section class="section center-align">
            <div class="">
                <button type="submit" class="waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2" role="button">
                    【本人(弔事当事者)】入力内容確認<i class="material-icons right">chevron_right</i></button>
            </div>
        </section>
    </form>

    <div class="section row text-xsmall mt100">
        <div class="col s12">
            <div class="card-panel teal lighten-5">
        <span class="teal-text text-darken-2">
            直属の上司の方は上記の内容を確認していただき、ご自分の情報を入力後、入力内容確認へお進みください。
        </span>
            </div>
        </div>
    </div>
    <form action="{{ route('entrant.post') }}" method="POST" onSubmit="return" id="entrant_employee_input" name="entrant_employee_input">
    @csrf
        <input type="hidden" name="id" value="{{ $session['id'] }}">
        <input type="hidden" name="password" value="{{ $session['password'] }}">
        <input type="hidden" name="related_employee_no" value="{{ $session['related_employee_no'] }}">
        <input type="hidden" name="company" value="{{ $session['company'] }}">
        <input type="hidden" name="wake" value="{{ $session['wake'] }}" data-true="0">
        <input type="hidden" name="funeral" value="{{ $session['funeral'] }}" data-true="0">
        <input type="hidden" name="condolence" value="{{ $session['condolence'] }}" data-true="1" data-false="2">
        <input type="hidden" name="floral_tribute" value="{{ $session['floral_tribute'] }}"  data-true="1" data-false="2">
        <input type="hidden" name="telegram" value="{{ $session['telegram'] }}" data-true="1" data-false="2">
        <input type="hidden" name="classification" value="{{ $session['classification'] }}">
        <input type="hidden" name="passed_away_relationship" value="{{ $session['passed_away_relationship'] }}">
        <input type="hidden" name="chief_mourner" value="{{ $session['chief_mourner'] }}" data-true="0">

        <!-- 直属の上司確認 -->
        <section class="section card grey lighten-5" id="js_create">
            <div class="card-content">
                <span class="card-title">直属の上司の確認</span>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <p class="col s12">確認<sup><i class="tiny material-icons">lens</i></sup></p>
                        <label class="col">
                            <input type="checkbox" name="status" class="is-toggle" data-tgt="js_superior" data-state="true" value="2" @if (old('status') == 2 || $session['status'] == 2) checked @endif required>
                            <span>確認済み</span>
                        </label>
                        @if ($errors->has('status'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('status') }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- ▼▼直属の上司情報▼▼ -->
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="superior_employee_no" name="superior_employee_no" type="text" class="validate zen2half" pattern="[0-9]{7}" maxlength="7" minlength="7" required value="{{$session['superior_employee_no']}}">
                            <label for="superior_employee_no">直属の上司の社員番号<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                        @if ($errors->has('superior_employee_no'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('superior_employee_no') }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="superior_name" name="superior_name" type="text" class="validate" required value="{{$session['superior_name']}}">
                            <label for="superior_name">氏名<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                        @if ($errors->has('superior_name'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('superior_name') }}
                                </div>
                            </div>
                        @endif
                        <div class="input-field col s12 m6">
                            <input id="superior_kana" name="superior_kana" type="text" class="validate hira2kana" pattern="[ 　\u30A0-\u30FF]+" required value="{{$session['superior_kana']}}">
                            <label for="superior_kana">フリガナ<sup><i class="tiny material-icons">lens</i></sup></label>
                        </div>
                        @if ($errors->has('superior_kana'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('superior_kana') }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="input-field2 col s12 m6">
                            <label for="superior_company">就業会社<sup><i class="tiny material-icons">lens</i></sup></label>
                            <select name="superior_company" id="superior_company" class="required browser-default text-xSmall" required>
                                @include('mourning.superiorCompanies')
                            </select>
                        </div>
                        @if ($errors->has('superior_company'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('superior_company') }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="superior_member1" name="superior_member1" type="text" class="validate" placeholder="店/部/事業所を自由入力" value="{{$session['superior_member1']}}">
                            <label for="superior_member1">所属①</label>
                        </div>
                        @if ($errors->has('superior_member1'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('superior_member1') }}
                                </div>
                            </div>
                        @endif
                        <div class="input-field col s12 m6">
                            <input id="superior_member2" name="superior_member2" type="text" class="validate" placeholder="ｼｮｯﾌﾟ/課/室/担当を自由入力" value="{{$session['superior_member2']}}">
                            <label for="superior_member2">所属②</label>
                        </div>
                        @if ($errors->has('superior_member2'))
                            <div class="card section teal lighten-4 col s12">
                                <div class="inner-block teal-text text-darken-4">
                                    {{ $errors->first('superior_member2') }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- ▲▲直属の上司情報▲▲ -->

                </div>

                <section class="section center-align">
                    <div class="row">
                        <button type="submit" class="col s12 waves-effect waves-light btn btn-large deep-purple lighten-4 grey-text text-darken-2" role="button">
                            【直属の上司】入力内容確認<i class="material-icons right">chevron_right</i></button>
                    </div>
                </section>
            </div>
        </section>


    </form>
@endsection
