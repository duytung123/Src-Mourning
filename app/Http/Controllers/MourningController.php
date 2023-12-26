<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiefMournerRelationship;
use App\Models\Classification;
use App\Models\Company;
use App\Models\ContactInfo;
use App\Models\PassedAwayRelationship;
use App\Models\Status;
use App\Http\Requests\MourningRequest;
//use Illuminate\Http\Response;
//use Illuminate\Support\Facades\App;
//use Illuminate\Support\Facades\DB;
//use Illuminate\View\View;
//use MongoDB\Driver\Session;
//use Illuminate\Validation\Validator;

use DateTime;

class MourningController extends Controller
{
    /**
     * @var string[]
     * @array chief_mourner_relationship(社員との関係): [1:パートナー, 2:実・義父母, 3:実・義祖父母, 4:実・義兄弟姉妹, 5:子供, 6:叔父（伯父）・叔母（伯母）, 7:甥・姪, 8:その他]
     * @array classification(社員区分): [1:G, 2:S1, 3:S2, 4:E, 5:GM, 6:役員, 7:社員T（組合加入）, 8:社員T（組合未加入）]
     * @array company(就業会社): [1:丸井グループ, 2:丸井, 3:エポスカード, 4:MRI債権回収, 5:エポス少額短期保険, 6:エイムクリエイツ, 7:エムアンドシーシステム, 8:マルイファシリティーズ, 9:ムービング, 10:マルイホームサービス, 11:マルイキットセンター, 12:tsumiki証券, 13:D2C&Co., 14:okos, 15:丸井健康保険組合, 16:マルイグループユニオン・福祉会]
     * @array passed_away_relationship(故人との関係):[1:本人, 2:パートナー・子, 3:実父母(同居), 4:実父母(別居), 5:義・養父母, 6:祖父母(同居)・実兄弟姉妹, 7:祖父母(別居)・義兄弟姉妹]
     * @array status(ステイタス): [1:入力中, 2:直属の上司の確認済み, 3:総務、支部役員、所属長 確認中, 4:総務、支部役員、所属長 確認済み, 5:最終確認済み]
     * @array entrant(代理者): [0:本人(弔事当事者), 1:代理者の入力]
     * @array inlaws(社内親族): [0:なし, 1:あり]
     * @array inlaws_condolence(供花/弔電の手配): [0:自分の事業所からの手配を優先する, 1:親族の事業所からの手配を優先する]
     * @array wake(通夜を行う): [0:通夜を行う, 1:通夜を行なわない]
     * @array funeral(告別式を行う): [0:告別式を行う, 1:告別式を行わない]
     * @array funeral_same_ceremony(通夜と同じ式場): [0:通夜と同じ式場, 1:通夜と異なる式場]
     * @array chief_mourner(本人喪主): [0:本人喪主, 1:本人以外が喪主]
     * @array condolence(弔問を辞退): [1:はい, 2:いいえ]
     * @array floral_tribute(供花を辞退): [1:はい, 2:いいえ]
     * @array telegram(弔電を辞退): [1:はい, 2:いいえ]
     * @array fax_posting(全社FAX / Gネット掲示へ掲載): [1:はい, 2:いいえ]
     * @array superior(直属の上司の確認): [1:未確認, 2:確認済み]
     * @array company_attendX(参列): [1:参列しない, 2:参列する]
     */
    private array $formItems = [
        "id",
        "entrant", "entrant_employee_no", "entrant_name", "entrant_kana", "entrant_classification", "entrant_company", "entrant_member1", "entrant_member2",
        "related_employee_no", "related_name", "related_kana", "classification", "company", "member1", "member2",
        "passed_away_name", "passed_away_kana", "passed_away_relationship", "passed_away_date",
        "inlaws", "inlaws_employee_no", "inlaws_name", "inlaws_kana", "inlaws_company", "inlaws_member1", "inlaws_member2", "inlaws_condolence",
        "wake", "wake_date", "wake_time_start", "wake_time_end", "wake_ceremony", "wake_ceremony_zip", "wake_ceremony_addr1", "wake_ceremony_addr2", "wake_ceremony_tel", "wake_ceremony_url", "wake_ceremony_access", "wake_attendees1", "wake_attendees2", "wake_attendees3", "wake_attendees",
        "funeral", "funeral_date", "funeral_time_start", "funeral_time_end", "funeral_same_ceremony", "funeral_ceremony", "funeral_ceremony_zip", "funeral_ceremony_addr1", "funeral_ceremony_addr2", "funeral_ceremony_tel", "funeral_ceremony_url", "funeral_ceremony_access", "funeral_attendees1", "funeral_attendees2", "funeral_attendees3", "funeral_attendees", "chief_mourner", "chief_mourner_name", "chief_mourner_kana", "chief_mourner_relationship", "condolence", "floral_tribute", "telegram", "fax_posting", "remarks", "superior", "superior_employee_no", "superior_name", "superior_kana", "superior_company", "superior_member1", "superior_member2",
        "social_name1", "social_telegram1", "social_floral_tribute1", "social_name2", "social_telegram2", "social_floral_tribute2", "social_name3", "social_condolence_money3", "social_telegram1_flg", "social_floral_tribute1_flg", "social_telegram2_flg", "social_floral_tribute2_flg", "social_condolence_money3_flg",
        "company_name1", "company_attend1", "company_telegram1", "company_floral_tribute1", "company_condolence_money1", "company_name2", "company_attend2", "company_telegram2", "company_floral_tribute2", "company_condolence_money2", "company_telegram1_flg", "company_floral_tribute1_flg", "company_condolence_money1_flg", "company_telegram2_flg", "company_floral_tribute2_flg", "company_condolence_money2_flg",
        "reception", "reception_datetime",
        "general_affairs_confirmation", "general_affairs_employee_no", "general_affairs_name", "general_affairs_kana", "general_affairs_company", "general_affairs_member1", "general_affairs_member2","general_affairs_contact_toll1", "general_affairs_contact_toll2", "general_affairs_contact_info", "general_affairs_misc",
        "final_confirmation",
        "supervisor_confirmation", "supervisor_employee_no", "supervisor_name", "supervisor_kana", "supervisor_company", "supervisor_member1", "supervisor_member2",
        "branch_chief_confirmation", "branch_chief_employee_no", "branch_chief_name", "branch_chief_kana", "branch_chief_company", "branch_chief_member1", "branch_chief_member2",
        "status", "password", "create_user", "update_user", "deleted_at", "created_at", "updated_at",
        "form", "previous",
        "passedAwayDate", "wakeDate", "funeralDate",
        "accordion",
        "membership_year"
    ];

