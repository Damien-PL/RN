<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCurrency;
use App\Models\UserSetting;
use Illuminate\View\View;

class Leaderboard2Controller extends Controller
{
    public function __invoke(): View
    {
        $staffUserIds = User::query()
            ->select('id')
            ->where('rank', '>=', setting('min_staff_rank'))
            ->pluck('id');

        $getUserCurrency = fn($type) => UserCurrency::query()
            ->whereNotIn('user_id', $staffUserIds)
            ->where('type', $type)
            ->orderByDesc('amount')
            ->take(15)
            ->with('user:id,username,look')
            ->get();

        $getUserSettings = fn($column) => UserSetting::query()
         
            ->select('user_id', $column)
            ->orderByDesc($column)
            ->take(15)
            ->with('user:id,username,look')
            ->get();

        return view('leaderboard', [
            'credits' => User::query()
                ->whereNotIn('id', $staffUserIds)
                ->orderByDesc('credits')
                ->take(9)
                ->get(),
            'duckets' => $getUserCurrency(0),
            'diamonds' => $getUserCurrency(5),
            'mostOnline' => $getUserSettings('online_time'),
            'respectsReceived' => $getUserSettings('respects_received'),
            'achievementScores' => $getUserSettings('achievement_score'),
        ]);
    }
}
