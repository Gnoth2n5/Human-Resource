<?php

namespace App\Exports; 
use App\Models\ManagerModel;
use Maatwebsite\Excel\Concerns\FromCollection; 
use Maatwebsite\Excel\Concerns\ShouldAutoSize; 
use Maatwebsite\Excel\Concerns\WithMapping; 
use Maatwebsite\Excel\Concerns\WithHeadings; 
use Request;

class ManagerExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings { 
    public function collection() {
        $request = Request::all();
        return ManagerModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array {

        $created_at = date('d-m-Y', strtotime($user->created_at));

        return[
            ++$this->index,
            $user->id,
            $user->manager_name,
            $user->manager_email,
            $user->manager_mobile,
            $created_at
        ];
    }

    public function headings(): array {
        return [
            'S.No',
            'ID',
            'Manager Name',
            'Manager Email',
            'Manager Mobile',
            'Created Date'
        ];
    }
}


?>