<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ProvisionsController extends Controller
{
    public function setParam(Request $request){
        $id = $request['id'];
        $data = ContactInfo::find($id);
        if(!$data){
            return redirect(route('admin.detail',['error'=>'データがありません','page'=>1]));
        } else {
            $data->company_name1 = $request->company_name1;
            $data->company_telegram1 = $request->company_telegram1;
            $data->company_floral_tribute1 = $request->company_floral_tribute1;
            $data->company_condolence_money1 = $request->company_condolence_money1;

            $data->company_name2 = $request->company_name2;
            $data->company_telegram2 = $request->company_telegram2;
            $data->company_floral_tribute2 = $request->company_floral_tribute2;
            $data->company_condolence_money2 = $request->company_condolence_money2;

            $data->update_user = 9999999;
            $data->save();
        }

        return redirect(route('admin.detail',$id));

    }
}
