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
        Schema::create('box_transitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('currency_id')->constrained(); // العملة المرتبطة بالحركة
            $table->foreignId('branch_id')->constrained(); // الفرع المرتبط بالحركة
            $table->enum('type', ['exchange','transfer']); //  نوع العملية
            $table->double('amount'); // مبلغ العملية
            $table->double('amount_after_fees')->nullable(); // مبلغ العملية بعد خصم الرسوم
            $table->double('fees'); // مبلغ العملية
            $table->text('note')->nullable(); // ملاحظات إضافية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('box_transitions');
    }
};
