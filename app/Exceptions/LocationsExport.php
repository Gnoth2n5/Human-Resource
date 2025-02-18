<?php

namespace App\Exports;
use App\Models\LocationsModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class LocationsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings{

    public function collection(){
        $request = Request::all();
        return LocationsModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array{
        $cretedAtFormat = date('d-m-Y', strtotime($user->created_at));

        return[
            ++$this->index,
            $user->id,
            $user->street_address,
            $user->postal_code,
            $user->city,
            $user->state_province,
            $user->country_name,
            $cretedAtFormat,
        ];
    }
    
    public function headings(): array{
        return[
            'S.No',
            'Table ID',
            'Vị trí đường',
            'Mã Bưu Điện',
            'Thành phố',
            'Tỉnh',
            'Quốc gia',
            'Created At',
        ];
    }
}
?>