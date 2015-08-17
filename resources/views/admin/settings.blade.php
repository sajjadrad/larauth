@extends('layouts.admin_master')
@section('router')
	<ul class="breadcrumbs">
	  <li><a href="{{URL::to('')}}">Home</a></li>
	  <li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}">Admin</a></li>
	  <li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard').'/settings')}}">Settings</a></li>
	</ul>
@endsection
@section('content')
	@if(isset($messages) and $messages)
		<div>
			@foreach($messages as $message)
				 <div class="label {{$message['type']}}">{{$message['msg']}}</div>
			@endforeach
		</div>
	@endif
	<form action="{{URL::to(Config::get('app.settings.url.admin_dashboard').'/settings')}}" method="POST" autocomplete="off">
		<fieldset>
			<legend>{{Config::get('app.settings.app.title')}} Settings</legend>
				<div class="large-12 columns">
					<label>App Title
						<input type="text" placeholder="Firstname" value="{{Config::get('app.settings.app.title')}}" />
					</label>
				</div>
				<div class="large-4 columns">
					<div class="row collapse">
						<label>Admin dashboard URL</label>
						<div class="small-7 columns">
							<span class="prefix">{{URL::to('')}}/</span>
						</div>
						<div class="small-5 columns">
							<input type="text" placeholder="Admin dashboard" value="{{Config::get('app.settings.url.admin_dashboard')}}" />
						</div>
					</div>
				</div>
				<div class="large-4 columns">
					<div class="row collapse">
						<label>Register URL</label>
						<div class="small-7 columns">
							<span class="prefix">{{URL::to('')}}/</span>
						</div>
						<div class="small-5 columns">
							<input type="text" placeholder="Admin dashboard" value="{{Config::get('app.settings.url.register')}}" />
						</div>
					</div>
				</div>
				<div class="large-4 columns">
					<div class="row collapse">
						<label>Login URL</label>
						<div class="small-7 columns">
							<span class="prefix">{{URL::to('')}}/</span>
						</div>
						<div class="small-5 columns">
							<input type="text" placeholder="Admin dashboard" value="{{Config::get('app.settings.url.login')}}" />
						</div>
					</div>
				</div>
				<div class="large-3 columns">
					<input id="app_activate" type="checkbox"><label for="app_activate" >App Activate</label>
				</div>
				<div class="large-3 columns">
					<input id="login_activate" type="checkbox"><label for="login_activate" >Login Activate</label>
				</div>
				<div class="large-3 columns">
					<input id="register_activate" type="checkbox"><label for="register_activate" >Register Activate</label>
				</div>
				<div class="large-3 columns">
					<input id="activate" type="checkbox"><label for="activate" >Activate</label>
				</div>
				<div class="large-12 columns">
					<input type="submit" class="button" name="save" value="Save">
				</div>
		</fieldset>
	</form>
@endsection