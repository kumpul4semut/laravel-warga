<?php

namespace App\Imports;

use App\Models\Warga;
use Maatwebsite\Excel\Concerns\ToModel;

class WargaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Warga([
            'no_ktp'     => $row[1],
            'nama'       => $row[2],
            'agama'      => $row[3],
            't_lahir'    => $row[4],
            'tgl_lahir'  => $row[5],
            'j_ke'       => $row[6],
            'gol_darah'  => $row[7],
            'w_negara'   => $row[8],
            'pendidikan' => $row[9],
            'pekerjaan'  => $row[10],
            's_nikah'    => $row[11],
            'status'     => $row[12],
        ]);
    }
}
