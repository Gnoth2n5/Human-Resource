<?php

namespace App\Exports;

use App\Models\LocationsModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LocationsExport
{
    public function export()
    {
        $request = Request::all();
        $locations = LocationsModel::getRecord($request);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Thêm tiêu đề cột
        $headings = ['S.No', 'Table ID', 'Vị trí đường', 'Mã Bưu Điện', 'Thành phố', 'Tỉnh', 'Quốc gia', 'Created At'];
        $sheet->fromArray([$headings], null, 'A1');

        $row = 2;
        $index = 1;

        foreach ($locations as $location) {
            $createdAtFormat = date('d-m-Y', strtotime($location->created_at));

            $data = [
                $index++,
                $location->id,
                $location->street_address,
                $location->postal_code,
                $location->city,
                $location->state_province,
                $location->country_name,
                $createdAtFormat
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
            'Content-Disposition' => 'attachment;filename="locations.xlsx"',
            'Cache-Control' => 'max-age=0'
        ]);
    }
}
