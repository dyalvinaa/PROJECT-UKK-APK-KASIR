<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function dataProduk()
    {
        $data = [
            'listProduk' => $this->produk->getProduk(),
        ];
        return view('produk/data-produk', $data);
    }
    public function tambahProduk()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'listSatuan' => $this->satuan->findAll(),
            'listKategori' => $this->kategori->findAll(),
            'kodeProduk' => $this->produk->generateProductCode()
        ];
        return view('produk/tambah-produk', $data);
    }
    public function simpanProduk()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'kode_produk' => 'required|is_unique[tbl_produk.kode_produk]',
            'nama_produk' => 'required|is_unique[tbl_produk.nama_produk]',
            'harga_beli' => 'required',
            'stok' => 'required',
            'harga_jual' => 'required|checkHargaValid[harga_beli]',
            // Menambahkan aturan validasi harga_jual
            // 'nama_produk' => 'required|is_unique[tbl_produk.nama_produk]',

        ];

        $messages = [
            'kode_produk' => [
                'required' => 'Kode Produk Tidak boleh kosong!',
                'is_unique' => 'Kode produk sudah ada silahkan gunakan yang lain',
            ],
            'nama_produk' => [
                'required' => 'Nama Produk Tidak boleh kosong!',
                'is_unique' => 'Nama produk sudah ada silahkan gunakan yang lain',
            ],
            'harga_beli' => [
                'required' => ' Harga beli Tidak boleh kosong!',
            ],
            'stok' => [
                'required' => ' stok Tidak boleh kosong!',
            ],
            'harga_jual' => [
                'required' => 'harga jual Tidak boleh kosong!',
                'checkHargaValid' => 'Harga jual harus lebih tinggi dari harga beli.' // Pesan jika harga jual kurang dari harga beli
            ]
            // 'nama_produk' => [
            //     'required' => 'Tidak boleh kosong!',
            // ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $kodeProduk = $this->produk->generateProductCode();

        $this->produk->save([
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga_beli' => str_replace('.', '', $this->request->getVar('harga_beli')),
            'harga_jual' => str_replace('.', '', $this->request->getVar('harga_jual')),
            'id_satuan' => $this->request->getVar('jenis_satuan'),
            'id_kategori' => $this->request->getVar('jenis_kategori'),
            'stok' => str_replace('.', '', $this->request->getVar('stok'))
        ]);
        return redirect()->to('/data-produk')->with('pesan', 'Data telah tersimpan');
    }
    public function editProduk($id = null)
    {
        $data = [
                'produk' => $this->produk->getProdukById($id),
                'satuan' => $this->satuan->findAll(),
                'kategori' => $this->kategori->findAll(),
                'kode_produk' => $this->produk->generateProductCode()
        ];
        return view('produk/edit-produk', $data);
    }

    public function simpanEdit($id)
    {
        $data = [
            "nama_produk" => $this->request->getVar('nama_produk'),
            "harga_beli" => str_replace('.','',$this->request->getVar('harga_beli')),
            "harga_jual" => str_replace('.','',$this->request->getVar('harga_jual')),
            "id_satuan" =>$this->request->getVar('jenis_satuan'),
            "id_kategori" =>$this->request->getVar('jenis_kategori'),
            "stok" => str_replace('.', '', $this->request->getVar('stok')),
        ];
        $this->produk->update($id, $data);
        return redirect()->to('/data-produk')->with('pesan', 'Data telah diubah');
    }
    public function delete($id)
    {
        $this->produk->delete($id);
        return redirect()->to('data-produk')->with('pesan', 'Data Berhasil Dihapus');
    }
    public function dataLaporan()
    {
        $data = [
            'listLaporan' => $this->produk->getAllLaporan(),
        ];
        return view('laporan/laporan-stok', $data);
    }
    public function dataLaporanPenjualan()
    {
        $data = [
            'listPenjualan' => $this->penjualan->getPenjualan(),
        ];
        return view('laporan/laporan-penjualan', $data);
    }

}