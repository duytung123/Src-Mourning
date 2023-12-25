<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware'=>'basic.auth'], function(){

    // 当事者 ログイン画面
    Route::get('/', 'App\Http\Controllers\MourningController@index')->name('index');

    // 当事者 登録画面
    Route::get('/create', 'App\Http\Controllers\MourningController@showCreate')->name('create.show');
    Route::post('/create', 'App\Http\Controllers\MourningController@postCreate')->name('create.post');

    // 当事者 登録確認画面
    Route::get('/confirm', 'App\Http\Controllers\MourningController@showConfirm')->name('confirm.show');
    Route::post('/confirm', 'App\Http\Controllers\MourningController@postConfirm')->name('confirm.post');

    // 当事者 確認画面
    Route::post('/login', 'App\Http\Controllers\MourningController@postLogin')->name('postLogin');
    Route::get('/check', 'App\Http\Controllers\MourningController@check')->name('check');

    // 当事者 編集画面
    Route::get('/edit', 'App\Http\Controllers\MourningController@showEdit')->name('edit.show');


    // 当事者 編集確認画面
    Route::post('/edit', 'App\Http\Controllers\MourningController@postEdit')->name('edit.post');
    Route::get('/edit/confirm', 'App\Http\Controllers\MourningController@showEditConfirm')->name('edit.confirm.show');
    Route::post('/edit/post', 'App\Http\Controllers\MourningController@postEditConfirm')->name('edit.confirm.post');

    // 直属の上司 編集確認画面
    Route::post('/entrant', 'App\Http\Controllers\MourningController@postEntrant')->name('entrant.post');
    Route::get('/entrant/confirm', 'App\Http\Controllers\MourningController@showEntrantConfirm')->name('entrant.confirm.show');
    Route::post('/entrant/post', 'App\Http\Controllers\MourningController@postEntrantConfirm')->name('entrant.confirm.post');

    // 当事者 完了画面
    Route::get('/finished', 'App\Http\Controllers\MourningController@showFinished')->name('finished');
});

Route::group(['middleware'=>'basic.manager.auth'], function(){
    // 総務、所属長 ログイン画面
    Route::get('/manager', 'App\Http\Controllers\MourningController@showManagerLogin')->name('manager.login');
    Route::post('/manager/login', 'App\Http\Controllers\MourningController@postManagerLogin')->name('post.manager.login');
    //Route::get('/manager/check', 'App\Http\Controllers\MourningController@checkManager')->name('check.manager.login');

    // 総務、所属長、支部委員長 編集画面
    Route::get('/manager/edit', 'App\Http\Controllers\MourningController@showManagerEdit')->name('manager.edit');
    //Route::get('/manager/edit/confirm', 'App\Http\Controllers\MourningController@showManagerEditConfirm')->name('manager.confirm.show');
    //Route::post('/manager/edit/post', 'App\Http\Controllers\MourningController@postManagerEditConfirm')->name('manager.confirm.post');

    // 総務確認画面
    Route::post('/manager/general-affairs', 'App\Http\Controllers\MourningController@postGeneralAffairs')->name('general_affairs.post');
    Route::get('/manager/general-affairs/confirm', 'App\Http\Controllers\MourningController@showGeneralAffairsConfirm')->name('general_affairs.confirm.show');
    Route::post('/manager/general-affairs/post', 'App\Http\Controllers\MourningController@postGeneralAffairsConfirm')->name('general_affairs.confirm.post');

    // 総務完了画面
    Route::get('/manager/general-affairs/finished', 'App\Http\Controllers\MourningController@showGeneralAffairsFinished')->name('general_affairs.confirm.finished');


    // 所属長確認画面
    Route::post('/manager/supervisor', 'App\Http\Controllers\MourningController@postSupervisor')->name('supervisor.post');
    Route::get('/manager/supervisor/confirm', 'App\Http\Controllers\MourningController@showSupervisorConfirm')->name('supervisor.confirm.show');
    Route::post('/manager/supervisor/post', 'App\Http\Controllers\MourningController@postSupervisorConfirm')->name('supervisor.confirm.post');
    // 所属長完了画面
    Route::get('/manager/supervisor/finished', 'App\Http\Controllers\MourningController@showSupervisorFinished')->name('supervisor.confirm.finished');

    // 支部委員長画面
    Route::post('/manager/branch-chief', 'App\Http\Controllers\MourningController@postBranchChief')->name('branch_chief.post');
    Route::get('/manager/branch-chief/confirm', 'App\Http\Controllers\MourningController@showBranchChiefConfirm')->name('branch_chief.confirm.show');
    Route::post('/manager/branch-chief/post', 'App\Http\Controllers\MourningController@postBranchChiefConfirm')->name('branch_chief.confirm.post');
    // 支部委員長完了画面
    Route::get('/manager/branch-chief/finished', 'App\Http\Controllers\MourningController@showBranchChiefFinished')->name('branch_chief.confirm.finished');

    // 最終確認画面
    Route::post('/manager/final', 'App\Http\Controllers\MourningController@showFinal')->name('final.post');
    Route::get('/manager/final/confirm', 'App\Http\Controllers\MourningController@showFinalConfirm')->name('final.confirm.show');
    Route::post('/manager/final/post', 'App\Http\Controllers\MourningController@postFinalConfirm')->name('final.confirm.post');
    // 最終完了画面
    Route::get('/manager/final/finished', 'App\Http\Controllers\MourningController@showFinalFinished')->name('final.confirm.finished');

    // PDF出力
    Route::get('/manager/pdf/condolence_{no}_{id}.pdf', 'App\Http\Controllers\PdfOutputController@output')->name('pdf.output');
    //Route::get('/manager/pdf/condolence.pdf', 'App\Http\Controllers\PdfOutputController@output')->name('pdf.output');

});

Route::group(['middleware'=>'basic.admin.auth'], function(){
    // DBの初期値インストール
//    Route::get('/setup', 'App\Http\Controllers\SetupController@setup')->name('setup');

    // 管理画面、一覧
    //Route::get('/admin/list/error', 'App\Http\Controllers\AdminListController@showAdminList')->name('admin.list.error');
    Route::post('/admin/post', 'App\Http\Controllers\AdminListController@postUserAuthenticate')->name('postUserAuthenticate');
    Route::get('/admin/list', 'App\Http\Controllers\AdminListController@showAdminList')->middleware(['auth.admin.list'])->name('admin.list');
    Route::get('/admin/list/{page}', 'App\Http\Controllers\AdminListController@showAdminList')->name('admin.list.page');

    // 管理画面、検索結果
    Route::get('/admin/search', 'App\Http\Controllers\AdminSearchController@showRessult')->name('admin.search');

    // 管理画面、PDF確認（仮）
    Route::get('/admin/pdf/condolence_{no}_{id}.pdf', 'App\Http\Controllers\PdfOutputController@output')->name('admin.pdf');

    // 管理画面、詳細
    Route::get('/admin/detail/{id}', 'App\Http\Controllers\AdminDetailController@showAdminDetail')->name('admin.detail');

    // ステイタス変更
    Route::post('/admin/status/{id}/{status}', 'App\Http\Controllers\StatusController@setStatus')->name('admin.status');

    // 確認状況変更
    Route::get('/admin/check/{id}/{name}/{status}', 'App\Http\Controllers\CheckerController@setParam')->name('admin.check');

    // 会社規定変更
    Route::post('/admin/provisions/', 'App\Http\Controllers\ProvisionsController@setParam')->name('provisions.post');
});
