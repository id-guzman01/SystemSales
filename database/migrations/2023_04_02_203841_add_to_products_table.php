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
        Schema::table('products', function (Blueprint $table) {
            
            $table->after('discount_id',function($table){
                
                $table->unsignedBigInteger('taxe_id')->nullable();
                $table->foreign('taxe_id')
                        ->references('id')
                        ->on('taxes')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

            });

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
