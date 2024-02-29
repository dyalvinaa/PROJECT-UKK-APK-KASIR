<?php

namespace App\Models;

use CodeIgniter\Model;

class MPenjualan extends Model
{
    protected $table = 'tbl_penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id_penjualan', 'no_faktur', 'tgl_penjualan', 'total', 'id_user'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];


    public function getPenjualan($id = null)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_penjualan' => $id])->first();
    }
    public function getLaporanPenjualan(){
        $penjualan = NEW MPenjualan;
        $queryPenjualan=$penjualan->query("CALL sp_lihat_laporan()")->getResult();
        return $queryPenjualan;
    }

    public function generateTransactionNumber()
    {
        // Dapatkan tahun dua angka terakhir
        $tahun = date('y');

        // Dapatkan nomor urut terakhir dari database
        $lastTransaction = $this->orderBy('id_penjualan', 'DESC')->first();

        // Ambil nomor urut terakhir atau setel ke 0 jika belum ada transaksi sebelumnya
        $lastNumber = ($lastTransaction) ? intval(substr($lastTransaction['no_faktur'], -4)) : 0;

        // Increment nomor urut
        $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        // Hasilkan nomor transaksi dengan format SCDPSYYMMDDXXXX
        $no_transaksi = 'SCDPS' . $tahun . date('md') . $nextNumber;

        // Simpan nomor transaksi dalam sesi
        session()->set('GeneratedTransactionNumber', $no_transaksi);

        return $no_transaksi;
    }

    public function getTotalHargaById($idPenjualan)
    {
        $query = $this->select('total')->where('id_penjualan', $idPenjualan)->first();
        // Periksa apakah hasil kueri tidak kosong sebelum mengakses indeks 'total'
        if ($query) {
            return $query['total'];
        } else {
            // Jika hasil kueri kosong, kembalikan nilai default, misalnya 0
            return 0;
        }
    }
    public function sourceGrafikTrendPenualan($tahun)
    {
        /*  select CONCAT(MONTH(TanggalPenjualan),'/',YEAR(TanggalPenjualan)) As 
            Periode, SUM(TotalHarga)  as TotalPendapatan
            From Penjualan  
            WHERE YEAR(TanggalPenjualan)='2024'
        GROUP BY CONCAT(MONTH(TanggalPenjualan),'/',YEAR(TanggalPenjualan));*/

        $penjualan = new MPenjualan;
        $penjualan->select(" MONTH(TanggalPenjualan) As 
        Periode, SUM(TotalHarga)  as TotalPendapatan");
        $penjualan->groupby("CONCAT(MONTH(TanggalPenjualan),'/',YEAR(TanggalPenjualan))");
        $penjualan->where("YEAR(TanggalPenjualan)", $tahun);
        return $penjualan->find();
    }
    public function getPendapatanHarian(){
        $today = date('Y-m-d');
        return $this->where('DATE(tgl_penjualan)',$today)->select('SUM(total) AS pendapatan_harian')->get()->getRow()->pendapatan_harian;
    }
}