<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporanKeuanganModel;
use App\Models\PengurusModel;
use App\Models\SumbanganModel;
use App\Models\UsersModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $laporanKeuanganModel = new LaporanKeuanganModel();
        $pengurusModel = new PengurusModel();
        $userModel = new UsersModel();
        $sumbanganModel = new SumbanganModel();

        $pemasukkanLaporan = [];
        $pengeluaranLaporan = [];
        helper('tgl');

        $bulanKeuangan = [
            'jan' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
            'feb' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
            'mar' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
            'apr' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
            'mei' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
            'jun' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
            'jul' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
            'aug' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
            'sep' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
            'okt' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
            'nov' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
            'des' => [
                'pemasukkan' => 0,
                'pengeluaran' => 0
            ],
        ];

        for($i = 0; $i < count($laporanKeuanganModel->findAll()); $i++) {
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("Januari " . date("Y"))) {
                $bulanKeuangan['jan']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['jan']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("Februari " . date("Y"))) {
                $bulanKeuangan['feb']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['feb']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("Maret " . date("Y"))) {
                $bulanKeuangan['mar']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['mar']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("April " . date("Y"))) {
                $bulanKeuangan['apr']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['apr']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("Mei " . date("Y"))) {
                $bulanKeuangan['mei']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['mei']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("Juni " . date("Y"))) {
                $bulanKeuangan['jun']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['jun']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("Juli " . date("Y"))) {
                $bulanKeuangan['jul']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['jul']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("Agustus " . date("Y"))) {
                $bulanKeuangan['aug']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['aug']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("September " . date("Y"))) {
                $bulanKeuangan['sep']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['sep']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("Oktober " . date("Y"))) {
                $bulanKeuangan['okt']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['okt']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("November " . date("Y"))) {
                $bulanKeuangan['nov']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['nov']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
            if(tgl_contLaporan($laporanKeuanganModel->findAll()[$i]['tanggal']) == ("Desember " . date("Y"))) {
                $bulanKeuangan['des']['pemasukkan'] += (int)$laporanKeuanganModel->findAll()[$i]['pemasukkan'];
                $bulanKeuangan['des']['pengeluaran'] += (int)$laporanKeuanganModel->findAll()[$i]['pengeluaran'];
            }
        }
        foreach($bulanKeuangan as $bulan) {
            array_push($pemasukkanLaporan, $bulan['pemasukkan']);
            array_push($pengeluaranLaporan, $bulan['pengeluaran']);
        }

        $data = [
            'nama' => $userModel->getUser(session()->get('username'))['name'],
            'jumlahPengurus' => count($pengurusModel->findAll()),
            'jumlahAdmin' => count($userModel->findAll()),
            'jumlahSumbangan' => count($sumbanganModel->findAll()),
            'pengurus' => $pengurusModel->findAll(),
            'pemasukkanLaporanKeuangan' => $pemasukkanLaporan,
            'pengeluaranLaporanKeuangan' => $pengeluaranLaporan
        ];

        return view('dashboard/index', $data);
    }
}
