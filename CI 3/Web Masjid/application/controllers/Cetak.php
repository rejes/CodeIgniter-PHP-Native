<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kas');
		$this->load->model('m_user');
	}

	public function kartu_anggota()
	{

		$data['anggota'] = $this->m_user->read_all_anggota_by_id_user($this->session->userdata('id_user'))->result_array();
		$this->load->library('pdf');
		$this->pdf->setPaper('A5', 'landscape');
		$this->pdf->filename = "laporan-kas.pdf";
		$this->pdf->load_view('kartu_anggota', $data);
	}

	public function laporan_perbulan()
	{
		$bulan = $this->input->post('bulan');
        if($bulan == 1){
            $start = '2022-01-01';
            $end = '2022-01-31';
            $data['bulan'] = "Januari";
        }else if($bulan == 2){
            $start = '2022-02-01';
            $end = '2022-02-28';
            $data['bulan'] = "Februari";
        }else if($bulan == 3){
            $start = '2022-03-01';
            $end = '2022-03-31';
            $data['bulan'] = "Maret";
        }else if($bulan == 4){
            $start = '2022-04-01';
            $end = '2022-04-30';
            $data['bulan'] = "April";
        }else if($bulan == 5){
            $start = '2022-05-01';
            $end = '2022-05-31';
            $data['bulan'] = "Mei";
        }else if($bulan == 6){
            $start = '2022-06-01';
            $end = '2022-06-30';
            $data['bulan'] = "Juni";
        }else if($bulan == 7){
            $start = '2022-07-01';
            $end = '2022-07-31';
            $data['bulan'] = "Juli";
        }else if($bulan == 8){
            $start = '2022-08-01';
            $end = '2022-08-31';
            $data['bulan'] = "Agustus";
        }else if($bulan == 9){
            $start = '2022-09-01';
            $end = '2022-09-30';
            $data['bulan'] = "September";
        }else if($bulan == 10){
            $start = '2022-10-01';
            $end = '2022-10-31';
            $data['bulan'] = "Oktober";
        }else if($bulan == 11){
            $start = '2022-11-01';
            $end = '2022-11-30';
            $data['bulan'] = "November";
        }else if($bulan == 12){
            $start = '2022-12-01';
            $end = '2022-12-31';
            $data['bulan'] = "Desember";
		}
		
        $data['kas'] = $this->m_kas->sum_all_kas_by_date($end, $start)->result_array();
        $data['kas_debit'] = $this->m_kas->sum_all_kas_debit_by_date($end, $start)->row_array();
        $data['kas_kredit'] = $this->m_kas->sum_all_kas_kredit_by_date($end, $start)->row_array();
	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-kas.pdf";
		$this->pdf->load_view('laporan_kas', $data);
	}
	
	public function slip_iuran_anggota($id_iuran)
	{

		$data['anggota_iuran'] = $this->m_user->read_all_anggota_iuran_by_id($id_iuran)->result_array();

	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('A5', 'landscape');
		$this->pdf->filename = "laporan-kas.pdf";
		$this->pdf->load_view('slip_iuran', $data);
    }
    
	
}