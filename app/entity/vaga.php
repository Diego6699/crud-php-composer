<?php

namespace App\Entity;

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
}
