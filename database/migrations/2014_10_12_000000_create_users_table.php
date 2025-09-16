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
            $table->string('id', 10)->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('phone')->nullable(); // Tambahan nomor handphone
            $table->string('role')->default('user'); // Tambahkan kolom role
            $table->string('password');
            $table->string('google_id')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
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


// Users (sudah ada)
// |---
// | id (string, PK)
// | name
// | email
// | photo
// | phone
// | role (user/admin)
// | password
// | google_id
// | status (aktif/nonaktif)
// | remember_token
// | timestamps

// Studios
// |---
// | id (string, PK)
// | name
// | type
// | description
// | price_per_hour
// | min_booking_hours
// | max_booking_hours
// | status (available/maintenance)
// | created_at
// | updated_at

// Equipment
// |---
// | id (string, PK)
// | name
// | description
// | category
// | quantity
// | studio_id (FK to Studios)
// | created_at
// | updated_at

// Bookings
// |---
// | id (string, PK)
// | user_id (FK to Users)
// | studio_id (FK to Studios)
// | booking_code
// | date
// | start_time
// | end_time
// | total_hours
// | base_price
// | total_amount
// | status (pending/paid/cancelled/completed)
// | notes
// | created_at
// | updated_at

// Payments
// |---
// | id (string, PK)
// | booking_id (FK to Bookings)
// | merchant_ref (from Tripay)
// | payment_method
// | reference (from Tripay)
// | amount
// | status (unpaid/paid/expired/failed)
// | paid_at
// | payment_url
// | created_at
// | updated_at

// BookingEquipment
// |---
// | id (string, PK)
// | booking_id (FK to Bookings)
// | equipment_id (FK to Equipment)
// | quantity
// | created_at
// | updated_at
