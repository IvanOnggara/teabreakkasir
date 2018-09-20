<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class ModelKasir extends CI_Model{

    public function getAllData($table){
        $res=$this->db->get($table);
        return $res->result();
    }

    public function getRowCount($table,$where){
        $res = $this->db->get_where($table,$where);
        return $res->num_rows();
    }

    public function getDataLimit($table,$limit){
        $res = $this->db->get($table,$limit,0);
        return $res->result();
    }
    
    public function getDataLimitDesc($table,$limit){
        $res = $this->db->order_by("update_at", "desc")->get($table,$limit,0);
        return $res->result();
    }

    public function getAllDataDesc($table){
        $res = $this->db->order_by("update_at", "desc")->get($table);
        return $res->result();
    }
 
    public function insert($table,$data){
        $res = $this->db->insert($table, $data);
        return ($this->db->affected_rows() < 1) ? false : true;
    }
 
    public function update($table, $data, $where){
        $res = $this->db->update($table, $data, $where);
        return ($this->db->affected_rows() < 1) ? false : true;
    }

    public function updateOneColumn($table, $data, $where){
        $listpk = array("stan"=>"id_stan","produk"=>"id_produk","nota"=>"id_nota","diskon"=>"id_diskon","detail_nota"=>"id_detail_nota","detail_stan_diskon"=>"id_diskon","detail_barang_diskon"=>"id_diskon");

        $res = $this->db->where($where);
        $res = $this->db->update($table, $data);
        return ($this->db->affected_rows() < 1) ? false : true;
    }

    public function getData($where,$table){
        $res = $this->db->get_where($table,$where);
        return $res->result();
    }
 
    public function delete($table, $id){

        $listpk = array("stan"=>"id_stan","produk"=>"id_produk","nota"=>"id_nota","diskon"=>"id_diskon","detail_nota"=>"id_detail_nota","detail_stan_diskon"=>"id_diskon","detail_barang_diskon"=>"id_diskon");

        $this->db->where($listpk[$table.""],$id);
        $this->db->delete($table);
    }

    public function deleteWithCustomWhere($table, $where){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function deleteAllData($table)
    {
        $this->db->empty_table($table);
    }

    public function getSpecificColumn($table,$column)
    {
        $this->db->select($column); 
        $this->db->from($table);
        return $this->db->get()->result();
    }

    public function getDistinctSpecificColumn($table,$column)
    {
        $this->db->distinct();
        $this->db->select($column); 
        $this->db->from($table);
        return $this->db->get()->result();
    }

    public function getDistinctSpecificColumnWhere($table,$column,$where)
    {
        $this->db->distinct();
        $this->db->select($column); 
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->result();
    }

    public function getSpecificColumnWhere($table,$column,$where)
    {
        $this->db->select($column); 
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->result();
    }

    public function checkExist($table,$id)
    {
        $listpk = array("stan"=>"id_stan","produk"=>"id_produk","nota"=>"id_nota","diskon"=>"id_diskon","detail_nota"=>"id_detail_nota","detail_stan_diskon"=>"id_diskon","detail_barang_diskon"=>"id_diskon");
        $this->db->from($table);
        $this->db->where($listpk[$table.""],$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return true;    
        }
        else{
            return false;
        }
    }

    public function checkExistDetailBarangDiskon($where)
    {
        $res = $this->db->get_where('detail_barang_diskon',$where);
        if ($res->num_rows() > 0){
            return true;    
        }
        else{
            return false;
        }
    }
}
?>