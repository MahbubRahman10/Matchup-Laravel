<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('gender', ['male', 'female','other']);
            $table->enum('merital_status', ['single', 'divorced','widowed','separated','any']);
            $table->string('age');
            $table->enum('religion', ['muslim', 'hinduism','buddhist','christian','other']);
            $table->string('image');
            $table->string('phone')->unique();
            $table->string('token');
            $table->string('district');
            $table->string('state');
            $table->longText('about');
            $table->string('weight');
            $table->enum('user_level', ['registered', 'silver','bronze','gold','platinum'])->default('registered');
            $table->string('annual_income');
            $table->enum('blood_group', ['A+', 'A-','B+','B-','O+','O-','AB+','AB-']);
            $table->enum('body_type', ['slim', 'average','fat','any']);
            $table->string('date_of_birth');
            $table->enum('drink', ['yes', 'no']);
            $table->enum('smoke', ['yes', 'no']);
            $table->string('fathers_occupation');
            $table->string('mothers_occupation');
            $table->string('brothers');
            $table->string('sisters');
            $table->string('occupation');
            $table->string('profile_create');
            $table->string('password');
            $table->rememberToken();
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
