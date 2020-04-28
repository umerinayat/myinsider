<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyinsiderDbTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // ---------- 1# CONTACTS TABLE -----------
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('telephone_number', 30)->nullable();
            $table->string('mobile_number', 30)->nullable();
           
            $table->string('fax_number', 30)->nullable();
            $table->timestamps();
        });

        // ---------- 2# ADDRESSES TABLE -----------
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('street_address', 300)->nullable();
            $table->string('additional_address', 300)->nullable();
            $table->string('city', 100)->nullable();
      
            $table->string('zip_code', 50)->nullable();
            $table->string('country', 100)->nullable();
            $table->timestamps();
        });

        // ---------- 3# COMPANIES TABLE -----------
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name', 255)->nullable();
            $table->unsignedBigInteger('contact_id')->index();
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');   
            $table->unsignedBigInteger('address_id')->index();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->timestamps();
        });
        

        // ---------- 4# CUSTOMER / CLIENTS TABLE -----------
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 80);
      
        
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('company_id')->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
           
            $table->unsignedBigInteger('contact_id')->index();
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            
            $table->unsignedBigInteger('address_id')->index();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            
            $table->timestamps();
        });

        // ---------- 5# EMPLOYEES / INSIDERS TABLE -----------
        Schema::create('insiders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
       
            $table->date('date_of_birth')->nullable();
            $table->string('national_id_number', 100)->nullable();
            $table->string('language', 100);
            $table->text('notes', 800)->nullable();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('client_id')->index();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('company_id')->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('contact_id')->index();
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->unsignedBigInteger('address_id')->index();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->timestamps();
        });
        
        // ---------- 6# PROJECTS TABLE -----------
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name');
            $table->text('project_description');
            $table->tinyInteger('is_project_completed')->default(false);
            $table->dateTime('project_start_date');
            $table->dateTime('project_end_date')->nullable();
            $table->string('commit', 8)->default('no');
            $table->unsignedBigInteger('client_id')->index();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });


        // ---------- 7# EMPLOYEES / INSIDERS Projects  TABLE -----------
        Schema::create('insiders_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id')->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('insider_id')->index();
            $table->foreign('insider_id')->references('id')->on('insiders')->onDelete('cascade');
            $table->timestamps();
        });

        // ---------- 8# EMPLOYEES / insiders_tokens TABLE -----------
        Schema::create('insiders_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id')->index();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('insider_id')->index();
            $table->foreign('insider_id')->references('id')->on('insiders')->onDelete('cascade');
            $table->string('token', 100);
            $table->tinyInteger('isExpire')->default(false);
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
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('insiders');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('insiders_projects');
        
    }
}
