@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://i.ibb.co/yVx4FH3/atomik-white-transparent.png" class="logo" alt="Atomik Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
