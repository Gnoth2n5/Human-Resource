<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        // Bảng job_grades (bậc công việc)
        Schema::create('job_grades', function (Blueprint $table) {
            $table->id();
            $table->string('grade_name');
            $table->decimal('salary_multiplier', 5, 2); // Hệ số nhân lương
            $table->timestamps();
        });

        // Bảng users (nhân viên)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'employee'])->default('employee');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->foreignId('job_grade_id')->nullable()->constrained('job_grades')->onDelete('set null');
            $table->timestamps();
        });


        // Bảng jobs (công việc)
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['open', 'in_progress', 'completed'])->default('open');
            $table->timestamp('start_at');
            $table->timestamp('end_at');
            $table->timestamps();
        });

        // Bảng job_assignments (phân công việc)
        Schema::create('job_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->text('note')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });

        // Bảng salaries (lương nhân viên)
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('base_salary', 10, 2);
            $table->timestamps();
        });

        // Bảng salary_transactions (lịch sử lương)
        Schema::create('salary_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('bonus', 10, 2)->default(0);
            $table->decimal('total_salary', 10, 2);
            $table->timestamp('paid_at');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('salary_transactions');
        Schema::dropIfExists('salaries');
        Schema::dropIfExists('job_assignments');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_grades');
        Schema::dropIfExists('users');
    }
};
