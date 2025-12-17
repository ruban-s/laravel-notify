@props([
    'content',
])

<p @class([
    'mt-1 text-sm',
    'text-zinc-500' => config('notify.theme') === 'light',
    'text-zinc-400' => config('notify.theme') !== 'light',
])>
    {{ $content }}
</p>
