<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAssignment extends Model
{
    use HasFactory;

    protected $table = 'job_assignments';

    protected $fillable = [
        'user_id',
        'job_id',
        'status',
        'note',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    // Quan hệ với User (nhân viên)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với Job (công việc)
    public function job()
    {
        return $this->belongsTo(JobsModel::class);
    }

    public static function assignJob($userId, $jobId)
    {
        return self::create([
            'user_id' => $userId,
            'job_id' => $jobId,
            'status' => 'pending', // Mặc định khi phân công
        ]);
    }


    // Kiểm tra xem công việc đã hoàn thành hay chưa
    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    // Đánh dấu công việc là hoàn thành
    public function markAsCompleted($note = null)
    {
        $this->update([
            'status' => 'completed',
            'note' => $note,
            'completed_at' => now(),
        ]);
    }
}
