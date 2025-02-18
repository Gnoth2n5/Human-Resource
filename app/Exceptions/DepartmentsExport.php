<?php

namespace App\Exports;

use App\Models\DepartmentsModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class DepartmentsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return DepartmentsModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        if ($user->manager_id == 1) {
            $manager_id = 'Thông';
        } else {
            $manager_id = 'Thông 2';
        }
        $created_at_Formate = date('d-m-Y', strtotime($user->created_at));

        return [
            ++$this->index,
            $user->id,
            $user->department_name,
            $user->manager_id,
            $user->street_address,
            $created_at_Formate
        ];
    }
    public function headings(): array {
        return [
            'S.No',
            'Table ID',
            'Tên phòng',
            'Tên quản lý',
            'Vị trí',
            'Ngày tạo'
        ];
    }
    
}
