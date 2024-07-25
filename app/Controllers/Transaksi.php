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
}