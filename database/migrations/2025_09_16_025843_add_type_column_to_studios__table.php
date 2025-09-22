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
        Schema::create('studios', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('name');
            $table->string('type'); // small, medium, large, etc.
            $table->text('description')->nullable();
            $table->string('foto')->nullable();
            $table->decimal('price_per_hour', 10, 2);
            $table->integer('min_booking_hours')->default(1);
            $table->integer('max_booking_hours')->default(8);
            $table->enum('status', ['available', 'maintenance'])->default('available');
            $table->timestamps();
        });

        Schema::create('equipment', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('category');
            $table->integer('quantity')->default(1);
            $table->integer('allocated_quantity')->default(0)->after('quantity');
            $table->string('foto')->nullable();
            $table->timestamps();
        });

        // Buat pivot table studio_equipment SEBELUM bookings
        Schema::create('studio_equipment', function (Blueprint $table) {
            // HAPUS kolom id karena tidak diperlukan untuk pivot table
            // $table->string('id', 10)->primary();

            $table->string('studio_id', 10);
            $table->string('equipment_id', 10);
            $table->integer('quantity')->default(1);
            $table->timestamps();

            $table->foreign('studio_id')->references('id')->on('studios')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');

            // Tambahkan composite primary key
            $table->primary(['studio_id', 'equipment_id']);
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('user_id', 10);
            $table->string('studio_id', 10);
            $table->string('booking_code')->unique();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('total_hours');
            $table->decimal('base_price', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'paid', 'cancelled', 'completed'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('studio_id')->references('id')->on('studios')->onDelete('cascade');
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('booking_id', 10);
            $table->string('merchant_ref')->nullable();
            $table->string('payment_method');
            $table->string('reference')->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['unpaid', 'paid', 'expired', 'failed'])->default('unpaid');
            $table->timestamp('paid_at')->nullable();
            $table->string('payment_url')->nullable();
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });

        Schema::create('booking_equipment', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('booking_id', 10);
            $table->string('equipment_id', 10);
            $table->integer('quantity')->default(1);
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studios');
        Schema::dropIfExists('equipment');
        Schema::dropIfExists('studio_equipment');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('booking_equipment');
    }
};
