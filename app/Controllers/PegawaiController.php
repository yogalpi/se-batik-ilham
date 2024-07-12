<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\GajiModel;
use App\Models\GajiProduksiModel;
use App\Models\GajiUmumModel;
use App\Models\KaryawanModel;
use App\Models\KeuanganModel;
use App\Models\PenggunaModel;
use App\Models\PermintaanModel;
use App\Models\ProduksiModel;
use CodeIgniter\I18n\Time;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;

class PegawaiController extends BaseController
{

    private $karyawan;
    private $gaji_pegawai_produksi;
    private $gaji_pegawai_umum;
    private $gaji;
    private $keuangan;
    private $produksi;
    private $absensi;
    private $permintaan;
    public function __construct(){
        $this->karyawan = new KaryawanModel();
        $this->gaji_pegawai_produksi = new GajiProduksiModel();
        $this->gaji_pegawai_umum = new GajiUmumModel();
        $this->gaji = new GajiModel();
        $this->keuangan = new KeuanganModel();
        $this->produksi = new ProduksiModel();
        $this->absensi = new AbsensiModel();
        $this->permintaan = new PermintaanModel();
    }
    public function pegawaiManage(){
        return view('inputPegawai');
    }

    public function daftarPegawai(){
        $data = [
            'karyawan'          => $this->karyawan->where('status', 'aktif')->orderBy('kode')->findAll(),
            'karyawan_nonaktif' => $this->karyawan->where('status', 'nonaktif')->orderBy('kode')->findAll()
        ];

        return view('daftarPegawai', $data);
    }

    public function manajemenGaji(){
        $data = [
            'gaji'  => $this->gaji->findAll()
        ];
        return view('manajemenGaji', $data);
    }

    public function absensiPegawai(){
        $data = [
            'data'  => $this->karyawan->where('kode_jenis', 'KU')->where('status', 'aktif')->orderBy('nama')->findAll()
        ];

        return view('absensiPegawai', $data);
    }

    public function inputAbsensi(){
        $post = $this->request->getPost(['kode_karyawan', 'tanggal', 'status']);

        $tanggal = $this->absensi->select('tanggal')->orderBy('tanggal', 'desc')->findAll(1);

        if(empty($tanggal[0]['tanggal'])){
            for($i = 0; $i < count($post['kode_karyawan']); $i++){
                $this->absensi->insert([
                    'kode_karyawan' => $post['kode_karyawan'][$i],
                    'tanggal'       => $post['tanggal'],
                    'status'        => $post['status'][$i]
                ]);
            }
        }elseif($tanggal[0]['tanggal'] == $post['tanggal']){
            session()->setFlashdata('gagal', 'Absensi Sudah Dilakukan Untuk Hari Ini!!.');

            return redirect()->to('absensi_pegawai');
        }else{
            for($i = 0; $i < count($post['kode_karyawan']); $i++){
                $this->absensi->insert([
                    'kode_karyawan' => $post['kode_karyawan'][$i],
                    'tanggal'       => $post['tanggal'],
                    'status'        => $post['status'][$i]
                ]);
            }
        }

        session()->setFlashdata('sukses', 'Data Presensi Berhasil Diinputkan.');

        return redirect()->to('absensi_pegawai');

    }

    public function dataAbsensi(){
        $data = [
            'karyawan'  => $this->absensi->select('karyawan.kode, karyawan.nama, absensi.tanggal, absensi.status')
                        ->join('karyawan', 'karyawan.kode = absensi.kode_karyawan')
                        ->where('karyawan.kode_jenis', 'KU')
                        ->where('karyawan.status', 'aktif')
                        ->orderBy('absensi.tanggal')
                        ->orderBy('karyawan.nama')
                        ->findAll()
        ];

        return view('dataAbsensiBulanan', $data);
    }

