<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table = 'salaries';

    protected $fillable = ['user_id', 'base_salary'];

    protected $casts = [
        'base_salary' => 'float',
    ];

    public static function getRecord()
    {
        $return = self::select('salaries.*');

        return self::with('user')->paginate(5);
    }

    public static function getEmployee()
    {
        return User::whereDoesntHave('salary')->where('is_role', '!=', '1')->get();
    }

    // Hàm này dùng để hiển thị lương theo định dạng tiền Việt
    public function getFormattedBaseSalaryAttribute()
    {
        return number_format($this->base_salary, 0, ',', '.') . ' VNĐ';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
