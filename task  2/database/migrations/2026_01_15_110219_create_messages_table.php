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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            
            // المحادثة تابعة لطلب معين
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            
            // المرسل (قد يكون الطبيب أو الفني/الأدمن)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->text('message'); // نص الرسالة
            $table->string('attachment')->nullable(); // (اختياري) صورة أو ملف
            
            $table->boolean('is_read')->default(false); // هل تمت القراءة؟
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
