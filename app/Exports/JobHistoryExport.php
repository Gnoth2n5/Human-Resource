<?php

namespace App\Exports;

use App\Models\JobHistoryModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class JobHistoryExport
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function export()
    {
        $data = JobHistoryModel::getRecord($this->request->all());

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Thêm tiêu đề
        $sheet->setCellValue('A1', 'Table ID');
        $sheet->setCellValue('B1', 'Employee Name');
        $sheet->setCellValue('C1', 'Start Date');
        $sheet->setCellValue('D1', 'End Date');
        $sheet->setCellValue('E1', 'Job Title');
        $sheet->setCellValue('F1', 'Department ID');
        $sheet->setCellValue('G1', 'Created At');

        // Thêm dữ liệu
        $row = 2; // Bắt đầu từ hàng thứ 2
        foreach ($data as $record) {
            $sheet->setCellValue('A' . $row, $record->id);
            $sheet->setCellValue('B' . $row, $record->name . ' ' . $record->last_name);
            $sheet->setCellValue('C' . $row, $record->start_date);
            $sheet->setCellValue('D' . $row, $record->end_date);
            $sheet->setCellValue('E' . $row, $record->job_title);
            $sheet->setCellValue('F' . $row, $record->department);
            $sheet->setCellValue('G' . $row, $record->createdAtFormat); // Thêm Created At
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        // Xuất file
        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment;filename="job_history.xlsx"',
            'Cache-Control' => 'max-age=0',
        ]);
    }
}