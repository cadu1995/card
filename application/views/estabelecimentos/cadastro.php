<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$razao_social =     (isset($razao_social)) ? $razao_social : null;
$nome_fantasia =    (isset($nome_fantasia)) ? $nome_fantasia : null;
$cnpj =             (isset($cnpj)) ? $cnpj : null;
$data_registro = (isset($data_registro)) ? TimestampParaDataSimples($data_registro) : null;
$email =             (isset($email)) ? $email : null;
$telefone =          (isset($telefone)) ? $telefone : null;
$tipo_logradouro =          (isset($tipo_logradouro)) ? $tipo_logradouro : null;
$logradouro =          (isset($logradouro)) ? $logradouro : null;
$numero_logradouro =          (isset($numero_logradouro)) ? $numero_logradouro : null;
$complemento =             (isset($complemento)) ? $complemento : null;
$bairro =             (isset($bairro)) ? $bairro : null;
$estado =           (isset($estado)) ? $estado : '';
$cidade =           (isset($cidade)) ? $cidade : '';
$categoria =          (isset($categoria_id)) ? $categoria_id : '';
$status =             (isset($status)) ? $status : 'Inativo';
$id = (isset($id)) ? $id : null;


echo form_open($url, array('class' => 'form', 'name' => 'formEstabelecimentos', 'id' => 'formEstabelecimentos'));
?>
<input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />

<div class="panel-body">    
    <div class="row">
        <div class="col-lg-12">
            <h4 class="heading"><?php echo $titulo; ?></h4>
            <div class="row form-sep">
                <div class="form-group col-md-10">
                    <label for="razao_social" class="control-label req">Razão Social</label>
                    <input type="text" class="form-control" id="razao_social" name="razao_social" value="<?php echo $razao_social; ?>" maxlength="45" />
                    <?php echo form_error('razao_social'); ?>
                </div>
            </div>
            <div class="row form-sep">
                <div class="form-group col-md-10">
                    <label for="razao_social" class="control-label req">Nome Fantasia</label>
                    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" value="<?php echo $nome_fantasia; ?>" maxlength="45" />
                    <?php echo form_error('nome_fantasia'); ?>
                </div>
            </div>
            <div class="row form-sep">
                <div class="form-group col-md-6">
                    <label for="cnpj" class="control-label req">CNPJ</label>
                    <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" value="<?php echo $cnpj; ?>" maxlength="45" />
                    <?php echo form_error('cnpj'); ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="data_registro" class="control-label req">Data Registro</label>
                    <input type="text" class="form-control data" id="data" name="data_registro" value="<?php echo $data_registro; ?>" maxlength="45" />
                    <?php echo form_error('data_registro'); ?>
                </div>
            </div>
            <div class="row form-sep">
                <div class="form-group col-md-6">
                    <label for="email" class="control-label req">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" maxlength="45" />
                    <?php echo form_error('email'); ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone" class="control-label req">Telefone</label>
                    <input type="text" class="form-control telefone" id="telefone" name="telefone" value="<?php echo $telefone; ?>" maxlength="45" />
                    <?php echo form_error('telefone'); ?>
                </div>
            </div>
            <div class="row form-sep">
                <div class="form-group col-md-3">
                    <label for="tipo_logradouro" class="control-label req">Tipo</label>
                    <?php echo form_dropdown('tipo_logradouro', $this->config->item('tiposLogradouros'), $tipo_logradouro, 'class="form-control" id="tipo_logradouro"'); ?>                    
                    <?php echo form_error('tipo_logradouro'); ?>
                </div>
                <div class="form-group col-md-5">
                    <label for="bairro" class="control-label req">Endereço</label>
                    <input type="text" class="form-control" id="bairro" name="logradouro" value="<?php echo $logradouro; ?>" maxlength="45" />
                    <?php echo form_error('logradouro'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="numero_logradouro" class="control-label req">Número</label>
                    <input type="text" class="form-control numero_logradouro" id="bairro" name="numero_logradouro" value="<?php echo $numero_logradouro; ?>" maxlength="45" />
                    <?php echo form_error('numero_logradouro'); ?>
                </div>
            </div>
            <div class="row form-sep">
                <div class="form-group col-md-5">
                    <label for="cnpj" class="control-label req">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $complemento; ?>" maxlength="45" />
                    <?php echo form_error('complemento'); ?>
                </div>
                <div class="form-group col-md-5">
                    <label for="bairro" class="control-label req">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $bairro; ?>" maxlength="45" />
                    <?php echo form_error('bairro'); ?>
                </div>
            </div>
            <div class="row form-sep">
                <div class="form-group col-md-4">
                    <label for="estado" class="control-label">Estado</label>
                    <?php echo form_dropdown('estado', $ufs, $estado, 'class="form-control" id="estado"'); ?>
                    <?php echo form_error('estado'); ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="cidade" class="control-label">Cidade</label>
                    
                    <?php
                    echo '<input type="hidden" id="urlCidadeAjax" value="' . base_url('estabelecimentos/buscarcidadesestado') . '" />';
                    echo form_dropdown('cidade', $cidades, $cidade, 'class="form-control" id="cidade"');
                    echo form_error('cidade');
                    ?>
                    <span class="load" id="loadCidade">Carregando...</span>
                </div>
            </div>
            <div class="row form-sep">
                <div class="form-group col-md-5">
                    <label for="categoria" class="control-label req">Categoria</label>
                    <?php echo form_dropdown('categoria', $categorias, $categoria, 'class="form-control" id="categoria"'); ?>
                    <?php echo form_error('categoria'); ?>
                </div>
                <div class="form-group col-md-5">
                    <label for="status" class="control-label req">Status</label>
                    <?php echo form_dropdown('status', $this->config->item('status'), $status, 'class="form-control" id="categoria"'); ?>
                    <?php echo form_error('status'); ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="profile-btn">
        <button type="submit" href="#" class="btn btn-success bg-red">Salvar</button>
        <a href="javascript: history.back();"  title="Voltar" class="btn-default btn"><i class="fa fa-angle-double-left"></i> Voltar</a>    
        <div class="clearfix"></div>
    </div>
</div>

<?php echo form_close(); 
