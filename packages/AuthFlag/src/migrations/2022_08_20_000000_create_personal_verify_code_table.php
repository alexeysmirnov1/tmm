<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personal_verification_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('user_id')->constrained();
            $table->timestamp('expires_in');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_verification_codes');
    }
};
