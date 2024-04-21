@extends('email-notifications.layouts.body-email')
@section('content')

<br>
<div style="text-align:left; font-size: 24px; color: black; font-weight: bold;">
    {{ $data['heading'] }}
</div>

<div style="margin: bottom 5%;">
    <p>{!! $body !!}</p>
</div>

@endsection