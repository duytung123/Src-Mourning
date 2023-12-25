<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ContactInfo;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactInfo>
 */
class ContactInfoFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = ContactInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'entrant' => $this->faker->numberBetween(0,1) ,
            'entrant_employee_no'=> $this->faker->regexify('[1-9]{7}') ,
            'entrant_name'=> $this->faker->name() ,
            'entrant_kana'=> $this->faker->kanaName() ,
            'entrant_classification' => $this->faker->numberBetween(1,8) ,
            'entrant_company' => $this->faker->numberBetween(1,16) ,
            'entrant_member1'=> $this->faker->realText(10) ,
            'entrant_member2'=> $this->faker->realText(10) ,
            'related_employee_no'=> $this->faker->regexify('[1-9]{7}') ,
            'related_name'=> $this->faker->name() ,
            'related_kana'=> $this->faker->kanaName() ,
            'classification' => $this->faker->numberBetween(1,8) ,
            'company' => $this->faker->numberBetween(1,16) ,
            'member1'=> $this->faker->realText(10) ,
            'member2'=> $this->faker->realText(10) ,
            'passed_away_name'=> $this->faker->name() ,
            'passed_away_kana'=> $this->faker->kanaName() ,
            'passed_away_relationship' => $this->faker->numberBetween(1,7) ,
            'passed_away_date' => $this->faker->date($format='Y-m-d',$max='now') ,
            'inlaws' => $this->faker->numberBetween(0,1) ,
            'inlaws_employee_no'=> $this->faker->regexify('[1-9]{7}') ,
            'inlaws_name'=> $this->faker->name() ,
            'inlaws_kana'=> $this->faker->kanaName() ,
            'inlaws_company' => $this->faker->numberBetween(1,16)  ,
            'inlaws_member1'=> $this->faker->realText(10) ,
            'inlaws_member2'=> $this->faker->realText(10) ,
            'inlaws_condolence' => $this->faker-> numberBetween(0,1),
            'wake' => $this->faker->numberBetween(0,1) ,
            'wake_date' => $this->faker->date($format='Y-m-d',$max='now') ,
            'wake_time_start'=> $this->faker->date($format = 'Y-m-d') ,
            'wake_time_end'=> $this->faker->date($format = 'Y-m-d')  ,
            'wake_ceremony'=> $this->faker->company() ,
            'wake_ceremony_zip'=> $this->faker->postcode() ,
            'wake_ceremony_addr1'=> $this->faker->prefecture() ,
            'wake_ceremony_addr2'=> $this->faker->ward() ,
            'wake_ceremony_tel'=> $this->faker->phoneNumber() ,
            'wake_ceremony_url'=> $this->faker->url() ,
            'wake_ceremony_access' => $this->faker->realText(100) ,
            'wake_attendees1'=> $this->faker->name() ,
            'wake_attendees2'=> $this->faker->name() ,
            'wake_attendees3'=> $this->faker->name() ,
            'wake_attendees' => $this->faker->name() ,
            'funeral' => $this->faker->numberBetween(0,1) ,
            'funeral_date' => $this->faker->date($format='Y-m-d',$max='now') ,
            'funeral_time_start' => $this->faker->date($format = 'Y-m-d') ,
            'funeral_time_end' => $this->faker->date($format = 'Y-m-d') ,
            'funeral_same_ceremony' => $this->faker->numberBetween(0,1) ,
            'funeral_ceremony'=> $this->faker->company() ,
            'funeral_ceremony_zip'=> $this->faker->postcode() ,
            'funeral_ceremony_addr1'=> $this->faker->prefecture() ,
            'funeral_ceremony_addr2'=> $this->faker->ward() ,
            'funeral_ceremony_tel'=> $this->faker->phoneNumber() ,
            'funeral_ceremony_url'=> $this->faker->url() ,
            'funeral_ceremony_access' => $this->faker->realText(100) ,
            'funeral_attendees1'=> $this->faker->name() ,
            'funeral_attendees2'=> $this->faker->name() ,
            'funeral_attendees3'=> $this->faker->name() ,
            'funeral_attendees' => $this->faker->name() ,
            'chief_mourner' => $this->faker->numberBetween(0,1) ,
            'chief_mourner_name'=> $this->faker->name() ,
            'chief_mourner_kana'=> $this->faker->kanaName() ,
            'chief_mourner_relationship' => $this->faker->numberBetween(0,8) ,
            'condolence' => $this->faker->numberBetween(1,2) ,
            'floral_tribute' => $this->faker->numberBetween(1,2) ,
            'telegram' => $this->faker->numberBetween(1,2) ,
            'fax_posting' => $this->faker->numberBetween(0,1) ,
            'remarks' => $this->faker->realText() ,

            'superior' => $this->faker->numberBetween(0,1) ,
            'superior_employee_no'=> $this->faker->regexify('[1-9]{7}') ,
            'superior_name'=> $this->faker->name() ,
            'superior_kana'=> $this->faker->kanaName() ,
            'superior_company' => $this->faker->numberBetween(1,16)  ,
            'superior_member1'=> $this->faker->realText(10) ,
            'superior_member2'=> $this->faker->realText(10) ,

            'social_name1'=> $this->faker->company() ,
            'social_telegram1' => $this->faker->numberBetween(0,1) ,
            'social_floral_tribute1' => $this->faker->numberBetween(0,1) ,
            'social_name2'=> $this->faker->company() ,
            'social_telegram2' => $this->faker->numberBetween(0,1) ,
            'social_floral_tribute2' => $this->faker->numberBetween(0,1) ,
            'social_name3'=> $this->faker->company() ,
            'social_condolence_money3' => $this->faker->numberBetween(1,10) ,

            'social_telegram1_flg' => $this->faker->numberBetween(0,1) ,
            'social_telegram2_flg' => $this->faker->numberBetween(0,1) ,
            'social_floral_tribute1_flg' => $this->faker->numberBetween(0,1) ,
            'social_floral_tribute2_flg' => $this->faker->numberBetween(0,1) ,
            'social_condolence_money3_flg' => $this->faker->numberBetween(0,1) ,

            'company_name1'=> $this->faker->company() ,
            'company_attend1' => $this->faker->numberBetween(0,1) ,
            'company_telegram1' => $this->faker->numberBetween(0,1) ,
            'company_floral_tribute1' => $this->faker->numberBetween(0,1) ,
            'company_condolence_money1' => $this->faker->numberBetween(1,10) ,

            'company_name2'=> $this->faker->company() ,
            'company_name3'=> $this->faker->company() ,
            'company_attend2' => $this->faker->numberBetween(0,1) ,
            'company_telegram2' => $this->faker->numberBetween(0,1) ,
            'company_floral_tribute2' => $this->faker->numberBetween(0,1) ,
            'company_condolence_money2' => $this->faker->numberBetween(1,10) ,

            'company_telegram1_flg' => $this->faker->numberBetween(0,1) ,
            'company_telegram2_flg' => $this->faker->numberBetween(0,1) ,
            'company_floral_tribute1_flg' => $this->faker->numberBetween(0,1) ,
            'company_floral_tribute2_flg' => $this->faker->numberBetween(0,1) ,
            'company_condolence_money1_flg' => $this->faker->numberBetween(0,1) ,
            'company_condolence_money2_flg' => $this->faker->numberBetween(0,1) ,


            'reception' => $this->faker->numberBetween(0,1) ,
            'reception_datetime' => $this->faker->dateTimeThisYear() ,
            'general_affairs_confirmation' => $this->faker->numberBetween(0,1) ,
            'general_affairs_employee_no'=> $this->faker->regexify('[1-9]{7}') ,
            'general_affairs_name'=> $this->faker->name() ,
            'general_affairs_kana'=> $this->faker->kanaName() ,
            'general_affairs_company' => $this->faker->numberBetween(1,16)  ,
            'general_affairs_member1'=> $this->faker->realText(10) ,
            'general_affairs_member2'=> $this->faker->realText(10) ,
            'general_affairs_contact_toll1' => $this->faker->numberBetween(0, 99) ,
            'general_affairs_contact_toll2' => $this->faker->numberBetween(0, 9999) ,
            'general_affairs_contact_info' => $this->faker->phoneNumber() ,
            'final_confirmation' => $this->faker->numberBetween(0,1) ,

            'supervisor_confirmation' => $this->faker->numberBetween(0,1) ,
            'supervisor_employee_no'=> $this->faker->regexify('[1-9]{7}') ,
            'supervisor_name'=> $this->faker->name() ,
            'supervisor_kana' => $this->faker->kanaName() ,
            'supervisor_company' => $this->faker->numberBetween(1,16)  ,
            'supervisor_member1'=> $this->faker->realText(10) ,
            'supervisor_member2'=> $this->faker->realText(10) ,


            'branch_chief_confirmation' => $this->faker->numberBetween(0,1) ,
            'branch_chief_employee_no'=> $this->faker->regexify('[1-9]{7}') ,
            'branch_chief_name'=> $this->faker->name() ,
            'branch_chief_kana' => $this->faker->kanaName() ,
            'branch_chief_company' => $this->faker->numberBetween(1,16)  ,
            'branch_chief_member1'=> $this->faker->realText(10) ,
            'branch_chief_member2'=> $this->faker->realText(10) ,


            'status' => $this->faker->numberBetween(1,5) ,
            'password'=> $this->faker->regexify('[1-9]{4}') ,
            'create_user'=> $this->faker->regexify('[1-9]{7}')  ,
            'update_user'=> $this->faker->regexify('[1-9]{7}')  ,

        ];
    }
}
