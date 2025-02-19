<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;


class CountriesModel extends Model
{
    use HasFactory;

    protected $table = 'countries';

    static public function getRecord($request)
    {
        $return = self::select('countries.*', 'regions.region_name')
                    ->join('regions', 'regions.id', '=', 'countries.regions_id')
                    ->orderBy('id', 'desc');
        // Search Start    
        if(!empty(request()->get('id')))
        {
            $return = $return->where('countries.id', '=', request()->get('id'));
        }
        if(!empty(request()->get('country_name')))
        {
            $return = $return->where('countries.country_name', 'like', '%' .request()->get('country_name'). '%');
        }
        if(!empty(request()->get('region_name')))
        {
            $return = $return->where('regions.region_name', 'like', '%' .request()->get('region_name'). '%');
        }
        if(!empty(request()->get('start_date')) && !empty(request()->get('end_date')))
        {
            $return = $return->whereBetween('countries.created_at', '>=', request()->get('start_date')->where('countries.created_at', '<=', request()->get('end_date')));
        }
        
        
        // Search End
        
        $return = $return->paginate(20);
                    return $return;

    }

    public function get_region_name(){
        return $this->belongsTo(RegionsModel::class, 'regions_id');
    }
}