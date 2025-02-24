<?php

namespace App\Exports;

use App\Models\CountriesModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;


class CountriesExport
{
    public function export()
    {
        $request = request()->all();
        $countries = CountriesModel::get();

        // Tạo file Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Thêm tiêu đề
        $headings = ['ID', 'Country Name', 'Regions Name', 'Created At', 'Updated At'];
        $sheet->fromArray([$headings], null, 'A1');

        // Thêm dữ liệu
        $rowNumber = 2;
        foreach ($countries as $country) {
            $sheet->setCellValue('A' . $rowNumber, $country->id);
            $sheet->setCellValue('B' . $rowNumber, $country->country_name);
            $sheet->setCellValue('C' . $rowNumber, $country->region->region_name ?? 'N/A');
            $sheet->setCellValue('D' . $rowNumber, date('d-m-Y', strtotime($country->created_at)));
            $sheet->setCellValue('E' . $rowNumber, date('d-m-Y', strtotime($country->updated_at)));
            $rowNumber++;
        }

        // Tạo response để tải file về
        $response = new StreamedResponse(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        });

        // Thiết lập header để tải file
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment; filename="countries.xlsx"');

        return $response;
    }
}