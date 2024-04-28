<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\GajiModel;
use App\Models\GajiProduksiModel;
use App\Models\GajiUmumModel;
use App\Models\KaryawanModel;
use App\Models\KeuanganModel;
use App\Models\PenggunaModel;
use App\Models\ProduksiModel;
use CodeIgniter\I18n\Time;

class PegawaiController extends BaseController
{

    private $karyawan;
    private $gaji_pegawai_produksi;
    private $gaji_pegawai_umum;
    private $gaji;
    private $keuangan;
    private $produksi;
    private $absensi;

    public function __construct(){
        $this->karyawan = new KaryawanModel();
        $this->gaji_pegawai_produksi = new GajiProduksiModel();
        $this->gaji_pegawai_umum = new GajiUmumModel();
        $this->gaji = new GajiModel();
        $this->keuangan = new KeuanganModel();
        $this->produksi = new ProduksiModel();
        $this->absensi = new AbsensiModel();
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
        return view('manajemenGaji');
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

        return view('inputGajiProduksi', $data);
    }

    public function inputGajiKaryawanProduksi(){
        $post = $this->request->getPost(['kode_gaji' ,'kode_karyawan', 'kode_produksi', 'jumlah_produksi', 'total_gaji']);
        $this->gaji_pegawai_produksi->insert([
            'kode_gaji'         => $post['kode_gaji'],
            'kode'              => $post['kode_karyawan'],
            'kode_produksi'     => $post['kode_produksi'],
            'jumlah_produksi'   => $post['jumlah_produksi'],
            'total_gaji'        => $post['total_gaji']
        ]); 

        $date = Time::today('Asia/Jakarta', );

        $this->keuangan->insert([
            'kode'          => $post['kode_gaji'],
            'tanggal'       => $date->toDateString(),
            'status'        => 'KREDIT',
            'jumlah'        => $post['total_gaji'],
            'keterangan'    => 'Gaji Karyawan Produksi Tanggal '. $date->toDateString(),
            'kode_pengguna' => session()->get("user")[0]["kode"] 
        ]);

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
        $this->gaji_pegawai_umum->insert([
            'kode_gaji'         => $post['kode_gaji'],
            'kode'              => $post['kode_karyawan'],
            'jumlah_absensi'    => $post['jumlah_absensi'],
            'total_gaji'        => $post['total_gaji']
        ]); 

        $date = Time::today('Asia/Jakarta', );

        $this->keuangan->insert([
            'kode'          => $post['kode_gaji'],
            'tanggal'       => $date->toDateString(),
            'status'        => 'KREDIT',
            'jumlah'        => $post['total_gaji'],
            'keterangan'    => 'Gaji Karyawan Umum Tanggal '. $date->toDateString(),
            'kode_pengguna' => session()->get("user")[0]["kode"] 
        ]);

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
}