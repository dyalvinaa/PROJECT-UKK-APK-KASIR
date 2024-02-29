<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use App\Models\MProduk;

class PdfController extends BaseController
{
    public function index()
    {
        $data =[
            'listProduk'=>$this->produk->getAllLaporan()
        ];
        return view('laporan/pdf', $data);
    }
    public function pdfPenjualan()
    {
        $data =[
            'listLaporan'=>$this->penjualan->getLaporanPenjualan()
        ];
        return view('laporan/pdf-penjualan', $data);
    }
    public function generate()
    {
        $filename = date('y-m-d-h-i-s'). '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $data =[
            'listProduk'=>$this->produk->getAllLaporan(),
        ];
        $html = view('laporan/pdf', $data);
        $dompdf->loadHtml($html);

        // (optimal) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as pdf
        $dompdf->render();

        // output the generate pdf
        $dompdf->stream('pdf', ['Attachment' =>true]);

    }
    public function generatePenjualan()
    {
        $filename = date('y-m-d-h-i-s'). '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $data =[
            'listPenjualan'=>$this->produk->getAllLaporanPenjualan()
        ];
        $html = view('laporan/pdf-penjualan', $data);
        $dompdf->loadHtml($html);

        // (optimal) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as pdf
        $dompdf->render();

        // output the generate pdf
        $dompdf->stream('pdf', ['Attachment' =>true]);
    }
}