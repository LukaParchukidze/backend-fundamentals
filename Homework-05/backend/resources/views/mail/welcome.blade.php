@component('mail::message')
# Introduction

<p>Text: {{ $data['text'] }}</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
