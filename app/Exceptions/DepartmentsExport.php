<?php

namespace App\Exports;

use App\Models\DepartmentsModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DepartmentsExport
{
    public function export()
    {
        $request = Request::all();
        $departments = DepartmentsModel::getRecord($request);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Thêm tiêu đề cột
        $headings = ['S.No', 'Table ID', 'Tên phòng', 'Tên quản lý', 'Vị trí', 'Ngày tạo'];
        $sheet->fromArray([$headings], null, 'A1');

        $row = 2;
        $index = 1;

        foreach ($departments as $department) {
            $manager_id = ($department->manager_id == 1) ? 'Thông' : 'Thông 2';
            $created_at_Formate = date('d-m-Y', strtotime($department->created_at));

            $data = [
                $index++,
                $department->id,
                $department->department_name,
                $manager_id,
                $department->street_address,
                $created_at_Formate
            ];
            $sheet->fromArray([$data], null, "A$row");
            $row++;
        }

        // Tự động điều chỉnh kích thước cột
        foreach (range('A', $sheet->getHighestColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Xuất file
        return new StreamedResponse(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment;filename="departments.xlsx"',
            'Cache-Control' => 'max-age=0'
        ]);
    }
}
