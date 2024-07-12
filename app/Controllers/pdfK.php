<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use Dompdf\Dompdf;

use App\Models\KeuanganModel;
 
class pdfK extends BaseController
{
  private  $keuangan;
    public function __construct(){
        
        $this->keuangan = new KeuanganModel();
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
        $html = view('pdfUang', $data);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('pdfUang', [ 'Attachment' => false ]);
    }
 
    

    public function pdf(){
    $data= $this->request->getPost(['bulan']);
    $dompdf = new Dompdf;
      $data = [
          
          'uangMasukdanKeluar' => $this->keuangan->select('keuangan.*')->where('month(keuangan.tanggal)',$data['bulan'])->findAll(),
          
      ];
      $html = view('pdfUang', $data);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('pdfUang', [ 'Attachment' => false ]);
      return redirect()->to('/datauangMasukdanKeluar');
  }
 
}