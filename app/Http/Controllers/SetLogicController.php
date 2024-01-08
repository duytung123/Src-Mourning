<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class SetLogicController extends Controller
{
    public function set(Request $request)
    {
        $input = $request->session()->get("form_input");
        if (!$input) {
            return redirect()->action([MourningController::class, 'showEdit']);
        }
        if(isset($input['0'])){
            $input = ContactInfo::find($input['0']['id']);
        }else{
            $input = ContactInfo::find($input['id']);
        }

        $request->session()->put("form_input", $input);

        // 福祉会規定
        if ($input['classification'] == 8)
        {
            $input['social_name1'] = '';
            $input['social_name2'] = '';
            $input['social_name3'] = '';
            $input['social_telegram1'] = null;
            $input['social_telegram2'] = null;
            $input['social_floral_tribute1'] = null;
            $input['social_floral_tribute2'] = null;
            $input['social_condolence_money3'] = null;
            $input['social_telegram1_flg'] = 1;
            $input['social_telegram2_flg'] = 1;
            $input['social_floral_tribute1_flg'] = 1;
            $input['social_floral_tribute2_flg'] = 1;
            $input['social_condolence_money3_flg'] = 1;

        }
        else
        {
            // 差出人名
            $input['social_name1'] = '株式会社丸井グループ代表取締役 青井 浩';
            $input['social_name2'] = 'マルイグループユニオン中央執行委員長 金田 素樹';
            $input['social_name3'] = 'マルイグループ福祉会';
            $input['social_telegram1_flg'] = 0;
            $input['social_telegram2_flg'] = 0;
            $input['social_floral_tribute1_flg'] = 0;
            $input['social_floral_tribute2_flg'] = 0;

            // 弔電の有無
            if ((int)$input['telegram'] != 1) {
                // 弔電を辞退しない時
                $input['social_telegram1'] = 1;
                $input['social_telegram2'] = 1;
            } else {
                $input['social_telegram1'] = 0;
                $input['social_telegram2'] = 0;
                $input['social_telegram1_flg'] = 1;
                $input['social_telegram2_flg'] = 1;
            }

            if (((int)$input['chief_mourner'] == 1 && (int)$input['passed_away_relationship'] == 7) || ((int)$input['chief_mourner'] == 0 && (int)$input['passed_away_relationship'] == 1)) {
                $input['social_telegram1'] = null;
                $input['social_telegram2'] = null;
                $input['social_telegram1_flg'] = 1;
                $input['social_telegram2_flg'] = 1;
            }

            // 供花の辞退
            switch ($input['floral_tribute']) {
                case 1:
                    // 辞退する
                    $input['social_floral_tribute1'] = 0;
                    $input['social_floral_tribute2'] = 0;
                    // Edit by IVS 2023/12/01
                    $input['social_floral_tribute1_flg'] = 1;
                    $input['social_floral_tribute2_flg'] = 1;
                    // End edit IVS 2023/12/01
                    break;
                default:
                    // 辞退しない
                    $input['social_floral_tribute1'] = 1;
                    $input['social_floral_tribute2'] = 1;
            }
            if (
                ((int)$input['chief_mourner'] == 1 && ((int)$input['passed_away_relationship'] == 6 || (int)$input['passed_away_relationship'] == 7)) ||
                ((int)$input['chief_mourner'] == 0 && (int)$input['passed_away_relationship'] == 1)
            ) {
                $input['social_floral_tribute1'] = null;
                $input['social_floral_tribute2'] = null;
                $input['social_floral_tribute1_flg'] = 1;
                $input['social_floral_tribute2_flg'] = 1;
            }


            // 福祉会の弔慰金
            $input['social_condolence_money3'] = match ((int)$input['passed_away_relationship']) {
                2 => 10,
                3, 4, 5 => 2,
                default => null,
            };
            $input['social_condolence_money3_flg'] = match ((int)$input['passed_away_relationship']) {
                2, 3, 4, 5 => 0,
                default => 1,
            };
            if ((int)$input['chief_mourner'] == 1 && (int)$input['passed_away_relationship'] == 1) {
                $input['social_condolence_money3'] = 10;
                $input['social_condolence_money3_flg'] = 0;
            }
        }

        // 会社規定
        $input['company_telegram1'] = null;
        $input['company_telegram2'] = null;
        $input['company_floral_tribute1'] = null;
        $input['company_floral_tribute2'] = null;
        $input['company_condolence_money1'] = null;
        $input['company_condolence_money2'] = null;
        $input['company_attend1'] = 1;
        $input['company_attend2'] = 1;
        $input['company_telegram1_flg'] = 1;
        $input['company_telegram2_flg'] = 1;
        $input['company_floral_tribute1_flg'] = 1;
        $input['company_floral_tribute2_flg'] = 1;
        $input['company_condolence_money1_flg'] = 1;
        $input['company_condolence_money2_flg'] = 1;
        if ((int)$input['classification'] == 7 || (int)$input['classification'] == 8) {
            // 社員区分 = 社員T(組合加入)
            // 社員区分 = 社員T(組合未加入)
            $input['company_name1'] = null;
            $input['company_name3'] = null;

            if ((int)$input['chief_mourner'] == 1 && (int)$input['passed_away_relationship'] == 1) {
                // 本人喪主
                // 逝去者との関係=パートナー
                $input['company_telegram2_flg'] = 0;
                $input['company_floral_tribute2_flg'] = 0;
                $input['company_condolence_money2_flg'] = 0;
            }

            if ((int)$input['company'] == 1) {
                // 丸井グループ
                $input['company_name2'] = '部長';
            } else {
                // 丸井グループ以外
                $input['company_name2'] = '所属長';
            }
            if ((int)$input['chief_mourner'] == 1 && (int)$input['passed_away_relationship'] == 1) {// 本人喪主ではない
                // 弔慰金
                $input['company_condolence_money2'] = 1;

                // 弔電
                $input['company_telegram2_flg'] = 0;
                if ((int)$input['telegram'] != 1) {
                    // $input['company_telegram2'] = 1;
                    $input['company_telegram2'] = 0;
                } else {
                    // $input['company_telegram2'] = 0;
                    $input['company_telegram2'] = 1;
                    $input['company_telegram2_flg'] = 1;
                }
            }
            // Edit by IVS 2023/12/01
            if ((int)$input['condolence'] == 2) {
                // 弔問を辞退
                $input['company_attend1'] = 2;
                $input['company_attend2'] = 2;
                $input['company_telegram2_flg'] = 1;
            }else{
                $input['company_attend1'] = 1;
                $input['company_attend2'] = 1;
                $input['company_telegram2_flg'] = 0;
                $input['company_telegram2'] = 1;
            }
            if((int)$input['passed_away_relationship'] != 1){
                $input['company_telegram2_flg'] = 1;
            }
            // End edit by IVS 2023/12/01
        }
        else
        {
            // 社員区分 G, S1, S2, E, GM, 役員
            $input['company_telegram1_flg'] = 0;
            $input['company_telegram2_flg'] = 0;
            // 差出人の自動設定
            if ((int)$input['company'] == 1) {
                // 丸井グループ
                $input['company_name1'] = '担当役員';
                $input['company_name2'] = '部長';
                $input['company_name3'] = '株式会社丸井グループ代表取締役';
            } elseif ((int)$input['company'] == 8 || (int)$input['company'] == 10 || (int)$input['classification'] == 6) {
                // マルイファシリティーズ, マルイホームサービス, 役員
                $input['company_name1'] = '';
                $input['company_name2'] = '';
                $input['company_name3'] = '';
            } else {
                // 上記以外
                $input['company_name1'] = '株式会社丸井グループ代表取締役';
                $input['company_name2'] = '所属長';
                $input['company_name3'] = '';
            }
            // 弔電の有無
            // Edit by IVS 2023/12/01
            if ((int)$input['telegram'] != 1) {
                // 弔電を辞退しない時
                $input['company_telegram1'] = 1;
                $input['company_telegram2'] = 1;
            }else{
                $input['company_telegram1_flg'] = 1;
                $input['company_telegram2_flg'] = 1;
            }
            if((int)$input['condolence'] == 2) {
                $input['company_telegram1_flg'] = 1;
                $input['company_telegram2_flg'] = 1;
            }else{
                $input['company_telegram1'] = 1;
                $input['company_telegram2'] = 1;
            }
            // End edit by IVS 2023/12/01
            if ((int)$input['company'] == 8 || (int)$input['company'] == 10 || (int)$input['classification'] == 6) {
                // マルイファシリティーズ, マルイホームサービス, 役員
                $input['company_telegram1'] = null;
                $input['company_telegram2'] = null;
                $input['company_telegram1_flg'] = 0;
                $input['company_telegram2_flg'] = 0;
            } elseif ((int)$input['chief_mourner'] == 0 && (int)$input['passed_away_relationship'] == 1) {
                // 本人喪主、逝去者との関係=本人
                $input['company_telegram1'] = 0;
                $input['company_telegram2'] = 0;
                $input['company_telegram1_flg'] = 1;
                $input['company_telegram2_flg'] = 1;
            } elseif ((int)$input['chief_mourner'] == 1 && (int)$input['passed_away_relationship'] == 6) {
                // 本人以外が喪主、逝去者との関係=祖父母(同居)・実兄弟姉妹
                $input['company_telegram1'] = 0;
                $input['company_telegram1_flg'] = 1;
            } elseif ((int)$input['chief_mourner'] == 1 && (int)$input['passed_away_relationship'] == 7) {
                // 本人以外が喪主、逝去者との関係=祖父母(別居)・義兄弟姉妹
                $input['company_telegram1'] = 0;
                $input['company_telegram2'] = 0;
                $input['company_telegram1_flg'] = 1;
                $input['company_telegram2_flg'] = 1;
            }

            // 供花
            $input['company_floral_tribute1_flg'] = 0;
            $input['company_floral_tribute2_flg'] = 0;

            switch ((int)$input['floral_tribute']) {
                case 1:
                    // 辞退する
                    $input['company_floral_tribute1'] = 0;
                    $input['company_floral_tribute2'] = 0;
                    // Edit by IVS 2023/12/01
                    $input['company_floral_tribute1_flg'] = 1;
                    $input['company_floral_tribute2_flg'] = 1;
                    // End edit IVS 2023/12/01
                    break;
                default:
                    // 辞退しない
                    $input['company_floral_tribute1'] = 1;
                    $input['company_floral_tribute2'] = 1;
                    break;
            }
            // Edit by IVS 2023/12/01
            if((int)$input['condolence'] != 1 && (int)$input['floral_tribute'] == 1){
                $input['company_telegram1_flg'] = 0;
                $input['company_telegram2_flg'] = 0;
                $input['company_telegram1'] = 1;
                $input['company_telegram2'] = 1;
            }
            if((int)$input['floral_tribute'] == 1 && (int)$input['telegram'] == 1){
                $input['company_telegram1_flg'] = 1;
                $input['company_telegram2_flg'] = 1;
            }
            // End edit by IVS 2023/12/01
            if ((int)$input['chief_mourner'] == 0 && (int)$input['passed_away_relationship'] == 1) {
                // 本人喪主、逝去者との関係= パートナー
                $input['company_floral_tribute1'] = 0;
                $input['company_floral_tribute2'] = 0;
                $input['company_floral_tribute1_flg'] = 1;
                $input['company_floral_tribute2_flg'] = 1;
            } else if ((int)$input['chief_mourner'] == 1 && ((int)$input['passed_away_relationship'] == 4 || (int)$input['passed_away_relationship'] == 5 || (int)$input['passed_away_relationship'] == 6 || (int)$input['passed_away_relationship'] == 7)) {
                // 本人以外喪主、逝去者との関係: [実父母(別居), 義・養父母, 祖父母(同居)・実兄弟姉妹, 祖父母(別居)・義兄弟姉妹]
                $input['company_floral_tribute1'] = 0;
                $input['company_floral_tribute2'] = 0;
                $input['company_floral_tribute1_flg'] = 1;
                $input['company_floral_tribute2_flg'] = 1;
            } else if((int)$input['company'] == 8 || (int)$input['company'] == 10 || (int)$input['classification'] == 6) {
                // マルイファシリティーズ, マルイホームサービス, 役員
                $input['company_floral_tribute1'] = null;
                $input['company_floral_tribute2'] = null;
                $input['company_floral_tribute1_flg'] = 0;
                $input['company_floral_tribute2_flg'] = 0;

            }
            // 弔問
            if ((int)$input['condolence'] == 2) {
                // 弔問を辞退
                switch ((int)$input['passed_away_relationship']) {
                    case 1:
                    case 2:
                        $input['company_attend1'] = 2;
                        $input['company_attend2'] = 2;
                        $input['company_telegram1'] = 0;
                        $input['company_telegram2'] = 0;
                        break;
                }
            }
            if ((int)$input['company'] == 8 || (int)$input['company'] == 10 || (int)$input['classification'] == 6) {
                // マルイファシリティーズ, マルイホームサービス, 役員
                $input['company_attend1'] = 1;
                $input['company_attend2'] = 1;
                $input['company_telegram1'] = null;
                $input['company_telegram2'] = null;
            }

            // 弔慰金
            $input['company_condolence_money1_flg'] = 0;
            $input['company_condolence_money2_flg'] = 0;
            if ((int)$input['chief_mourner'] == 0) {
                // 本人喪主
                switch ((int)$input['passed_away_relationship']) {
                    case 1:
                        // 逝去者: 本人
                        $input['company_condolence_money1'] = null;
                        $input['company_condolence_money2'] = null;
                        $input['company_condolence_money1_flg'] = 1;
                        $input['company_condolence_money2_flg'] = 1;
                        break;
                    case 2:
                        // 逝去者: パートナー・子
                        $input['company_condolence_money1'] = 3;
                        $input['company_condolence_money2'] = 1;
                        break;
                    default:
                        $input['company_condolence_money1'] = 1;
                        $input['company_condolence_money2'] = 1;
                }
            } else {
                // 本人以外喪主
                switch ((int)$input['passed_away_relationship']) {
                    case 1:
                        // 逝去者： 本人
                        $input['company_condolence_money1'] = 5;
                        $input['company_condolence_money2'] = 1;
                        break;
                    case 2:
                        // 逝去者: パートナー・子
                        $input['company_condolence_money1'] = 3;
                        $input['company_condolence_money2'] = 1;
                        break;
                    case 3:
                    case 4:
                    case 5:
                        // 逝去者: [実父母(同居), 実父母(別居), 義・養父母]
                        $input['company_condolence_money1'] = null;
                        $input['company_condolence_money2'] = 1;
                        $input['company_condolence_money1_flg'] = 1;
                        break;
                    default:
                        $input['company_condolence_money1_flg'] = 1;
                        $input['company_condolence_money2_flg'] = 1;
                }

            }
            if ((int)$input['company'] == 8 || (int)$input['company'] == 10 || (int)$input['classification'] == 6) {
                // マルイファシリティーズ, マルイホームサービス, 役員
                $input['company_condolence_money1'] = null;
                $input['company_condolence_money2'] = null;
                $input['company_condolence_money1_flg'] = 0;
                $input['company_condolence_money2_flg'] = 0;
            }

        }
        // dd($input);
        \DB::beginTransaction();
        try {
            $contactInfo = ContactInfo::find($input['id']);
            $contactInfo->fill([

                "social_name1" => $input['social_name1'],
                "social_name2" => $input['social_name2'],
                "social_name3" => $input['social_name3'],
                "social_telegram1" => $input["social_telegram1"],
                "social_telegram2" => $input["social_telegram2"],
                "social_floral_tribute1" => $input["social_floral_tribute1"],
                "social_floral_tribute2" => $input["social_floral_tribute2"],
                "social_condolence_money3" => $input["social_condolence_money3"],

                'social_telegram1_flg' => $input["social_telegram1_flg"],
                'social_telegram2_flg' => $input["social_telegram2_flg"],
                'social_floral_tribute1_flg' => $input["social_floral_tribute1_flg"],
                'social_floral_tribute2_flg' => $input["social_floral_tribute2_flg"],
                'social_condolence_money3_flg' => $input["social_condolence_money3_flg"],

                "company_name1" => $input['company_name1'],
                "company_name2" => $input['company_name2'],
                "company_name3" => $input['company_name3'],
                "company_telegram1" => $input["company_telegram1"],
                "company_telegram2" => $input["company_telegram2"],
                "company_floral_tribute1" => $input["company_floral_tribute1"],
                "company_floral_tribute2" => $input["company_floral_tribute2"],
                "company_condolence_money1" => $input["company_condolence_money1"],
                "company_condolence_money2" => $input["company_condolence_money2"],
                "company_attend1" => $input["company_attend1"],
                "company_attend2" => $input["company_attend2"],
                'company_telegram1_flg' => $input["company_telegram1_flg"],
                'company_telegram2_flg' => $input["company_telegram2_flg"],
                'company_floral_tribute1_flg' => $input["company_floral_tribute1_flg"],
                'company_floral_tribute2_flg' => $input["company_floral_tribute2_flg"],
                'company_condolence_money1_flg' => $input["company_condolence_money1_flg"],
                'company_condolence_money2_flg' => $input["company_condolence_money2_flg"],

            ]);


            $contactInfo->save();
            \DB::commit();
        } catch (\Throwable $exception) {
            \DB::rollback();
            dd($exception);
//            abort(500, $exception);
        }


    }
}