    public function dataAbsensiBulanan(){
        $post = $this->request->getPost(['bulan']);

        if($post['bulan'] == '0' || $post['bulan'] == null){
            $data = [
                'karyawan'  => $this->absensi->select('karyawan.kode, karyawan.nama, absensi.tanggal, absensi.status')
                            ->join('karyawan', 'karyawan.kode = absensi.kode_karyawan')
                            ->where('karyawan.kode_jenis', 'KU')
                            ->where('karyawan.status', 'aktif')
                            ->orderBy('absensi.tanggal')
                            ->findAll()
            ];
        }else{
            $data = [
                'karyawan'  => $this->absensi->select('karyawan.kode, karyawan.nama, absensi.tanggal, absensi.status')
                            ->join('karyawan', 'karyawan.kode = absensi.kode_karyawan')
                            ->where('karyawan.kode_jenis', 'KU')
                            ->where('karyawan.status', 'aktif')
                            ->where('MONTH(absensi.tanggal)', $post['bulan'])
                            ->orderBy('absensi.tanggal')
                            ->findAll()
            ];
        };

        if($post['bulan'] == '0' || $post['bulan'] == null){
            session()->setFlashdata('bulan', 'Januari - Desember');
        }elseif ($post['bulan'] == '1'){
            session()->setFlashdata('bulan', 'Januari');
        }elseif($post['bulan'] == '2'){
            session()->setFlashdata('bulan', 'Februari');
        }elseif($post['bulan'] == '3'){
            session()->setFlashdata('bulan', 'Maret');
        }elseif($post['bulan'] == '4'){
            session()->setFlashdata('bulan', 'April');
        }elseif($post['bulan'] == '5'){
            session()->setFlashdata('bulan', 'Mei');
        }elseif($post['bulan'] == '6'){
            session()->setFlashdata('bulan', 'Juni');
        }elseif($post['bulan'] == '7'){
            session()->setFlashdata('bulan', 'Juli');
        }elseif($post['bulan'] == '8'){
            session()->setFlashdata('bulan', 'Agustus');
        }elseif($post['bulan'] == '9'){
            session()->setFlashdata('bulan', 'September');
        }elseif($post['bulan'] == '10'){
            session()->setFlashdata('bulan', 'Oktober');
        }elseif($post['bulan'] == '11'){
            session()->setFlashdata('bulan', 'November');
        }elseif($post['bulan'] == '12'){
            session()->setFlashdata('bulan', 'Desember');
        }else{
            session()->setFlashdata('bulan', '');
        };

        return view('dataAbsensiBulanan', $data);
    }

    public function cariAbsen(){
        $searchTerm = $this->request->getPost('search');

        $db = db_connect();

        $sql = "SELECT COUNT(kode_karyawan) as absen FROM absensi WHERE kode_karyawan = ? AND MONTH(tanggal) = MONTH(now()) AND status = 'HADIR'";

        $data = [
            'absen' => $db->query($sql, [$searchTerm])->getResultArray()
        ];

        return json_encode($data);
    }

    public function gajiProduksi(){

        $data = [
            'gaji'  => $this->karyawan->select('karyawan.kode, karyawan.nama, gaji_pegawai_produksi.kode_gaji, gaji_pegawai_produksi.jumlah_produksi, gaji_pegawai_produksi.total_gaji')
                    ->join('gaji_pegawai_produksi', 'karyawan.kode = gaji_pegawai_produksi.kode')
                    ->where('karyawan.kode_jenis', 'KP')
                    ->where('karyawan.status', 'aktif')
                    ->findAll(),
            'produksi'  => $this->produksi->orderBy('kode_produksi', 'DESC')->findAll(5),
        ]; 

        return view('gajiProduksi', $data);
    }
    public function inputGajiProduksi(){
        $data = [
            'gaji'                  => $this->gaji->select('karyawan.* ,gaji.*')
                                    ->join('karyawan', 'karyawan.kode_jenis = gaji.kode_jenis')
                                    ->where('karyawan.kode_jenis', 'KP')
                                    ->where('karyawan.status', 'aktif')
                                    ->findAll(),
            'produksi'              => $this->produksi->orderBy('kode_produksi', 'DESC')->findAll(5),
            'kode_gaji'             => $this->gaji_pegawai_produksi->select('RIGHT(kode_gaji, 3) AS kode_gaji')->orderBy('kode_gaji', 'desc')->first()
        ]; 

        if(empty($data['gaji'])){
            $data['gaji'] = null;
        };
        
        return view('inputGajiProduksi', $data);
    }

