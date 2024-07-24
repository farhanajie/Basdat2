<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\RakModel;

class Buku extends BaseController
{
    protected $helpers = [];
    protected $buku_model;
    protected $rak_model;

    public function __construct()
    {
        helper(['form']);
        $this->buku_model = new BukuModel();
        $this->rak_model = new RakModel();
    }

    public function index()
    {
        $data['buku'] = $this->buku_model->getBook();
        return view('buku/buku_view', $data);
    }

    public function tambah()
    {
        $data['rak'] = $this->rak_model->getRak();
        return view('buku/tambah_view', $data);
    }
}