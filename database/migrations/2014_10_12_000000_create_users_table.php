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


// ✅ 1. Users

// id (string, primary key, 10 karakter)

// name (string)

// email (string, unik)

// photo (string, nullable)

// phone (string, nullable)

// role (string, default: 'user')

// password (string)

// google_id (string, nullable)

// status (enum: 'aktif', 'nonaktif', default: 'aktif')

// remember_token (string)

// created_at (timestamp)

// updated_at (timestamp)

// ✅ 2. Studios

// id (string, primary key, 10 karakter)

// name (string)

// type (string) – contoh: small, medium, large

// kapasitas (string)

// description (text, nullable)

// foto (string, nullable)

// price_per_hour (decimal 10,2)

// min_booking_hours (integer, default: 1)

// max_booking_hours (integer, default: 8)

// status (enum: 'available', 'maintenance', default: 'available')

// created_at (timestamp)

// updated_at (timestamp)

// ✅ 3. Equipment

// id (string, primary key, 10 karakter)

// name (string)

// description (text, nullable)

// category (string)

// quantity (integer, default: 1)

// allocated_quantity (integer, default: 0)

// foto (string, nullable)

// created_at (timestamp)

// updated_at (timestamp)

// ✅ 4. Studio Equipment (Pivot)

// studio_id (string, foreign key → studios.id)

// equipment_id (string, foreign key → equipment.id)

// quantity (integer, default: 1)

// created_at (timestamp)

// updated_at (timestamp)

// Catatan: Composite primary key: (studio_id, equipment_id)

// ✅ 5. Bookings

// id (string, primary key, 10 karakter)

// user_id (string, foreign key → users.id)

// studio_id (string, foreign key → studios.id)

// booking_code (string, unik)

// date (date)

// start_time (time)

// end_time (time)

// total_hours (integer)

// base_price (decimal 10,2)

// total_amount (decimal 10,2)

// status (enum: 'pending', 'paid', 'cancelled', 'completed', default: 'pending')

// notes (text, nullable)

// created_at (timestamp)

// updated_at (timestamp)

// ✅ 6. Payments

// id (string, primary key, 10 karakter)

// booking_id (string, foreign key → bookings.id)

// merchant_ref (string, nullable)

// payment_method (string)

// reference (string, nullable)

// amount (decimal 10,2)

// status (enum: 'unpaid', 'paid', 'expired', 'failed', default: 'unpaid')

// paid_at (timestamp, nullable)

// payment_url (string, nullable)

// created_at (timestamp)

// updated_at (timestamp)

// ✅ 7. Booking Equipment

// id (string, primary key, 10 karakter)

// booking_id (string, foreign key → bookings.id)

// equipment_id (string, foreign key → equipment.id)

// quantity (integer, default: 1)

// created_at (timestamp)

// updated_at (timestamp)

// ✅ 8. Password Reset Tokens

// id (auto-increment primary key)

// email (string, nullable)

// phone (string, nullable)

// token (string, di-hash, indexed)

// verification_code (string, di-hash)

// method (enum: 'email', 'whatsapp')

// created_at (timestamp, nullable)

// ✅ 9. Personal Access Tokens

// id (auto-increment primary key)

// tokenable_type (morphs)

// tokenable_id (morphs)

// name (string)

// token (string, 64 karakter, unik)

// abilities (text, nullable)

// last_used_at (timestamp, nullable)

// expires_at (timestamp, nullable)

// created_at (timestamp)

// updated_at (timestamp)

// ✅ 10. Backup Logs

// id (auto-increment primary key)

// filename (string)

// type (string, default: 'backup')

// admin_id (string, foreign key → users.id, nullable)

// admin_name (string, nullable)

// size (integer, nullable) – ukuran file dalam bytes

// path (string)

// backup_date (timestamp, nullable)

// restored_at (timestamp, nullable)

// notes (text, nullable)

// created_at (timestamp)

// updated_at (timestamp)

// ✅ 11. Equipment Adjustments

// id (auto-increment primary key)

// equipment_id (string, foreign key → equipment.id)

// adjustment_type (enum: 'increase', 'decrease')

// quantity (integer)

// old_quantity (integer)

// new_quantity (integer)

// reason (text)

// adjusted_by (string, nullable)

// created_at (timestamp)

// updated_at (timestamp)
