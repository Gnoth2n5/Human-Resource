<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaryTransaction;

class SalaryTransactionController extends Controller
{
    public function index()
    {
        $data['getRecord'] = SalaryTransaction::getRecord();

        return view('backend.history_salary.history', $data);
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
