<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro/Ace Laravel Export (1.8.1)
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mrn', 16)->nullable();
            $table->string('last', 64)->nullable();
            $table->string('first', 64)->nullable();
            $table->string('mname', 64)->nullable();
            $table->string('alias', 64)->nullable();
            $table->string('icd10codes', 4096)->nullable();
            $table->string('medications', 1024)->nullable();
            $table->string('surgical_history', 1024)->nullable();
            $table->string('medical_history', 1024)->nullable();
            $table->string('medications_text', 1024)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('sex', 1)->nullable();
            $table->string('mobile_phone_country', 6)->nullable();
            $table->string('mobile_phone', 16)->nullable();
            $table->string('alt_mobile_phone_country', 6)->nullable();
            $table->string('allergies', 1024)->nullable();
            $table->string('alt_mobile_phone', 16)->nullable();
            $table->string('email', 32)->nullable();
            $table->string('alt_email', 32)->nullable();
            $table->string('address_1', 32)->nullable();
            $table->string('address_2', 32)->nullable();
            $table->string('city', 32)->nullable();
            $table->string('state', 32)->nullable();
            $table->string('country', 32)->nullable();
            $table->string('postal', 16)->nullable();
            $table->string('patient_notes', 1024)->nullable();
            $table->string('uuid', 64)->nullable();
            $table->dateTime('date_created')->nullable();
            $table->string('marital_status', 8)->nullable();
            $table->integer('facility_id')->nullable();
            $table->tinyInteger('appt_reminders')->default(0);
            $table->tinyInteger('reports_notification')->default(0);
            $table->tinyInteger('send_reports')->default(0);
            $table->unique('mrn', 'mrn');
            
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
