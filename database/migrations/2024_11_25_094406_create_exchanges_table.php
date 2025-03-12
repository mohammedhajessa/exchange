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
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');// الفرع
            $table->integer('from_currency');// العملة المرسلة
            $table->integer('to_currency');// العملة المستلمة
            $table->double('amount_from');// المبلغ المرسل
            $table->double('amount_to');// المبلغ المستلم
            $table->double('fees');// مبلغ العملية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchanges');
    }
};
