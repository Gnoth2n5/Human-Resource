<?php

namespace App\Exports;

use App\Models\PositionModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PositionExport
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function export()
    {
        $data = PositionModel::getRecord($this->request->all());

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Thêm tiêu đề
        $sheet->setCellValue('A1', 'Table ID');
        $sheet->setCellValue('B1', 'Position Name');
        $sheet->setCellValue('C1', 'Daily Rate');
        $sheet->setCellValue('D1', 'Monthly Rate');
        $sheet->setCellValue('E1', 'Working Days Per Month');

        // Thêm dữ liệu
        $row = 2;
        foreach ($data as $record) {
            $sheet->setCellValue('A' . $row, $record->id);
            $sheet->setCellValue('B' . $row, $record->position_name);
            $sheet->setCellValue('C' . $row, $record->daily_rate);
            $sheet->setCellValue('D' . $row, $record->monthly_rate);
            $sheet->setCellValue('E' . $row, $record->working_days_per_month);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        // Xuất file
        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment;filename="position_export.xlsx"',
            'Cache-Control' => 'max-age=0',
        ]);
    }
}
