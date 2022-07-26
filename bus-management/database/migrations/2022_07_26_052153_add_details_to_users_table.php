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
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('is_banned')->default(1);
            $table->bigInteger('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('roles');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('date_of_birth');
            $table->dropColumn('address');
            $table->dropColumn('gender');
            $table->dropColumn('phone_number');
            $table->dropColumn('is_banned');
            $table->dropColumn('avatar');
            $table->dropColumn('role_id');
        });
    }
};
