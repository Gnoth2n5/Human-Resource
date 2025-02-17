<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountriesModel;
use App\Models\RegionsModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CountriesExport;
use Symfony\Component\HttpFoundation\StreamedResponse;



class CountriesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = CountriesModel::getRecord($request);
        return view('backend.countries.list', $data);
    }
    
    public function countries_export(Request $request)
    {
        $exporter = new CountriesExport();
        return $exporter->export();
    }

    public function add(Request $request)
    {
        $data['getRegions'] = RegionsModel::get();
        return view('backend.countries.add', $data);
    }

    public function add_post(Request $request)
    {
        $request->validate([
           'country_name' => 'required',
           'regions_id' => 'required',
        ]);

        $insert = new CountriesModel;
        $insert->country_name = $request->country_name;
        $insert->regions_id = $request->regions_id;
        $insert->save();

        return redirect('admin/countries')->with('success', 'Country Successfully added');
    }

    public function edit($id)
    {
        $data['getRecord'] = CountriesModel::findOrFail($id);
        $data['getRegions'] = RegionsModel::get();
        return view('backend.countries.edit', $data);
    }

    public function edit_update($id, Request $request)
    {
        $request->validate([
            'country_name' => 'required',
            'regions_id' => 'required',
         ]);
 
         $update = CountriesModel::findOrFail($id);
         $update->country_name = $request->country_name;
         $update->regions_id = $request->regions_id;
         $update->save();
 
         return redirect('admin/countries')->with('success', 'Country Successfully updated');
    }

    public function delete($id)
    {
        $deleteRecord = CountriesModel::findOrFail($id);
        $deleteRecord->delete();
        return redirect()->back()->with('error', 'Record Successfully deleted');
    }
}