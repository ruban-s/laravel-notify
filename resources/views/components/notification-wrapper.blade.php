@props([
    'model',
])

@php
    use Mckenziearts\Notify\Enums\NotificationModel;

    $timeout = ($model instanceof NotificationModel && $model === NotificationModel::Toast)
        || $model === 'toast'
        ? 500
        : 750;
@endphp

<div aria-live="assertive" class="notify pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start">
    <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => { show = true }, {{ $timeout }})"
            x-show="show"
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            {{ $attributes->merge(['class' => 'pointer-events-auto max-w-sm w-full shadow-lg outline-1 outline-black/5 transition duration-300 ease-out rounded-lg dark:bg-zinc-800 dark:-outline-offset-1 dark:outline-white/10']) }}
        >
            {{ $slot }}
        </div>
    </div>
</div>
