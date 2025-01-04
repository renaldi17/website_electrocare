<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_orders_table.php

public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan user
        $table->string('status')->nullable()->default('order');
        $table->string('snapToken')->nullable();
        $table->string('alamat')->nullable();
        $table->string('no_hp')->nullable();
        $table->string('total')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('orders');
}


    /**
     * Reverse the migrations.
     */

};