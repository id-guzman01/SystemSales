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

            $table->string('nombre',50);
            $table->text('descripcion');

            $table->unsignedBigInteger('subcategorie_id');
            $table->foreign('subcategorie_id')
                    ->references('id')
                    ->on('subcategories')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id')
                    ->references('id')
                    ->on('discounts')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

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
