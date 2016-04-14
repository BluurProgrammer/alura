<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {
     
    protected $table = 'produtos'; //Especifica a tabela no banco de dados
    public $timestamps = false;

    protected $fillable = array('nome', 'quantidade', 'valor', 'descricao', 'tamanho', 'categoria_id'); //especifica quais atributos podem ser populados
    protected $guarded = ['id']; //impede que altere o id

    public function categoria() {
    	return $this->belongsTo('estoque\Categoria');
    }
}