    private array $keyArray =
        [
            'id' => 'ID',
            'entrant' => '入力者',
            'entrant_employee_no' => '代理者の社員番号',
            'entrant_name' => '氏名',
            'entrant_kana' => 'フリガナ',
            'entrant_classification' => '社員区分',
            'entrant_company' => '就業会社',
            'entrant_member1' => '所属①',
            'entrant_member2' => '所属②',
            'related_employee_no' => '弔事当事者の社員番号',
            'related_name' => '氏名',
            'related_kana' => 'フリガナ',
            'classification' => '社員区分',
            'company' => '就業会社',
            'member1' => '所属①',
            'member2' => '所属②',
            'passed_away_name' => '故人様氏名',
            'passed_away_kana' => '故人様のフリガナ',
            "passed_away_relationship" => '社員との続柄',
            'passed_away_date' => '逝去日',
            'inlaws' => '社内親族の有無',
            'inlaws_employee_no' => '社内親族の社員番号',
            'inlaws_name' => '氏名',
            'inlaws_kana' => 'フリガナ',
            'inlaws_company' => '就業会社',
            'inlaws_member1' => '所属①',
            'inlaws_member2' => '所属②',
            'inlaws_condolence' => '供花/弔電の手配',
            'wake' => '通夜実施の有無',
            'wake_date' => '通夜の日付',
            "wake_time_start" => '通夜の開始時刻',
            "wake_time_end" => '通夜の終了時刻',
            'wake_ceremony' => '通夜の式場名',
            'wake_ceremony_zip' => '郵便番号',
            'wake_ceremony_addr1' => '住所',
            'wake_ceremony_addr2' => '番地以降',
            'wake_ceremony_tel' => '電話番号',
            'wake_ceremony_url' => 'URL',
            'wake_ceremony_access' => '交通手段',
            'wake_attendees1' => '通夜の参列予定者①',
            'wake_attendees2' => '通夜の参列予定者②',
            'wake_attendees3' => '通夜の参列予定者③',
            'wake_attendees' => '通夜の参列予定者',
            'funeral' => '告別式を行う',
            'funeral_date' => '告別式の日付',
            "funeral_time_start" => '告別式の開始時刻',
            "funeral_time_end" => '告別式の終了時刻',
            'funeral_same_ceremony' => '通夜と同じ式場',
            'funeral_ceremony' => '告別式の式場名',
            'funeral_ceremony_zip' => '郵便番号',
            'funeral_ceremony_addr1' => '住所',
            'funeral_ceremony_addr2' => '番地以降',
            'funeral_ceremony_tel' => '電話番号',
            'funeral_ceremony_url' => 'URL',
            'funeral_ceremony_access' => '交通手段',
            'funeral_attendees1' => '告別式の参列予定者①',
            'funeral_attendees2' => '告別式の参列予定者②',
            'funeral_attendees3' => '告別式の参列予定者③',
            'funeral_attendees' => '告別式の参列予定者',
            'chief_mourner' => '本人喪主',
            'chief_mourner_name' => '喪主の氏名',
            'chief_mourner_kana' => '喪主のフリガナ',
            'chief_mourner_relationship' => '社員と喪主の続柄',
            'condolence' => '弔問を辞退',
            'floral_tribute' => '供花を辞退',
            'telegram' => '弔電を辞退',
            'fax_posting' => '全社FAX/Gネット掲示へ掲載',
            'remarks' => '備考',

            'superior' => '直属の上司確認',
            'superior_employee_no' => '直属の上司の社員番号',
            'superior_name' => '氏名',
            'superior_kana' => 'フリガナ',
            'superior_company' => '就業会社',
            'superior_member1' => '所属①',
            'superior_member2' => '所属②',

            'social_name1' => '福祉会規定 差出人①',
            'social_telegram1' => '福祉会規定 弔電①',
            'social_floral_tribute1' => '福祉会規定 供花①',
            'social_name2' => '福祉会規定 差出人②',
            'social_telegram2' => '福祉会規定 弔電②',
            'social_floral_tribute2' => '福祉会規定 供花②',
            'social_name3' => '福祉会規定 差出人③',
            'social_condolence_money3' => '福祉会規定 弔慰金',

            'company_name1' => '会社規定 差出人①',
            'company_attend1' => '会社規定 参列①',
            'company_telegram1' => '会社規定 弔電①',
            'company_floral_tribute1' => '会社規定 供花①',
            'company_condolence_money1' => '会社規定 弔慰金①',
            'company_name2' => '会社規定 差出人②',
            'company_attend2' => '会社規定 参列②',
            'company_telegram2' => '会社規定 弔電②',
            'company_floral_tribute2' => '会社規定 供花②',
            'company_condolence_money2' => '会社規定 弔慰金②',

            'reception' => '総務担当受付',
            'reception_datetime' => '総務担当受付日時',

            'general_affairs_confirmation' => '総務担当確認',
            'general_affairs_employee_no' => '総務担当の社員番号',
            'general_affairs_name' => '氏名',
            'general_affairs_kana' => 'フリガナ',
            'general_affairs_company' => '就業会社',
            'general_affairs_member1' => '所属①',
            'general_affairs_member2' => '所属②',
            'general_affairs_contact_toll1' => '総務担当の連絡先(トール)',
            'general_affairs_contact_toll2' => '総務担当の連絡先(トール)',
            'general_affairs_contact_info' => '総務担当の連絡先',
            'general_affairs_misc' => '備考',

            'final_confirmation' => '総務担当の最終確認',

            'supervisor_confirmation' => '所属長確認',
            'supervisor_employee_no' => '所属長社員番号',
            'supervisor_name' => '氏名',
            'supervisor_kana' => 'フリガナ',
            'supervisor_company' => '就業会社',
            'supervisor_member1' => '所属',

            'branch_chief_confirmation' => '支部委員長/分会長確認',
            'branch_chief_employee_no' => '支部委員長/分会長社員番号',
            'branch_chief_name' => '氏名',
            'branch_chief_kana' => 'フリガナ',
            'branch_chief_company' => '就業会社',
            'branch_chief_member1' => '所属',


            'status' => 'ステイタス',
            'password' => 'パスワード',
            'create_user' => '作成者',
            'update_user' => '更新者',
            'deleted_at' => '削除',
            'created_at' => '作成日',
            'updated_at' => '更新日',
            "form" => 'フォーム',
            "previous" => '戻る',
            "passedAwayDate" => '逝去日',

            "accordion" => 'アコーディオン初期値'

        ];

    // 入力者
    private function entrant(): array
    {
        return array(0 => '本人(弔事当事者)', 1 => '代理者の入力');
    }

    // 社内親族
    private function inlaws(): array
    {
        return array(0 => 'なし', 1 => 'あり');
    }

    // 供花/弔電の手配
    private function inlaws_condolence(): array
    {
        return array(0 => '自分の事業所からの手配を優先する', 1 => '親族の事業所からの手配を優先する');
    }

    // 通夜を行う
    private function wake(): array
    {
        return array(0 => '通夜を行う', 1 => '通夜を行なわない');
    }

    // 告別式を行う
    private function funeral(): array
    {
        return array(0 => '告別式を行う', 1 => '告別式を行わない');
    }

    // 通夜と同じ式場
    private function funeral_same_ceremony(): array
    {
        return array(0 => '通夜の式場と同じ', 1 => '通夜の式場と異なる');
    }

    // 本人喪主
    private function chief_mourner(): array
    {
        return array(0 => '本人(弔事当事者)が喪主', 1 => '本人(弔事当事者)以外が喪主');
    }

    // 弔問を辞退
    private function condolence(): array
    {
        return array(1 => 'はい', 2 => 'いいえ');
    }

    // 供花を辞退
    private function floral_tribute(): array
    {
        return array(1 => 'はい', 2 => 'いいえ');
    }

    // 弔電を辞退
    private function telegram(): array
    {
        return array(1 => 'はい', 2 => 'いいえ');
    }

    // 全社FAX/Gネット掲示へ掲載
    private function fax_posting(): array
    {
        return array(0 => '全社FAX / Gネット掲示へ掲載を希望', 1 => '全社FAX / Gネット掲示へ掲載を辞退する');
    }

    // 直属の上司確認
    private function superior(): array
    {
        return array(0 => '未確認', 1 => '確認済');
    }

    // 会社規定 参列①
    private function company_attend1(): array
    {
        return array(0 => 'いいえ', 1 => 'はい');
    }

    // 会社規定 参列②
    private function company_attend2(): array
    {
        return array(0 => 'いいえ', 1 => 'はい');
    }

    // 総務担当受付
    private function reception(): array
    {
        return array(0 => '未受付', 1 => '受付済');
    }

    // 総務担当確認
    private function general_affairs_confirmation(): array
    {
        return array(0 => '未確認', 1 => '確認済');
    }

    // 総務担当の最終確認
    private function final_confirmation(): array
    {
        return array(0 => '未確認', 1 => '確認済');
    }

    // 所属長確認
    private function supervisor_confirmation(): array
    {
        return array(0 => '未確認', 1 => '確認済');
    }

    // 支部委員長/分会長確認
    private function branch_chief_confirmation(): array
    {
        return array(0 => '未確認', 1 => '確認済');
    }

    private function classifications(): array
    {
        $data = Classification::where('deleted_at', null)
            ->orderBy('sort')
            ->get();

        $res = array();
        foreach ($data as $array) {
            $res[$array->id] = $array->classification;
        }
        return $res;
    }

