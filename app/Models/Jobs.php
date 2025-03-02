<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Jobs extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'title',
        'description',
        'start_at',
        'end_at',
        'status',
    ];


    static public function getRecord($request)
    {
        // $return=self::select('users.*')->orderBy('id','desc')->paginate(20);
        // return $return;
        $return = self::select('jobs.*');
        //search box start

        if (!empty(request()->get('title'))) {
            $return = $return->where('title', 'like', '%' . request()->get('titlle') . '%');
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

    public static function getJobWithAssignedUserById($id)
    {
        return self::with('assignedUsers')->find($id);
    }

    public function markAsProgress()
    {
        return self::update([
            'status' => 'in_progress',
        ]);
    }

    public function markAsOpen()
    {
        return self::update([
            'status' => 'open',
        ]);
    }

    public function markAsCompleted()
    {
        return self::update([
            'status' => 'completed',
        ]);
    }

    public function assignments()
    {
        return $this->hasMany(JobAssignment::class);
    }

    public function assignedUsers()
    {
        return $this->hasManyThrough(User::class, JobAssignment::class, 'job_id', 'id', 'id', 'user_id');
    }

    public function isAssignedTo($userId)
    {
        return $this->job_assignments->where('user_id', $userId)->isNotEmpty();
    }


}