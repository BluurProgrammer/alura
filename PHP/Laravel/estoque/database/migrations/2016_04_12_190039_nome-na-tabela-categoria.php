<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NomeNaTabelaCategoria extends Migration
{
    public function up()
    {
       Schema::table('categorias', function($table) {
            $table->string('nome', 100);
        });
    }

    public function down()
    {
        Schema::table('categorias', function($table) {
            $table->dropColumn('nome', 100);
        });
    }
}
