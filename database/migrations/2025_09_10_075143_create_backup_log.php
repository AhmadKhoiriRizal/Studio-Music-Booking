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
        Schema::create('backup_logs', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('type')->default('backup'); // 'backup' atau 'restore'
            $table->string('admin_id', 10)->nullable();
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('admin_name')->nullable();
            $table->integer('size')->nullable(); // Ukuran file dalam bytes
            $table->string('path'); // Path file backup
            $table->timestamp('backup_date')->nullable(); // Tanggal backup dibuat
            $table->timestamp('restored_at')->nullable(); // Tanggal restore
            $table->text('notes')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('filename');
            $table->index('type');
            $table->index('backup_date');
            $table->index('restored_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_logs');
    }
};
