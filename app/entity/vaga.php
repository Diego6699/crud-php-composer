<?php

namespace App\Entity;

use \App\Db\Database;

class vaga
{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     * @var string
     */
    public $titulo;
    /**
     * Descrição da vaga
     */
    public $descricao;

    /**
     * Define se a vaga ativa
     * @var string(s/n)
     */
    public $ativo;

    /**
     * Data da publicação da vaga
     * @var string
     */
    public $data;

    /**
     * Método responsável por cadastrar uma nova vaga no banco
     * @return boolean
     */
    public function cadastrar()
    {
        //DEFINIR A DATA
        $this->data = date('Y-m-d H:i:s');
        //INSERIR A VAGA NO BANCO
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase-> insert([
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'ativo'     => $this->ativo,
            'data'      => $this->data

        ]);

        //RETORNA SUCESSO
        return true;
    }
}
