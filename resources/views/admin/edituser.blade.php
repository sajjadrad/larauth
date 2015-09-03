@extends('layouts.admin_master')
@section('router')
	<ul class="breadcrumbs">
      <li><a href="{{URL::to('')}}">Home</a></li>
      <li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}">Admin</a></li>
      <li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}/users">Users</a></li>
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
	<form action="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}/users/{{$user->id}}/edit" method="POST" autocomplete="off">
		<fieldset>
			<legend>Edit {{$user->first_name}}</legend>
			
				<div class="large-6 columns">
					<label>Firstname
						<input type="text" placeholder="Firstname" name="firstname" value="{{$user->first_name}}" />
					</label>
				</div>
				<div class="large-6 columns">
					<label>Lastname
						<input type="text" placeholder="Lastname" name="lastname" value="{{$user->last_name}}" />
					</label>
				</div>
				<div class="large-6 columns">
					<label>Password
						<input type="text" placeholder="Password" />
					</label>
				</div>
				<div class="large-6 columns">
					<label>Confirm Password
						<input type="text" placeholder="Confirm Password" />
					</label>
				</div>
				<div class="large-6 columns">
					<label>Email
						<input type="text" placeholder="User email address" value="{{$user->email}}" />
					</label>
				</div>
				<div class="large-6 columns">
					<label>Group
						<select name="group">
							<?php $flag = false; ?>
							@foreach($allGroups as $group)

								@if($group->hasAccess('user'))
									<option value="{{$group->id}}" @if(!$flag and $user->hasAccess(strtolower($group->name))) selected {{$flag = true}} @endif>{{$group->name}}</option>
								@endif
							@endforeach
						</select>
					</label>
				</div>
				<div class="large-6 columns">
					<input id="activate" type="checkbox" @if($user->activated) checked @endif name="activate" @if(!$hasPower) disabled @endif><label for="activate" >Activate</label>
				</div>
				<div class="large-12 columns">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" class="button" name="save" value="Save">
				</div>

		</fieldset>
	</form>
@endsection