<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    public function dataKategori()
    {
        $data = [
            'listKategori' => $this->kategori->getKategori()
        ];
        return view('kategori/kategori-produk', $data);
    }

    public function tambahKategori()
    {
        return view('kategori/tambah-kategori');
    }
    public function simpanKategori()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'txtKategori' => 'required|is_unique[tbl_kategori.nama_kategori]'
        ];

        $messages = [
            'txtKategori' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'kategori sudah ada silahkan gunakan yang lain',
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
            'nama_kategori' => $this->request->getPost('txtKategori')
        ];

        //proses simpan ke DB
        $this->kategori->insert($data);

        return redirect()->to(site_url('kategori-produk'))->with('pesan', 'Data Berhasil Disimpan');
    }

    public function hapusKategori($id)
    {
        $this->kategori->delete($id);
        return redirect()->to('kategori-produk')->with('pesan', 'Data Berhasil Dihapus');
    }
    public function editKategori($idkategori)
    {
        $syarat = [
            'id_kategori' => $idkategori
        ];

        $data = [
            'detailKategori' => $this->kategori->where($syarat)->findAll(),
        ];
        return view('kategori/edit-kategori', $data);
    }
    public function simpanEditKategori()
    {
        $data = [
            'id_kategori' => $this->request->getVar('id_kategori'),
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ];
        $this->kategori->update($this->request->getVar('id_kategori'), $data);
        return redirect()->to('kategori-produk')->with('pesan', 'Data Berhasil Dihapus');
    }
}
