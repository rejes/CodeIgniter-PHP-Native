<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SumbanganModel;

class SumbanganDashboard extends BaseController
{
    protected $sumbanganModel;

	public function __construct()
	{
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

		$this->sumbanganModel = new SumbanganModel();
	}

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Daftar Sumbangan',
            'sumbangan' => $this->sumbanganModel->orderBy('id', 'DESC')->findAll(),
        ];

        return view('dashboard/sumbangan/index', $data);
    }

    public function delete($id)
    {
        $sumbangan = $this->sumbanganModel->find($id);
        
        unlink("assets/images/sumbangan/" . $sumbangan['bukti_transfer']);

        $this->sumbanganModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
		return redirect()->to('/dashboard/sumbangan');
    }
}
