<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tentors', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tentor')->unique();
            // $table->string('name');
            // $table->string('username')->unique()->nullable();
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->tinyInteger('level');
            $table->string('mapel')->nullable();
            $table->text('alamat')->nullable();
            $table->string('nohp')->nullable();
            $table->string('photo')->nullable();
            //same
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tentors');
    }
};
