<?php

namespace App\Validation;

use App\Models\BukuModel;

class AdditionalRules
{
    public function positive($num) : bool
    {
        // $num = (int) $num;
        return ($num >= 0) ? true : false;
    }

    function valid_date($date){
        return preg_match('\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}', $date);
    }

    function available($jumlah, string $params, array $data)
    {
        $params = explode(',', $params);

        $buku_model = new BukuModel();
        $buku = $buku_model->getBuku($data['id_buku']);
        $stok = $buku->stok;

        return ($jumlah > $stok) ? false : true;
    }
}
