<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estabelecimentos extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        //Models
        $this->load->model(array('estabelecimentos_model',
            'categorias_model',
            'estado_model',
            'cidade_model'));

        // Css e Javascripts
        $this->data['Js'][]  = 'assets/js/jquery-3.2.1.min';
        $this->data['Js'][] = 'assets/js/jquery.validate';
        $this->data['Css'][] = 'assets/bootstrap/css/bootstrap';
        $this->data['Js'][]  = 'assets/bootstrap/js/bootstrap.min';       
        $this->data['Js'][] = 'assets/js/jquery.mask';

        $this->data['Js'][] = 'assets/bootstrap/js/bootstrap-toggle.min';       
        $this->data['Js'][]  = 'assets/js/pages/estabelecimentos';
        
        $this->config->load('estabelecimentos');
        $this->load->helper('validacao');
        $this->load->helper('data');
    }
    
    public function index(){
        
        $this->data['estabelecimentos'] = $this->estabelecimentos_model->get();
        $this->data['view']             = 'estabelecimentos/index';
        $this->data['titulo']           = 'Estabelecimentos';

        $this->load->view('template', $this->data);
        
    }
    
    public function cadastrar(){
        
        if ($this->input->post('cnpj')){
            $this->salvar();
        }
        
        $this->data['view']     = 'estabelecimentos/cadastro';
        $this->data['titulo']   = 'Cadastrar Estabelecimentos';
        $this->data['url']      = 'estabelecimentos/salvar';
        $this->Selects();   

        $this->load->view('template', $this->data);
        
    }
    
    public function editar($id = null){
        
        if ($this->input->post('cnpj')){
            $this->salvar($id);
        }
        
        $this->data = array_merge((array) $this->estabelecimentos_model->get($id)[0], $this->data);
        $this->data['view']   = 'estabelecimentos/cadastro';
        $this->data['titulo'] = 'Editar Estabelecimentos';
        $this->data['url']      = 'estabelecimentos/editar/'.$id;
        $this->data['id'] = $id;
        $this->Selects();

        $this->load->view('template', $this->data);
        
    }
    
    public function salvar($id = null){
        
        $this->form_validation->set_rules($this->config->item('regras'));
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $estabelecimentos = $this->estabelecimentos();  
        if ($this->form_validation->run()){
            if (!$id){
                $this->estabelecimentos_model->insert($estabelecimentos);
            } else {
                $this->estabelecimentos_model->update($estabelecimentos);                
            }                    
        }
        redirect(base_url());                     
    }
    
    public function excluir($id){
        $this->estabelecimentos_model->delete($id);
        redirect(base_url());   
        
    }
        
    public function estabelecimentos (){
        $estabelecimentos = new stdClass();
        $post = $this->input->post();
        
        if(isset($post['id'])){
            $estabelecimentos->id = $post['id'];
        }
        
        
               
        $estabelecimentos->razao_social         = (!empty($post['razao_social'])) ? $post['razao_social'] : '';
        $estabelecimentos->nome_fantasia        = (!empty($post['nome_fantasia'])) ? $post['nome_fantasia'] : '';
        $estabelecimentos->cnpj                 = (!empty($post['cnpj'])) ? $post['cnpj'] : '';
        $estabelecimentos->email                = (!empty($post['email'])) ? $post['email'] : '';
        $estabelecimentos->data_registro        = (!empty($post['data_registro'])) ? to_datetime($post['data_registro']) :  date('Y-m-d H:i:s');
        $estabelecimentos->tipo_logradouro      = (!empty($post['tipo_logradouro'])) ? $post['tipo_logradouro'] : '';
        $estabelecimentos->logradouro           = (!empty($post['logradouro'])) ? $post['logradouro'] : '';
        $estabelecimentos->numero_logradouro    = (!empty($post['numero_logradouro'])) ? $post['numero_logradouro'] : '';
        $estabelecimentos->complemento          = (!empty($post['complemento'])) ? $post['complemento'] : '';
        $estabelecimentos->bairro               = (!empty($post['bairro'])) ? $post['bairro'] : '';
        $estabelecimentos->cidade_id            = (!empty($post['cidade'])) ? $post['cidade'] : null;
        $estabelecimentos->telefone             = (!empty($post['telefone'])) ? $post['telefone'] : '';
        $estabelecimentos->categoria_id         = (!empty($post['categoria'])) ? $post['categoria'] : null;
        $estabelecimentos->status               = (!empty($post['status'])) ? $post['status'] : 'Inativo';
           
        return $estabelecimentos;

    }
    
    public function Selects(){
        
        $estado      = $this->estado_model->get_all();
        $est[''] =  'Selecione';
        
        foreach ($estado as $e){
            $est[$e->sigla] = $e->sigla;
        }
        
        $this->data['ufs']   = $est;
        
        $cidade      = $this->cidade_model->get_all();
        $cid[''] =  'Selecione';
        
        foreach ($cidade as $c){
            $cid[$c->id] = $c->nome;
        }
        
        $this->data['cidades']   = $cid;
        
        $cat    = $this->categorias_model->get_all();
        
        $categoria[''] =  'Selecione';
        
        foreach ($cat as $c){
            $categoria[$c->id] = $c->descricao;
         }
         
         $this->data['categorias'] = $categoria;
        
    }
    
    public function BuscarCidadesEstado() {       
        
        $cidades = $this->cidade_model->get_cidade_estado($this->input->post('uf'));
        
        echo '<option value="">Selecione</option>'; 
        foreach($cidades as $cidade){
            
            echo '<option value="' . $cidade->id . '">' . $cidade->nome . '</option>';
        }
    }
    
    
}
