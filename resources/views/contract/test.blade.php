@component('mail::message')
Date :- {{date("Y-m-d")}}

# Hello,{{$userName}}

<p>In the link below you have the collaboration contract that you ask to read and sign. You will also receive it by e-mail at the end in case you want to return to it.</p>

@component('mail::button', ['url' => $url])
	View Contract
@endcomponent

<p> Please let me know if you have any query in this regard. </p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
