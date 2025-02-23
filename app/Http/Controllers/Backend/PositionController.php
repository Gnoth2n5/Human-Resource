<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PositionModel;
use App\Exports\PositionExport;
use Maatwebsite\Excel\Facades\Excel;



class PositionController extends Controller
{
    public function index(Request $request) {
        $data['getRecord'] = PositionModel::getRecord($request);
        return view('backend.position.list', $data);
    }
    public function position_export(Request $request)
{
    $export = new PositionExport($request);
        return $export->export();
}

    public function add(Request $request)
    {
        return view('backend.position.add');
    }
    public function insert_add(Request $request)
    {
        $user = request()->validate([
            'position_name' => 'required',
            'daily_rate' => 'required',
            'monthly_rate' => 'required',
            'working_days_per_month' => 'required'
        ]);

        $user = new PositionModel;
        $user->position_name = trim($request->position_name);
        $user->daily_rate = trim($request->daily_rate);
        $user->monthly_rate = trim($request->monthly_rate);
        $user->working_days_per_month = trim($request->working_days_per_month);
        $user->save();

        return redirect('admin/position')->with('success', 'Thêm chức vụ thành công');
    }
    public function edit($id){
        $data['getRecord'] = PositionModel::find($id);
        return view('backend.position.edit', $data);
    }
    public function edit_update($id, Request $request)
{
    //dd($request->all());

    $user = PositionModel::find($id);
    $user->position_name = trim($request->position_name);
    $user->daily_rate = trim($request->daily_rate);
    $user->monthly_rate = trim($request->monthly_rate);
    $user->working_days_per_month = trim($request->working_days_per_month);
    $user->save();

    return redirect('admin/position')->with('success', 'Chức vụ sửa thành công');
}
public function delete($id){
    $user = PositionModel::find($id);
    $user->delete();
    return redirect()->back()->with('error', 'Record successfully delete');
}


}
