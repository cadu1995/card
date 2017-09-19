<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 $config['tiposLogradouros'] = array(
                ''              => 'Selecione',
                'RUA'           => 'RUA',
                'AVENIDA'       => 'AVENIDA',
                //'LADEIRA'       => 'LADEIRA',
                'AEROPORTO'     => 'AEROPORTO',
                'ALAMEDA'       => 'ALAMEDA',
                'APARTAMENTO'   => 'APARTAMENTO',
                'BECO'          => 'BECO',
                'BLOCO'         => 'BLOCO',
                //'CAMINHO'       => 'CAMINHO',
                //'ESCADINHA'     => 'ESCADINHA',
                'ESTAÇÃO'       => 'ESTAÇÃO',
                //'ESTRADA'       => 'ESTRADA',
                //'FAZENDA'       => 'FAZENDA',
                'FORTALEZA'     => 'FORTALEZA',
                'GALERIA'       => 'GALERIA',
                'LADEIRA'       => 'LADEIRA',
                'LARGO'         => 'LARGO',
                'PRAÇA'         => 'PRAÇA',
                'PARQUE'        => 'PARQUE',
                'QUADRA'        => 'QUADRA',
                //'QUILÔMETRO'    => 'QUILÔMETRO',
                'QUINTA'        => 'QUINTA',
                //'RODOVIA'       => 'RODOVIA',
                'SUPER QUADRA'  => 'SUPER QUADRA',
                'TRAVESSA'      => 'TRAVESSA',
                'VIADUTO'       => 'VIADUTO',
                'VILA'          => 'VILA'
            );
 $config['status'] = array(
        'Inativo'     => 'Inativo',
        'Ativo'     => 'Ativo'
     
 );
 
 $config['regras'] = array(
    array(
        'field' => 'razao_social',
        'label' => 'razao_social',
        'rules' => 'required|trim|max_length[45]'
    ),
    array(
        'field' => 'nome_fantasia',
        'label' => 'nome_fantasia',
        'rules' => 'trim|max_length[45]'
    ),
    array(
        'field' => 'cnpj',
        'label' => 'cnpj',
        'rules' => 'required'
    ),
    array(
        'field' => 'email',
        'label' => 'email',
        'rules' => 'trim|valid_email|max_length[45]'
    ),
    array(
        'field' => 'endereco',
        'label' => 'endereco',
        'rules' => 'trim|max_length[80]'
    )
);
