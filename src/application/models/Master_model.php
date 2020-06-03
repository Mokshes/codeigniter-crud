<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_model extends CI_Model
{

	public function select_row_where($tablename,$columns,$where){
		$this->db->select($columns);
    $query = $this->db->get_where($tablename,$where);
    $result = $query->result_array();
		return $result;
	}

  public function insert_record($table_name,$keys,$values){
      $kk=array_combine($keys,$values);
      $res=$this->db->insert($table_name, $kk);
      return $res;
  }

	public function insert_data($tablename, $data){
		$this->db->insert($tablename,$data);
		return $this->db->insert_id();
	}

	public function fetch_record($table_name,$keys,$where){
			$this->db->select($keys);
			$this->db->from($table_name);

			if($where and $where != NULL){
				$this->db->where($where);
			}
			$query = $this->db->get();
			return $query->result();

	 }


	function custom_query($sql){
	    $query = $this->db->query($sql);
	    $result = $query->result_array();
	    return $result;
	}

  public function update_record($table_name,$id,$data){
       $this->db->where('id', $id);
       $res=$this->db->update($table_name, $data);
       return $res;
	}
}
?>
