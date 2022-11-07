{{ trans('auth.authenticating_requests') }}

@if(!$isAuthed)
{{ trans('auth.this_api_is_not_authenticated') }}
@else
{!! $authDescription !!}

{!! $extraAuthInfo !!}
@endif
