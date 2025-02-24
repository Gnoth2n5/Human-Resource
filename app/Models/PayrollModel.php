<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;


class PayrollModel extends Model
{
    use HasFactory;

    protected $table = 'payroll';

    static public function getRecord(){
        // $return = self::select('payroll.*')
        //         ->orderBy('id', 'desc')
        //         ->paginate(20);

        //         return $return;
        $return = self::select('payroll.*', 'users.name')
                ->join('users', 'users.id', '=', 'payroll.employee_id')
                ->orderBy('payroll.id', 'asc');
                
                if (!empty(request()->get('id'))){
                    $return = $return->where('payroll.id', '=', request()->get('id'));
                }

                if (!empty(request()->get('employee_id'))){
                    $return = $return->where('users.name', 'like', '%'.request()->get('employee_id').'%');
                }

                if (!empty(request()->get('number_of_day_work'))){
                    $return = $return->where('payroll.name', 'like', '%'.request()->get('number_of_day_work').'%');
                }
                
                if (!empty(request()->get('bonus'))){
                    $return = $return->where('payroll.bonus', 'like', '%'.request()->get('bonus').'%');
                }

                if (!empty(request()->get('overtime'))){
                    $return = $return->where('payroll.overtime', 'like', '%'.request()->get('overtime').'%');
                }
                
                $return = $return->paginate(20);
                return $return;
    }

    public function get_employee_name(){
        return $this->belongsTo(User::class, 'employee_id');
    }
}