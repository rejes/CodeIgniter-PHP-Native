<?php

class M_iuran extends CI_Model
{

    public function insert_iuran($bulan, $tahun, $tanggal_iuran, $jumlah_iuran, $id_user)
    {
        $this->db->trans_start();

       $this->db->query("INSERT INTO iuran(bulan, tahun, tanggal_iuran, jumlah_iuran, id_user) VALUES ('$bulan','$tahun', '$tanggal_iuran', '$jumlah_iuran', '$id_user')");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_iuran($bulan, $tahun, $tanggal_iuran, $jumlah_iuran, $id_iuran)
    {
        $this->db->trans_start();

       $this->db->query("UPDATE iuran SET bulan='$bulan', tahun='$tahun', tanggal_iuran='$tanggal_iuran', jumlah_iuran='$jumlah_iuran' WHERE id_iuran='$id_iuran'");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function delete_iuran($id_iuran)
    {
        $this->db->trans_start();

        $this->db->query("DELETE FROM iuran WHERE id_iuran='$id_iuran'");
 
        $this->db->trans_complete();
         if($this->db->trans_status()==true)
             return true;
         else
             return false;
    }

   
    public function sum_all_iuran()
    {
        $hasil=$this->db->query("SELECT SUM(jumlah_iuran) as nominal FROM iuran");
        return $hasil;
    }

}