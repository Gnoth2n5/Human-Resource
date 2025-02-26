<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class JobGradesModel extends Model
{
    use HasFactory;

    protected $table = 'job_grades';

    static public function getRecord($request)
    {
        // $return = self::select('job_grades.*')
        //         ->orderBy('id', 'desc')
        //         ->paginate(20);
        //  return $return;
        
        $return = self::select('job_grades.*');

             // Search Box Start
                if(!empty(request()->get('id')))
                {
                    $return = $return->where('id', '=', request()->get('id'));
                }

                if(!empty(request()->get('grade_name')))
                {
                    $return = $return->where('grade_name', 'like', '%' .request()->get('grade_name'). '%');
                }

                if(!empty(request()->get('salary_multiplier')))
                {
                    $return = $return->where('salary_multiplier', 'like', '%' .request()->get('salary_multiplier'). '%');
                }

              
             
             // Search Box End
        $return = $return->orderBy('id', 'desc')  
                         ->paginate(20);
                    return $return; 
    }
}