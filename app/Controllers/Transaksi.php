<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\TrxBukuModel;
use App\Models\BukuModel;

class Transaksi extends BaseController
{
    protected $helpers = [];
    protected $transaksi_model;
    protected $trxbuku_model;
    protected $buku_model;

    public function __construct()
    {
        helper(['form']);
        $this->transaksi_model = new TransaksiModel();
        $this->trxbuku_model = new TrxBukuModel();
        $this->buku_model = new BukuModel();
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksi_model->getTransaksi();
        return view('transaksi/transaksi_view', $data);
    }

    public function lihat($id)
    {
        $data['transaksi'] = $this->transaksi_model->getTransaksi($id);
        return view('transaksi/lihat_view', $data);
    }

    public function tambah()
    {
        $data['buku'] = $this->buku_model->getBuku();
        return view('transaksi/tambah_view', $data);
    }
    
    protected function insertTrxBuku($id_transaksi, $id_buku_arr, $jumlah_arr)
    {
        $validation = \Config\Services::validation();
        $harga_total = 0;
        $is_success = false;

        if ($id_buku_arr != null && $jumlah_arr != null) {
            foreach ($id_buku_arr as $i => $id_buku) {
                $buku = $this->buku_model->getBuku($id_buku);
                $harga = $buku->harga;
                $data = [
                    'id_transaksi' => $id_transaksi,
                    'id_buku' => $id_buku,
                    'jumlah' => $jumlah_arr[$i],
                    'subtotal' => $harga * $jumlah_arr[$i]
                ];
                
                if ($validation->run($data, 'trxbuku') == false) {
                    $this->transaksi_model->deleteTransaksi($id_transaksi);
                    session()->setFlashdata('errors', $validation->getErrors());
                    break;
                } else {
                    $insert_trxbuku = $this->trxbuku_model->insertTrxBuku($data);
                    if ($insert_trxbuku) {
                        $this->buku_model->updateStok($buku->id_buku, $buku->stok - $data['jumlah']);
                        $harga_total += $data['subtotal'];
                        if ($i == count($id_buku_arr) - 1) $is_success = true; 
                    }
                }
            }
        } else {
            session()->setFlashdata('errors', ['Buku & jumlah wajib diisi.']);
        }


        if ($is_success) {
            $this->transaksi_model->updateHargaTotal($id_transaksi, $harga_total);
            session()->setFlashdata('success', 'Data transaksi berhasil ditambahkan.');
        }

        return $is_success;

    }

    public function insert()
    {
        $validation = \Config\Services::validation();
        $data_transaksi = [
            'tanggal_transaksi' => $this->request->getPost('tanggal_transaksi'),
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            'harga_total' => 0
        ];
        $id_buku_arr = $this->request->getPost('id_buku');
        $jumlah_arr = $this->request->getPost('jumlah');

        if ($validation->run($data_transaksi, 'transaksi') == false) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('transaksi/tambah'));
        } else {
            $insert_transaksi = $this->transaksi_model->insertTransaksi($data_transaksi);
            if ($insert_transaksi) {
                $id_transaksi = $this->transaksi_model->insertID();
                $insert_trxbuku = $this->insertTrxBuku($id_transaksi, $id_buku_arr, $jumlah_arr);
                if ($insert_trxbuku) {
                    return redirect()->to(base_url('transaksi'));
                } else {
                    return redirect()->to(base_url('transaksi/tambah'));
                }
            }
        }
    }

    public function delete($id)
    {
        $transaksi = $this->transaksi_model->getTransaksi($id);

        foreach ($transaksi as $trxbuku) {
            $this->buku_model->updateStok($trxbuku->id_buku, $trxbuku->stok + $trxbuku->jumlah);
            $this->trxbuku_model->deleteTrxBuku($trxbuku->id_trxbuku);
        }

        $delete = $this->transaksi_model->deleteTransaksi($id);
        if ($delete) {
            session()->setFlashdata('success', 'Data transaksi berhasil dihapus.');
            return redirect()->to(base_url('transaksi'));
        }
    }
}