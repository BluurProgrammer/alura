<?php

namespace estoque\Http\Requests;

use estoque\Http\Requests\Request;

class ProdutoRequest extends Request
{
  
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'nome' => array('required','min:3','Regex:/^[A-Za-z]/'),
            'descricao' => 'required|max:255', 
            'valor' => 'required|numeric', 
            'quantidade' => 'required|numeric', 
            'tamanho' => 'required|max:100'
        ];
    }

    public function messages() {
        return [
            'required' => 'O :attribute é obrigatório',
            'nome.min' => 'O :attribute deve ter no mínimo 3 caractéres',
            'numeric' => 'O campo :attribute deve ser um número',
            'nome.regex' => 'O campo :attribute deve conter apenas letras'

        ];
    }
}
