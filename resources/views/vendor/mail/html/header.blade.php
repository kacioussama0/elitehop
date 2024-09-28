@props(['url'])
<tr>
<td class="header">
<img src="{{ Vite::asset('resources/imgs/logo/logo-white.svg') }}" height="50">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
