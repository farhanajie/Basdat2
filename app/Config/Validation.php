<?php

namespace Config;

use App\Validation\AdditionalRules;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        AdditionalRules::class
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public array $rak = [
        'kode_rak' => 'required|max_length[3]',
        'nama_rak' => 'required|max_length[20]'
    ];

    public array $rak_errors = [
        'kode_rak' => [
            'required'      => 'Kode rak wajib diisi.',
            'max_length'    => 'Kode rak tidak boleh melebihi 3 karakter.'
        ],
        'nama_rak' => [
            'required'      => 'Nama rak wajib diisi.',
            'max_length'    => 'Nama rak tidak boleh melebihi 20 karakter.'
        ]
    ];

    public array $buku = [
        'id_rak'  => 'required',
        'kode_buku' => 'required|max_length[3]',
        'judul'     => 'required|max_length[50]',
        'penulis'   => 'required|max_length[30]',
        'penerbit'  => 'required|max_length[30]',
        'harga'     => 'required|integer|max_length[10]|positive',
        'sinopsis'  => 'max_length[255]',
        'foto'      => 'mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,5000]',
        'stok'      => 'required|integer|max_length[7]|positive',
    ];

    public array $buku_errors = [
        'id_rak' => [
            'required'      => 'Rak wajib dipilih.',
        ],
        'kode_buku' => [
            'required'      => 'Kode buku wajib diisi.',
            'max_length'    => 'Kode buku tidak boleh melebihi 3 karakter.'
        ],
        'judul' => [
            'required'      => 'Judul wajib diisi.',
            'max_length'    => 'Kode buku tidak boleh melebihi 50 karakter.'
        ],
        'penulis' => [
            'required'      => 'Nama penulis wajib diisi.',
            'max_length'    => 'Nama penulis tidak boleh melebihi 30 karakter.'
        ],
        'penerbit' => [
            'required'      => 'Nama penerbit wajib diisi.',
            'max_length'    => 'Nama penerbit tidak boleh melebihi 30 karakter.'
        ],
        'harga' => [
            'required'      => 'Harga wajib diisi.',
            'integer'       => 'Harga harus berupa angka.',
            'max_length'    => 'Harga tidak boleh melebihi 10 digit.',
            'positive'      => 'Harga harus 0 atau lebih.'
        ],
        'sinopsis' => [
            'max_length'    => 'Sinopsis tidak boleh melebihi 255 karakter.'
        ],
        'foto' => [
            'mime_in'       => 'Foto harus berupa format jpg, jpeg, atau png.',
            'max_size'      => 'Foto maksimal berukuran 5 MB.'
        ],
        'stok' => [
            'required'      => 'Jumlah stok wajib diisi.',
            'integer'       => 'Jumlah stok harus berupa angka.',
            'max_length'    => 'Jumlah stok tidak boleh melebihi 7 digit.',
            'positive'      => 'Jumlah stok harus 0 atau lebih.'
        ],
    ];

    public array $transaksi = [
        'id_buku'           => 'required',
        'tanggal_transaksi' => 'required|valid_date',
        'jumlah'            => 'required|max_length[7]|integer|positive|available[]',
        'harga_total'       => 'required|max_length[20]|integer|positive'
    ];

    public array $transaksi_errors = [
        'id_buku' => [
            'required'      => 'Buku wajib dipilih.',
        ],
        'tanggal_transaksi' => [
            'required'      => 'Tanggal transaksi wajib diisi.',
            'valid_date'    => 'Tanggal transaksi bukan format tanggal yang benar: YYYY-MM-DD HH:MM:SS.'
        ],
        'jumlah' => [
            'required'      => 'Jumlah buku wajib diisi.',
            'max_length'    => 'Jumlah buku tidak boleh melebihi 7 angka.',
            'integer'       => 'Jumlah buku harus berupa angka.',
            'positive'      => 'Jumlah buku harus 0 atau lebih.',
            'available'     => 'Jumlah buku tidak bisa melebihi stok buku.'
        ],
        'harga_total' => [
            'required'      => 'Harga total wajib diisi.',
            'max_length'    => 'Harga total tidak boleh melebihi 20 angka.',
            'integer'       => 'Harga total harus berupa angka.',
            'positive'      => 'Harga total harus 0 atau lebih.'
        ],
    ];
}
