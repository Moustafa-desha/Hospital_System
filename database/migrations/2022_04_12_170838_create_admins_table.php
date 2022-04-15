<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')
                                ->references('id')
                                ->on('roles')
                                ->cascadeOnDelete();
            $table->string('password');
            $table->string('gender');
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('department')->nullable();
            $table->string('education')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
