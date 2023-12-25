<?php

namespace App\Console\Commands;

use App\Models\ContactInfo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '古いデータを削除する';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $db_data = new ContactInfo;
        $strDate = strtotime(date('Y-m-d'));
        $newDate = date('Y-m-d', strtotime('-30 day', $strDate));
        $db_data->where('updated_at','<', $newDate)->delete();

        $message = '[' . date('Y-m-d h:i:s') . ']Old ata has been deleted.';

        //INFOレベルでメッセージを出力
        $this->info( $message );
        //ログを書き出す処理はこちら
        Log::setDefaultDriver('batch');
        Log::info( $message );
    }
}