    public function inputGajiKaryawanProduksi(){
        $post = $this->request->getPost(['kode_gaji' ,'kode_karyawan', 'kode_produksi', 'jumlah_produksi', 'total_gaji']);
        if($post['kode_produksi'] == '0' && $post['kode_karyawan'] == '0'){
            session()->setFlashdata('salah', 'Mohon Pilih Karyawan dan Kode Produksi!');

            return redirect()->to('input_gaji_produksi');
        }elseif($post['kode_produksi'] == '0'){
            session()->setFlashdata('salah', 'Mohon Pilih Kode Produksi!');

            return redirect()->to('input_gaji_produksi');
        }elseif($post['kode_karyawan'] == '0'){
            session()->setFlashdata('salah', 'Mohon Pilih Karyawan!');

            return redirect()->to('input_gaji_produksi');
        }
        $this->gaji_pegawai_produksi->insert([
            'kode_gaji'         => $post['kode_gaji'],
            'kode'              => $post['kode_karyawan'],
            'kode_produksi'     => $post['kode_produksi'],
            'jumlah_produksi'   => $post['jumlah_produksi'],
            'total_gaji'        => $post['total_gaji']
        ]); 

        // $date = Time::today('Asia/Jakarta', );

        $karyawan = $this->karyawan->select('nama')->where('kode', $post['kode_karyawan'])->findAll();

        session()->setFlashdata('sukses', 'Data Penggajian <strong> '.$karyawan[0]['nama'].' ('.$post['kode_karyawan'].')</strong> Berhasil Diinputkan.');

        return redirect()->to('gaji_produksi');
    }

    public function gajiUmum(){
        $data = [
            'gaji'  => $this->karyawan->select('karyawan.kode, karyawan.nama, gaji_pegawai_umum.kode_gaji, gaji_pegawai_umum.jumlah_absensi, gaji_pegawai_umum.total_gaji')
                    ->join('gaji_pegawai_umum', 'karyawan.kode = gaji_pegawai_umum.kode')
                    ->where('karyawan.kode_jenis', 'KU')
                    ->where('karyawan.status', 'aktif')
                    ->findAll()
        ]; 

        return view('gajiUmum', $data);
    }

    public function inputGajiUmum(){
        $date = Time::today('Asia/Jakarta', );

        $data = [
            'gaji'      => $this->gaji->select('karyawan.* ,gaji.*')
                        ->join('karyawan', 'karyawan.kode_jenis = gaji.kode_jenis')
                        ->where('karyawan.kode_jenis', 'KU')
                        ->where('karyawan.status', 'aktif')
                        ->findAll(),
            'bulan'     => date_format($date, 'my'),
            'kode_gaji' => $this->gaji_pegawai_umum->select('RIGHT(kode_gaji, 3) AS kode_gaji')->orderBy('kode_gaji', 'desc')->first()
        ]; 

        return view('inputGajiUmum', $data);
    }

    public function inputGajiKaryawanUmum(){
        $post = $this->request->getPost(['kode_gaji' ,'kode_karyawan', 'jumlah_absensi', 'total_gaji']);
        if($post['kode_karyawan'] == '0'){
            session()->setFlashdata('salah', 'Mohon Pilih Karyawan!');

            return redirect()->to('input_gaji_umum');
        }
        $this->gaji_pegawai_umum->insert([
            'kode_gaji'         => $post['kode_gaji'],
            'kode'              => $post['kode_karyawan'],
            'jumlah_absensi'    => $post['jumlah_absensi'],
            'total_gaji'        => $post['total_gaji']
        ]); 

        // $date = Time::today('Asia/Jakarta', );

        $karyawan = $this->karyawan->select('nama')->where('kode', $post['kode_karyawan'])->findAll();

        session()->setFlashdata('sukses', 'Data Penggajian <strong> '.$karyawan[0]['nama'].' ('.$post['kode_karyawan'].')</strong> Berhasil Diinputkan.');

        return redirect()->to('gaji_umum');
    }

