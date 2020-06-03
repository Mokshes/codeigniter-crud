<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model{

  public function get_product_data ($offset = NULL, $limit = NULL, $where = NULL){
      $SQL = "select *,
      (select name from ".CATEGORY_TABLE." where ".CATEGORY_TABLE.".id = ".PRODUCT_TABLE.".category_id) as category_name,
      (select name from ".SUB_CATEGORY_TABLE." where ".SUB_CATEGORY_TABLE.".id = ".PRODUCT_TABLE.".subcategory_id) as sub_category_name
      from `".PRODUCT_TABLE."` where dl = 0";
      if($where != NULL){
        $SQL .= $where;
      }
      if($offset and $limit){
        $SQL .= "LIMIT ".$offset.", ".$limit;
      }
      $query = $this->db->query($SQL);
      return $query->result();
  }

  public function get_category_data ($offset = NULL, $limit = NULL, $where = NULL){
      $SQL = "select * from `".CATEGORY_TABLE."` where dl = 0";
      if($where != NULL){
        $SQL .= $where;
      }
      if($offset and $limit){
        $SQL .= "LIMIT ".$offset.", ".$limit;
      }
      $query = $this->db->query($SQL);
      return $query->result();
  }

  public function get_sub_category_data ($offset = NULL, $limit = NULL, $where = NULL){
      $SQL = "select *, (select name from ".CATEGORY_TABLE." where ".CATEGORY_TABLE.".id = ".SUB_CATEGORY_TABLE.".parent_id) as parent_name from `".SUB_CATEGORY_TABLE."` where dl = 0";
      if($where != NULL){
        $SQL .= $where;
      }
      if($offset and $limit){
        $SQL .= "LIMIT ".$offset.", ".$limit;
      }
      $query = $this->db->query($SQL);
      return $query->result();
  }
}
?>
