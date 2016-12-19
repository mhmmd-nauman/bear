<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('file');
            //$table->integer('semester', ['spring', 'fall'])->nullable();
            $table->integer('visitor_id')->nullable();
            
            $table->string('first_name');
            $table->string('last_name');
            //$table->string('information_source')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('marital_status', ['maried', 'unmaried'])->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->string('country_of_citizenship')->nullable();
            $table->string('cnic')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('pic')->nullable();
            $table->string('email')->nullable();
            $table->string('candidate_for_any_degree_title')->nullable();
            $table->string('years_of_english_medium')->nullable();
            $table->string('first_language')->nullable();
            $table->string('honors_awards')->nullable();
            $table->string('fav_activities')->nullable();
            $table->string('program')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('privately_supported_student')->nullable();
            //$table->string('applicant_middle_name')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_relation')->nullable();
            $table->dateTime('sponsor_sign_date')->nullable();
            $table->string('interviewed_by')->nullable();
            $table->string('chairman_admission_committee')->nullable();
            $table->enum('admission_status', ['done', 'info','accepted','rejected'])->nullable();
            $table->dateTime('admission_date')->nullable();
            $table->float('fee_code')->unsigned();
            $table->dateTime('fee_code_date')->nullable();
            $table->integer('dealtby_id')->unsigned();
            $table->foreign('dealtby_id')->references('id')->on('users');
            $table->string('dealt_by')->nullable();
             
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
        Schema::drop('students');
    }
}
