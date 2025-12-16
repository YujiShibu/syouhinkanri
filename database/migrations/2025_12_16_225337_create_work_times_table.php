<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('work_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ユーザーID（後でログインと紐づけ）
            $table->date('date');                  // 日付
            $table->time('start_time')->nullable(); // 出勤
            $table->time('end_time')->nullable();   // 退勤
            $table->time('rest_on')->nullable();    // 休憩（入）
            $table->time('rest_back')->nullable();  // 休憩（戻）
            $table->timestamps();                  // created_at / updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_times');
    }
};
