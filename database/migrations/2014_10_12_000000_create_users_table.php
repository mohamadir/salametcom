<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('phone');
            $table->string('position')->nullable();;
            $table->boolean('is_admin')->default(false);
            $table->string('area');
            $table->string('password');
            $table->string('hospital')->nullable();
            $table->string('code')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     *
     *
     */
    public function down() {
        Schema::dropIfExists('users');
    }
}
