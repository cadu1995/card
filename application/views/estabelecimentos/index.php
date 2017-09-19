<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

echo form_open('estabelecimentos/cadastrar', 'id = form');
?>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel-body">
    <div class="row form-group">
        <div class="col-lg-3">
            <button type="submit" class="btn btn-primary form-control"><span class="glyphicon glyphicon-pencil" aria-hidden="true"><b> Cadastrar</b></span></button>
        </div>
    </div>
    
    
    <?php
    echo form_close();
    ?>
    <?php
    $tabela = array(
        'table_open'            => '<table class="table table-striped table-hover table-responsive">',
        'thead_open'            => '<thead class="bg-info">',
        'heading_cell_start'    => '<th style="text-align: center;">',
        'cell_start'            => '<td style="text-align: center;">',
        'cell_alt_start'        => '<td style="text-align: center;">'
    );

    $this->table->set_heading('Razão Social', 'CNPJ', 'Categoria', 'Status', '');

    if(empty($estabelecimentos)){
        $dado = array(
        'data' => 'Nenhum dado encontrado.',
        'class' => 'tr_between',
        'colspan' => 5
    );
        $this->table->add_row($dado);
    } else {    

        foreach($estabelecimentos as $e){
            $link       = anchor(('estabelecimentos/editar') . '/' . $e->id,$e->razao_social);                   
            $label      = ($e->status == 'Ativo') ? 'label-success' : 'label-danger';
            $status     = '<span class="label ' . $label . '">' .  $e->status . '</label>';
            $excluir    = '<a class="btn btn-danger excluir" href="'.base_url('estabelecimentos/excluir/'.$e->id).'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';

            $row = array($link, $e->cnpj, $e->categoria, $status, $excluir);

            $this->table->add_row($row);

        }  
    }
        $this->table->set_template($tabela);
        echo $this->table->generate();
    ?>
</div>


