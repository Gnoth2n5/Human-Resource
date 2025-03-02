<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaryTransaction;
use Illuminate\Support\Facades\Auth;

class SalaryTransactionController extends Controller
{
    public function index()
    {
        if(Auth::user()->is_role == '1'){
            $data['getRecord'] = SalaryTransaction::getRecord();
            return view('backend.history_salary.history', $data);
        }else{
            $data['getRecord'] = SalaryTransaction::getRecordByUserId(auth()->user()->id);
            return view('backend.employee.salary.list', $data);
        }
        
    }

    public function delete($id)
    {
        $salary = SalaryTransaction::find($id);
        $delete = $salary->delete();

        if ($delete) {
            return redirect('admin/history-salary')->with('success', 'Record deleted successfully');
        } else {
            return redirect('admin/history-salary')->with('error', 'Record not deleted');
        }
    }
}
