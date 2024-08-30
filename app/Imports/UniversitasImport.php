<?php

namespace App\Imports;

use App\Models\Universitas;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Collection;

class UniversitasImport implements ToCollection
{
    use Importable;

    public function collection(Collection $rows)
    {

        $this->data = $rows->skip(1)->map(function ($row) {
            return [
                'nama_pt' => $row[3],
            ];
        });
    }

    public function getData()
    {
        return $this->data;
    }
}
