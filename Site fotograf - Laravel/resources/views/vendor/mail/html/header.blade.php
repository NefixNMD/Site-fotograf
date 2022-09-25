<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img height='75' padding='5px' src='https://res.cloudinary.com/dt9csqsix/image/upload/v1654335313/Marian_Victor_Photograpfy_-_black_wpzivb.png' width='200'  alt="Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
