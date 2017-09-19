<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Estabelecimentos</title>
        
        <meta charset="utf-8">
        <meta http-equiv="content-language" content="pt-br">
        
        <?php foreach($Css as $css){
            echo link_tag($css . '.css');
        }?>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-default" style="margin-top: 5px;">
                <div class="panel-heading">
                    <h3><?php echo ' <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> '.$titulo;?></h3>
                </div>
                <?php $this->load->view($view); ?>
            </div>
        </div>
        <div class="modal" id="Exclusao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Atenção</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Deseja excluir este estabelecimento?</p>
                    </div>
                    <div class="modal-footer">
                        <a role="button" id="confirma" href="" class="btn btn-primary">Sim</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <footer>
        <?php foreach($Js as $js){
            echo '<script type="text/javascript" src="' . base_url($js) . '.js"></script>';
        }?>        
    </footer>
</html>


