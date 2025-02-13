<?php

namespace App\Exports;
use App\Models\JobModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class JobsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings{

    public function collection(){
        $request = Request::all();
        return JobsModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user): array{
        $cretedAtFormat = date('d-m-Y', strtotime($user->created_at));

        return[
            ++$this->index,
            $user->id,
            $user->job_titlle,
            $user->min_salary,
            $user->max_salary,
            $cretedAtFormat,
        ];
    }
    
    public function headings(): array{
        return[
            'S.No',
            'Table ID',
            'Job Title',
            'Min. Salary',
            'Max. Salary',
            'Created At',
        ];
    }
}
?>