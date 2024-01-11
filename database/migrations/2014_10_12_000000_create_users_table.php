<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;


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
            $table->string('FirstName')->nullable();
            $table->string('FullName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('Job')->nullable();
            $table->integer('IsActive')->nullable();
            $table->integer('Gender_ID')->nullable();
            $table->integer('Province_ID')->nullable();
            $table->integer('District_ID')->nullable();


            $table->integer('IsSuperAdmin')->nullable();
            $table->integer('IsExpense')->nullable();

            $table->integer('Created_By')->nullable();


            $table->date('DOB')->nullable();
            $table->text('Profile')->nullable();




            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
   User::create(['FirstName' => 'AbdulWahab','LastName' => 'Qarizada','Job' => 'Developer','IsActive'=>1,'IsExpense'=>1,'IsSuperAdmin'=>1,'dob'=>'1993-12-14','email' => 'abdul.wahab@lampakabyte.com','password' => Hash::make('Qarizada@1732'),'email_verified_at'=>'2022-01-02 17:04:58','Profile' => 'images/avatar-1.jpg','created_at' => now(),]);
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
