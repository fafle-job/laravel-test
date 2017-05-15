<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTakskTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->date('close_date');
            $table->enum('status', ['open', 'closed']);
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::table('tasks')->insert(
                array(
                    array(
                        'user_id' => 1,
                        'title' => 'Test task for fisrt employer',
                        'description' => 'Test task that only first employer and it\'s manager can see.',
                        'close_date' => date('Y-m-d', time() + 60 * 60 * 24),
                        'status' => 'open',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ),
                    array(
                        'user_id' => 1,
                        'title' => 'Another one test task for fisrt employer',
                        'description' => 'Another one test task that only first employer and it\'s manager can see.',
                        'close_date' => date('Y-m-d', time() + 60 * 60 * 24),
                        'status' => 'open',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ),
                    array(
                        'user_id' => 1,
                        'title' => 'Another one test task for fisrt employer',
                        'description' => 'Another one test task that only first employer and it\'s manager can see.',
                        'close_date' => date('Y-m-d', time() + 60 * 60 * 24),
                        'status' => 'open',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ),
                    array(
                        'user_id' => 1,
                        'title' => 'Another one test task for fisrt employer',
                        'description' => 'Another one test task that only first employer and it\'s manager can see.',
                        'close_date' => date('Y-m-d', time() + 60 * 60 * 24),
                        'status' => 'open',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ),
                    array(
                        'user_id' => 1,
                        'title' => 'Another one test task for fisrt employer',
                        'description' => 'Another one test task that only first employer and it\'s manager can see.',
                        'close_date' => date('Y-m-d', time() + 60 * 60 * 24),
                        'status' => 'open',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ),
                    array(
                        'user_id' => 2,
                        'title' => 'Test task for second employer',
                        'description' => 'Test task that only second employer and it\'s manager can see.',
                        'close_date' => date('Y-m-d', time() + 60 * 60 * 24),
                        'status' => 'open',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ),
                    array(
                        'user_id' => 2,
                        'title' => 'Another one test task for second employer',
                        'description' => 'Another one test task that only second employer and it\'s manager can see.',
                        'close_date' => date('Y-m-d', time() + 60 * 60 * 24),
                        'status' => 'open',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ),
                    array(
                        'user_id' => 2,
                        'title' => 'Another one test task for second employer',
                        'description' => 'Another one test task that only second employer and it\'s manager can see.',
                        'close_date' => date('Y-m-d', time() + 60 * 60 * 24),
                        'status' => 'open',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ),
                    array(
                        'user_id' => 2,
                        'title' => 'Another one test task for second employer',
                        'description' => 'Another one test task that only second employer and it\'s manager can see.',
                        'close_date' => date('Y-m-d', time() + 60 * 60 * 24),
                        'status' => 'open',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ),
                    array(
                        'user_id' => 2,
                        'title' => 'Another one test task for second employer',
                        'description' => 'Another one test task that only second employer and it\'s manager can see.',
                        'close_date' => date('Y-m-d', time() + 60 * 60 * 24),
                        'status' => 'open',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
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
        Schema::table('tasks', function (Blueprint $table) {
            Schema::drop('tasks');
        });
    }

}
