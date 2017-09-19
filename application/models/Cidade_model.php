<?php if(!defined('BASEPATH')) exit('Sem permissao de acesso direto ao Script.');


class Cidade_model extends CI_Model {
	private $tabela;

	public function __construct(){
		parent::__construct();

		$this->tabela = 'cidade';
	}
        
        public function get_all(){
            $this->db->select()
                    ->from($this->tabela);
            
                        
            $query = $this->db->get();
            
            return $query->result();
        }
        
        public function get_cidade_estado($uf = null){
            $this->db->select('cid.*')
                    ->from($this->tabela.' as cid')
                    ->join('estado as est', 'est.sigla = cid.uf', 'left');
            
            if ($uf){
                $this->db->where('est.sigla',$uf);
            }
            
            return $this->db->get()->result();
   
        }
               
        public function insert($cidade){
            $this->db->insert($this->tabela, $cidade);
            
            return $this->db->insert();
        }
        
        public function update($cidade){
            $this->db->where('id', $cidade->id)
                     ->update($this->tabela, $cidade);
        }
        
        public function delete($id){
            $this->db->where('id', $id)
                     ->delete($this->tabela);
        }
        
}
