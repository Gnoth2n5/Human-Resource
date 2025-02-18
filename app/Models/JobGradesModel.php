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

                if(!empty(request()->get('grade_level')))
                {
                    $return = $return->where('grade_level', 'like', '%' .request()->get('grade_level'). '%');
                }

                if(!empty(request()->get('lowest_sal')))
                {
                    $return = $return->where('lowest_sal', 'like', '%' .request()->get('lowest_sal'). '%');
                }

                if(!empty(request()->get('highest_sal')))
                {
                    $return = $return->where('highest_sal', 'like', '%' .request()->get('highest_sal'). '%');
                }

                if(!empty(request()->get('updated_at')))
                {
                    $return = $return->where('updated_at', 'like', '%' .request()->get('updated_at'). '%');
                }
             
             // Search Box End
        $return = $return->orderBy('id', 'desc')  
                         ->paginate(20);
                    return $return; 
    }
}