    public function inputPegawai(){
        $post = $this->request->getPost(['nama_karyawan', 'jenis_kelamin', 'tanggal_lahir', 'jenis_karyawan', 'alamat']);

        if($post['jenis_karyawan'] == 'KP'){
            $nomor  = $this->karyawan->select('RIGHT(kode, 3) as kode')->where('kode_jenis', 'KP')->orderBy('kode', 'desc')->findAll(1);
            if(empty($nomor)){
                $kode = 'KP-001';
            }elseif ((int)$nomor[0]['kode']+1 < 10){
                $kode   = 'KP'.'-00'.(int)$nomor[0]['kode']+1;
            }elseif((int)$nomor[0]['kode']+1 >= 10 && (int)$nomor[0]['kode']+1 < 100){
                $kode   = 'KP'.'-0'.(int)$nomor[0]['kode']+1;
            }else{
                $kode   = 'KP'.'-'.(int)$nomor[0]['kode']+1;
            }
        }else{
            $nomor  = $this->karyawan->select('RIGHT(kode, 3) as kode')->where('kode_jenis', 'KU')->orderBy('kode', 'desc')->findAll(1);
            if(empty($nomor)){
                $kode = 'KU-001';
            }elseif ((int)$nomor[0]['kode']+1 < 10){
                $kode   = 'KU'.'-00'.(int)$nomor[0]['kode']+1;
            }elseif((int)$nomor[0]['kode']+1 >= 10 && (int)$nomor[0]['kode']+1 < 100){
                $kode   = 'KU'.'-0'.(int)$nomor[0]['kode']+1;
            }else{
                $kode   = 'KU'.'-'.(int)$nomor[0]['kode']+1;
            }
        }

        $this->karyawan->insert([
            'kode'          => $kode,
            'tanggal'       => $post['tanggal_lahir'],
            'nama'          => $post['nama_karyawan'],
            'alamat'        => $post['alamat'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'kode_jenis'    => $post['jenis_karyawan']
        ]);

        session()->setFlashdata('sukses', 'Data Karyawan Berhasil Diinputkan.');

        return redirect()->to('daftar_pegawai');
    }

    public function editPegawai($kode){
        $data   = [
            'data'  => $this->karyawan->where('kode', $kode)->findAll(1)
        ];

        return view('editPegawai', $data);
    }

    public function updatePegawai(){
        $post = $this->request->getPost(['kode_karyawan' ,'nama_karyawan', 'jenis_kelamin', 'tanggal_lahir', 'jenis_karyawan', 'alamat', 'status']);

        $this->karyawan->where(
            ['kode'         => $post['kode_karyawan']
        ])->set([
            'tanggal'       => $post['tanggal_lahir'],
            'nama'          => $post['nama_karyawan'],
            'alamat'        => $post['alamat'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'status'        => $post['status'],
            'kode_jenis'    => $post['jenis_karyawan']
        ])->update();

        session()->setFlashdata('edit', 'Data Untuk Karyawan <strong>'.$post['nama_karyawan'].' ('.$post['kode_karyawan'].')</strong> Berhasil Di Ubah.');

        return redirect()->to('daftar_pegawai');
    }

    public function editAbsensiPegawai($kode, $tanggal){
        $data = [
            'karyawan'  => $this->absensi   ->select('karyawan.nama, absensi.*')
                                            ->join('karyawan', 'karyawan.kode = absensi.kode_karyawan')
                                            ->where('absensi.kode_karyawan', $kode)
                                            ->where('absensi.tanggal', $tanggal)
                                            ->findAll()
        ];

        return view('editAbsensiPegawai', $data);
    }

    public function updateAbsensi(){
        $post = $this->request->getPost(['kode_karyawan', 'tanggal', 'status']);

        $this->absensi  ->where('kode_karyawan', $post['kode_karyawan'])
                        ->where('tanggal', $post['tanggal'])
                        ->set([
                            'status'    => $post['status']
                        ])->update();

        $karyawan = $this->karyawan->select('nama')->where('kode', $post['kode_karyawan'])->findAll();

        session()->setFlashdata('edit', 'Data Absensi Untuk Karyawan <strong>'.$karyawan[0]['nama'].' ('.$post['kode_karyawan'].')</strong> Berhasil Di Ubah.');

        return redirect()->to('daftar_absensi');
    }

    public function editGajiPegawaiProduksi($kode){
        $data = [
            'gaji'  => $this->gaji_pegawai_produksi->where('kode_gaji', $kode)->findAll(1)
        ];

        return view('editGajiProduksi', $data);
    }

    public function editGajiPegawaiUmum($kode){
        $data = [
            'gaji'              => $this->gaji_pegawai_umum->where('kode_gaji', $kode)->findAll(1)
        ];

        return view('editGajiUmum', $data);
    }

    public function updateGajiPegawaiProduksi(){
        $post = $this->request->getPost(['kode_gaji', 'kode_karyawan', 'kode_produksi', 'jumlah_produksi', 'total_gaji']);

        $this->gaji_pegawai_produksi->where('kode_gaji', $post['kode_gaji'])
                                    ->set([
                                        'kode_karyawan'     => $post['kode_karyawan'],
                                        'kode_produksi'     => $post['kode_produksi'],
                                        'jumlah_produksi'   => $post['jumlah_produksi'],
                                        'total_gaji'        => $post['total_gaji']
                                    ])->update();

        $this->keuangan->where('kode', $post['kode_gaji'])
                                    ->set([
                                        'jumlah'        => $post['total_gaji'],
                                    ])->update();

        $karyawan = $this->karyawan->where('kode', $post['kode_karyawan'])->findAll(1);

        session()->setFlashdata('edit', 'Data Penggajian Untuk Karyawan <strong>'.$karyawan[0]['nama'].' ('.$post['kode_karyawan'].')</strong> Berhasil Di Ubah.');
        
        return redirect()->to('gaji_produksi');
    }
    public function updateGajiPegawaiUmum(){
        $post = $this->request->getPost(['kode_gaji', 'kode_karyawan', 'jumlah_absensi', 'total_gaji']);

        $this->gaji_pegawai_umum->where('kode_gaji', $post['kode_gaji'])
                                    ->set([
                                        'kode_karyawan'     => $post['kode_karyawan'],
                                        'jumlah_absensi'    => $post['jumlah_absensi'],
                                        'total_gaji'        => $post['total_gaji']
                                    ])->update();

        $this->keuangan->where('kode', $post['kode_gaji'])
                                    ->set([
                                        'jumlah'        => $post['total_gaji'],
                                    ])->update();

        $karyawan = $this->karyawan->where('kode', $post['kode_karyawan'])->findAll(1);
        
        session()->setFlashdata('edit', 'Data Penggajian Untuk Karyawan <strong>'.$karyawan[0]['nama'].' ('.$post['kode_karyawan'].')</strong> Berhasil Di Ubah.');
        
        return redirect()->to('gaji_umum');
    }

    public function hapusGajiProduksi($kode_gaji, $kode_karyawan, $nama){

        $this->gaji_pegawai_produksi->where('kode_gaji', $kode_gaji)->delete();

        $this->keuangan->where('kode', $kode_gaji)->delete();

        session()->setFlashdata('hapus', 'Data Penggajian Untuk Karyawan <strong>'.$nama.' ('.$kode_karyawan.')</strong> Dengan Kode Penggajian <strong>'.$kode_gaji.'</strong> Berhasil Di Hapus.');
        
        return redirect()->to('gaji_produksi');
    }
    public function hapusGajiUmum($kode_gaji, $kode_karyawan, $nama){

        $this->gaji_pegawai_umum->where('kode_gaji', $kode_gaji)->delete();

        $this->keuangan->where('kode', $kode_gaji)->delete();

        session()->setFlashdata('hapus', 'Data Penggajian Untuk Karyawan <strong>'.$nama.' ('.$kode_karyawan.')</strong> Dengan Kode Penggajian <strong>'.$kode_gaji.'</strong> Berhasil Di Hapus.');
        
        return redirect()->to('gaji_umum');
    }

    public function inputGaji(){
        $post = $this->request->getPost(['kode_jenis', 'gaji']);
        for($i = 0; $i < count($post['kode_jenis']); $i++){
            $this->gaji->where('kode_jenis', $post['kode_jenis'][$i])
                            ->set(['gaji' => $post['gaji'][$i]])
                            ->update();
        }

        session()->setFlashdata('edit', 'Data Gaji Berhasil Di Ubah.');

        return redirect()->to('manajemen_gaji');
    }

    public function laporanGajiPegawaiUmumPdf(){
        //Tabel Gaji tanggal gajian add
        //Hanya dapat mengexport 1 file komentar kode berikut untuk mengexport file pdf
        // $this->excelPegawaiUmum();
        $post = $this->request->getPost(['bulan']);

        if($post['bulan'] == '0'){
            return redirect()->to('gaji_umum');
        }

        if($post['bulan'] == 'Januari'){
            $bulan = '01';
        }elseif($post['bulan'] == 'Februari'){
            $bulan = '02';
        }elseif($post['bulan'] == 'Maret'){
            $bulan = '03';
        }elseif($post['bulan'] == 'April'){
            $bulan = '04';
        }elseif($post['bulan'] == 'Mei'){
            $bulan = '05';
        }elseif($post['bulan'] == 'Juni'){
            $bulan = '06';
        }elseif($post['bulan'] == 'Juli'){
            $bulan = '07';
        }elseif($post['bulan'] == 'Agustus'){
            $bulan = '08';
        }elseif($post['bulan'] == 'September'){
            $bulan = '09';
        }elseif($post['bulan'] == 'Oktober'){
            $bulan = '10';
        }elseif($post['bulan'] == 'November'){
            $bulan = '11';
        }elseif($post['bulan'] == 'Desember'){
            $bulan = '12';
        }else{
            $bulan = '0';
        }

        $data = [
            'absen' => $this->gaji_pegawai_umum->select('gaji_pegawai_umum.*, karyawan.*')
                                            ->join('karyawan', 'gaji_pegawai_umum.kode = karyawan.kode')
                                            ->where('karyawan.status', 'aktif')
                                            ->where('MID(gaji_pegawai_umum.kode_gaji, 3, 2)', $bulan)
                                            ->findAll(),
            'total' => $this->gaji_pegawai_umum->selectSum('total_gaji')
                                            ->join('karyawan', 'karyawan.kode = gaji_pegawai_umum.kode')
                                            ->where('karyawan.status', 'aktif')
                                            ->where('MID(gaji_pegawai_umum.kode_gaji, 3, 2)', $bulan)
                                            ->findAll(),
            'tanggal'   => date('d M Y')
        ];

        $namaFile = date('d-m-y'). '-Laporan_Gaji_Karyawan_Umum';

        $dompdf = new Dompdf();

        $dompdf->load_html(view('laporanGajiKaryawanUmum', $data));

        $dompdf->render();

        $dompdf->stream($namaFile);
    }
    public function laporanGajiPegawaiProduksiPdf(){
        $post = $this->request->getPost(['kode_produksi']);

        if($post['kode_produksi'] == '0'){
            return redirect()->to('gaji_produksi');
        }

        $data = [
            'produksi' => $this->gaji_pegawai_produksi->select('gaji_pegawai_produksi.*, karyawan.*, sum(total_gaji) as gaji')
                                            ->join('karyawan', 'gaji_pegawai_produksi.kode = karyawan.kode')
                                            ->where('karyawan.status', 'aktif')
                                            ->where('gaji_pegawai_produksi.kode_produksi', $post['kode_produksi'])
                                            ->groupBy('gaji_pegawai_produksi.kode_gaji')
                                            ->findAll(),
            'total' => $this->gaji_pegawai_produksi->selectSum('total_gaji')
                                            ->join('karyawan', 'karyawan.kode = gaji_pegawai_produksi.kode')
                                            ->where('karyawan.status', 'aktif')
                                            ->where('gaji_pegawai_produksi.kode_produksi', $post['kode_produksi'])
                                            ->groupBy('gaji_pegawai_produksi.kode_produksi')
                                            ->findAll(),
            'tanggal'   => date('d M Y')
        ];
        // dd($data);
        $namaFile = date('d-m-y'). '-Laporan_Gaji_Karyawan_Produksi';

        $dompdf = new Dompdf();

        $dompdf->load_html(view('laporanGajiKaryawanProduksi', $data));

        $dompdf->render();

        $dompdf->stream($namaFile);
    }

    public function InputPermintaanGajiProduksi(){
        $post = $this->request->getPost('kode_produksi');

        if($post == '0'){
            return redirect()->to('gaji_produksi');
        }

        $file = $this->request->getFile('laporan');

        $digitKode = $this->permintaan->select('RIGHT(keterangan, 3) AS digit, status')->findAll();

        $kode = substr($post, 3, 6);
        // dd($digitKode);

        if($digitKode == null ){
            $namaFile = $file->getName();

            $file->move('dokumen');

            $data = [
                'gaji'  => $this->gaji_pegawai_produksi->select('SUM(gaji_pegawai_produksi.total_gaji) as nominal')
                                                        ->join('karyawan', 'gaji_pegawai_produksi.kode = karyawan.kode')
                                                        ->where('MID(kode_gaji, 3, 3)', $kode)
                                                        ->where('karyawan.status', 'aktif')
                                                        ->findAll(),
                'hitungan'  => $this->permintaan->selectCount('kode_permintaan', 'hitung')
                                                ->findAll()
            ];
    
            $kode_permintaan = (int)$data['hitungan'][0]['hitung'] + 1;
    
            $date = Time::today('Asia/Jakarta', );
    
            $this->permintaan->insert([
                'kode_permintaan'   => $kode_permintaan,
                'tanggal'           => $date,
                'keterangan'        => 'Penggajian Karyawan Produksi dengan kode produksi '.$post,
                'nominal'           => $data['gaji'][0]['nominal'],
                'kode'              => session()->get("user")[0]["kode"],
                'file'              => $namaFile,
                'status'            => 'PENDING'
            ]);
    
            session()->setFlashdata('permintaan', 'Data Permintaan Keuangan Untuk Gaji Karyawan Produksi <strong>('.$post.')</strong> Berhasil Diinputkan.');
        }else{

        $cek = 0;
        foreach($digitKode as $digit){
            if($digit['digit'] == $kode && $digit['status'] == 'PENDING'){
                $cek = 1;
            }else if($digit['digit'] == $kode && $digit['status'] == 'ACC'){
                $cek = 1;
            }
        }

        if($cek == 0){
            $namaFile = $file->getName();

            $file->move('dokumen');

            $data = [
                'gaji'  => $this->gaji_pegawai_produksi->select('SUM(gaji_pegawai_produksi.total_gaji) as nominal')
                                                        ->join('karyawan', 'gaji_pegawai_produksi.kode = karyawan.kode')
                                                        ->where('MID(kode_gaji, 3, 3)', $kode)
                                                        ->where('karyawan.status', 'aktif')
                                                        ->findAll(),
                'hitungan'  => $this->permintaan->selectCount('kode_permintaan', 'hitung')
                                                ->findAll()
            ];

            $kode_permintaan = (int)$data['hitungan'][0]['hitung'] + 1;
    
            $date = Time::today('Asia/Jakarta', );
    
            $this->permintaan->insert([
                'kode_permintaan'   => $kode_permintaan,
                'tanggal'           => $date,
                'keterangan'        => 'Penggajian Karyawan Produksi dengan kode produksi '.$post,
                'nominal'           => $data['gaji'][0]['nominal'],
                'kode'              => session()->get("user")[0]["kode"],
                'file'              => $namaFile,
                'status'            => 'PENDING'
            ]);
    
            session()->setFlashdata('permintaan', 'Data Permintaan Keuangan Untuk Gaji Karyawan Produksi <strong>('.$post.')</strong> Berhasil Diinputkan.');
            
        }else{
            session()->setFlashdata('tolak', 'Data Permintaan Keuangan Untuk Gaji Karyawan Produksi <strong>('.$post.')</strong> Sudah Ada.');
            return redirect()->to('/gaji_produksi');
        }
    }
        return redirect()->to('/gaji_produksi');
    }
    public function InputPermintaanGajiUmum(){
        $post = $this->request->getPost(['bulan']);

        if($post['bulan'] == '0'){
            return redirect()->to('gaji_umum');
        }

        if($post['bulan'] == 'Januari'){
            $bulan = 'Jan';
            $nomorBulan = '01';
        }elseif($post['bulan'] == 'Februari'){
            $bulan = 'Feb';
            $nomorBulan = '02';
        }elseif($post['bulan'] == 'Maret'){
            $bulan = 'Mar';
            $nomorBulan = '03';
        }elseif($post['bulan'] == 'April'){
            $bulan = 'Apr';
            $nomorBulan = '04';
        }elseif($post['bulan'] == 'Mei'){
            $bulan = 'Mei';
            $nomorBulan = '05';
        }elseif($post['bulan'] == 'Juni'){
            $bulan = 'Jun';
            $nomorBulan = '06';
        }elseif($post['bulan'] == 'Juli'){
            $bulan = 'Jul';
            $nomorBulan = '07';
        }elseif($post['bulan'] == 'Agustus'){
            $bulan = 'Agu';
            $nomorBulan = '08';
        }elseif($post['bulan'] == 'September'){
            $bulan = 'Sep';
            $nomorBulan = '09';
        }elseif($post['bulan'] == 'Oktober'){
            $bulan = 'Okt';
            $nomorBulan = '10';
        }elseif($post['bulan'] == 'November'){
            $bulan = 'Nov';
            $nomorBulan = '11';
        }elseif($post['bulan'] == 'Desember'){
            $bulan = 'Des';
            $nomorBulan = '12';
        }else{
            $bulan = '0';
        }

        $file = $this->request->getFile('laporan');

        $digitKode = $this->permintaan->select('MID(keterangan, 32, 3) AS digit, status')->findAll();

        if($digitKode == null ){
            $namaFile = $file->getName();

            $file->move('dokumen');

            $data = [
                'gaji'  => $this->gaji_pegawai_umum->select('SUM(gaji_pegawai_umum.total_gaji) as nominal')
                                                        ->join('karyawan', 'gaji_pegawai_umum.kode = karyawan.kode')
                                                        ->where('MID(kode_gaji, 3, 2)', $nomorBulan)
                                                        ->where('karyawan.status', 'aktif')
                                                        ->findAll(),
                'hitungan'  => $this->permintaan->selectCount('kode_permintaan', 'hitung')
                                                ->findAll()
            ];

            $kode_permintaan = (int)$data['hitungan'][0]['hitung'] + 1;
    
            $date = Time::today('Asia/Jakarta', );
    
            $this->permintaan->insert([
                'kode_permintaan'   => $kode_permintaan,
                'tanggal'           => $date,
                'keterangan'        => 'Penggajian Karyawan Umum Bulan '.$post['bulan'],
                'nominal'           => $data['gaji'][0]['nominal'],
                'kode'              => session()->get("user")[0]["kode"],
                'file'              => $namaFile,
                'status'            => 'PENDING'
            ]);
    
            session()->setFlashdata('permintaan', 'Data Permintaan Keuangan Untuk Gaji Karyawan Produksi <strong>('.$post['bulan'].')</strong> Berhasil Diinputkan.');
        }else{

        $cek = 0;
        foreach($digitKode as $digit){
            if($digit['digit'] == $bulan && $digit['status'] == 'PENDING'){
                $cek = 1;
            }else if($digit['digit'] == $bulan && $digit['status'] == 'ACC'){
                $cek = 1;
            }
        }

        if($cek == 0){
            $namaFile = $file->getName();

            $file->move('dokumen');

            $data = [
                'gaji'  => $this->gaji_pegawai_umum->select('SUM(gaji_pegawai_umum.total_gaji) as nominal')
                                                        ->join('karyawan', 'gaji_pegawai_umum.kode = karyawan.kode')
                                                        ->where('MID(kode_gaji, 3, 2)', $nomorBulan)
                                                        ->where('karyawan.status', 'aktif')
                                                        ->findAll(),
                'hitungan'  => $this->permintaan->selectCount('kode_permintaan', 'hitung')
                                                ->findAll()
            ];
    
            $kode_permintaan = (int)$data['hitungan'][0]['hitung'] + 1;
    
            $date = Time::today('Asia/Jakarta', );
    
            $this->permintaan->insert([
                'kode_permintaan'   => $kode_permintaan,
                'tanggal'           => $date,
                'keterangan'        => 'Penggajian Karyawan Umum Bulan '.$post['bulan'],
                'nominal'           => $data['gaji'][0]['nominal'],
                'kode'              => session()->get("user")[0]["kode"],
                'file'              => $namaFile,
                'status'            => 'PENDING'
            ]);

            session()->setFlashdata('permintaan', 'Data Permintaan Keuangan Untuk Gaji Karyawan Produksi <strong>('.$post['bulan'].')</strong> Berhasil Diinputkan.');
            
        }else{
            session()->setFlashdata('tolak', 'Data Permintaan Keuangan Untuk Gaji Karyawan Produksi <strong>('.$post['bulan'].')</strong> Sudah Ada.');
            return redirect()->to('/gaji_umum');
        }
    }
        return redirect()->to('/gaji_umum');
    }

    public function unduhFile($nama){
        return $this->response->download("dokumen"."/$nama", null);
    }
}