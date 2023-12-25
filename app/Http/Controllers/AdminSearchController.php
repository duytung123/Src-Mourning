<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class AdminSearchController extends Controller
{
    public function showRessult(Request $request)
    {
//        $name = $request->input('related_name');
        $no = $request->input('related_employee_no');
        $soumu = $request->input('general_affairs_employee_no');
        $status = $request->input('status');

        $query = ContactInfo::query();
        // 名前で絞り込み
//        if (isset($name)) {
//            $query->where('related_name', 'like', '%' . self::escapeLike($name));
//        }
        // 社員番号で絞り込み
        if (isset($no)) {
            $query->where('related_employee_no', 'like', "%".$no."%");
        }
        // 総務社員番号で絞り込み
        if (isset($soumu)) {
            $query->where('general_affairs_employee_no', 'like', "%".$soumu."%");
        }
        // 状態で絞り込み
        if (isset($status)) {
            $query->where('status','=', $status);
        }

        $instance = new ContactInfo();
        $statusArray = $instance->status();
        $lists = $query->orderBy('id', 'desc')->paginate(15);
        if($lists->isEmpty()){
            return view('admin.adminList', [
                'statusArray' => $statusArray,
                'status'=>$status,
                'search'=>1,
                'no'=>$no,
//                'name'=>$name,
                'soumu'=>$soumu,
                'error'=>'検索結果がありません。再度条件を設定してください。',
            ]);
        } else {
            return view('admin.adminList', [
                'lists' => $lists,
                'statusArray' => $statusArray,
                'status'=>$status,
                'search'=>1,
                'no'=>$no,
//                'name'=>$name,
                'soumu'=>$soumu,
                'error'=>null,
            ]);
        }
    }

    //「\\」「%」「_」などの記号を文字としてエスケープさせる
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}
