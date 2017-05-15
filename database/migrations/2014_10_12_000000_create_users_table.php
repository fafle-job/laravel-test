<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('group', ['manager', 'employer']);
            $table->string('api_token', 60)->unique();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
                array(
                    array(
                        'name' => 'DemoManager',
                        'email' => 'demomanager@example.com',
                        'password' => Hash::make('DemoManager'),
                        'group' => 'manager',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'api_token' => str_random(60)
                    ),
                    array(
                        'name' => 'FirstDemoEmployer',
                        'email' => 'firstdemoemployer@example.com',
                        'password' => Hash::make('FirstDemoEmployer'),
                        'group' => 'employer',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'api_token' => str_random(60)
                    ),
                    array(
                        'name' => 'SecondDemoEmployer',
                        'email' => 'seconddemoemployer@example.com',
                        'password' => Hash::make('SecondDemoEmployer'),
                        'group' => 'employer',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'api_token' => str_random(60)
                    ),
                )
        );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
