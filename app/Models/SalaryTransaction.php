<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryTransaction extends Model
{
    use HasFactory;

    protected $table = 'salary_transactions';

    protected $fillable = ['user_id', 'bonus', 'total_salary', 'paid_at'];

    protected $dates = ['paid_at'];

    protected $casts = [
        'paid_at' => 'datetime:Y-m-d',
        'bonus' => 'float',
        'total_salary' => 'float',
    ];

    public static function getRecord()
    {
        $return = self::with(['user', 'salary'])->paginate(10);
        return $return;
    }

    public static function getRecordByUserId($id)
    {
        $return = self::with(['user', 'salary'])->where('user_id', $id)->paginate(10);
        return $return;
    }

    // Hàm này dùng để hiển thị lương theo định dạng tiền Việt
    public function getFormattedTotalSalaryAttribute()
    {
        return number_format($this->total_salary, 0, ',', '.') . ' VNĐ';
    }

    public function getFormattedBonusAttribute()
    {
        return number_format($this->bonus, 0, ',', '.') . ' VNĐ';
    }

    public function salary()
    {
        return $this->hasOne(Salary::class, 'user_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
