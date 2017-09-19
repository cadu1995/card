<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estabelecimentos_model
 *
 * @author MASTER
 */
class Estabelecimentos_model extends CI_Model {
	private $tabela;

	public function __construct(){
            parent::__construct();
            $this->tabela       = 'estabelecimentos';
        }
        
        public function get($id = null){
            $this->db->select('e.*, c.descricao as categoria, cid.id as cidade, est.sigla as estado')
                    ->from($this->tabela.' as e')
                    ->join('categorias as c', 'c.id = e.categoria_id', 'left')
                    ->join('cidade as cid', 'e.cidade_id = cid.id', 'left')
                    ->join('estado as est', 'est.sigla = cid.uf', 'left');
            
            if($id){
                $this->db->where('e.id',$id);
            }
                       
            $query = $this->db->get();
            
            return $query->result();
        }
               
        public function insert($estabelecimento){
            return $this->db->insert($this->tabela, $estabelecimento);
        }
        
        public function update($estabelecimento){
            $this->db->where('estabelecimentos.id', $estabelecimento->id)
                     ->update($this->tabela, $estabelecimento);
        }
        
        public function delete($id){
            $this->db->where('estabelecimentos.id', $id)
                     ->delete($this->tabela);
        }
}
