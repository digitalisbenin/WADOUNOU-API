@component('mail::message')
    <h1> {{  trans('messages.thanking') }} {{config('app.name') }} !</h1>
    <p>{{ trans('messages.verify_mail_label') }}</p>
    @component('mail::button', ['url' => $data['url']])
        {{ trans('messages.verify_mail_action')}}
    @endcomponent
    <p>{{ trans('messages.email_verify_no_action_required') }}</p>
@endcomponent
