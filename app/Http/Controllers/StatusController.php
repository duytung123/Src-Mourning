<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * @param Request $request
     * @return bool|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setStatus(Request $request){
        $session = $request->session()->all();
        if(!$session){
            return redirect(route('admin.list'));
        }
        $id = $request['id'];
        $status = $request['status'];
        $final_confirmation = ($status == 5)? 1 : 0;

        \DB::beginTransaction();
        try{
            $contactInfo = ContactInfo::find($id);
            $contactInfo->fill([
                "status" => $status,
                "final_confirmation" => $final_confirmation,
                "update_user"=>'9999999'
            ]);
            $contactInfo->save();
            \DB::commit();
            return true;
        } catch (\Throwable $exception){
            \DB::rollback();
            return false;
        }
    }
}
