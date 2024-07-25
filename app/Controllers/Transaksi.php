<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\BukuModel;

class Transaksi extends BaseController
{
    protected $helpers = [];
    protected $transaksi_model;
    protected $buku_model;

    public function __construct()
    {
        helper(['form']);
        $this->transaksi_model = new TransaksiModel();
        $this->buku_model = new BukuModel();
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksi_model->getTransaksi();
        return view('transaksi/transaksi_view', $data);
    }

    public function tambah()
    {
        $data['buku'] = $this->buku_model->getBuku();
        return view('transaksi/tambah_view', $data);
    }

    public function insert()
    {
        $validation = \Config\Services::validation();
        $data = [
            'id_buku'           => $this->request->getPost('id_buku'),
            'tanggal_transaksi' => $this->request->getPost('tanggal_transaksi'),
            'jumlah'            => $this->request->getPost('jumlah'),
        ];
        $buku = $this->buku_model->getBuku($data['id_buku']);
        $harga_satuan = ($buku) ? $buku->harga : 0;
        $data['harga_total'] = (int) $data['jumlah'] * $harga_satuan;

        if ($validation->run($data, 'transaksi') == false) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('transaksi/tambah'));
        } else {
            $insert = $this->transaksi_model->insertTransaksi($data);
            if ($insert) {
                $this->buku_model->updateStok($buku->id_buku, $buku->stok - $data['jumlah']);
                session()->setFlashdata('success', 'Data transaksi berhasil ditambahkan.');
                return redirect()->to(base_url('transaksi'));
            }
        }
    }
}