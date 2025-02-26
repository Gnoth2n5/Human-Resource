<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    static public function getRecord()
    {
        // $return=self::select('users.*')->orderBy('id','desc')->paginate(20);
        // return $return;
        $return = self::select('users.*');
        //search box start
        if (!empty(request()->get('uid'))) {
            $return = $return->where('uid', '=', request()->get('uid'));
        }

        if (!empty(request()->get('full_name'))) {
            $return = $return->where('full_name', 'like', '%' . request()->get('full_name') . '%');
        }

        if (!empty(request()->get('email'))) {
            $return = $return->where('email', 'like', '%' . request()->get('email') . '%');
        }
        //search box end
        $return = $return->orderBy('id', 'desc')->paginate(5);
        return $return;

    }

    public function get_job_single(){
        return $this->belongsTo(JobsModel::class, "job_id");
    }

}
