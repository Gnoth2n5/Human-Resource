<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    static public function getRecord($request)
    {
        // $return = self::select('departments.*')
        //         ->orderBy('id', 'desc')
        //         ->paginate(20);
        //  return $return;

        $return = self::select('departments.*');

        // Search Box Start
        if (!empty(request()->get('id'))) {
            $return = $return->where('id', '=', request()->get('id'));
        }

        if (!empty(request()->get('name'))) {
            $return = $return->where('name', 'like', '%' . request()->get('name') . '%');
        }

        if (!empty(request()->get('location'))) {
            $return = $return->where('location', 'like', '%' . request()->get('location') . '%');
        }

        // Search Box End
        $return = $return->orderBy('id', 'desc')
            ->paginate(5);
        return $return;
    }


    public function user()
    {
        return $this->hasMany('App\Models\User', 'department_id', 'id');
    }
}
