<?php

namespace App\Http\Controllers;

use App\Models\ContactList;
use App\Models\ContactDetail;
use App\Models\Company;
use App\Models\PassedAwayRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private array $listItems = [
        'id', 'related_employee_no', 'membership_year', 'related_name', 'related_kana', 'reception_datetime', 'company', 'member1', 'member2',
    ];
    private array $detail = [
        'id', 'related_employee_no', 'membership_year', 'related_name', 'related_kana', 'reception_datetime', 'company', 'member1', 'member2',
        'passed_away_name', 'passed_away_kana', 'passed_away_relationship', 'passed_away_date',
        'wake', 'wake_date', 'wake_time_start','wake_time_end', 'wake_ceremony','wake_ceremony_zip', 'wake_ceremony_addr1', 'wake_ceremony_addr2', 'wake_ceremony_tel', 'wake_ceremony_url', 'wake_ceremony_access',
        'funeral', 'funeral_date', 'funeral_time_start','funeral_time_end', 'funeral_same_ceremony', 'funeral_ceremony','funeral_ceremony_zip', 'funeral_ceremony_addr1', 'funeral_ceremony_addr2', 'funeral_ceremony_tel', 'funeral_ceremony_url', 'funeral_ceremony_access',
    ];
    public function getAllContact() {
        $contactList = ContactList::get(['id', 'membership_year', 'related_employee_no', 'related_name', 'related_kana', 'reception_datetime', 'company', 'member1', 'member2',]);//->toJson(JSON_PRETTY_PRINT);

        foreach ($contactList as $contact){
            $company = Company::find($contact->company );
            $contact->company = $company->company;
        }
        $contactList->toJson(JSON_PRETTY_PRINT);
        return response($contactList, 200);
    }
    public function getContact($id){
        if(ContactDetail::where('id',$id)->exists()) {
            $contactList = ContactDetail::where('id', $id)->get($this->detail);
            foreach ($contactList as $contact){
                $company = Company::find($contact->company );
                $contact->company = $company->company;
                $relationship = PassedAwayRelationship::find($contact->passed_away_relationship);
                $contact->passed_away_relationship = $relationship->relationship;
            }
            $contactList->toJson(JSON_PRETTY_PRINT);
            return response($contactList, 200);
        } else {
            return response()->json(["message" => "No Data"], 404);
        }
    }
}
