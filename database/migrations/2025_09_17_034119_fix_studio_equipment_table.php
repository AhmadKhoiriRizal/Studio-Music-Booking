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
        // Check if the table exists and drop it if it does
        if (Schema::hasTable('studio_equipment')) {
            Schema::dropIfExists('studio_equipment');
        }

        // Create the pivot table without an id column
        Schema::create('studio_equipment', function (Blueprint $table) {
            $table->string('studio_id', 10);
            $table->string('equipment_id', 10);
            $table->integer('quantity')->default(1);
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('studio_id')->references('id')->on('studios')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');

            // Set composite primary key
            $table->primary(['studio_id', 'equipment_id']);

            // Add indexes for better performance
            $table->index('studio_id');
            $table->index('equipment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studio_equipment');
    }
};
