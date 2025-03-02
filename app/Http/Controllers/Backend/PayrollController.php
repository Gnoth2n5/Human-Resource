<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Salary;
use App\Exports\PayrollExport;
use App\Services\PayrollService;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Storage;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Salary::getRecord();
        return view('backend.payroll.list', $data);
    }

    // public function payroll_export(Request $request)
    // {
    //     $export = new PayrollExport();
    //     return $export->export();
    // }

    public function add(Request $request)
    {
        $data['getEmployee'] = Salary::getEmployee();
        return view('backend.payroll.add', $data);
    }

    public function add_post(Request $request)
    {
        $salary = new Salary();
        $salary->user_id = trim($request->employee_id);
        $salary->base_salary = trim($request->base_salary);
        $salary->save();
        return redirect('admin/payroll')->with('success', 'Payroll Added Successfully');
    }

    public function view($id)
    {
        $data['getRecord'] = Salary::find($id);
        return view('backend.payroll.view', $data);
    }

    public function edit($id, Request $request)
    {
        $data['getRecord'] = Salary::with('user')->find($id);
        return view('backend.payroll.edit', $data);
    }
    
    public function update($id, Request $request)
    {
        $salary = Salary::find($id);
        $salary->base_salary = trim($request->base_salary);
        $salary->save();

        return redirect('admin/payroll')->with('success', 'Payroll update Successfully');
    }
    
    public function delete($id)
    {
        $recordDelete = Salary::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error','Payroll delete Successfully');
    }

    public function caculate($id)
    {
        $service = new PayrollService();
        $service->processPayroll($id, 0);
        return redirect('admin/history-salary')->with('success', 'Payroll caculate Successfully');
    }
}