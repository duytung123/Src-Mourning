<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class AdminDetailController extends Controller
{
    public function showAdminDetail(Request $request){
      $id = $request['id'];
      $data = ContactInfo::find($id);
      if(!$data){
        return redirect(route('admin.list',['error'=>'データがありません','page'=>1]));
      }
      return view('admin.adminDetail',[
        'data'=>$data,
        'entrantArray' =>$data->entrant(),
        'inlawsArray' =>$data->inlaws(),
        'inlaws_condolenceArray' =>$data->inlaws_condolence(),
        'wakeArray' =>$data->wake(),
        'funeralArray' =>$data->funeral(),
        'funeral_same_ceremonyArray' =>$data->funeral_same_ceremony(),
        'chief_mournerArray' =>$data->chief_mourner(),
        'condolenceArray' =>$data->condolence(),
        'floral_tributeArray' =>$data->floral_tribute(),
        'telegramArray' =>$data->telegram(),
        'fax_postingArray' =>$data->fax_posting(),
        'superiorArray' =>$data->superior(),
        'company_attend1Array' =>$data->company_attend1(),
        'company_attend2Array' =>$data->company_attend2(),
        'receptionArray' =>$data->reception(),
        'general_affairs_confirmationArray' =>$data->general_affairs_confirmation(),
        'final_confirmationArray' =>$data->final_confirmation(),
        'supervisor_confirmationArray' =>$data->supervisor_confirmation(),
        'branch_chief_confirmationArray' =>$data->branch_chief_confirmation(),
        "keyArray" =>$data->keyArray,
        'classificationsArray' =>$data->classifications(),
        'companiesArray' =>$data->companies(),
        'chiefMournerRelationshipArray' =>$data->chiefMournerRelationship(),
        'passedAwayRelationshipArray' =>$data->passedAwayRelationship(),
        'statusArray' => $data->status(),
        'statusDescArray' => $data->statusDesc(),
        'passedAwayDate' =>$data->showDate($data['passed_away_date']),
        'wakeDate' =>$data->showDate($data['wake_date']),
        'funeralDate' =>$data->showDate($data['funeral_date']),
        'created_at' =>$data->showDatetime($data['created_at']),
        'updated_at' =>$data->showDatetime($data['updated_at']),
        'reception_datetime' => $data->showDatetime($data['reception_datetime']),
      ]);
    }
}
