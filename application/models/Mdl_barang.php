<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_barang extends CI_Model {
    function product_list(){
        $this->db->select('*, produk.id as id_produk');
        $this->db->from('produk');
        $this->db->join('supplier', ' produk.id_supplier =  supplier.id','left');
        // $this->db->order_by('id', 'desc');
        $hasil=$this->db->get();
        return $hasil->result();
    }

    function save_product($data_barang){
        $result=$this->db->insert('produk',$data_barang);
        return $result;
    }
    function status_pembelian($uri){
        $query = $this->db->get_where('pembelian_barang', array('nomor_faktur'=>$uri));
        foreach ($query->result() as $value) {
            if ($value->status==1) {
                return true;
            }else{
                return false;
            }
        }
    }

    function update_product(){
        $product_code=$this->input->post('product_code');
        $product_name=$this->input->post('product_name');
        $product_price=$this->input->post('price');

        $this->db->set('product_name', $product_name);
        $this->db->set('product_price', $product_price);
        $this->db->where('product_code', $product_code);
        $result=$this->db->update('product');
        return $result;
    }

    function delete_product(){
        $product_code=$this->input->post('product_code');
        $this->db->where('product_code', $product_code);
        $result=$this->db->delete('product');
        return $result;
    }
    function check_faktur($uri){
       return $this->db->get_where('pembelian_barang', array('nomor_faktur'=>$uri))->num_rows();
    }


}

/* End of file Mdl_berita.php */
/* Location: ./application/models/Mdl_berita.php */