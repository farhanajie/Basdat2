<?php

namespace App\Controllers;

use App\Models\RakModel;

class Rak extends BaseController
{
    protected $helpers = [];
    protected $rak_model;

    public function __construct()
    {
        helper(['form']);
        $this->rak_model = new RakModel();
    }

    public function index()
    {
        $data['rak'] = $this->rak_model->getRak();
        return view("rak/rak_view", $data);
    }

    public function tambah()
    {
        return view("rak/tambah_view.php");
    }

    public function insert()
    {
        $validation = \Config\Services::validation();
        $data = [
            'kode_rak' => $this->request->getPost('kode_rak'),
            'nama_rak' => $this->request->getPost('nama_rak')
        ];

        if ($validation->run($data, 'rak') == false) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('rak/tambah'));
        } else {
            $insert = $this->rak_model->insertRak($data);
            if ($insert) {
                session()->setFlashdata('success', 'Data rak buku berhasil ditambahkan.');
                return redirect()->to(base_url('rak'));
            }
        }
    }

    public function edit($id)
    {
        $data['rak'] = $this->rak_model->getRak($id);
        return view('rak/edit_view', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_rak');
        $validation = \Config\Services::validation();
        $data = [
            'kode_rak' => $this->request->getPost('kode_rak'),
            'nama_rak' => $this->request->getPost('nama_rak')
        ];

        if ($validation->run($data, 'rak') == false) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('rak/edit/' . $id));
        } else {
            $update = $this->rak_model->updateRak($data, $id);
            if ($update) {
                session()->setFlashdata('success', 'Data rak buku berhasil diubah.');
                return redirect()->to(base_url('rak'));
            }
        }
    }

    public function delete($id)
    {
        $delete = $this->rak_model->deleteRak($id);
        if ($delete) {
            session()->setFlashdata('success', 'Data rak buku berhasil dihapus.');
            return redirect()->to(base_url('rak'));
        }
    }
}