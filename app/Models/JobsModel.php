<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class JobsModel extends Model
{
    use HasFactory;

    protected $table = 'jobs';


    static public function getRecord($request)
    {
        // $return=self::select('users.*')->orderBy('id','desc')->paginate(20);
        // return $return;
        $return = self::select('jobs.*');
        //search box start
        if (!empty(request()->get('id'))) {
            $return = $return->where('id', '=', request()->get('id'));
        }

        if (!empty(request()->get('job_titlle'))) {
            $return = $return->where('job_titlle', 'like', '%' . request()->get('job_titlle') . '%');
        }

        if (!empty(request()->get('min_salary'))) {
            $return = $return->where('min_salary', 'like', '%' . request()->get('min_salary') . '%');
        }
        if (!empty(request()->get('max_salary'))) {
            $return = $return->where('max_salary', 'like', '%' . request()->get('max_salary') . '%');
        }

        if(!empty(request()->get('start_date')) && !empty(request()->get('end_date'))) {
            $return = $return->where('jobs.created_at', '>=', request()->get('start_date'))->where('jobs.created_at', '<=', request()->get('end_date'));
        }

        //search box end
        $return = $return->orderBy('id', 'desc')->paginate(20);
        return $return;

    }
}