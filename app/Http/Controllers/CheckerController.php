<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class CheckerController extends Controller
{
    public function setParam(Request $request){
        $session = $request->session()->all();
        if(!$session){
            return redirect(route('admin.list'));
        }
        $id = $request['id'];
        $name = $request['name'];
        $flg = $request['status'];

        $que = [
            'status'=>2,
            'final_confirmation'=>0,
            'update_user'=>9999999
            ];
        switch($name){
            case "general_affairs_confirmation":
                $que += ["general_affairs_confirmation"=>$flg];
                break;
            case "branch_chief_confirmation":
                $que += ["branch_chief_confirmation"=>$flg];
                break;
            case "supervisor_confirmation":
                $que += ["supervisor_confirmation"=>$flg];
                break;
        }

        \DB::beginTransaction();
        try{
            $contactInfo = ContactInfo::find($id);
            $contactInfo->fill($que);
            $contactInfo->save();
            \DB::commit();
            return true;
        } catch (\Throwable $exception){
            \DB::rollback();
            return false;
        }
    }

}
