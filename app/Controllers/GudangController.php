<?php

namespace App\Controllers;
use App\Models\GudangBahanBakuModel;
use App\Models\ProduksiModel;
use App\Models\PengadaanModel;
use App\Models\DetailProduksiModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;

class GudangController extends BaseController
{
    private $gudangBahan, $produksi, $pengadaan, $detail_produksi;
    public function __construct(){
        $this->gudangBahan = new GudangBahanBakuModel();
        $this->produksi = new ProduksiModel();
        $this->pengadaan = new PengadaanModel();
        $this->detail_produksi = new DetailProduksiModel();
    }
    public function gudangBahan(){
        
        return view('inputGudang');
    }
    public function dataGudang(){
        $data = [
            'gudangBahan' => $this->gudangBahan->orderBy('tanggal')->findAll(),
            'detail_produksi' => $this->detail_produksi->select('detail_produksi.*, bahan_baku.nama_barang,produksi.*')->join('bahan_baku', 'detail_produksi.kode_barang = bahan_baku.kode_barang')->join('produksi','detail_produksi.kode_produksi = produksi.kode_produksi')->findAll(),
            'pengadaan' => $this->pengadaan->select('pengadaan.*, bahan_baku.nama_barang')->join('bahan_baku','pengadaan.kode_barang = bahan_baku.kode_barang')->orderBy('tanggal')->findAll()
        ];
        return view('dataGudang', $data);
    }
    public function laporanGudang(){
        $data = [
            'gudangBahan' => $this->gudangBahan->orderBy('tanggal')->findAll(),
            'detail_produksi' => $this->detail_produksi->select('detail_produksi.*, bahan_baku.nama_barang,produksi.*')->join('bahan_baku', 'detail_produksi.kode_barang = bahan_baku.kode_barang')->join('produksi','detail_produksi.kode_produksi = produksi.kode_produksi')->findAll(),
            'pengadaan' => $this->pengadaan->select('pengadaan.*, bahan_baku.nama_barang')->join('bahan_baku','pengadaan.kode_barang = bahan_baku.kode_barang')->orderBy('tanggal')->findAll()
        ];
        return view('laporanGudang', $data);
    }
    public function inputGudang(){
        $data = [

        'gudangBahan' => $this->gudangBahan->select('RIGHT(kode_barang, 3)+1 AS kode_barang')->orderBy('kode_barang', 'desc')->findAll(1)
    ];
    if(empty($data['gudangBahan'])){
        $data = ['gudangBahan' => 

        [
            0 => [
                'kode_barang' => 1
                ]
        ]];
    }

        return view('inputGudang',$data);
    }

    public function simpanBahan(){
        
        $post = $this->request->getPost(['kode_barang', 'nama_barang', 'jumlah', 'satuan', 'keterangan', 'tanggal']);
        $this->gudangBahan->insert([
            'kode_barang'   => $post['kode_barang'],
            
            'nama_barang' => $post['nama_barang'],
            'jumlah'    => $post['jumlah'],
            'satuan'    => $post['satuan'],
            'keterangan'    => $post['keterangan'],
            'tanggal'    => $post['tanggal'],
        ]);

        $data = $this->gudangBahan->select('nama_barang')->where('kode_barang', $post['kode_barang'])->findAll();
        session()->setFlashdata('sukses', 'Data <strong>'.$data[0]['nama_barang'].'</strong> Berhasil Di Input.');
        return redirect()->to("/data_gudang");
        
    }

    public function editGudang($kode_barang)
    {
        $data = [
            // cara satu tabel
            'gudangBahan' => $this->gudangBahan->where("kode_barang",$kode_barang)->find()

            // cara dua tabel yaitu pake join
            // 'pengadaan' => $this->pengadaan->join("detail_pengadaan","detail_pengadaan.kode_pengadaan = pengadaan.kode_pengadaan")->where("pengadaan.kode_pengadaan",$kode_pengadaan)->findAll()

        ];
        // dd($data['gudangBahan']);
        return view('editGudang', $data);
    }

    public function updateGudang()
    {
        $post = $this->request->getPost(['kode_barang', 'nama_barang', 'jumlah', 'satuan', 'keterangan', 'tanggal']);
        $this->gudangBahan->db->transStart();
        $this->gudangBahan->where([
            'kode_barang' => $post['kode_barang'],
            
            
        ])->set([
            'nama_barang' => $post['nama_barang'],
            'jumlah' => $post['jumlah'],
            'satuan' => $post['satuan'],
            'keterangan' => $post['keterangan'],
            'tanggal' => $post['tanggal'],
        ])->update();
        
        
        $this->gudangBahan->db->transComplete();

        $data = $this->gudangBahan->select('nama_barang')->where('kode_barang', $post['kode_barang'])->findAll();
        session()->setFlashdata('sukses', 'Data  <strong>'.$data[0]['nama_barang'].'</strong> Berhasil Diubah.');
        return redirect()->to("/data_gudang");
    }

    public function deleteGudang($kode_barang)
    {
        $this->gudangBahan->delete($kode_barang);

        session()->setFlashdata('hapus', 'Data Berhasil Di Hapus.');
        return redirect()->to("/data_gudang");
    }

    public function downloadPdf()
    {
        $dompdf = new Dompdf();

        $detail_produksi = $this->detail_produksi->select('detail_produksi.*, bahan_baku.nama_barang,produksi.*')->join('bahan_baku', 'detail_produksi.kode_barang = bahan_baku.kode_barang')->join('produksi','detail_produksi.kode_produksi = produksi.kode_produksi')->findAll();
        $pengadaan = $this->pengadaan->select('pengadaan.*,(jumlah_barang * harga) as total_harga, bahan_baku.nama_barang')->join('bahan_baku','pengadaan.kode_barang = bahan_baku.kode_barang')->findAll();
        $produksi = $this->produksi->select('produksi.*')->findAll();
        $data = [
            'detail_produksi' => $detail_produksi,
            'pengadaan' => $pengadaan,
            'produksi'=> $produksi,
            // 'nama_admin'        => user()->username
        ];

        $html = view('pdf', $data);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporanGudang', ['Attachment' => 0]);
    }

    
    
}