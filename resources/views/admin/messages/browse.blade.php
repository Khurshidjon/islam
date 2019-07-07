@extends('layouts.admin')
@section('content')
	@php
		$lang = App::getLocale();
	@endphp
	<div class="main-content bg-white border-left">
		<div class="section__content section__content--p30 pb-5">
			<br>
			<br>
			<h4>Firstname:
				<span style="color: grey">
					{{ $message->firstname }}
				</span>
			</h4>
			<hr>
			<h4>Lastname:
				<span style="color: grey">
					{{ $message->lastname }}
				</span>
			</h4>
            <hr>
            <p style="color: black">Email:
                <span style="color: grey">
                    {{ $message->email }}
                </span>
            </p>
            <hr>
            <p style="color: black">Phone:
                <span style="color: grey">
                    {{ $message->phone }}
                </span>
            </p>
            <hr>
            <p style="color: black">Message:
                <span style="color: grey">
                    {{ $message->message }}
                </span>
            </p>
            <hr>
		</div>
	</div>

@endsection
