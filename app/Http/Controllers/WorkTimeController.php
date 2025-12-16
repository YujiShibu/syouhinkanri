<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkTime;
use Carbon\Carbon;

class WorkTimeController extends Controller
{
    // 出退勤画面表示
    public function index()
    {
        $now = Carbon::now();
        $today = $now->toDateString();

        // 仮で user_id = 1（ログイン実装前）
        $workTime = WorkTime::firstOrCreate(
            [
                'user_id' => 1,
                'date' => $today,
            ],
            [
                'start_time' => null,
                'end_time' => null,
                'rest_on' => null,
                'rest_back' => null,
            ]
        );

        return view('work_times.index', compact('now', 'workTime'));
    }

    // 出勤
    public function start()
    {
        $today = Carbon::today()->toDateString();

        WorkTime::where('user_id', 1)
            ->where('date', $today)
            ->update([
                'start_time' => Carbon::now()->toTimeString(),
            ]);

        return redirect()->back();
    }

    // 退勤
    public function end()
    {
        $today = Carbon::today()->toDateString();

        WorkTime::where('user_id', 1)
            ->where('date', $today)
            ->update([
                'end_time' => Carbon::now()->toTimeString(),
            ]);

        return redirect()->back();
    }

    // 休憩（入）
    public function restOn()
    {
        $today = Carbon::today()->toDateString();

        WorkTime::where('user_id', 1)
            ->where('date', $today)
            ->update([
                'rest_on' => Carbon::now()->toTimeString(),
            ]);

        return redirect()->back();
    }

    // 休憩（戻）
    public function restBack()
    {
        $today = Carbon::today()->toDateString();

        WorkTime::where('user_id', 1)
            ->where('date', $today)
            ->update([
                'rest_back' => Carbon::now()->toTimeString(),
            ]);

        return redirect()->back();
    }
}
