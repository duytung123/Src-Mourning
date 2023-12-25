<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SetupController extends Controller
{

  /**
   * データーベースの値の初期値導入
   * @return void
   */
  public function setup()
  {
    // m_chief_mourner_relationships
    if (!DB::table('m_chief_mourner_relationships')->where('id', '1')->exists()) {
      $chiefMournerRelationship = [
        ['relationship' => 'パートナー', 'sort' => '1'],
        ['relationship' => '実・義父母', 'sort' => '2'],
        ['relationship' => '実・義祖父母', 'sort' => '3'],
        ['relationship' => '実・義兄弟姉妹', 'sort' => '4'],
        ['relationship' => '子供', 'sort' => '5'],
        ['relationship' => '叔父（伯父）・叔母（伯母）', 'sort' => '6'],
        ['relationship' => '甥・姪', 'sort' => '7'],
        ['relationship' => 'その他 ', 'sort' => '8'],
      ];
      DB::table('m_chief_mourner_relationships')->insert($chiefMournerRelationship);
    }

    // m_classifications
    if (!DB::table('m_classifications')->where('id', '1')->exists()) {
      $classifications = [
        ['classification' => 'G', 'sort' => '1'],
        ['classification' => 'S①', 'sort' => '2'],
        ['classification' => 'S②', 'sort' => '3'],
        ['classification' => 'E', 'sort' => '4'],
        ['classification' => 'GM', 'sort' => '5'],
        ['classification' => '役員', 'sort' => '6'],
        ['classification' => '社員T（組合加入）', 'sort' => '7'],
        ['classification' => '社員T（組合未加入）', 'sort' => '8'],
      ];
      DB::table('m_classifications')->insert($classifications);
    }

    // m_companies
    if (!DB::table('m_companies')->where('id', '1')->exists()) {
      $companies = [
        ['company' => '丸井グループ', 'sort' => '1'],
        ['company' => '丸井', 'sort' => '2'],
        ['company' => 'エポスカード', 'sort' => '3'],
        ['company' => 'MRI債権回収', 'sort' => '4'],
        ['company' => 'エポス少額短期保険', 'sort' => '5'],
        ['company' => 'エイムクリエイツ', 'sort' => '6'],
        ['company' => 'エムアンドシーシステム', 'sort' => '7'],
        ['company' => 'マルイファシリティーズ', 'sort' => '8'],
        ['company' => 'ムービング', 'sort' => '9'],
        ['company' => 'マルイホームサービス', 'sort' => '10'],
        ['company' => 'マルイキットセンター', 'sort' => '11'],
        ['company' => 'tsumiki証券', 'sort' => '12'],
        ['company' => 'D2C&Co.', 'sort' => '13'],
        ['company' => 'okos', 'sort' => '14'],
        ['company' => '丸井健康保険組合', 'sort' => '15'],
        ['company' => 'マルイグループユニオン・福祉会', 'sort' => '16'],
      ];
      DB::table('m_companies')->insert($companies);
    }

    // m_passed_away_relationships
    if (!DB::table('m_passed_away_relationships')->where('id', '1')->exists()) {
      $passedAwayRelationships = [
        ['relationship' => '本人', 'sort' => '1'],
        ['relationship' => 'パートナー・子', 'sort' => '2'],
        ['relationship' => '実父母(同居)', 'sort' => '3'],
        ['relationship' => '実父母(別居)', 'sort' => '4'],
        ['relationship' => '義・養父母', 'sort' => '5'],
        ['relationship' => '祖父母(同居)・実兄弟姉妹', 'sort' => '6'],
        ['relationship' => '祖父母(別居)・義兄弟姉妹', 'sort' => '7'],
      ];
      DB::table('m_passed_away_relationships')->insert($passedAwayRelationships);
    }

    // m_statuses
    if (!DB::table('m_statuses')->where('id', '1')->exists()) {
      $statuses = [
        ['status' => '入力中', 'sort' => '1'],
        ['status' => '直属の上司の確認済み', 'sort' => '2'],
        ['status' => '総務、支部役員、所属長 確認中', 'sort' => '3'],
        ['status' => '総務、支部役員、所属長 確認済み', 'sort' => '4'],
        ['status' => '完了', 'sort' => '5'],
      ];
      DB::table('m_statuses')->insert($statuses);
    }
  }
}
