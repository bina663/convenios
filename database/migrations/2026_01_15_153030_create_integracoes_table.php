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
        Schema::create('integracoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('base_url');
            $table->enum('status', ['ativo', 'inativo'])->default('inativo');
            $table->string('auth_type')->nullable(); // bearer, api_key, etc
            $table->text('token')->nullable();
            $table->json('headers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integracoes');
    }
};
