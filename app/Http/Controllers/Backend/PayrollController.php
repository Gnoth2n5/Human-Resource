<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayrollModel;
use App\Models\User;
use App\Exports\PayrollExport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Storage;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = PayrollModel::getRecord();
        return view('backend.payroll.list', $data);
    }

    public function payroll_export(Request $request)
    {
        $export = new PayrollExport();
        return $export->export();
    }

    public function add(Request $request)
    {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        return view('backend.payroll.add', $data);
    }

    public function insert_add(Request $request)
    {
        $user = new PayrollModel();
        $user->employee_id = trim($request->employee_id);
        $user->number_of_day_work = trim($request->number_of_day_work);
        $user->bonus = trim($request->bonus);
        $user->overtime = trim($request->overtime);
        $user->gross_salary = trim($request->gross_salary);
        $user->cash_advance = trim($request->cash_advance);
        $user->late_hours = trim($request->late_hours);
        $user->absent_days = trim($request->absent_days);
        $user->sss_contribution = trim($request->sss_contribution);
        $user->philhealth = trim($request->philhealth);
        $user->total_deductions = trim($request->total_deductions);
        $user->netpay = trim($request->netpay);
        $user->payroll_monthly = trim($request->payroll_monthly);
        $user->save();

        return redirect('admin/payroll')->with('success', 'Payroll Added Successfully');
    }

    public function view($id)
    {
        $data['getRecord'] = PayrollModel::find($id);
        return view('backend.payroll.view', $data);
    }

    public function edit($id, Request $request)
    {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        $data['getRecord'] = PayrollModel::find($id);
        return view('backend.payroll.edit', $data);
    }
    
    public function update($id, Request $request)
    {
        $user = PayrollModel::find($id);
        $user->employee_id = trim($request->employee_id);
        $user->number_of_day_work = trim($request->number_of_day_work);
        $user->bonus = trim($request->bonus);
        $user->overtime = trim($request->overtime);
        $user->gross_salary = trim($request->gross_salary);
        $user->cash_advance = trim($request->cash_advance);
        $user->late_hours = trim($request->late_hours);
        $user->absent_days = trim($request->absent_days);
        $user->sss_contribution = trim($request->sss_contribution);
        $user->philhealth = trim($request->philhealth);
        $user->total_deductions = trim($request->total_deductions);
        $user->netpay = trim($request->netpay);
        $user->payroll_monthly = trim($request->payroll_monthly);
        $user->save();

        return redirect('admin/payroll')->with('success', 'Payroll update Successfully');
    }
    
    public function delete($id)
    {
        $recordDelete = PayrollModel::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error','Payroll delete Successfully');
    }
}