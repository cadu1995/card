<?php if(!defined('BASEPATH')) exit('Sem permissao de acesso direto ao Script.');


class Estado_model extends CI_Model {
	private $tabela;

	public function __construct(){
		parent::__construct();

		$this->tabela = 'estado';
	}
 
        public function get_all(){
            $this->db->select()
                    ->from($this->tabela);
            
                        
            $query = $this->db->get();
            
            return $query->result();
        }
               
        public function insert($estado){
            $this->db->insert($this->tabela, $estado);
            
            return $this->db->insert();
        }
        
        public function update($estado){
            $this->db->where('id', $estado->id)
                     ->update($this->tabela, $estado);
        }
        
        public function delete($id){
            $this->db->where('id', $id)
                     ->delete($this->tabela);
        }
        
}
