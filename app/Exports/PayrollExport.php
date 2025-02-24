<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\PayrollModel;

class PayrollExport
{
    /**
     * Xuất dữ liệu Payroll ra file Excel.
     */
    public function export()
    {
        // Tạo một đối tượng Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Thiết lập tiêu đề cột
        $headings = ['ID', 'Employee Name', 'Number Of Day Work', 'Bonus', 'Overtime'];
        $sheet->fromArray([$headings], null, 'A1');

        // Lấy dữ liệu từ database
        $payrolls = PayrollModel::select('id', 'employee_id', 'number_of_day_work', 'bonus', 'overtime')->get();

        // Ghi dữ liệu vào sheet
        $row = 2; // Bắt đầu từ dòng thứ 2 do dòng 1 là tiêu đề
        foreach ($payrolls as $payroll) {
            $sheet->fromArray([
                [$payroll->id, $payroll->employee_name, $payroll->number_of_day_work, $payroll->bonus, $payroll->overtime]
            ], null, "A$row");
            $row++;
        }

        // Xuất file Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = 'payroll_export.xlsx';
        $filePath = storage_path('app/' . $fileName);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}