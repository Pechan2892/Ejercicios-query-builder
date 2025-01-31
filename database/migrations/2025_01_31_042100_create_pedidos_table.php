<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('producto');
            $table->integer('cantidad');
            $table->decimal('total', 8, 2);
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('pedidos');
    }
};

