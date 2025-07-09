<?php

namespace App\Imports;

use App\Models\Obat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ObatImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Obat([
            'nama_obat' => $row['nama_obat'],
            'satuan'    => $row['satuan'],
            'stok'      => $row['stok'],
            'harga'     => $row['harga'],
        ]);
    }
}
