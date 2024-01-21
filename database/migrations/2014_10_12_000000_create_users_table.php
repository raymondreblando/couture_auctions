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
            $table->ulid('user_id')
                ->primary();
            $table->string('fullname');
            $table->string('username')
                ->unique();
            $table->string('email')
                ->unique();
            $table->string('gender', 30)
                ->nullable();
            $table->string('contact_number', 11)
                ->nullable()
                ->unique();
            $table->string('address')
                ->nullable();
            $table->string('password')
                ->nullable();
            $table->string('google_id')
                ->nullable();
            $table->boolean('is_active')
                ->default(true);
            $table->timestamp('email_verified_at')
                ->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
