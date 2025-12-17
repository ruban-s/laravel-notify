@if (session()->has('notify'))
    @php
        $notificationModel = session()->get('notify.model');
    @endphp

    @if ($notificationModel)
        @include($notificationModel->getViewName())
    @endif

    <script>
        const notification = document.querySelector('div.notify');
        const notify = {
            timeout: "{{ config('notify.timeout') }}",
        }

        if (notification) {
            setTimeout(() => {
                notification.remove();
            }, notify.timeout);
        }
    </script>
@endif
