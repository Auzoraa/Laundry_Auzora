<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('id_outlet');
            $table->enum('role', ['admin', 'kasir', 'owner']);
            $table->timestamps();
        });
        Account::create(
            [
                'nama' => 'admin',
                'username' => 'admin',
                'password' => 'admin',
                'id_outlet' => 1,
                'role' => 'admin'
            ],
        );
        Account::create(
            [
                'nama' => 'kasir',
                'username' => 'kasir',
                'password' => 'kasir',
                'id_outlet' => 1,
                'role' => 'kasir'
            ],
        );
        Account::create(
            [
                'nama' => 'owner',
                'username' => 'owner',
                'password' => 'owner',
                'id_outlet' => 1,
                'role' => 'owner'
            ],
        );
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
