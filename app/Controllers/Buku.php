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
        $data['buku'] = $this->buku_model->getBuku();
        return view('buku/buku_view', $data);
    }

    public function tambah()
    {
        $data['rak'] = $this->rak_model->getRak();
        return view('buku/tambah_view', $data);
    }

    public function insert()
    {
        $validation = \Config\Services::validation();
        $img = $this->request->getFile('foto');
        $nama_foto = ($img->isValid()) ? $img->getRandomName() : 'default.jpg';
        $data = [
            'id_rak'  => $this->request->getPost('id_rak'),
            'kode_buku' => $this->request->getPost('kode_buku'),
            'judul'     => $this->request->getPost('judul'),
            'penulis'   => $this->request->getPost('penulis'),
            'penerbit'  => $this->request->getPost('penerbit'),
            'harga'     => $this->request->getPost('harga'),
            'sinopsis'  => $this->request->getPost('sinopsis') ? $this->request->getPost('sinopsis') : null,
            'foto'      => $nama_foto,
            'stok'    => $this->request->getPost('stok'),
        ];

        if ($validation->run($data, 'buku') == false) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('buku/tambah'));
        } else {
            if ($img->isValid()) $img->move(ROOTPATH . 'public/uploads', $nama_foto);
            $insert = $this->buku_model->insertBuku($data);
            if ($insert) {
                session()->setFlashdata('success', 'Data buku berhasil ditambahkan.');
                return redirect()->to(base_url('buku'));
            }
        }
    }

    public function lihat($id)
    {
        $data['buku'] = $this->buku_model->getBuku($id);
        return view('buku/lihat_view', $data);
    }

    public function edit($id)
    {
        $data = [
            'rak' => $this->rak_model->getRak(),
            'buku'   => $this->buku_model->getBuku($id)
        ];
        return view('buku/edit_view', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_buku');
        $validation = \Config\Services::validation();
        $img = $this->request->getFile('foto');
        $nama_foto = ($img->isValid()) ? $img->getRandomName() : null;
        $data = [
            'id_rak'    => $this->request->getPost('id_rak'),
            'kode_buku' => $this->request->getPost('kode_buku'),
            'judul'     => $this->request->getPost('judul'),
            'penulis'   => $this->request->getPost('penulis'),
            'penerbit'  => $this->request->getPost('penerbit'),
            'harga'     => $this->request->getPost('harga'),
            'sinopsis'  => $this->request->getPost('sinopsis') ? $this->request->getPost('sinopsis') : null,
            'stok'      => $this->request->getPost('stok'),
        ];
        if ($img->isValid()) $data['foto'] = $nama_foto;

        if ($validation->run($data, 'buku') == false) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('buku/edit/' . $id));
        } else {
            if ($img->isValid()) $img->move(ROOTPATH . 'public/uploads', $nama_foto);
            $update = $this->buku_model->updateBuku($data, $id);
            if ($update) {
                session()->setFlashdata('success', 'Data buku berhasil diubah.');
                return redirect()->to(base_url('buku'));
            }
        }
    }
}