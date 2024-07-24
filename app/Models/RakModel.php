<?php

namespace App\Models;

use CodeIgniter\Model;

class RakModel extends Model
{
    protected $table = 'rak';
    
    public function getRak($id = false)
    {
        if (!$id) return $this->get()->getResult();
        else return $this->getWhere(['id_rak' => $id])->getRow();
    }

    public function insertRak($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateRak($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_rak' => $id]);
    }

    public function deleteRak($id)
    {
        return $this->db->table($this->table)->delete(['id_rak' => $id]);
    }
}
