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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->timestamp('fecha_compra');
            $table->timestamp('fecha_pago')->nullable();

            $table->unsignedBigInteger('taxe_id');
            $table->foreign('taxe_id')
                    ->references('id')
                    ->on('taxes')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('statu_id');
            $table->foreign('statu_id')
                    ->references('id')
                    ->on('status')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                    
            $table->string('total_pagar',20);
            $table->string('numero_pago',40);   
            
            $table->unsignedBigInteger('method_id');
            $table->foreign('method_id')
                    ->references('id')
                    ->on('methods')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
