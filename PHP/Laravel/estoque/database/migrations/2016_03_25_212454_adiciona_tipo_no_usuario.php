<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaTipoNoUsuario extends Migration
{
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('tipo_usuario', 100)->comment = "0 - Usuário comum, 1 - Administrador";
        });
    }

    public function down()
    {
        Schema::table('users', function($table) {
            $table->string('dropColumn');
        });
    }
}
