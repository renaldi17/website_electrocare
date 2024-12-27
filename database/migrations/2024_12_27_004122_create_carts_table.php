<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_carts_table.php

public function up()
{
    Schema::create('carts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan user
        $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Relasi dengan produk
        $table->integer('quantity')->default(1); // Jumlah produk
        $table->decimal('subtotal', 10, 2)->nullable(); // Subtotal harga produk
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('carts');
}


    /**
     * Reverse the migrations.
     */

};