    private function companies(): array
    {
        $data = Company::where('deleted_at', null)
            ->orderBy('sort')
            ->get();
        $res = array();
        foreach ($data as $array) {
            $res[$array->id] = $array->company;
        }
        return $res;
    }

    private function chiefMournerRelationship(): array
    {
        $data = ChiefMournerRelationship::where('deleted_at', null)
            ->orderBy('sort')
            ->get();

        $res = array();
        foreach ($data as $array) {
            $res[$array->id] = $array->relationship;
        }
        return $res;
    }

    private function passedAwayRelationship(): array
    {
        $data = PassedAwayRelationship::where('deleted_at', null)
            ->orderBy('sort')
            ->get();

        $res = array();
        foreach ($data as $array) {
            $res[$array->id] = $array->relationship;
        }
        return $res;
    }

    private function status(): array
    {
        $data = Status::where('deleted_at', null)
            ->orderBy('sort')
            ->get();

        $res = array();
        foreach ($data as $array) {
            $res[$array->id] = $array->status;
        }
        return $res;
    }

    private function showDate($date)
    {
        $week = ['日', '月', '火', '水', '木', '金', '土'];
        if ($date) {
            $res = new DateTime($date);
            return $res->format('Y年n月j日（' .
                $week[(int)date_format($res, 'w')]
                . '）');

        } else {
            return false;
        }
    }

    private function showDatetime($date)
    {
        $week = ['日', '月', '火', '水', '木', '金', '土'];
        if ($date) {
            $res = new DateTime($date);
            return $res->format('Y年n月j日（' .
                $week[(int)date_format($res, 'w')]
                . '）H:i');

        } else {
            return false;
        }
    }


