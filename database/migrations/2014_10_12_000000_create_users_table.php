<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer("is_admin");
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        $user = new App\Models\User;
        $user->name = "Admin";
        $user->password = Hash::make('12345678');
        $user->is_admin = true;
        $user->email = 'admin@admin.com';
        $user->save();

        $user = new App\Models\User;
        $user->name = "User";
        $user->password = Hash::make('12345678');
        $user->is_admin = false;
        $user->email = 'user@user.com';
        $user->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
