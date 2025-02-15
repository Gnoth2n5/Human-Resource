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
        
        // Thêm dữ liệu
        $row = 2; // Bắt đầu từ hàng thứ 2
        foreach ($data as $record) {
            $sheet->setCellValue('A' . $row, $record->id);
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