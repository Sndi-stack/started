<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->text('keterangan');
            $table->unsignedBigInteger('id_metode');
            $table->bigInteger('total');
            $table->timestamps();

            $table->foreign('id_metode')->references('id')->on('pembayaran')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('pemasukan');
    }
};