    /**
     * 当事者ログイン画面を表示する
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $request->session()->forget('form_input');
        $error = $request->session()->get('error');
        return view('mourning.login', ['error' => $error]);
    }

    /**
     * 当事者 新規情報 登録画面を表示する
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showCreate(Request $request)
    {
        $session = $request->session()->get("form_input");
        if($session){
            foreach ($this->formItems as $val) {
                if(!array_key_exists($val, $session)){
                    $session[$val] = null;
                }
            }
        } else {
            foreach ($this->formItems as $val) {
                $session[$val] = null;
            }
        }

//        $entrantDisabled = ($session['entrant'] == '0')? ' disabled ':'';
//        $inlawsDisabled = ($session['inlaws'] == '0')? ' disabled ':'';
//        $funeralSameCeremonyDisabled = ($session['funeral_same_ceremony'] == '0')? ' disabled ':'';
//        $chiefMournerDisabled = ($session['chief_mourner'] == '0')? ' disabled ':'';
//        $wakeDisabled = ($session['wake'] == '1')? ' disabled ':'';
//        $funeralDisabled = ($session['funeral'] == '1')? ' disabled ':'';

        $disabled = [
            'wake' => ($session['wake'] == '1')? ' disabled ':'',
            'wake_req' => ($session['wake'] == '1')? ' disabled ':' required ',
            'funeral' => ($session['funeral'] == '1')? ' disabled ':'',
            'funeral_req' => ($session['funeral'] == '1')? ' disabled ':' required ',
            'entrant' => ($session['entrant'] == '0')? ' disabled ':'',
            'entrant_req' => ($session['entrant'] == '0')? ' disabled ':' required ',
            'inlaws' => ($session['inlaws'] == '0')? ' disabled ':'',
            'inlaws_req' => ($session['inlaws'] == '0')? ' disabled ':' required ',
            'funeral_same_ceremony' => ($session['funeral_same_ceremony'] == '0')? ' disabled ':'',
            'funeral_same_ceremony_req' => ($session['funeral_same_ceremony'] == '0')? ' disabled ':' required ',
            'chief_mourner' => ($session['chief_mourner'] == '0')? ' disabled ':'',
            'chief_mourner_req' => ($session['chief_mourner'] == '0')? ' disabled ':' required ',

        ];


//        dd($wakeDisabled);

        $request->session()->put("error", "");
        return view('mourning.create', [
            'disabled' => $disabled,
            'session' => $session,
            'entrantArray' => $this->entrant(),
            'inlawsArray' => $this->inlaws(),
            'inlaws_condolenceArray' => $this->inlaws_condolence(),
            'wakeArray' => $this->wake(),
            'funeralArray' => $this->funeral(),
            'funeral_same_ceremonyArray' => $this->funeral_same_ceremony(),
            'chief_mournerArray' => $this->chief_mourner(),
            'condolenceArray' => $this->condolence(),
            'floral_tributeArray' => $this->floral_tribute(),
            'telegramArray' => $this->telegram(),
            'fax_postingArray' => $this->fax_posting(),
            'superiorArray' => $this->superior(),
            'company_attend1Array' => $this->company_attend1(),
            'company_attend2Array' => $this->company_attend2(),
            'receptionArray' => $this->reception(),
            'general_affairs_confirmationArray' => $this->general_affairs_confirmation(),
            'final_confirmationArray' => $this->final_confirmation(),
            'supervisor_confirmationArray' => $this->supervisor_confirmation(),
            'branch_chief_confirmationArray' => $this->branch_chief_confirmation(),
            "keyArray" => $this->keyArray,
            'classificationsArray' => $this->classifications(),
            'companiesArray' => $this->companies(),
            'chiefMournerRelationshipArray' => $this->chiefMournerRelationship(),
            'passedAwayRelationshipArray' => $this->passedAwayRelationship(),
            'statusArray' => $this->status(),
            'passedAwayDate' => $this->showDate($session['passed_away_date']),
            'wakeDate' => $this->showDate($session['wake_date']),
            'funeralDate' => $this->showDate($session['funeral_date']),
//            'wakeDisabled' => $wakeDisabled,
//            'funeralDisabled' => $funeralDisabled,
//            'entrantDisabled'=>$entrantDisabled,
//            'inlawsDisabled'=>$inlawsDisabled,
//            'funeralSameCeremonyDisabled'=>$funeralSameCeremonyDisabled,
//            'chiefMournerDisabled'=>$chiefMournerDisabled,

        ]);
    }

    /**
     * 当事者 新規情報 確認画面へ遷移する
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(MourningRequest $request)
    {
        $session = $request->only($this->formItems);

        // セッションに書き込み
        $request->session()->put("form_input", $session);
        return redirect()->action([MourningController::class, 'showConfirm']);
    }

    /**
     * 当事者 新規情報 確認画面を表示する
     * @param MourningRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showConfirm(MourningRequest $request)
    {

        $input = $request->session()->get("form_input");

//      $input['passed_away_date']
//      $input['wake_date']
//      $input['funeral_date']

        if (!$input) {
            return redirect()->action([MourningController::class, 'index']);
        } else {

            $date['passed_away_date']  = array_key_exists('passed_away_date', $input)? $this->showDate($input['passed_away_date']) :'';
            $date['wake_date']  = array_key_exists('wake_date', $input)? $this->showDate($input['wake_date']) :'';
            $date['funeral_date']  = array_key_exists('funeral_date', $input)? $this->showDate($input['funeral_date']) :'';

            return view("mourning.confirm",
                [
                    "input" => $input,
                    'entrantArray' => $this->entrant(),
                    'inlawsArray' => $this->inlaws(),
                    'inlaws_condolenceArray' => $this->inlaws_condolence(),
                    'wakeArray' => $this->wake(),
                    'funeralArray' => $this->funeral(),
                    'funeral_same_ceremonyArray' => $this->funeral_same_ceremony(),
                    'chief_mournerArray' => $this->chief_mourner(),
                    'condolenceArray' => $this->condolence(),
                    'floral_tributeArray' => $this->floral_tribute(),
                    'telegramArray' => $this->telegram(),
                    'fax_postingArray' => $this->fax_posting(),
                    'superiorArray' => $this->superior(),
                    'company_attend1Array' => $this->company_attend1(),
                    'company_attend2Array' => $this->company_attend2(),
                    'receptionArray' => $this->reception(),
                    'general_affairs_confirmationArray' => $this->general_affairs_confirmation(),
                    'final_confirmationArray' => $this->final_confirmation(),
                    'supervisor_confirmationArray' => $this->supervisor_confirmation(),
                    'branch_chief_confirmationArray' => $this->branch_chief_confirmation(),
                    "keyArray" => $this->keyArray,
                    'classificationsArray' => $this->classifications(),
                    'companiesArray' => $this->companies(),
                    'chiefMournerRelationshipArray' => $this->chiefMournerRelationship(),
                    'passedAwayRelationshipArray' => $this->passedAwayRelationship(),
                    'statusArray' => $this->status(),
                    'passedAwayDate' => $date['passed_away_date'],
                    'wakeDate' => $date['wake_date'],
                    'funeralDate' => $date['funeral_date'],
                ]
            );
        }
    }

    /**
     * 当事者 新規情報を登録する
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function postConfirm(MourningRequest $request)
    {
        // 戻りボタンのとき
        if ($request->back == 'back') {
            return redirect()->action([MourningController::class, 'showCreate']);
        }

        $input = $request->session()->get("form_input");
        if (!$input) {
            return redirect()->action([MourningController::class, 'index']);
        }

        if(array_key_exists('entrant_employee_no', $input)){
            if ((int)$input['entrant_employee_no'] == 1) {
                $input['create_user'] = $input['entrant_employee_no'];
            }
        } else {
            $input['create_user'] = $input['related_employee_no'];
        }


        $endWhile = false;
        while ($endWhile == false) {
            $password = str_pad(random_int(0, 9999), 4, 0, STR_PAD_BOTH);
            $exist = ContactInfo::wherePassword($password)->where('related_employee_no', '=', $input['related_employee_no'])->doesntExist();
            if ($exist) {
                $endWhile = true;
            }
        }
        $input['password'] = $password;

        // if((int)$input['classification'] === 5 || (int)$input['classification'] === 6){
        //     $input['status'] = "2";

        // } else {
        //     $input['status'] = "1";
        // }
        // Edit by IVS 2023/12/26
        // Not check class in Set logic (new request 2023)
        $input['status'] = "2";
        // End Edit by IVS 2023/12/26

        $request->session()->put("form_input", $input);

        \DB::beginTransaction();
        try {
//            dd($input);
//            $app_key = env('APP_KEY');
            $data = ContactInfo::create($input);
//            $update = ContactInfo::where('id', $contact_id);
//            $update->password = \DB::raw("HEX(AES_ENCRYPT('{$input['password']}', '{$app_key}'))");
            \DB::commit();
        } catch (\Throwable $exception) {
            \DB::rollback();
            dd($exception);
//            abort(500, $exception);
        }
        $input['id'] = $data->id;

        // Edit by IVS 2023/12/26
        // Not check class in Set logic (new request 2023)
        $request->session()->put("form_input", $input);
        $setLogic = new SetLogicController();
        $setLogic->set($request);
        // End Edit by IVS 2023/12/26
        return redirect()->action([MourningController::class, 'showFinished']);
    }

    /**
     * 呼び出し
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        $input = $request->only(['related_employee_no', 'password']);
        $exists = ContactInfo::where('related_employee_no', '=', $input['related_employee_no'])->get();
        if ($exists) {
          foreach ($exists as $member) {
            if ($member->password == $input['password']) {
              $status = $member->status;
                $request->session()->put(['id' => $member->id]);
                if((int)$status === null || (int)$status === 0 || (int)$status === 1) {
                  return redirect()->action([MourningController::class, 'showEdit']);
                } else {
                  return redirect()->action([MourningController::class, 'check']);
                }
              }
            }
        }
        $request->session()->put("error", "該当するデータがありません。本人(弔事当事者)の社員番号・パスワード をご確認ください。");
        return redirect()->action([MourningController::class, 'index']);
    }

    /**
     * 完了画面へ遷移
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showFinished(Request $request)
    {
        $input = $request->session()->get("form_input");
        if (!$input) {
            return redirect()->action([MourningController::class, 'index']);
        }
        return view('mourning.finished', ["input" => $input]);
    }

    /**
     * 当事者 編集画面を表示する
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showEdit(Request $request)
    {
        $hasId = $request->session()->only($this->formItems);
        if(!$hasId){
            return redirect()->action([MourningController::class, 'index']);
        }
        $session = $request->session()->get("form_input");
        if($session){
            foreach ($this->formItems as $val) {
                if(!array_key_exists($val, $session)){
                    $session[$val] = null;
                }
            }
        }else{
            $id = $request->session()->get('id');
            $data = ContactInfo::find($id);
            $session = $data->only($this->formItems);
        }


        foreach ($this->formItems as $val) {
            if(!array_key_exists($val, $session)){
                $session[$val] = null;
            }
        }



//
//        if($session){
//            foreach ($this->formItems as $val) {
//                if(!array_key_exists($val, $session)){
//                    $session[$val] = null;
//                }
//            }
//        } else {
//            foreach ($this->formItems as $val) {
//                $session[$val] = null;
//            }
//        }


        $disabled = [
            'wake' => ($session['wake'] == '1')? ' disabled ':'',
            'wake_req' => ($session['wake'] == '1')? ' disabled ':' required ',
            'funeral' => ($session['funeral'] == '1')? ' disabled ':'',
            'funeral_req' => ($session['funeral'] == '1')? ' disabled ':' required ',
            'entrant' => ($session['entrant'] == '0')? ' disabled ':'',
            'entrant_req' => ($session['entrant'] == '0')? ' disabled ':' required ',
            'inlaws' => ($session['inlaws'] == '0')? ' disabled ':'',
            'inlaws_req' => ($session['inlaws'] == '0')? ' disabled ':' required ',
            'funeral_same_ceremony' => ($session['funeral_same_ceremony'] == '0')? ' disabled ':'',
            'funeral_same_ceremony_req' => ($session['funeral_same_ceremony'] == '0')? ' disabled ':' required ',
            'chief_mourner' => ($session['chief_mourner'] == '0')? ' disabled ':'',
            'chief_mourner_req' => ($session['chief_mourner'] == '0')? ' disabled ':' required ',
        ];
        $date['passed_away_date']  = array_key_exists('passed_away_date', $session)? $this->showDate($session['passed_away_date']) :'';
        $date['wake_date']  = array_key_exists('wake_date', $session)? $this->showDate($session['wake_date']) :'';
        $date['funeral_date']  = array_key_exists('funeral_date', $session)? $this->showDate($session['funeral_date']) :'';
        $date['reception_datetime']  = array_key_exists('reception_datetime', $session)? $this->showDatetime($session['reception_datetime']) :'';

//        $session['passed_away_date'] = (!array_key_exists('passed_away_date',$session))?:;
        $request->session()->put('form_input', $session);
        return view('mourning.edit', [
            'session' => $session,
            'disabled' => $disabled,
            'entrantArray' => $this->entrant(),
            'inlawsArray' => $this->inlaws(),
            'inlaws_condolenceArray' => $this->inlaws_condolence(),
            'wakeArray' => $this->wake(),
            'funeralArray' => $this->funeral(),
            'funeral_same_ceremonyArray' => $this->funeral_same_ceremony(),
            'chief_mournerArray' => $this->chief_mourner(),
            'condolenceArray' => $this->condolence(),
            'floral_tributeArray' => $this->floral_tribute(),
            'telegramArray' => $this->telegram(),
            'fax_postingArray' => $this->fax_posting(),
            'superiorArray' => $this->superior(),
            'company_attend1Array' => $this->company_attend1(),
            'company_attend2Array' => $this->company_attend2(),
            'receptionArray' => $this->reception(),
            'general_affairs_confirmationArray' => $this->general_affairs_confirmation(),
            'final_confirmationArray' => $this->final_confirmation(),
            'supervisor_confirmationArray' => $this->supervisor_confirmation(),
            'branch_chief_confirmationArray' => $this->branch_chief_confirmation(),
            "keyArray" => $this->keyArray,
            'classificationsArray' => $this->classifications(),
            'companiesArray' => $this->companies(),
            'chiefMournerRelationshipArray' => $this->chiefMournerRelationship(),
            'passedAwayRelationshipArray' => $this->passedAwayRelationship(),
            'statusArray' => $this->status(),

            'reception_datetime' => $date['reception_datetime'],
            'passedAwayDate' => $date['passed_away_date'],
            'wakeDate' => $date['wake_date'],
            'funeralDate' => $date['funeral_date'],

        ]);
    }

    /**
     * 当事者 編集情報確認画面へ遷移する
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(MourningRequest $request)
    {
        $input = $request->only($this->formItems);
        if (!$input) {
            return redirect()->action([MourningController::class, 'index']);
        }
        $request->session()->put("form_input", $input);
        return redirect()->action([MourningController::class, 'showEditConfirm']);
    }

    /**
     * 当事者 編集 確認画面を表示する
     * @param MourningRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showEditConfirm(MourningRequest $request)
    {
        $input = $request->session()->get("form_input");
        if (!$input) {
            return redirect()->action([MourningController::class, 'index']);
        } else {

            $date['passed_away_date']  = array_key_exists('passed_away_date', $input)? $this->showDate($input['passed_away_date']) :'';
            $date['wake_date']  = array_key_exists('wake_date', $input)? $this->showDate($input['wake_date']) :'';
            $date['funeral_date']  = array_key_exists('funeral_date', $input)? $this->showDate($input['funeral_date']) :'';
            $date['reception_datetime']  = array_key_exists('reception_datetime', $input)? $this->showDatetime($input['reception_datetime']) :'';

            return view("mourning.editConfirm",
                [
                    "input" => $input,
                    'entrantArray' => $this->entrant(),
                    'inlawsArray' => $this->inlaws(),
                    'inlaws_condolenceArray' => $this->inlaws_condolence(),
                    'wakeArray' => $this->wake(),
                    'funeralArray' => $this->funeral(),
                    'funeral_same_ceremonyArray' => $this->funeral_same_ceremony(),
                    'chief_mournerArray' => $this->chief_mourner(),
                    'condolenceArray' => $this->condolence(),
                    'floral_tributeArray' => $this->floral_tribute(),
                    'telegramArray' => $this->telegram(),
                    'fax_postingArray' => $this->fax_posting(),
                    'superiorArray' => $this->superior(),
                    'company_attend1Array' => $this->company_attend1(),
                    'company_attend2Array' => $this->company_attend2(),
                    'receptionArray' => $this->reception(),
                    'general_affairs_confirmationArray' => $this->general_affairs_confirmation(),
                    'final_confirmationArray' => $this->final_confirmation(),
                    'supervisor_confirmationArray' => $this->supervisor_confirmation(),
                    'branch_chief_confirmationArray' => $this->branch_chief_confirmation(),
                    "keyArray" => $this->keyArray,
                    'classificationsArray' => $this->classifications(),
                    'companiesArray' => $this->companies(),
                    'chiefMournerRelationshipArray' => $this->chiefMournerRelationship(),
                    'passedAwayRelationshipArray' => $this->passedAwayRelationship(),
                    'statusArray' => $this->status(),
                    'reception_datetime' => $date['reception_datetime'],
                    'passedAwayDate' => $date['passed_away_date'],
                    'wakeDate' => $date['wake_date'],
                    'funeralDate' => $date['funeral_date'],
                ]
            );
        }
    }

    /**
     * 当事者 編集を登録する
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditConfirm(MourningRequest $request)
    {
        // 戻りボタンのとき
        if ($request->back == 'back') {
            return redirect()->action([MourningController::class, 'showEdit']);
        }

        $input = $request->session()->get("form_input");

        if (!$input) {
            return redirect()->action([MourningController::class, 'index']);
        }

        $input['status'] = "1";
        if ($input['entrant_employee_no'] == 1) {
            $input['update_user'] = $input['entrant_employee_no'];
        } else {
            $input['update_user'] = $input['related_employee_no'];
        }


        $request->session()->put("form_input", $input);

        foreach ($this->formItems as $val) {
            if(!array_key_exists($val, $input)){
                $input[$val] = null;
            }
        }
        // Edit by IVS 2023/12/26
        $setLogic = new SetLogicController();
        $setLogic->set($request);
        // End Edit by IVS 2023/12/26
        \DB::beginTransaction();
        try {
            $contactInfo = ContactInfo::find($input['id']);
            $contactInfo->fill([
                "entrant" => $input["entrant"],
                "entrant_employee_no" => $input["entrant_employee_no"],
                "entrant_name" => $input["entrant_name"],
                "entrant_kana" => $input["entrant_kana"],
                "entrant_classification" => $input["entrant_classification"],
                "entrant_company" => $input["entrant_company"],
                "entrant_member1" => $input["entrant_member1"],
                "entrant_member2" => $input["entrant_member2"],
                "related_employee_no" => $input["related_employee_no"],
                "related_name" => $input["related_name"],
                "related_kana" => $input["related_kana"],
                "classification" => $input["classification"],
                "company" => $input["company"],
                "member1" => $input["member1"],
                "member2" => $input["member2"],
                "passed_away_name" => $input["passed_away_name"],
                "passed_away_kana" => $input["passed_away_kana"],
                "passed_away_relationship" => $input["passed_away_relationship"],
                "passed_away_date" => $input["passed_away_date"],
                "inlaws" => $input["inlaws"],
                "inlaws_employee_no" => $input["inlaws_employee_no"],
                "inlaws_name" => $input["inlaws_name"],
                "inlaws_kana" => $input["inlaws_kana"],
                "inlaws_company" => $input["inlaws_company"],
                "inlaws_member1" => $input["inlaws_member1"],
                "inlaws_member2" => $input["inlaws_member2"],
                "inlaws_condolence" => $input["inlaws_condolence"],
                "wake" => $input["wake"],
                "wake_date" => $input["wake_date"],
                "wake_time_start" => $input["wake_time_start"],
                "wake_time_end" => $input["wake_time_end"],
                "wake_ceremony" => $input["wake_ceremony"],
                "wake_ceremony_zip" => $input["wake_ceremony_zip"],
                "wake_ceremony_addr1" => $input["wake_ceremony_addr1"],
                "wake_ceremony_addr2" => $input["wake_ceremony_addr2"],
                "wake_ceremony_tel" => $input["wake_ceremony_tel"],
                "wake_ceremony_url" => $input["wake_ceremony_url"],
                "wake_ceremony_access" => $input["wake_ceremony_access"],
                "funeral" => $input["funeral"],
                "funeral_date" => $input["funeral_date"],
                "funeral_time_start" => $input["funeral_time_start"],
                "funeral_time_end" => $input["funeral_time_end"],
                "funeral_same_ceremony" => $input["funeral_same_ceremony"],
                "funeral_ceremony" => $input["funeral_ceremony"],
                "funeral_ceremony_zip" => $input["funeral_ceremony_zip"],
                "funeral_ceremony_addr1" => $input["funeral_ceremony_addr1"],
                "funeral_ceremony_addr2" => $input["funeral_ceremony_addr2"],
                "funeral_ceremony_tel" => $input["funeral_ceremony_tel"],
                "funeral_ceremony_url" => $input["funeral_ceremony_url"],
                "funeral_ceremony_access" => $input["funeral_ceremony_access"],
                "chief_mourner" => $input["chief_mourner"],
                "chief_mourner_name" => $input["chief_mourner_name"],
                "chief_mourner_kana" => $input["chief_mourner_kana"],
                "chief_mourner_relationship" => $input["chief_mourner_relationship"],
                "condolence" => $input["condolence"],
                "floral_tribute" => $input["floral_tribute"],
                "telegram" => $input["telegram"],
                "fax_posting" => $input["fax_posting"],
                "remarks" => $input["remarks"],
                // Edit by IVS 2023/12/26
                "status" => '2',
                // End Edit by IVS 2023/12/26
                "update_user" => $input["related_employee_no"],
            ]);


            $contactInfo->save();
            \DB::commit();
        } catch (\Throwable $exception) {
            \DB::rollback();
            dd($exception);
//            abort(500, $exception);
        }
        return redirect()->action([MourningController::class, 'showFinished']);
    }

    /**
     * 直属の上司 編集情報確認画面へ遷移する
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEntrant(MourningRequest $request)
    {
        $input = $request->only($this->formItems);
        // セッションに書き込み
        $request->session()->put("form_input", $input);
        return redirect()->action([MourningController::class, 'showEntrantConfirm']);
    }

    /**
     * 直属の上司 編集 確認画面を表示する
     * @param MourningRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showEntrantConfirm(MourningRequest $request)
    {
        $input = $request->session()->get("form_input");
        if (!$input) {
            return redirect()->action([MourningController::class, 'index']);
        } else {
            return view("mourning.entrantConfirm",
                [
                    "input" => $input,
                    'superiorArray' => $this->superior(),
                    'supervisor_confirmationArray' => $this->supervisor_confirmation(),
                    'companiesArray' => $this->companies(),
                    "keyArray" => $this->keyArray,
                    'statusArray' => $this->status(),

                ]
            );
        }
    }

    /**
     * 直属の上司 編集を登録する
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEntrantConfirm(MourningRequest $request)
    {
        // 戻りボタンのとき
        if ($request->back == 'back') {
            return redirect()->action([MourningController::class, 'showEdit']);
        }

        $input = $request->session()->get("form_input");

        if (!$input) {
            return redirect()->action([MourningController::class, 'showEdit']);
        }

        $input['update_user'] = $input['superior_employee_no'];

        $request->session()->put("form_input", $input);

        $setLogic = new SetLogicController();
        $setLogic->set($request);

        \DB::beginTransaction();
        try {
//            dd($input);
            $contactInfo = ContactInfo::find($input['id']);
            $contactInfo->fill([
                "status" => $input["status"],
                "superior_employee_no" => $input["superior_employee_no"],
                "superior_name" => $input["superior_name"],
                "superior_kana" => $input["superior_kana"],
                "superior_company" => $input["superior_company"],
                "superior_member1" => $input["superior_member1"],
                "superior_member2" => $input["superior_member2"],
                "update_user" => $input["update_user"],

            ]);


            $contactInfo->save();
            \DB::commit();
        } catch (\Throwable $exception) {
            \DB::rollback();
            dd($exception);
//            abort(500, $exception);
        }
        return redirect()->action([MourningController::class, 'showFinished']);
    }

    /**
     * 入力確認
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function check(Request $request)
    {
        $id = $request->session()->get('id');
        $data = ContactInfo::find($id);
        $input = $data->only($this->formItems);
        $request->session()->put("error", "");

        $date['passed_away_date']  = array_key_exists('passed_away_date', $input)? $this->showDate($input['passed_away_date']) :'';
        $date['wake_date']  = array_key_exists('wake_date', $input)? $this->showDate($input['wake_date']) :'';
        $date['funeral_date']  = array_key_exists('funeral_date', $input)? $this->showDate($input['funeral_date']) :'';
        $date['reception_datetime']  = array_key_exists('reception_datetime', $input)? $this->showDatetime($input['reception_datetime']) :'';

        return view('mourning.check', [
            'input' => $input,
            'entrantArray' => $this->entrant(),
            'inlawsArray' => $this->inlaws(),
            'inlaws_condolenceArray' => $this->inlaws_condolence(),
            'wakeArray' => $this->wake(),
            'funeralArray' => $this->funeral(),
            'funeral_same_ceremonyArray' => $this->funeral_same_ceremony(),
            'chief_mournerArray' => $this->chief_mourner(),
            'condolenceArray' => $this->condolence(),
            'floral_tributeArray' => $this->floral_tribute(),
            'telegramArray' => $this->telegram(),
            'fax_postingArray' => $this->fax_posting(),
            'superiorArray' => $this->superior(),
            'company_attend1Array' => $this->company_attend1(),
            'company_attend2Array' => $this->company_attend2(),
            'receptionArray' => $this->reception(),
            'general_affairs_confirmationArray' => $this->general_affairs_confirmation(),
            'final_confirmationArray' => $this->final_confirmation(),
            'supervisor_confirmationArray' => $this->supervisor_confirmation(),
            'branch_chief_confirmationArray' => $this->branch_chief_confirmation(),
            "keyArray" => $this->keyArray,
            'classificationsArray' => $this->classifications(),
            'companiesArray' => $this->companies(),
            'chiefMournerRelationshipArray' => $this->chiefMournerRelationship(),
            'passedAwayRelationshipArray' => $this->passedAwayRelationship(),
            'statusArray' => $this->status(),
            'reception_datetime' => $date['reception_datetime'],
            'passedAwayDate' => $date['passed_away_date'],
            'wakeDate' => $date['wake_date'],
            'funeralDate' => $date['funeral_date'],
        ]);
    }




    /**
     * 総務・支部役員・所属長用ログイン
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    // showManagerLogin
    public function showManagerLogin(Request $request)
    {

        $error = $request->session()->get('error');
        $request->session()->forget('form_input');
        $request->session()->forget('edit_member');
        return view('mourning.managerLogin', ['error' => $error]);
    }

    /**
     * 総務・支部役員・所属長用ログイン処理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postManagerLogin(Request $request)
    {
        $input = $request->only(['related_employee_no', 'password']);
        $exists = ContactInfo::where('related_employee_no', '=', $input['related_employee_no'])->get();
        if ($exists) {
            foreach ($exists as $member) {
                if ($member->password == $input['password']) {
                    $status = $member->status;
                    $request->session()->put(['id' => $member->id]);

                    // Edit by IVS 2023/12/26

                    // if ($status == 1 || $status == 0) {
                    //     $request->session()->put("error", "直属の上司の確認が終わっておりません。");
                    // }

                    // if($status === 0 || $status === 1 || $status === "0" || $status === "1") {
                    //   return redirect()->action([MourningController::class, 'showManagerLogin']);
                    // } else {
                    //   return redirect()->action([MourningController::class, 'showManagerEdit']);
                    // }

                    // Not check status when login screen manager (New request 2023)
                    return redirect()->action([MourningController::class, 'showManagerEdit']);
                    // End Edit by IVS 2023/12/26
//                     return match ($status) {
//                         0, 1, '0', '1' => redirect()->action([MourningController::class, 'showManagerLogin']),
// //                        5, '5' => redirect()->action([MourningController::class, 'checkManager']),
//                         default => redirect()->action([MourningController::class, 'showManagerEdit']),
//                     };
                }
            }
        }
        $request->session()->put("error", "該当するデータがありません。本人(弔事当事者)の社員番号・パスワード をご確認ください。");

        $request -> session() -> forget("edit_member");
        return redirect()->action([MourningController::class, 'showManagerLogin']);
    }


    /**
     * 総務・支部役員・所属長用 編集画面
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showManagerEdit(Request $request)
    {
        $session = $request->session()->only($this->formItems);
        if (!$session) {
            return redirect()->action([MourningController::class, 'showManagerLogin']);
        }

        $request->session()->put("error", "");
        if (!array_key_exists('id', $session)) {
            return redirect()->action([MourningController::class, 'showManagerLogin']);
        }
        if (!array_key_exists('related_employee_no', $session)) {
            $id = $request->session()->get('id');
            $data = ContactInfo::find($id);
            $session = $data->only($this->formItems);
        }

        foreach ($this->formItems as $val) {
            if(!array_key_exists($val, $session)){
                $session[$val] = null;
            }
        }
        $session['accordion'] = $session['accordion']?: 'general_affairs';
        $accordion = array();

        switch ($session['accordion']){
            case 'general_affairs':
                $accordion = 1;
                break;
            case 'branch_chief':
                $accordion = 2;
                break;
            case 'supervisor':
                $accordion = 3;
                break;
        }

        $request->session()->put('form_input', $session);
        $request->session()->put('edit_member', encrypt($request->session()->get('id')));

        return view('mourning.managerEdit', [
            'session' => $session,
            'accordion' => $accordion,
            'entrantArray' => $this->entrant(),
            'inlawsArray' => $this->inlaws(),
            'inlaws_condolenceArray' => $this->inlaws_condolence(),
            'wakeArray' => $this->wake(),
            'funeralArray' => $this->funeral(),
            'funeral_same_ceremonyArray' => $this->funeral_same_ceremony(),
            'chief_mournerArray' => $this->chief_mourner(),
            'condolenceArray' => $this->condolence(),
            'floral_tributeArray' => $this->floral_tribute(),
            'telegramArray' => $this->telegram(),
            'fax_postingArray' => $this->fax_posting(),
            'superiorArray' => $this->superior(),
            'company_attend1Array' => $this->company_attend1(),
            'company_attend2Array' => $this->company_attend2(),
            'receptionArray' => $this->reception(),
            'general_affairs_confirmationArray' => $this->general_affairs_confirmation(),
            'final_confirmationArray' => $this->final_confirmation(),
            'supervisor_confirmationArray' => $this->supervisor_confirmation(),
            'branch_chief_confirmationArray' => $this->branch_chief_confirmation(),
            "keyArray" => $this->keyArray,
            'classificationsArray' => $this->classifications(),
            'companiesArray' => $this->companies(),
            'chiefMournerRelationshipArray' => $this->chiefMournerRelationship(),
            'passedAwayRelationshipArray' => $this->passedAwayRelationship(),
            'statusArray' => $this->status(),
            'passedAwayDate' => $this->showDate($session['passed_away_date']),
            'wakeDate' => $this->showDate($session['wake_date']),
            'funeralDate' => $this->showDate($session['funeral_date']),
            'confirmArray' => ['未確認', '確認済み'],
            'completionArray' => ['未完了', '完了'],
            'reception_datetime' => $this->showDatetime($session['reception_datetime']),

        ]);
    }


    /**
     * 総務 確認画面へ遷移
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postGeneralAffairs(MourningRequest $request)
    {
        $input = $request->only($this->formItems);
        // セッションに書き込み
        $request->session()->put("form_input", $input);
        return redirect()->action([MourningController::class, 'showGeneralAffairsConfirm']);
    }

    /**
     * 総務 確認画面
     * @param MourningRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showGeneralAffairsConfirm(MourningRequest $request)
    {
        $input = $request->session()->get("form_input");
//        $request->flash();
    //    dd($input);
        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerLogin']);
        } else {
            $input['funeral_attendees1'] = $input['funeral_attendees1'] ?? null;
            $input['funeral_attendees2'] = $input['funeral_attendees2'] ?? null;
            $input['funeral_attendees3'] = $input['funeral_attendees3'] ?? null;
            $input['funeral_attendees'] = $input['funeral_attendees'] ?? null;
            $input['wake_attendees1'] = $input['wake_attendees1'] ?? null;
            $input['wake_attendees2'] = $input['wake_attendees2'] ?? null;
            $input['wake_attendees3'] = $input['wake_attendees3'] ?? null;
            $input['wake_attendees'] = $input['wake_attendees'] ?? null;

            $request->session()->put('form_input', $input);

            return view("mourning.generalAffairsConfirm",
                [
                    "input" => $input,
                    'superiorArray' => $this->superior(),
                    'supervisor_confirmationArray' => $this->supervisor_confirmation(),
                    'companiesArray' => $this->companies(),
                    "keyArray" => $this->keyArray,
                    'statusArray' => $this->status(),
                    'reception_datetime' => $this->showDatetime($input['reception_datetime']),
                ]
            );
        }
    }


    /**
     * 総務 編集を登録する
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postGeneralAffairsConfirm(MourningRequest $request)
    {
        // 戻りボタンのとき
        if ($request->back == 'back') {
            $request->flush();
            return redirect()->action([MourningController::class, 'showManagerEdit']);
        }

        $input = $request->session()->get("form_input");

        // Edit by IVS 2023/12/01
        if ($input['company_attend1'] == 2) {
            $input['company_telegram1_flg'] = "1";
        }else{
            $input['company_telegram1_flg'] = "0";
        }

        if ($input['company_attend2'] == 2) {
            $input['company_telegram2_flg'] = "1";
        }else{
            $input['company_telegram2_flg'] = "0";
        }
        // End edit by IVS 2023/12/01

        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerLogin']);
        }

        $input['update_user'] = $input['general_affairs_employee_no'];
        if (
            (int)$input['general_affairs_confirmation'] == 1 &&
            (int)$input['supervisor_confirmation'] == 1 &&
            (int)$input['branch_chief_confirmation'] == 1
        ) {
            $input['status'] = 4;
        }

        $request->session()->put("form_input", $input);

        \DB::beginTransaction();
        try {
            $contactInfo = ContactInfo::find($input['id']);
            $contactInfo->fill([
                'reception' => $input['reception'],
                'reception_datetime' => $input['reception_datetime'],
                'general_affairs_confirmation' => $input['general_affairs_confirmation'],
                'general_affairs_employee_no' => $input['general_affairs_employee_no'],
                'general_affairs_name' => $input['general_affairs_name'],
                'general_affairs_kana' => $input['general_affairs_kana'],
                'general_affairs_company' => $input['general_affairs_company'],
                'general_affairs_member1' => $input['general_affairs_member1'],
                'general_affairs_member2' => $input['general_affairs_member2'],
                'general_affairs_contact_toll1' => $input['general_affairs_contact_toll1'],
                'general_affairs_contact_toll2' => $input['general_affairs_contact_toll2'],
                'general_affairs_contact_info' => $input['general_affairs_contact_info'],
                'general_affairs_misc' => $input['general_affairs_misc'],
                'wake_attendees1' => $input['wake_attendees1'],
                'wake_attendees2' => $input['wake_attendees2'],
                'wake_attendees3' => $input['wake_attendees3'],
                'wake_attendees' => $input['wake_attendees'],
                'funeral_attendees1' => $input['funeral_attendees1'],
                'funeral_attendees2' => $input['funeral_attendees2'],
                'funeral_attendees3' => $input['funeral_attendees3'],
                'funeral_attendees' => $input['funeral_attendees'],
                'social_name1' => $input['social_name1'],
                'social_name2' => $input['social_name2'],
                'social_name3' => $input['social_name3'],
                'company_name1' => $input['company_name1'],
                'company_name2' => $input['company_name2'],
                'company_attend1' => $input['company_attend1'],
                'company_attend2' => $input['company_attend2'],
                'company_telegram1' => $input['company_telegram1'],
                'company_telegram2' => $input['company_telegram2'],
                'company_floral_tribute1' => $input['company_floral_tribute1'],
                'company_floral_tribute2' => $input['company_floral_tribute2'],
                'company_telegram1_flg' => $input['company_telegram1_flg'],
                'company_telegram2_flg' => $input['company_telegram2_flg'],
                'company_condolence_money1' => $input['company_condolence_money1'],
                'company_condolence_money2' => $input['company_condolence_money2'],
                'status' => $input['status'],
                "update_user" => $input["update_user"],

            ]);
            $contactInfo->save();
            \DB::commit();
        } catch (\Throwable $exception) {
            \DB::rollback();
            dd($exception);
//            abort(500, $exception);
        }
        return redirect()->action([MourningController::class, 'showGeneralAffairsFinished']);
    }

    /**
     * 総務担当終了画面
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showGeneralAffairsFinished(Request $request)
    {
        $input = $request->session()->get("form_input");
        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerLogin']);
        }
        return view('mourning.generalAffairsFinished', ["input" => $input]);
    }


    /**
     * 所属長 確認画面へ遷移
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSupervisor(MourningRequest $request)
    {
        $input = $request->only($this->formItems);
        // セッションに書き込み
        $request->session()->put("form_input", $input);
        return redirect()->action([MourningController::class, 'showSupervisorConfirm']);
    }

    /**
     * 所属長 確認画面
     * @param MourningRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showSupervisorConfirm(MourningRequest $request)
    {
        $input = $request->session()->get("form_input");
//        $request->flash();
//        dd($input);
        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerLogin']);
        } else {
            return view("mourning.supervisorConfirm",
                [
                    "input" => $input,
                    'superiorArray' => $this->superior(),
                    'supervisor_confirmationArray' => $this->supervisor_confirmation(),
                    'companiesArray' => $this->companies(),
                    "keyArray" => $this->keyArray,
                    'statusArray' => $this->status(),
                ]
            );
        }
    }

    /**
     * 所属長 編集を登録する
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSupervisorConfirm(MourningRequest $request)
    {
        // 戻りボタンのとき
        if ($request->back == 'back') {
            $request->flush();
            return redirect()->action([MourningController::class, 'showManagerEdit']);
        }

        $input = $request->session()->get("form_input");

        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerEdit']);
        }

        $input['update_user'] = $input['supervisor_employee_no'];
        if (
            (int)$input['general_affairs_confirmation'] == 1 &&
            (int)$input['supervisor_confirmation'] == 1 &&
            (int)$input['branch_chief_confirmation'] == 1
        ) {
            $input['status'] = 4;
        }


        $request->session()->put("form_input", $input);
        \DB::beginTransaction();
        try {
            $contactInfo = ContactInfo::find($input['id']);
            $contactInfo->fill([
                'supervisor_confirmation' => $input['supervisor_confirmation'],
                'supervisor_employee_no' => $input['supervisor_employee_no'],
                'supervisor_name' => $input['supervisor_name'],
                'supervisor_kana' => $input['supervisor_kana'],
                'supervisor_company' => $input['supervisor_company'],
                'supervisor_member1' => $input['supervisor_member1'],
                'status' => $input['status'],
                "update_user" => $input["update_user"],

            ]);
            $contactInfo->save();
            \DB::commit();
        } catch (\Throwable $exception) {
            \DB::rollback();
            dd($exception);
//            abort(500, $exception);
        }
        return redirect()->action([MourningController::class, 'showSupervisorFinished']);
    }

    /**
     * 所属長終了画面
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showSupervisorFinished(Request $request)
    {
        $input = $request->session()->get("form_input");
        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerLogin']);
        }
        return view('mourning.supervisorFinished', ["input" => $input]);
    }

    /**
     * 支部委員長 確認画面へ遷移
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postBranchChief(MourningRequest $request)
    {
        $input = $request->only($this->formItems);
        // セッションに書き込み
        $request->session()->put("form_input", $input);
        return redirect()->action([MourningController::class, 'showBranchChiefConfirm']);
    }

    /**
     * 支部委員長 確認画面
     * @param MourningRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showBranchChiefConfirm(MourningRequest $request)
    {
        $input = $request->session()->get("form_input");
//        $request->flash();
//        dd($input);
        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerLogin']);
        } else {
            return view("mourning.branchChiefConfirm",
                [
                    "input" => $input,
                    'superiorArray' => $this->superior(),
                    'supervisor_confirmationArray' => $this->supervisor_confirmation(),
                    'companiesArray' => $this->companies(),
                    "keyArray" => $this->keyArray,
                    'statusArray' => $this->status(),
                ]
            );
        }
    }

    /**
     * 支部委員長 編集を登録する
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postBranchChiefConfirm(MourningRequest $request)
    {
        // 戻りボタンのとき
        if ($request->back == 'back') {
            $request->flush();
            return redirect()->action([MourningController::class, 'showManagerEdit']);
        }

        $input = $request->session()->get("form_input");

        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerEdit']);
        }

        $input['update_user'] = $input['branch_chief_employee_no'];
        if (
            (int)$input['general_affairs_confirmation'] == 1 &&
            (int)$input['supervisor_confirmation'] == 1 &&
            (int)$input['branch_chief_confirmation'] == 1
        ) {
            $input['status'] = 4;
        }


        $request->session()->put("form_input", $input);
        \DB::beginTransaction();
        try {
            $contactInfo = ContactInfo::find($input['id']);
            $contactInfo->fill([
                'branch_chief_confirmation' => $input['branch_chief_confirmation'],
                'branch_chief_employee_no' => $input['branch_chief_employee_no'],
                'branch_chief_name' => $input['branch_chief_name'],
                'branch_chief_kana' => $input['branch_chief_kana'],
                'branch_chief_company' => $input['branch_chief_company'],
                'branch_chief_member1' => $input['branch_chief_member1'],
                'status' => $input['status'],
                "update_user" => $input["update_user"],

            ]);
            $contactInfo->save();
            \DB::commit();
        } catch (\Throwable $exception) {
            \DB::rollback();
            dd($exception);
//            abort(500, $exception);
        }
        return redirect()->action([MourningController::class, 'showBranchChiefFinished']);
    }

    /**
     * 支部委員長 終了画面
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showBranchChiefFinished(Request $request)
    {
        $input = $request->session()->get("form_input");
        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerLogin']);
        }
        return view('mourning.branchChiefFinished', ["input" => $input]);
    }


    /**
     * 最終 確認画面へ遷移
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showFinal(MourningRequest $request)
    {
        $input = $request->only($this->formItems);
        // セッションに書き込み
        $request->session()->put("form_input", $input);
        return redirect()->action([MourningController::class, 'showFinalConfirm']);
    }

    /**
     * 最終 確認画面
     * @param MourningRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showFinalConfirm(MourningRequest $request)
    {
        $input = $request->session()->get("form_input");

//        $request->flash();
//        dd($input);
        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerLogin']);
        } else {
            return view("mourning.finalConfirm",
                [
                    "input" => $input,
                    'superiorArray' => $this->superior(),
                    'supervisor_confirmationArray' => $this->supervisor_confirmation(),
                    'companiesArray' => $this->companies(),
                    "keyArray" => $this->keyArray,
                    'statusArray' => $this->status(),
                ]
            );
        }
    }

    /**
     * 最終 編集を登録する
     * @param MourningRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postFinalConfirm(MourningRequest $request)
    {
        // 戻りボタンのとき
        if ($request->back == 'back') {
            $request->flush();
            return redirect()->action([MourningController::class, 'showManagerEdit']);
        }

        $input = $request->session()->get("form_input");

        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerEdit']);
        }

        $input['update_user'] = $input['general_affairs_employee_no'];
        $input['status'] = 5;


        $request->session()->put("form_input", $input);
        \DB::beginTransaction();
        try {
            $contactInfo = ContactInfo::find($input['id']);
            $contactInfo->fill([
                'final_confirmation' => $input['final_confirmation'],
                'status' => $input['status'],
                "update_user" => $input["update_user"],
            ]);
            $contactInfo->save();
            \DB::commit();
        } catch (\Throwable $exception) {
            \DB::rollback();
            dd($exception);
//            abort(500, $exception);
        }
        return redirect()->action([MourningController::class, 'showFinalFinished']);
    }

    /**
     * 最終 終了画面
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showFinalFinished(Request $request)
    {
        $input = $request->session()->get("form_input");
        if (!$input) {
            return redirect()->action([MourningController::class, 'showManagerLogin']);
        }
        return view('mourning.finalFinished', ["input" => $input]);
    }


    /**
     * 一覧画面表示
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAdminList()
    {
        $lists = ContactInfo::paginate(20);
        return view('admin.adminList', [
            'lists' => $lists,
//            'lists'=> DB::table('m_contact_info')->paginate(20),
            'statusArray' => $this->status(),
        ]);
    }

    /**
     * 詳細画面表示
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAdminDetail()
    {
        $lists = ContactInfo::all();
        return view('admin.adminList', [
            'lists' => $lists,
            'statusArray' => $this->status(),
        ]);
    }
}
