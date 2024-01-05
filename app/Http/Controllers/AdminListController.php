<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    /**
     * 管理者ログインを表示
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAdminLogin(Request $request)
    {
        $error = $request->session()->get('error');
        return view('mourning.userAuthenticate', ['error' => $error]);
    }

    /**
     * ユーザー認証を処理する
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function postUserAuthenticate(Request $request)
    {
        $input = $request->only(['login_id', 'password']);
        $filePath = storage_path('app/member.csv');
        $file = fopen($filePath, 'r');

        $users = [];
        while (($col = fgetcsv($file))!== FALSE ) {
            if (($col[0] && $col[1])) {
                $users[] = [$col[0],$col[1]];
            }
        }
        fclose($file);

        $checked = true;
        foreach ($users as $user) {
            if(in_array($input['login_id'],$user) && in_array($input['password'],$user)){
                $checked = true;
                $request->session()->put("error", "");
            }
        }
        if($checked == true){
            $request->session()->put("error", "");
            if(ContactInfo::count()){
                $instance = new ContactInfo();
                $statusArray = $instance->status();
                $lists = ContactInfo::where('deleted_at', null)
                    ->orderByDesc('id')
                    ->paginate(20);
                return view('admin.adminList', [
                    'lists' => $lists,
                    'statusArray' => $statusArray,
                    'search'=>null,
                    'error'=>null,
                    'status'=>null,
                ]);
            } else{
                return view('admin.adminError', [
                    'search'=>null,
                    'error' => 'データがありません',
                    'status'=>null,
                ]);
            }
        }
        else{
            $request->session()->put("error", "該当するデータがありません。本人(弔事当事者)の社員番号・パスワード をご確認ください。");
            return back();
        }
    }
}
