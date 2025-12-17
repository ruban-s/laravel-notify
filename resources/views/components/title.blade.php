@props([
    'title',
])

<p @class([
    'text-sm font-medium',
    'text-zinc-900' => config('notify.theme') === 'light',
    'text-white' => config('notify.theme') !== 'light',
])>
    {{ $title }}
</p>
