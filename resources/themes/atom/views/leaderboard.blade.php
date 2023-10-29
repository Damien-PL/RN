<x-app-layout>
    @push('title', __('Leaderboard'))

    <div class="col-span-12">
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
         
            <x-leaderboard-card title="{{ __('Hours online') }}" icon="clock.gif" :data="$mostOnline" relationship="user" valueKey="online_time" valueType="Hours online" :formatValue="fn($value) => round($value / 3600)" />
            <x-leaderboard-card title="{{ __('Respects received') }}" icon="heart.gif" :data="$respectsReceived" relationship="user" valueKey="respects_received" valueType="Respect received" />
            <x-leaderboard-card title="{{ __('Achievement score') }}" icon="star.gif" :data="$achievementScores" relationship="user" valueKey="achievement_score" valueType="Achievement points" />
        </div>
    </div>
</x-app-layout>

