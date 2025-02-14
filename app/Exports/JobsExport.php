<?php

namespace App\Exports;

use App\Models\JobsModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class JobsExport
{
    public function export()
    {
        $request = request()->all();
        $jobs = JobsModel::getRecord($request);

        // Tạo file Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Thêm tiêu đề
        $headings = ['S.No', 'Table ID', 'Job Title', 'Min. Salary', 'Max. Salary', 'Created At'];
        $sheet->fromArray([$headings], null, 'A1');

        // Thêm dữ liệu
        $rowNumber = 2;
        $index = 1;

        foreach ($jobs as $job) {
            $sheet->setCellValue('A' . $rowNumber, $index++);
            $sheet->setCellValue('B' . $rowNumber, $job->id);
            $sheet->setCellValue('C' . $rowNumber, $job->job_titlle);
            $sheet->setCellValue('D' . $rowNumber, $job->min_salary);
            $sheet->setCellValue('E' . $rowNumber, $job->max_salary);
            $sheet->setCellValue('F' . $rowNumber, date('d-m-Y', strtotime($job->created_at)));
            $rowNumber++;
        }

        // Tạo response để tải file về
        $response = new StreamedResponse(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        });

        // Thiết lập header để tải file
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment; filename="jobs.xlsx"');

        return $response;
    }
}
