<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Satuan extends BaseController
{
    public function satuanProduk()
    {
        $data = [
            'listSatuan' => $this->satuan->getSatuan()
        ];
        return view('satuan/satuan-produk',$data);
    }
    public function tambahSatuan()
    {
        return view('satuan/tambah-satuan');
    }
    public function simpanSatuan()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'txtSatuan' => 'required|is_unique[tbl_satuan.nama_satuan]'
        ];

        $messages = [
            'txtSatuan' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'satuan sudah ada silahkan gunakan yang lain',
            ]
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

            // data yang akan disimpan ke DB 
            $data = [
                'nama_satuan' => $this->request->getPost('txtSatuan')
            ];

            //proses simpan ke DB
            $this->satuan->insert($data);
            
            return redirect()->to(site_url('satuan-produk'))->with('info', '<div class="alert alert-success">Data berhasil disimpan</div>');
}

    public function hapusSatuan($id)
    {
        $this->satuan->delete($id);
        return redirect()->to('satuan-produk')->with('pesan', 'Data Berhasil Dihapus');
    }

    public function editSatuan($idsatuan)
    {
        $syarat = [
            'id_satuan' => $idsatuan
        ];

        $data = [
            'detailSatuan' => $this->satuan->where($syarat)->findAll(),
        ];
        return view('satuan/edit-satuan', $data);
    }
    
    public function simpanEditSatuan()
    {
        $data = [
            'id_satuan' => $this->request->getVar('id_satuan'),
            'nama_satuan' => $this->request->getVar('nama_satuan')
        ];
        $this->satuan->update($this->request->getVar('id_satuan'), $data);
        return redirect()->to('satuan-produk')->with('pesan', 'Data Telah Diubah');
    }
    public function cek_keterkaitan_data($id)
    {
        // Lakukan pemeriksaan keterkaitan data
        $keterkaitan = $this->satuan->cekKeterkaitan($id);

        // Kirim respon ke AJAX
        return $this->response->setJSON(['has_keterkaitan' => $keterkaitan]);
    }
}

