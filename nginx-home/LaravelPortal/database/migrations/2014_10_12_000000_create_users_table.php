<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('fname', 32)->nullable();
            $table->string('lname', 32)->nullable();
            $table->string('mname', 32)->nullable();
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->string('patientid', 16)->nullable();
            $table->string('doctor_id', 16)->nullable();
            $table->string('reader_id', 16)->nullable();
            $table->tinyInteger('user_active')->default(0)->comment('user\'s activation status');
            $table->string('user_roles', 32)->default('[]')->comment('user\'s account type (basic, premium, etc)');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

//             $table->string('user_name', 16)->nullable()->comment('user\'s name, unique');
//             $table->string('user_email', 32)->nullable()->comment('user\'s email, unique');
//             $table->tinyInteger('user_active')->default(0)->comment('user\'s activation status');
//             $table->string('user_roles', 32)->default('[]')->comment('user\'s account type (basic, premium, etc)');
//             $table->string('session_id', 48)->nullable()->comment('stores session cookie id to prevent session concurrency');
//             $table->string('fname', 32)->nullable();
//             $table->string('lname', 32)->nullable();
//             $table->string('mname', 32)->nullable();
//             $table->date('dob')->nullable();
//             $table->string('linked_account_type_table', 32)->nullable()->comment('table with linked e-mail');
//             $table->string('patientid', 16)->nullable();
//             $table->string('doctor_id', 16)->nullable();
//             $table->string('reader_id', 16)->nullable();
