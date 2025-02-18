<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ManagerModel extends Model
{
    use HasFactory;

    protected $table = 'manager';
    static public function getRecord($request){
        $return = self::select('manager.*')
            ->orderBy('manager.id', 'desc');
            if (!empty(Request::get('id')))  
            {  
                $return = $return->where('manager.id', '=', Request::get('id'));  
            }  
            
            if (!empty(Request::get('manager_name')))  
            {  
                $return = $return->where('manager.manager_name', 'like', '%' . Request::get('manager_name') . '%');  
            }  
            
            if (!empty(Request::get('manager_email')))  
            {  
                $return = $return->where('manager.manager_email', 'like', '%' . Request::get('manager_email') . '%');  
            }
            if (!empty(Request::get('manager_mobile')))  
            {  
                $return = $return->where('manager.manager_mobile', 'like', '%' . Request::get('manager_mobile') . '%');  
            }
            
        $return = $return->paginate(20);
    
        return $return;
    }
    
}
