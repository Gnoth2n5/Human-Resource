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

        if (!empty(request()->get('titlle'))) {
            $return = $return->where('titlle', 'like', '%' . request()->get('titlle') . '%');
        }

        if (!empty(request()->get('description'))) {
            $return = $return->where('description', 'like', '%' . request()->get('description') . '%');
        }
        if (!empty(request()->get('status'))) {
            $return = $return->where('status', 'like', '%' . request()->get('status') . '%');
        }

        if(!empty(request()->get('start_at')) && !empty(request()->get('end_at'))) {
            $return = $return->where('jobs.start_at', '>=', request()->get('start_at'))->where('jobs.end_at', '<=', request()->get('end_at'));
        }

        //search box end
        $return = $return->orderBy('id', 'desc')->paginate(10);
        return $return;

    }
}