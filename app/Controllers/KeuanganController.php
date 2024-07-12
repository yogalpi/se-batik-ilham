<?php

namespace App\Controllers;

use App\Models\KeuanganModel;
use App\Models\PenggunaModel;
use App\Models\PermintaanModel;
use App\Models\KegiatanModel;
use Dompdf\Dompdf;

class KeuanganController extends BaseController
{
    private $uangMasukdanKeluar, $permintaanKeuangan, $permintaan, $todo;
    public function __construct()
    {

        $this->uangMasukdanKeluar = new KeuanganModel();
        $this->permintaanKeuangan = new PermintaanModel();
        $this->permintaan = new PermintaanModel();
        $this->todo = new KegiatanModel();
    }

    public function uangMasukdanKeluar()
    {

        return view('uangMasukdanKeluar');
    }
    public function bukuBesar()
    {
        $data = [
            'debet' => $this->uangMasukdanKeluar->selectSum('jumlah')->where('status', 'DEBET')->first(),
            'saldo' => ($this->uangMasukdanKeluar->selectSum('jumlah')->where('status', 'DEBET')->first()['jumlah'] - $this->uangMasukdanKeluar->selectSum('jumlah')->where('status', 'KREDIT')->first()['jumlah']),
            'kredit' => $this->uangMasukdanKeluar->selectSum('jumlah')->where('status', 'KREDIT')->first(),
        ];
        return view('bukuBesar', $data);
    }
    public function detailbukuBesar($id)
    {
        return view('detailbukuBesar');
    }
    public function datauangMasukdanKeluar()
    {
        $data = [
            'keuangan' => $this->uangMasukdanKeluar->findAll()
        ];
        return view('datauangMasukdanKeluar', $data);
    }
    public function dataPermintaanKeuangan()
    {
        $data = [
            'permintaan' => $this->permintaanKeuangan->findAll(),
            'notifikasi' => $this->permintaan->selectCount('kode_permintaan', 'notifikasi')->findAll(),
            'todo' => $this->todo->where('status', 'belum selesai')->where('kode', session()->get("user")[0]["kode"])->findAll(),
        ];
        return view('permintaanKeuangan', $data);
    }
    public function simpanUangMasukdanKeluar()
    {
        $post = $this->request->getPost(['kode', 'tanggal', 'status', 'jumlah', 'keterangan', 'kode_pengguna']);
        $this->uangMasukdanKeluar->insert([
            'kode' => $post['kode'],
            'tanggal' => $post['tanggal'],
            'status' => strtoupper($post['status']),
            'jumlah' => $post['jumlah'],
            'keterangan' => $post['keterangan'],
            'kode_pengguna' => $post['kode_pengguna']
        ]);
        return redirect()->to('/datauangMasukdanKeluar');
    }

    public function updatePermintaanKeuangan($kode_permintaan, $status)
    {
        $this->permintaan->where([
            'kode_permintaan' => $kode_permintaan,
        ])->set([
                    'status' => strtoupper($status)
                ])->update();

        if(strtoupper($status) == 'KREDIT'){
            $permintaan = $this->permintaan->where('kode_permintaan', $kode_permintaan)->first();
            $this->uangMasukdanKeluar->insert([
                'kode' => $permintaan['kode_permintaan'],
                'tanggal' => $permintaan['tanggal'],
                'keterangan' => $permintaan['keterangan'],
                'status' => strtoupper($permintaan['status']),
                'jumlah' => $permintaan['nominal'],
                'kode_pengguna' => $permintaan['kode'],
            ]);
        }
        
        return redirect()->back();
    }

    public function downloadPdf()
    {
        $dompdf = new Dompdf();

        $uangMasukdanKeluar = $this->uangMasukdanKeluar->select('keuangan.*')->findAll();
        
        $data = [
            'uangMasukdanKeluar' => $uangMasukdanKeluar,
            
            // 'nama_admin'        => user()->username
        ];

        $html = view('pdfUang', $data);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporanKeuangan', ['Attachment' => 0]);
    }
}