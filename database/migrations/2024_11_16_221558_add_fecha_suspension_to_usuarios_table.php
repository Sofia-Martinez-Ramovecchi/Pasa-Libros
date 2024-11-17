<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('usuario', function (Blueprint $table) {
        $table->timestamp('fecha_suspension')->nullable(); // Puede ser nula si no está suspendido
    });
}

public function down()
{
    Schema::table('usuario', function (Blueprint $table) {
        $table->dropColumn('fecha_suspension');
    });
}

};
