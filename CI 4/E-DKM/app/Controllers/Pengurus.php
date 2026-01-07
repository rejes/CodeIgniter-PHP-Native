<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengurusModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pengurus extends BaseController
{
    protected $pengurusModel;

	public function __construct()
	{
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

		$this->pengurusModel = new PengurusModel();
	}

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Daftar Pengurus Masjid',
            'pengurus' => $this->pengurusModel->findAll(),
        ];

        return view('dashboard/pengurus/index', $data);
    }

    public function detail($id)
    {
        $pengurus = $this->pengurusModel->getPengurus($id);
        $data = [
            'title' => 'Detail pengurus',
            'pengurus' => $pengurus  
        ];

        return view('/dashboard/pengurus/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pengurus',
            'validation' => \Config\Services::validation()
        ];

        return view('/dashboard/pengurus/create', $data);
    }

    public function save()
    {
        if($this->request->getMethod() == 'post') {
            if(!$this->validate([
                'name' => 'required',
                'jabatan' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
            ])) {
                $response = [
                    'success' => false,
                    'msg' => 'Error'
                ];

                return $this->response->setJSON($response);
            } else {
                $data = [
                    'name' => $this->request->getVar('name'),
                    'jabatan' => $this->request->getVar('jabatan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telp' => $this->request->getVar('no_telp'),
                ];

                if($this->pengurusModel->save($data)) {
                    $response = [
                        'success' => true,
                        'msg' => 'Data created'
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'msg' => 'Data failed to created'
                    ];
                }
                return $this->response->setJSON($response);
            }
        }
    }

    public function delete($id)
	{
        $this->pengurusModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->back();
	}

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Pengurus',
            'validation' => \Config\Services::validation(),
            'pengurus' => $this->pengurusModel->find($id)
        ];

        return view('/dashboard/pengurus/edit', $data);
    }

    public function update($id)
    {
        if(!$this->validate([
			'name' => [
				'rules' => 'required|max_length[100]|min_length[3]',
				'errors' => [
					'required' => 'nama wajib diisi',
                    'max_length' => 'nama tidah boleh lebih dari 100 karakter',
                    'min_length' => 'nama setidaknya harus berisi 3 karakter',
				]
			],
			'jabatan' => [
				'rules' => 'required|min_length[3]|max_length[100]|alpha_space',
				'errors' => [
					'required' => '{field} wajib diisi',
                    'is_unique' => '{field} sudah dipakai',
                    'alpha_space' => '{field} hanya boleh berisi alphabet dan spasi',
                    'max_length' => '{field} tidah boleh lebih dari 100 karakter',
                    'min_length' => '{field} setidaknya harus berisi 3 karakter',
				]
			],
			'alamat' => [
				'rules' => 'required|min_length[5]',
				'errors' => [
					'required' => '{field} wajib diisi',
                    'min_length' => '{field} setidaknya harus berisi 5 karakter',
				]
			],
			'no_telp' => [
				'rules' => 'required|numeric|min_length[5]|max_length[15]',
				'errors' => [
					'required' => 'No.Handphone wajib diisi',
                    'numeric' => 'No.Handphone hanya boleh berisi angka',
                    'min_length' => 'No.Handphone setidaknya harus berisi 5 karakter',
                    'max_length' => 'No.Handphone tidah boleh lebih dari 15 karakter',
				]
			],
		])) {
			return redirect()->to('/dashboard/pengurus/edit/' . $id)->withInput();
		}

        $this->pengurusModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'jabatan' => $this->request->getVar('jabatan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp'),
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/dashboard/pengurus');
    }

    public function generatePDF() 
	{
        $data = $this->pengurusModel->findAll();

        $dompdf = new \Dompdf\Dompdf(); 

        $dompdf->loadHtml(view('pdf/template-pengurus', ['pengurus' => $data]));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('laporan-pengurus-' . date('Y'));

        return redirect()->back();
    }

    public function generateExcel()
    {
        $dataLaporan = [];
        for($i = 0; $i < count($this->pengurusModel->findAll()); $i++){
                array_push($dataLaporan, $this->pengurusModel->findAll()[$i]);
        }

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Nama')
                    ->setCellValue('C1', 'Jabatan');
        
        $column = 2;
        $no = 1;
        
        foreach($dataLaporan as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $no++)
                        ->setCellValue('B' . $column, $data['name'])
                        ->setCellValue('C' . $column, $data['jabatan']);
            $column++;
        }
        
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan anggota tahun ' . date('Y');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
