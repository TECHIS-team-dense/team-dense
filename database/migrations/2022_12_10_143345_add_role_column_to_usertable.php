<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/* class AddRoleColumnToUsertable extends Migration
{ */
    /**
     * Run the migrations.
     *
     * @return void
     */
    /* public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->default(0)->comment('0は一般ユーザー、1は管理者');  //カラム追加
        });
    }

    
     * Reverse the migrations.
     *
     * @return void
     */
     /* public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');  //カラムの削除
        });
    }
}  */
