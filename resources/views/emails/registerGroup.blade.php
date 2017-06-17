@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => URL::to('/members/token/' . $groupToken) ])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
