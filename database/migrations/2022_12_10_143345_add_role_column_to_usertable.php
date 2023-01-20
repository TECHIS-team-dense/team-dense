<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleColumnToUsertable extends Migration
{ 
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->default(1)->comment('0は一般ユーザー、1は管理者');  
            //確認のため現在新規登録するとロール１で登録され管理者画面へ
        });
    }

    

     public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');  //カラムの削除
        });
    }
}  
