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

    public static function getRecord()
    {
        $return = self::select('users.*');

        // bỏ qua user admin
        $return = $return->where('is_role', '!=', 1);

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
        $return = $return->orderBy('id', 'desc')->paginate(10);
        return $return;
    }

    public static function saveUID($full_name, $id){
        $user = self::find($id);
        $user->uid = generateUID($full_name, $id);
        $user->save();
    }


    public static function get_user()
    {
        $return = self::with('department')
            ->select('users.*')
            ->where('is_role', '!=', 1)
            ->orderBy('id', 'desc')
            ->get()
            ->map(fn ($i) => [
                'id' => $i->id, // Giữ nguyên ID
                'display' => $i->uid . ' - ' . $i->full_name . ' - ' .($i->department?->name ?? 'Chưa phân ban') 
            ]);
        return $return;
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function get_job_single()
    {
        return $this->belongsTo(Jobs::class, "job_id");
    }

    public function jobAssignments()
    {
        return $this->hasMany(JobAssignment::class);
    }

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }

    public function salary_transactions()
    {
        return $this->hasMany(SalaryTransaction::class);
    }
}
