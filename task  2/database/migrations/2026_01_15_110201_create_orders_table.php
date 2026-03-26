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
            // العلاقات
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete(); 

            // تفاصيل المريض
            $table->string('patient_name');
            $table->string('patient_gender')->nullable(); 
            $table->integer('age')->nullable();

            // تفاصيل الطلب الفنية
            $table->json('teeth_numbers'); // مصفوفة أرقام الأسنان
            $table->string('shade')->nullable(); // لون السن (A1, A2...)
            $table->text('instructions')->nullable(); 

            // الإدارة
            $table->enum('status', ['pending', 'received', 'in_progress', 'completed', 'delivered', 'cancelled'])->default('pending');
            $table->date('due_date')->nullable(); // موعد التسليم
            $table->decimal('total_price', 10, 2)->nullable();

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
