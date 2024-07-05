<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\KegiatanModel;
use App\Models\KeuanganModel;
use App\Models\PenggunaModel;
use App\Models\PermintaanModel;
use CodeIgniter\I18n\Time;

class Batik extends BaseController
{
    private $keuangan, $permintaan, $pengguna, $absensi, $todo;

    public function __construct(){
        $this->keuangan = new KeuanganModel();
        $this->permintaan = new PermintaanModel();
        $this->pengguna = new PenggunaModel();
        $this->absensi = new AbsensiModel();
        $this->todo = new KegiatanModel();
    }
    public function index()
    {
        if(session()->get("user") == null){
            return redirect()->to('/login');
        }

        $date = Time::today('Asia/Jakarta', );

        $data = [
            'permintaanAcc'  => $this->permintaan->select('permintaan.* , pengguna.nama')
                                                ->join('pengguna', 'pengguna.kode = permintaan.kode')
                                                ->orderBy('permintaan.tanggal')
                                                ->where('permintaan.kode', session()->get("user")[0]['kode'])
                                                ->where('status', 'ACC')
                                                ->findAll(),
            'permintaanPending'  => $this->permintaan->select('permintaan.* , pengguna.nama')
                                                ->join('pengguna', 'pengguna.kode = permintaan.kode')
                                                ->orderBy('permintaan.tanggal')
                                                ->where('permintaan.kode', session()->get("user")[0]['kode'])
                                                ->where('status', 'PENDING')
                                                ->findAll(),
            'permintaanRevisi'  => $this->permintaan->select('permintaan.* , pengguna.nama')
                                                ->join('pengguna', 'pengguna.kode = permintaan.kode')
                                                ->orderBy('permintaan.tanggal')
                                                ->where('permintaan.kode', session()->get("user")[0]['kode'])
                                                ->where('status', 'REVISI')
                                                ->findAll(),
            'notifikasi'    => $this->permintaan->selectCount('kode_permintaan', 'notifikasi')
                                                ->where('kode', session()->get("user")[0]['kode'])
                                                ->findAll(),
            'jumlahHadir'     => $this->absensi->selectCount('kode_karyawan')->where('status', 'HADIR')->where('tanggal', $date)->findAll(),
            'jumlahAbsen'     => $this->absensi->selectCount('kode_karyawan')->where('status', 'TIDAK MASUK')->where('tanggal', $date)->findAll(),
            'todo'            => $this->todo->where('status', 'belum selesai')->where('kode', session()->get("user")[0]["kode"])->findAll()
        ];

        // dd($data['absen']);

        return view('index', $data);
    }
    public function login()
    {
        return view('login-form');
    }

    public function asetManage(){
        return view('manajemenAsset');
    }

    public function loginAction()
    {
        $data = $this->request->getPost(["username", "password"]);
        $p = new PenggunaModel();
        $result = $p->GetDataPengguna($data["username"], $data["password"]);

        if(count($result) <= 0 ){
            return redirect()->to("/login");
        }

        session()->set("user", $result);

        return redirect()->to("/");
    }

    public function inputTodo(){
        $post = $this->request->getPost(['todo']);

        $this->todo->insert([
            'kegiatan'  => $post['todo'],
            'status'     => 'belum selesai',
            'kode'      => session()->get("user")[0]["kode"]
        ]);

        return redirect('/');
    }
    public function selesaiTodo(){
        $post = $this->request->getPost(['nomor']);

        $this->todo->set([
            'status'     => 'selesai',
        ])->where('nomor', $post['nomor'])->update();

        return redirect('/');
    }
}