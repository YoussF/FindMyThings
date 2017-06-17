@component('mail::message')
# Introduction

The body of your message.



@component('mail::button', ['url' => URL::to('register/verify/' . $user->validation_token) ])
confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

