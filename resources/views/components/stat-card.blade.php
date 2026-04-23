@props([
    'label',
    'value',
    'tone' => 'blue',
])

<div class="kaizen-stat-card kaizen-stat-card-{{ $tone }} rounded-[28px] border border-white/60 p-5 shadow-[0_18px_45px_rgba(15,23,42,0.08)] backdrop-blur-xl">
    <div class="flex items-start justify-between gap-4">
        <div>
            <p class="text-sm font-medium text-slate-500">{{ $label }}</p>
            <p class="mt-3 text-3xl font-semibold tracking-tight text-slate-900">{{ $value }}</p>
        </div>
        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-white/80 shadow-sm">
            <span class="h-3 w-3 rounded-full bg-current opacity-80"></span>
        </span>
    </div>
</div>
