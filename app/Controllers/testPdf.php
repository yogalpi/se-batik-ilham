<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use Dompdf\Dompdf;
use App\Models\PengadaanModel;
use App\Models\DetailProduksiModel;
 
class testPdf extends BaseController
{
  private  $pengadaan, $detail_produksi;
    public function __construct(){
        
        $this->pengadaan = new PengadaanModel();
        $this->detail_produksi = new DetailProduksiModel();
    }
    public function index()
    {
        $dompdf = new Dompdf;
        $faker =\Faker\Factory::create('id_ID');
        $data = [
            'imageSrc'    => $this->imageToBase64(ROOTPATH . '/public/assets/img/3_659110fc26cb2.png'),
            'name'         => 'WAH Doe',
            'address'      => 'USA',
            'mobileNumber' => '000000000',
            'email'        => 'john.doe@email.com'
        ];
        $html = view('pdf', $data);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('pdf', [ 'Attachment' => false ]);
    }
 
    

    public function pdf(){
    $data= $this->request->getPost(['bulan']);
    $dompdf = new Dompdf;
      $data = [
          
          'detail_produksi' => $this->detail_produksi->select('detail_produksi.*, bahan_baku.nama_barang,produksi.*')->join('bahan_baku', 'detail_produksi.kode_barang = bahan_baku.kode_barang')->join('produksi','detail_produksi.kode_produksi = produksi.kode_produksi')->where('month(produksi.tanggal_mulai)',$data['bulan'])->findAll(),
          'pengadaan' => $this->pengadaan->select('pengadaan.*,(jumlah_barang * harga) as total_harga, bahan_baku.nama_barang')->join('bahan_baku','pengadaan.kode_barang = bahan_baku.kode_barang')->where('month(pengadaan.tanggal)',$data['bulan'])->findAll()
      ];
      $html = view('pdf', $data);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('pdf', [ 'Attachment' => false ]);
      return redirect()->to('/laporan_gudang');
  }
 
}