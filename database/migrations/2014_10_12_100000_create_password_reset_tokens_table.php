<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('email')->nullable(); // Nullable karena bisa reset via phone
            $table->string('phone')->nullable(); // Untuk WhatsApp reset
            $table->string('token')->index(); // Index untuk performa, sudah di-hash
            $table->string('verification_code'); // Di-hash untuk keamanan
            $table->enum('method', ['email', 'whatsapp']); // Track method yang digunakan
            $table->timestamp('created_at')->nullable();

            // Indexes for better performance
            $table->index(['email', 'method']);
            $table->index(['phone', 'method']);
            $table->index('created_at'); // Untuk cleanup expired tokens
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
