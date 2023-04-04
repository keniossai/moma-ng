<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique();
            $table->enum('gender', [User::MALE, User::FEMALE])->nullable();
            $table->enum('state', [User::LAGOS, User::ABUJA])->nullable();
            $table->string('photo')->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->enum('type',[User::ADMIN, User::MASSEUR, User::CLIENT])->default(User::CLIENT);
            $table->integer('login_count')->default(0);
            $table->timestamp('last_login')->nullable();
            $table->timestamp('banned_until')->nullable();
            $table->json('meta')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
};
