<x-mail::message>

Hello, {{ $email }} <br>
Your password: {{ $password }}

<x-mail::button :url="route('main.index')">
    Site
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
