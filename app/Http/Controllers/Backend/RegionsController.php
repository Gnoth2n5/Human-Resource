<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegionsModel;

class RegionsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = RegionsModel::getRecord($request);
        return view('backend.regions.list', $data);
    }
    
    public function add(Request $request)
    {
        return view('backend.regions.add');
    }

    public function add_post(Request $request)
    {
        // dd($request->all());
        
        $user = request()->validate([
           'region_name' => 'required',
        ]);

        
        $user = new RegionsModel;
        $user->region_name = trim($request->region_name);
        $user->save();

        return redirect('admin/regions')->with('success', 'Regions Successfully add');
    }

    public function edit($id, Request $request){
        $data['getRecord'] = RegionsModel::find($id);
        return view('backend.regions.edit', $data);
    }

    public function edit_update($id, Request $request){
        $user = RegionsModel::find($id);
        $user->region_name = trim($request->region_name);
        $user->save();

        return redirect('admin/regions')->with('success', 'Regions Successfully Update');
    }

    public function delete($id){
        $user = RegionsModel::find($id);
        $user->delete();
        return redirect()->back()->with('error', 'Record Successfully deleted');
    }
}