<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_contact_info', function (Blueprint $table) {
            $table->id();
            $table->boolean('entrant')->default(false)->comment('入力者選択');
            $table->string('entrant_employee_no',255)->comment('社員番号(代理入力者)')->nullable();
            $table->string('entrant_name',255)->comment('社員氏名(代理入力者)')->nullable();
            $table->string('entrant_kana',255)->comment('フリガナ(代理入力者)')->nullable();
            $table->tinyInteger('entrant_classification')->unsigned()->comment('社員区分')->nullable();
            $table->tinyInteger('entrant_company')->unsigned()->comment('就業会社')->nullable();
            $table->string('entrant_member1',50)->comment('所属①')->nullable();
            $table->string('entrant_member2',50)->comment('所属②')->nullable();
            $table->string('related_employee_no',20)->comment('社員番号');
            $table->string('related_name',255)->comment('社員氏名')->nullable();
            $table->string('related_kana',255)->comment('フリガナ')->nullable();
            $table->tinyInteger('classification')->unsigned()->comment('社員区分')->nullable();
            $table->tinyInteger('company')->unsigned()->comment('就業会社')->nullable();
            $table->string('member1',50)->comment('所属①')->nullable();
            $table->string('member2',50)->comment('所属②')->nullable();
            $table->string('passed_away_name',255)->comment('故人氏名')->nullable();
            $table->string('passed_away_kana',255)->comment('フリガナ（故人）')->nullable();
            $table->tinyInteger('passed_away_relationship')->unsigned()->comment('社員との続柄')->nullable();
            $table->date('passed_away_date')->comment('死亡日時')->nullable();
            $table->boolean('inlaws')->default(false)->comment('社内親族の有無')->nullable();
            $table->string('inlaws_employee_no',255)->comment('社員番号(社内親族)')->nullable();
            $table->string('inlaws_name',255)->comment('社員氏名(社内親族)')->nullable();
            $table->string('inlaws_kana',255)->comment('フリガナ(社内親族)')->nullable();
            $table->tinyInteger('inlaws_company')->unsigned()->comment('就業会社(社内親族)')->nullable();
            $table->string('inlaws_member1',50)->comment('所属①(社内親族)')->nullable();
            $table->string('inlaws_member2',50)->comment('所属②(社内親族)')->nullable();
            $table->boolean('inlaws_condolence')->default(false)->comment('供花/弔電の手配')->nullable();
            $table->boolean('wake')->default(false)->comment('通夜実施の有無')->nullable();
            $table->date('wake_date')->comment('通夜の日付')->nullable();
            $table->string('wake_time_start',30)->comment('通夜の開始時間')->nullable();
            $table->string('wake_time_end',30)->comment('通夜の終了時間')->nullable();
            $table->string('wake_ceremony',100)->comment('通夜の式場名')->nullable();
            $table->string('wake_ceremony_zip',8)->comment('通夜式場の郵便番号')->nullable();
            $table->string('wake_ceremony_addr1',50)->comment('通夜式場の住所①')->nullable();
            $table->string('wake_ceremony_addr2',50)->comment('通夜式場の住所②')->nullable();
            $table->string('wake_ceremony_tel',20)->comment('通夜式場の電話番号')->nullable();
            $table->string('wake_ceremony_url',100)->comment('通夜式場のURL')->nullable();
            $table->text('wake_ceremony_access')->comment('通夜式場の交通手段')->nullable();
            $table->string('wake_attendees1',255)->comment('通夜の参列予定者①')->nullable();
            $table->string('wake_attendees2',255)->comment('通夜の参列予定者②')->nullable();
            $table->string('wake_attendees3',255)->comment('通夜の参列予定者③')->nullable();
            $table->text('wake_attendees')->comment('通夜の参列予定者')->nullable();
            $table->boolean('funeral')->default(false)->comment('告別式実施の有無')->nullable();
            $table->date('funeral_date')->comment('告別式の日付')->nullable();
            $table->string('funeral_time_start', 30)->comment('告別式の開始時間')->nullable();
            $table->string('funeral_time_end', 30)->comment('告別式の終了時間')->nullable();
            $table->boolean('funeral_same_ceremony')->default(false)->comment('通夜と同じ式場')->nullable();
            $table->string('funeral_ceremony',100)->comment('告別式の式場名')->nullable();
            $table->string('funeral_ceremony_zip',8)->comment('告別式場の郵便番号')->nullable();
            $table->string('funeral_ceremony_addr1',50)->comment('告別式場の住所①')->nullable();
            $table->string('funeral_ceremony_addr2',50)->comment('告別式場の住所②')->nullable();
            $table->string('funeral_ceremony_tel',20)->comment('告別式場の電話番号')->nullable();
            $table->string('funeral_ceremony_url',100)->comment('告別式場のURL')->nullable();
            $table->text('funeral_ceremony_access')->comment('告別式場の交通手段')->nullable();
            $table->string('funeral_attendees1',255)->comment('告別式の参列予定者①')->nullable();
            $table->string('funeral_attendees2',255)->comment('告別式の参列予定者②')->nullable();
            $table->string('funeral_attendees3',255)->comment('告別式の参列予定者⑤')->nullable();
            $table->text('funeral_attendees')->comment('告別式の参列予定者')->nullable();
            $table->boolean('chief_mourner')->default(false)->comment('喪主選択')->nullable();
            $table->string('chief_mourner_name',255)->comment('喪主氏名')->nullable();
            $table->string('chief_mourner_kana',255)->comment('フリガナ')->nullable();
            $table->tinyInteger('chief_mourner_relationship')->unsigned()->comment('社員と喪主の関係')->nullable();
            $table->boolean('condolence')->default(false)->comment('弔問の辞退')->nullable();
            $table->boolean('floral_tribute')->default(false)->comment('供花の辞退')->nullable();
            $table->boolean('telegram')->default(false)->comment('弔電の辞退')->nullable();
            $table->boolean('fax_posting')->default(false)->comment('全社FAX/Gネット掲示')->nullable();
            $table->text('remarks')->comment('備考')->nullable();

            $table->boolean('superior')->default(false)->comment('直属の上司確認')->nullable();
            $table->string('superior_employee_no',255)->comment('社員番号(直属の上司)')->nullable();
            $table->string('superior_name',255)->comment('社員氏名(直属の上司)')->nullable();
            $table->string('superior_kana',255)->comment('フリガナ(直属の上司)')->nullable();
            $table->tinyInteger('superior_company')->unsigned()->comment('就業会社(直属の上司)')->nullable();
            $table->string('superior_member1',20)->comment('所属①(直属の上司)')->nullable();
            $table->string('superior_member2',20)->comment('所属②(直属の上司)')->nullable();

            $table->string('social_name1',50)->comment('福祉会規定_差出人①')->nullable();
            $table->tinyInteger('social_telegram1')->unsigned()->comment('福祉会規定_弔電_本数①')->nullable();
            $table->tinyInteger('social_floral_tribute1')->unsigned()->comment('福祉会規定_供花_本数①')->nullable();
            $table->string('social_name2',50)->comment('福祉会規定_差出人②')->nullable();
            $table->tinyInteger('social_telegram2')->unsigned()->comment('福祉会規定_弔電_本数②')->nullable();
            $table->tinyInteger('social_floral_tribute2')->unsigned()->comment('福祉会規定_供花_本数②')->nullable();
            $table->string('social_name3',50)->comment('福祉会規定_差出人③')->nullable();
            $table->tinyInteger('social_condolence_money3')->unsigned()->comment('福祉会規定_弔慰金_金額③')->nullable();

            $table->boolean('social_telegram1_flg')->default(false)->comment('')->nullable();
            $table->boolean('social_telegram2_flg')->default(false)->comment('')->nullable();
            $table->boolean('social_floral_tribute1_flg')->default(false)->comment('')->nullable();
            $table->boolean('social_floral_tribute2_flg')->default(false)->comment('')->nullable();
            $table->boolean('social_condolence_money3_flg')->default(false)->comment('')->nullable();

            $table->string('company_name1',50)->comment('会社規定_差出人①')->nullable();
            $table->boolean('company_attend1')->default(false)->comment('会社規定_差出人①_参列の有無')->nullable();
            $table->tinyInteger('company_telegram1')->unsigned()->comment('会社規定_弔電_本数①')->nullable();
            $table->tinyInteger('company_floral_tribute1')->unsigned()->comment('会社規定_供花_本数①')->nullable();
            $table->tinyInteger('company_condolence_money1')->unsigned()->comment('会社規定_弔慰金_金額①')->nullable();

            $table->string('company_name2',50)->comment('会社規定_差出人②')->nullable();
            $table->string('company_name3',50)->comment('会社規定_弔慰金差出人')->nullable();
            $table->boolean('company_attend2')->default(false)->comment('会社規定_差出人②_参列の有無')->nullable();
            $table->tinyInteger('company_telegram2')->unsigned()->comment('会社規定_弔電_本数②')->nullable();
            $table->tinyInteger('company_floral_tribute2')->unsigned()->comment('会社規定_供花_本数②')->nullable();
            $table->tinyInteger('company_condolence_money2')->unsigned()->comment('会社規定_弔慰金_金額②')->nullable();

            $table->boolean('company_telegram1_flg')->default(false)->comment('')->nullable();
            $table->boolean('company_telegram2_flg')->default(false)->comment('')->nullable();
            $table->boolean('company_floral_tribute1_flg')->default(false)->comment('')->nullable();
            $table->boolean('company_floral_tribute2_flg')->default(false)->comment('')->nullable();
            $table->boolean('company_condolence_money1_flg')->default(false)->comment('')->nullable();
            $table->boolean('company_condolence_money2_flg')->default(false)->comment('')->nullable();


            $table->boolean('reception')->default(false)->comment('総務受付')->nullable();
            $table->dateTime('reception_datetime')->comment('受付日時')->nullable();
            $table->boolean('general_affairs_confirmation')->default(false)->comment('総務確認')->nullable();
            $table->string('general_affairs_employee_no',255)->comment('社員番号(総務)')->nullable();
            $table->string('general_affairs_name',255)->comment('社員氏名(総務)')->nullable();
            $table->string('general_affairs_kana',255)->comment('フリガナ(総務)')->nullable();
            $table->tinyInteger('general_affairs_company')->unsigned()->comment('就業会社(総務)')->nullable();
            $table->string('general_affairs_member1',20)->comment('所属①(総務)')->nullable();
            $table->string('general_affairs_member2',20)->comment('所属②(総務)')->nullable();
            $table->string('general_affairs_contact_toll1', 255)->comment('連絡先(トール)(総務)')->nullable();
            $table->string('general_affairs_contact_toll2', 255)->comment('連絡先(トール)(総務)')->nullable();
            $table->string('general_affairs_contact_info', 255)->comment('連絡先(外線)(総務)')->nullable();
            $table->text('general_affairs_misc')->comment('備考(総務)')->nullable();
            $table->boolean('final_confirmation')->default(false)->comment('最終確認(総務)')->nullable();

            $table->boolean('supervisor_confirmation')->default(false)->comment('所属長確認')->nullable();
            $table->string('supervisor_employee_no',255)->comment('社員番号(所属長)')->nullable();
            $table->string('supervisor_name',255)->comment('社員氏名(所属長)')->nullable();
            $table->string('supervisor_kana', 255)->comment('フリガナ(所属長)')->nullable();
            $table->tinyInteger('supervisor_company')->unsigned()->comment('就業会社(所属長)')->nullable();
            $table->string('supervisor_member1',20)->comment('所属①(所属長)')->nullable();
            $table->string('supervisor_member2',20)->comment('所属②(所属長)')->nullable();


            $table->boolean('branch_chief_confirmation')->default(false)->comment('支部委員長/分会長確認')->nullable();
            $table->string('branch_chief_employee_no',255)->comment('社員番号(支部委員長/分会長)')->nullable();
            $table->string('branch_chief_name',255)->comment('社員氏名(支部委員長/分会長長)')->nullable();
            $table->string('branch_chief_kana', 255)->comment('フリガナ(支部委員長/分会長)')->nullable();
            $table->tinyInteger('branch_chief_company')->unsigned()->comment('就業会社(支部委員長/分会長)')->nullable();
            $table->string('branch_chief_member1',20)->comment('所属①(支部委員長/分会長)')->nullable();
            $table->string('branch_chief_member2',20)->comment('所属②(支部委員長/分会長)')->nullable();


            $table->tinyInteger('status')->unsigned()->comment('入力状況')->nullable();
            $table->string('password',255)->comment('パスワード')->nullable();
            $table->string('create_user',20)->comment('登録者')->nullable();
            $table->string('update_user',20)->comment('更新者')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_contact_info');
    }
};
