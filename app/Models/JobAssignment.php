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
        return $this->belongsTo(Jobs::class);
    }

    public static function assignOrUpdateJob($userId, $jobId)
    {
        // Nếu $userId rỗng hoặc bằng 0, xóa phân công và mở lại công việc
        if (empty($userId) || $userId == 0) {
            JobAssignment::where('job_id', $jobId)->delete();
            Jobs::find($jobId)->markAsOpen();
            return;
        }

        // Cập nhật hoặc tạo mới JobAssignment
        JobAssignment::updateOrCreate(
            ['job_id' => $jobId], // Điều kiện tìm kiếm
            [
                'user_id' => $userId,
                'status' => 'in_progress'
            ] // Dữ liệu cập nhật hoặc tạo mới
        );

        // Cập nhật trạng thái công việc
        Jobs::find($jobId)->markAsProgress();
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
