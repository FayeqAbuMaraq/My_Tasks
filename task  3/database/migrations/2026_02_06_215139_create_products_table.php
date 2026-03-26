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
        Schema::create('products', function (Blueprint $table) {
            $table->id();       
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // تابع لأي قسم
            $table->string('name');             // اسم المنتج (Samsung S22)
            $table->string('slug')->unique();       // الرابط (مثل: samsung-s22)
            $table->string('short_description')->nullable(); // وصف قصير (Ultra 256 GB)
            $table->text('description')->nullable();         // وصف كامل
            $table->decimal('price', 10, 2);                 // السعر الأصلي
            $table->decimal('sale_price', 10, 2)->nullable();// سعر العرض (Flash Sale)
            $table->integer('quantity')->default(10);        // الكمية المتوفرة
            $table->string('image')->nullable();             // صورة المنتج الرئيسية
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
