<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="https://res.cloudinary.com/dhdn7ukv9/image/upload/v1648443952/Capture_fj9uqu.jpg" class="logo" alt="Bulakan Depot Logo">
{{-- {{ $slot }} --}}
@endif
</a>
</td>
</tr>
