<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;


class RegionsModel extends Model
{
    use HasFactory;

    protected $table = 'regions';

    static function getRecord($request)
    {
        $return = self::select('regions.*')
            ->orderBy('regions.id', 'desc');
            
        // Search Box Start

        if(!empty(request()->get('id')))
        {
            $return = $return->where('id', '=', request()->get('id'));
        }

        if(!empty(request()->get('region_name')))
        {
            $return = $return->where('region_name', 'like', '%' .request()->get('region_name'). '%');
        }
        // Search Box End
            
            $return = $return->paginate(20);
            return $return;

    }
}