<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaValorDefaultUsuario extends Migration
{
    
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('tipo_usuario', 100)->default(0) ->change();
        });
    }

    public function down()
    {
        Schema::table('users', function($table) {
            $table->string('dropColumn');
        });
    }
}
