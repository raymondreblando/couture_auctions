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
        Schema::create('get_in_touches', function (Blueprint $table) {
            $table->ulid('get_in_touch_id')->primary();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('message', 2000);
            $table->string('reply', 2000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_in_touches');
    }
};
