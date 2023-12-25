<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class ContactInfo extends Model
{
  use HasFactory;

  public array $formItems = [
    "id",
    "entrant", "entrant_employee_no", "entrant_name", "entrant_kana", "entrant_classification", "entrant_company", "entrant_member1", "entrant_member2",
    "related_employee_no", "membership_year", "related_name", "related_kana", "classification", "company", "member1", "member2",
    "passed_away_name", "passed_away_kana", "passed_away_relationship", "passed_away_date",
    "inlaws", "inlaws_employee_no", "inlaws_name", "inlaws_kana", "inlaws_company", "inlaws_member1", "inlaws_member2", "inlaws_contact", "inlaws_condolence",
    "wake", "wake_date", "wake_time_start", "wake_time_end", "wake_ceremony", "wake_ceremony_zip", "wake_ceremony_addr1", "wake_ceremony_addr2", "wake_ceremony_tel", "wake_ceremony_url", "wake_ceremony_access", "wake_attendees1", "wake_attendees2", "wake_attendees3", "wake_attendees",
    "funeral", "funeral_date", "funeral_time_start", "funeral_time_end", "funeral_same_ceremony", "funeral_ceremony", "funeral_ceremony_zip", "funeral_ceremony_addr1", "funeral_ceremony_addr2", "funeral_ceremony_tel", "funeral_ceremony_url", "funeral_ceremony_access", "funeral_attendees1", "funeral_attendees2", "funeral_attendees3", "funeral_attendees", "chief_mourner", "chief_mourner_name", "chief_mourner_kana", "chief_mourner_relationship", "condolence", "floral_tribute", "telegram", "fax_posting", "remarks", "superior", "superior_employee_no", "superior_name", "superior_kana", "superior_company", "superior_member1", "superior_member2",
    "social_name1", "social_telegram1", "social_floral_tribute1", "social_name2", "social_telegram2", "social_floral_tribute2", "social_name3", "social_condolence_money3", "social_telegram1_flg", "social_floral_tribute1_flg", "social_telegram2_flg", "social_floral_tribute2_flg", "social_condolence_money3_flg",
    "company_name1", "company_attend1", "company_telegram1", "company_floral_tribute1", "company_condolence_money1", "company_name2", "company_attend2", "company_telegram2", "company_floral_tribute2", "company_condolence_money2", "company_telegram1_flg", "company_floral_tribute1_flg", "company_condolence_money1_flg", "company_telegram2_flg", "company_floral_tribute2_flg", "company_condolence_money2_flg",
    "reception", "reception_datetime",
    "general_affairs_confirmation", "general_affairs_employee_no", "general_affairs_name", "general_affairs_kana", "general_affairs_company", "general_affairs_member1", "general_affairs_member2", "general_affairs_contact_toll1", "general_affairs_contact_toll2", "general_affairs_contact_info", "general_affairs_misc",
    "final_confirmation",
    "supervisor_confirmation", "supervisor_employee_no", "supervisor_name", "supervisor_kana", "supervisor_company", "supervisor_member1", "supervisor_member2",
    "branch_chief_confirmation", "branch_chief_employee_no", "branch_chief_name", "branch_chief_kana", "branch_chief_company", "branch_chief_member1", "branch_chief_member2",
    "status", "password", "create_user", "update_user", "deleted_at", "created_at", "updated_at",
    "form", "previous",
    "passedAwayDate", "wakeDate", "funeralDate"
  ];

// 入力者
  public function entrant(): array
  {
    return array(0 => '本人(弔事当事者)', 1 => '代理者の入力');
  }

  // 社内親族
  public function inlaws(): array
  {
    return array(0 => 'なし', 1 => 'あり');
  }

  // 供花/弔電の手配
  public function inlaws_condolence(): array
  {
    return array(0 => '自分の事業所からの手配を優先する', 1 => '親族の事業所からの手配を優先する');
  }

  // 通夜を行う
  public function wake(): array
  {
    return array(0 => '通夜を行う', 1 => '通夜を行なわない');
  }

  // 告別式を行う
  public function funeral(): array
  {
    return array(0 => '告別式を行う', 1 => '告別式を行わない');
  }

  // 通夜と同じ式場
  public function funeral_same_ceremony(): array
  {
    return array(0 => '通夜の式場と同じ', 1 => '通夜の式場と異なる');
  }

  // 本人喪主
  public function chief_mourner(): array
  {
    return array(0 => '本人(弔事当事者)が喪主', 1 => '本人(弔事当事者)以外が喪主');
  }

  // 弔問を辞退
  public function condolence(): array
  {
    return array(0=> 'null', 1 => 'はい', 2 => 'いいえ');
  }

  // 供花を辞退
  public function floral_tribute(): array
  {
    return array(0=> 'null', 1 => 'はい', 2 => 'いいえ');
  }

  // 弔電を辞退
  public function telegram(): array
  {
    return array(0=> 'null', 1 => 'はい', 2 => 'いいえ');
  }

  // 全社FAX/Gネット掲示へ掲載
  public function fax_posting(): array
  {
    return array(0 => '全社FAX / Gネット掲示へ掲載を希望する', 1 => '全社FAX / Gネット掲示へ掲載を辞退する');
  }

  // 直属の上司確認
  public function superior(): array
  {
    return array(0=> null, 1 => '未確認', 2 => '確認済');
  }

  // 会社規定 参列①
  public function company_attend1(): array
  {
    return array(0 => 'いいえ', 1 => 'はい');
  }

  // 会社規定 参列②
  public function company_attend2(): array
  {
    return array(0 => 'いいえ', 1 => 'はい');
  }

  // 総務担当受付
  public function reception(): array
  {
    return array(0 => '未受付', 1 => '受付済');
  }

  // 総務担当確認
  public function general_affairs_confirmation(): array
  {
    return array(0 => '未確認', 1 => '確認済');
  }

  // 総務担当の最終確認
  public function final_confirmation(): array
  {
    return array(0 => '未確認', 1 => '確認済');
  }

  // 所属長確認
  public function supervisor_confirmation(): array
  {
    return array(0 => '未確認', 1 => '確認済');
  }

  // 支部委員長確認
  public function branch_chief_confirmation(): array
  {
    return array(0 => '未確認', 1 => '確認済');
  }

  public function classifications(): array
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

  public function companies(): array
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

  public function chiefMournerRelationship(): array
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

  public function passedAwayRelationship(): array
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

  public function status(): array
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
  public function statusDesc(): array
  {
    $data = Status::where('deleted_at', null)
      ->orderByDesc('sort')
      ->get();

    $res = array();
    foreach ($data as $array) {
      $res[$array->id] = $array->status;
    }
    return $res;
  }

  public function showDate($date)
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

  public function showDatetime($date)
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


  // テーブル名
  protected $table = 'm_contact_info';

  //  暗号化項目
  protected $casts = [
    'entrant_name' => 'encrypted',
    'entrant_kana' => 'encrypted',
    'related_name' => 'encrypted',
    'related_kana' => 'encrypted',
    'passed_away_name' => 'encrypted',
    'passed_away_kana' => 'encrypted',
    'inlaws_employee_no' => 'encrypted',
    'inlaws_name' => 'encrypted',
    'inlaws_kana' => 'encrypted',
    'inlaws_contact' => 'encrypted',
    'wake_attendees1' => 'encrypted',
    'wake_attendees2' => 'encrypted',
    'wake_attendees3' => 'encrypted',
    'wake_attendees' => 'encrypted',
    'funeral_attendees1' => 'encrypted',
    'funeral_attendees2' => 'encrypted',
    'funeral_attendees3' => 'encrypted',
    'funeral_attendees' => 'encrypted',
    'chief_mourner_name' => 'encrypted',
    'chief_mourner_kana' => 'encrypted',
    'remarks' => 'encrypted',
    'superior_employee_no' => 'encrypted',
    'superior_name' => 'encrypted',
    'superior_kana' => 'encrypted',
    'general_affairs_name' => 'encrypted',
    'general_affairs_kana' => 'encrypted',
    'general_affairs_contact_info' => 'encrypted',
    'supervisor_employee_no' => 'encrypted',
    'supervisor_name' => 'encrypted',
    'supervisor_kana' => 'encrypted',
    'branch_chief_employee_no' => 'encrypted',
    'branch_chief_name' => 'encrypted',
    'branch_chief_kana' => 'encrypted',
    'password' => 'encrypted',
  ];

  //可変項目
  protected $fillable = [
    'entrant',
    'entrant_employee_no',
    'entrant_name',
    'entrant_kana',
    'entrant_classification',
    'entrant_company',
    'entrant_member1',
    'entrant_member2',
    'related_employee_no',
    'related_name',
    'related_kana',
    'classification',
    'company',
    'member1',
    'member2',
    'passed_away_name',
    'passed_away_kana',
    'passed_away_relationship',
    'passed_away_date',
    'inlaws',
    'inlaws_employee_no',
    'inlaws_name',
    'inlaws_kana',
    'inlaws_company',
    'inlaws_member1',
    'inlaws_member2',
    'inlaws_contact',
    'encrypted',
    'inlaws_condolence',
    'wake',
    'wake_date',
    'wake_time_start',
    'wake_time_end',
    'wake_ceremony',
    'wake_ceremony_zip',
    'wake_ceremony_addr1',
    'wake_ceremony_addr2',
    'wake_ceremony_tel',
    'wake_ceremony_url',
    'wake_ceremony_access',
    'wake_attendees1',
    'wake_attendees2',
    'wake_attendees3',
    'wake_attendees',
    'funeral',
    'funeral_date',
    'funeral_time_start',
    'funeral_time_end',
    'funeral_same_ceremony',
    'funeral_ceremony',
    'funeral_ceremony_zip',
    'funeral_ceremony_addr1',
    'funeral_ceremony_addr2',
    'funeral_ceremony_tel',
    'funeral_ceremony_url',
    'funeral_ceremony_access',
    'funeral_attendees1',
    'funeral_attendees2',
    'funeral_attendees3',
    'funeral_attendees',
    'chief_mourner',
    'chief_mourner_name',
    'chief_mourner_kana',
    'chief_mourner_relationship',
    'condolence',
    'floral_tribute',
    'telegram',
    'fax_posting',
    'remarks',
    'superior',
    'superior_employee_no',
    'superior_name',
    'superior_kana',
    'superior_company',
    'superior_member1',
    'superior_member2',
    'social_name1',
    'social_telegram1',
    'social_floral_tribute1',
    'social_name2',
    'social_telegram2',
    'social_floral_tribute2',
    'social_name3',
    'social_condolence_money3',

    'social_telegram1_flg',
    'social_telegram2_flg',
    'social_floral_tribute1_flg',
    'social_floral_tribute2_flg',
    'social_condolence_money3_flg',

    'company_name1',
    'company_attend1',
    'company_telegram1',
    'company_floral_tribute1',
    'company_condolence_money1',
    'company_name2',
    'company_attend2',
    'company_telegram2',
    'company_floral_tribute2',
    'company_condolence_money2',

    'company_telegram1_flg',
    'company_telegram2_flg',
    'company_floral_tribute1_flg',
    'company_floral_tribute2_flg',
    'company_condolence_money2_flg',
    'company_condolence_money1_flg',


    'reception',
    'reception_datetime',
    'general_affairs_confirmation',
    'general_affairs_employee_no',
    'general_affairs_name',
    'general_affairs_kana',
    'general_affairs_company',
    'general_affairs_member1',
    'general_affairs_member2',
    'general_affairs_contact_toll1',
    'general_affairs_contact_toll2',
    'general_affairs_contact_info',
    'general_affairs_misc',

    'final_confirmation',

    'supervisor_confirmation',
    'supervisor_employee_no',
    'supervisor_name',
    'supervisor_kana',
    "supervisor_company",
    "supervisor_member1",
    "supervisor_member2",

    'branch_chief_confirmation',
    'branch_chief_employee_no',
    'branch_chief_name',
    'branch_chief_kana',
    "branch_chief_company",
    "branch_chief_member1",
    "branch_chief_member2",

    'status',
    'password',
    'create_user',
    'update_user',
    'sort',
    'deleted_at',
    'created_at',
    'updated_at',

    'membership_year',
  ];
  protected $hidden = [
    'password',
  ];

}
