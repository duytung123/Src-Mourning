<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('m_companies')) {
            Schema::create('m_companies', function (Blueprint $table) {
                $table->id();
                $table->string('company', 100)->comment('会社名');
                $table->tinyInteger('sort')->unsigned()->default(100)->comment('並び順');
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_companies');
    }
};
