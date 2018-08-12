<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('gender', ['male', 'female','other'])->nullable();
            $table->enum('merital_status', ['single', 'divorced','widowed','separated','any'])->nullable();
            $table->string('age')->nullable();
            $table->enum('religion', ['muslim', 'hinduism','buddhist','christian','other']);
            $table->string('state')->nullable();
            $table->longText('about')->nullable();
            $table->string('occupation')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->enum('user_level', ['registered', 'silver','bronze','gold','platinum'])->default('registered')->nullable();
            $table->string('annual_income')->nullable();
            $table->enum('blood_group', ['A+', 'A-','B+','B-','O+','O-','AB+','AB-'])->nullable();
            $table->enum('body_type', ['slim', 'average','fat','any']);
            $table->string('date_of_birth')->nullable();
            $table->enum('drink', ['yes', 'no'])->nullable();
            $table->enum('smoke', ['yes', 'no'])->nullable();
            $table->string('fathers_occupation')->nullable();
            $table->string('mothers_occupation')->nullable();
            $table->string('brothers')->nullable();
            $table->string('sisters')->nullable();
            $table->string('children')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('family_values')->nullable();
            $table->string('address')->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('country')->nullable();
            $table->string('residential_status')->nullable();
            $table->string('profile_create')->nullable();
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
        Schema::dropIfExists('userinfos');
    }
}
