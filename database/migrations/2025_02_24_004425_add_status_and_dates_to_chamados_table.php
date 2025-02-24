<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('chamados', function (Blueprint $table) {
        // $table->foreignId('status_id')->constrained('status')->onDelete('cascade');
        $table->dateTime('data_finalizacao')->nullable();
    });
}

public function down()
{
    Schema::table('chamados', function (Blueprint $table) {
        $table->dropForeign(['status_id']);
        $table->dropColumn(['status_id', 'data_abertura', 'data_inicio_desenvolvimento', 'data_finalizacao']);
    });
}

};
