<?php

class M_berita extends CI_Model
{

    public function read_all_berita()
    {
        
        $hasil=$this->db->query("SELECT * FROM berita");
        return $hasil;
        
    }

    public function count_all_berita()
    {
        $hasil=$this->db->query("SELECT count(id_berita) as total_berita FROM berita");
        return $hasil;
    }

    public function insert_berita($judul_berita, $isi_berita, $gambar_berita)
    {

        $this->db->trans_start();

       $this->db->query("INSERT INTO berita(judul_berita, isi_berita, gambar_berita, created_date) VALUES ('$judul_berita','$isi_berita','$gambar_berita',NOW())");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;

    }

    public function update_berita($judul_berita, $isi_berita, $gambar_berita, $id_berita)
    {

        $this->db->trans_start();

       $this->db->query("UPDATE berita SET judul_berita='$judul_berita', isi_berita='$isi_berita', gambar_berita='$gambar_berita' WHERE id_berita='$id_berita'");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;

    }

    public function delete_berita($id_berita)
    {

        $this->db->trans_start();

       $this->db->query("DELETE FROM berita WHERE id_berita='$id_berita'");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;

    }

}