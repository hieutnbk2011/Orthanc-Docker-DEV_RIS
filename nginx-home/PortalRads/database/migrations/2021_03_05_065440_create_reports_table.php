<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro/Ace Laravel Export (1.8.1)
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('HL7_message', 8192)->nullable();
            $table->string('orthanc_uuid', 64)->nullable();
            $table->string('mrn', 16)->nullable();
            $table->string('accession_number', 16)->nullable();
            $table->integer('telerad_contract')->nullable();
            $table->string('reader_id', 16)->nullable();
            $table->string('newstatus', 16)->nullable();
            $table->string('oldstatus', 16)->nullable();
            $table->dateTime('datetime')->nullable();
            $table->text('htmlreport')->nullable();
            $table->string('template_id', 16)->nullable();
            $table->mediumText('json_request_orthanc_add_pdf')->nullable();

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
        Schema::dropIfExists('reports');
    }
}
