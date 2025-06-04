<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_user_fk');
        $table->unsignedBigInteger('id_produto_fk');
        $table->string('pagamento');
        $table->decimal('valor', 10, 2);
        $table->string('descricao');
        $table->string('status')->default('pendente');
        $table->timestamps();

        // FKs
        $table->foreign('id_user_fk')->references('id')->on('usuarios')->onDelete('cascade');
        $table->foreign('id_produto_fk')->references('id')->on('produtos')->onDelete('cascade');
    });
}

    public function down(): void {
        Schema::dropIfExists('pedidos');
    }
};
