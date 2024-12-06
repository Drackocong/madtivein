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

        Schema::create('versionn', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            // $table->unsignedBigInteger('idproduk'); // idproduk as foreign key
            $table->text('versionn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versionn');
    }
};
