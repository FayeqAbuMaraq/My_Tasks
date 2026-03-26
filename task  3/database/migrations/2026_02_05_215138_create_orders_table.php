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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // المشتري
            $table->string('customer_name')->nullable();  // في حال الزائر اشترى بدون تسجيل
            $table->string('customer_email')->nullable(); 
            $table->string('customer_phone')->nullable();
            $table->text('address')->nullable();
            $table->decimal('total_amount', 10, 2);     
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending'); // حالة الطلب
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
