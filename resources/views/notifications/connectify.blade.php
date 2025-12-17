@php
    use Mckenziearts\Notify\Enums\NotificationType;
    use Mckenziearts\Notify\Enums\NotificationModel;
@endphp

<x-notify::notification-wrapper
    :model="NotificationModel::Connect"
    @class([
        'border-t-4',
        'bg-white' => config('notify.theme') === 'light',
        'bg-zinc-800' => config('notify.theme') !== 'light',
        'border-green-600' => session()->get('notify.type') === NotificationType::Success,
        'border-red-600' => session()->get('notify.type') === NotificationType::Error,
    ])
>
    <div class="p-4">
        <div class="flex items-start">
            <div @class([
                'inline-flex items-center p-2 text-white text-sm rounded-full shrink-0',
                'bg-linear-to-r from-green-600 to-green-800' => session()->get('notify.type') === NotificationType::Success,
                'bg-linear-to-r from-red-600 to-red-800' => session()->get('notify.type') === NotificationType::Error,
            ])>
                <x-notify::icon
                    :name="session()->get('notify.icon')"
                    class="size-5"
                    aria-hidden="true"
                />
            </div>

            <div class="ml-3 w-0 flex-1 pt-0.5">
                <x-notify::title :title="session()->get('notify.title')" />

                @if (session()->get('notify.message'))
                    <x-notify::content :content="session()->get('notify.message')" />
                @endif
            </div>
            <div class="ml-4 shrink-0 flex">
                <x-notify::button />
            </div>
        </div>
    </div>
</x-notify::notification-wrapper>
