<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Penjualan extends BaseController
{
public function index()
{ 
    $data=
    [
        'noFaktur' => $this->penjualan->generateTransactionNumber(),
        'produkList'=> $this->produk->getAllProduk(),
        'detailPenjualan' => $this->detail->getDetailPenjualan(session()->get('IdPenjualan')),
        'totalHarga' =>$this->penjualan->getTotalHargaById(session()->get('IdPenjualan')),
    ];
    
    return view('penjualan/transaksi', $data);
}

public function simpanPenjualan(){
    // ambil detail barang yang dijual
    $where=['id_produk'=>$this->request->getPost('id_produk')];
    $cekBarang=$this->produk->where($where)->findAll(); 
    $hargaJual=$cekBarang[0]['harga_jual'];

    if(session()->get('IdPenjualan') == null){            
        // 1. Menyiapkan data penjualan
        date_default_timezone_set('Asia/Jakarta');
        // Mendapatkan waktu saat ini dalam zona waktu yang telah diatur
        $tanggal_sekarang = date('Y-m-d H:i:s');

        $dataPenjualan=[
            'no_faktur'=>$this->request->getPost('no_faktur'),
            'tgl_penjualan'=>$tanggal_sekarang, // Perbaiki format tanggal
            'total'=>0,
            'id_user'=> session()->get('id_user'),
        ];
        
        // 2. Menyimpan data ke dalam tabel penjualan
        $this->penjualan->insert($dataPenjualan);
        // var_dump($dataPenjualan);

        // 3. Menyiapkan data untuk menyimpan detail penjualan
        $idPenjualanBaru = $this->penjualan->insertID(); // Mendapatkan ID penjualan baru
        $dataDetailPenjualan=[
            'id_penjualan'=>$idPenjualanBaru,
            'id_produk'=>$this->request->getPost('id_produk'),
            'qty'=> $this->request->getPost('txtqty'),
            'total_harga'=>$hargaJual*$this->request->getPost('txtqty')
        ];

        // 4. Menyimpan data ke dalam tabel detail penjualan
        $this->detail->insert($dataDetailPenjualan);
        // var_dump($dataDetailPenjualan);

        // 5. Membuat session untuk penjualan baru
        session()->set('IdPenjualan', $idPenjualanBaru);
    } else {
        // Jika ada ID penjualan yang sudah tersimpan di sesi, gunakan ID itu untuk menyimpan detail penjualan
        $idPenjualanSaatIni = session()->get('IdPenjualan');
        $dataDetailPenjualan=[
            'id_penjualan'=>$idPenjualanSaatIni,
            'id_produk'=>$this->request->getPost('id_produk'),
            'qty'=> $this->request->getPost('txtqty'),
            'total_harga'=>$hargaJual*$this->request->getPost('txtqty')
        ];

        // Simpan data ke dalam tabel detail penjualan
        $this->detail->insert($dataDetailPenjualan);
        // var_dump($dataDetailPenjualan);
    }

    // Mengarahkan pengguna kembali ke halaman transaksi penjualan
    return redirect()->to('transaksi');
}
public function simpanPembayaran(){
    // Mendapatkan ID penjualan yang selesai
    $idPenjualanSelesai = session()->get('IdPenjualan');
    
    // Menghapus ID penjualan dari sesi
    session()->remove('IdPenjualan');
    
    // Mengarahkan pengguna kembali ke halaman transaksi penjualan
    return redirect()->to('transaksi');
}

}
