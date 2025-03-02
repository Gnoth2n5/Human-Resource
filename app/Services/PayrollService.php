<?php

namespace App\Services;

use App\Models\Salary;
use App\Models\SalaryTransaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PayrollService
{
    public function calculateSalary(int $userId, float $bonus): float
    {
        $salary = Salary::where('user_id', $userId)->first();

        if (!$salary) {
            throw new \Exception("Salary record not found for user ID: {$userId}");
        }

        // Lấy giao dịch gần nhất của user
        $lastTransaction = SalaryTransaction::where('user_id', $userId)
            ->orderByDesc('paid_at')
            ->first();

        $baseSalary = $salary->base_salary;
        $daysInMonth = Carbon::now()->daysInMonth;

        if ($lastTransaction) {
            $lastPaidMonth = Carbon::parse($lastTransaction->paid_at)->format('Y-m');
            $currentMonth = Carbon::now()->format('Y-m');

            // Nếu đã có transaction trong tháng, tính lương theo số ngày từ lần trả trước đến hiện tại
            if ($lastPaidMonth === $currentMonth) {
                $daysWorked = Carbon::parse($lastTransaction->paid_at)->diffInDays(Carbon::now());
                $baseSalary = ($salary->base_salary / $daysInMonth) * $daysWorked;
            }
        } else {
            // Nếu chưa có transaction nào, tính từ đầu tháng đến hiện tại
            $startOfMonth = Carbon::now()->startOfMonth();
            $daysWorked = $startOfMonth->diffInDays(Carbon::now());
            $baseSalary = ($salary->base_salary / $daysInMonth) * $daysWorked;
        }

        return $baseSalary + $bonus;
    }

    public function processPayroll(int $userId, float $bonus): SalaryTransaction
    {
        return DB::transaction(function () use ($userId, $bonus) {
            $totalSalary = $this->calculateSalary($userId, $bonus);

            $transaction = SalaryTransaction::create([
                'user_id' => $userId,
                'bonus' => $bonus,
                'total_salary' => $totalSalary,
                'paid_at' => Carbon::now(),
            ]);

            return $transaction;
        });
    }
}
