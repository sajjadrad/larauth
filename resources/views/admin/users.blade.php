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
	<div class="large-3 columns">
		<fieldset>
			<legend>Search</legend>
			<div class="small-7 columns">
				<input class="" type="text" id="query" />
			</div>
			<div class="small-5 columns">
				<input type="submit" name="search" value="Search" class="button tiny">
			</div>
		</fieldset>
	</div>
	<div class="large-9 columns">
		<form action="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}/users?action=new" method="POST">
			<fieldset>
				<legend>New user</legend>
				<div class="large-2 columns">
					<input placeholder="Email" name="email" type="text" id="email" />
				</div>
				<div class="large-2 columns">
					<input placeholder="Password" name="password" type="password" id="password" />
				</div>
				<div class="large-2 columns">
					<input placeholder="Firstname" name="firstname" type="text" id="firstname" />
				</div>
				<div class="large-2 columns">
					<input placeholder="Lastname" name="lastname" type="text" id="lastname" />
				</div>
				<div class="large-2 columns">
					<select name="group">
						<option value="god">God</option>
						<option value="superadmin">Super Admin</option>
						<option value="admin">Admin</option>
						<option value="premium">Premium</option>
						<option value="user" selected="">User</option>
			        </select>
				</div>
				<div class="large-2 columns">
					<input type="submit" name="create" value="Create" class="button tiny">
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</fieldset>
		</form>
	</div>
	<div class="large-12 columns">
		<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
		  <thead>
		    <tr>
		    	<th width="50">ID</th>
			    <th width="25%">Fullname</th>
			    <th width="25%">Email</th>
			    <th width="50%">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->first_name}} {{$user->last_name}}</td>
					<td>{{$user->email}}</td>
					<td>
						<ul class="button-group radius">
							<li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}/users/{{$user->id}}/edit" class="button tiny success">Edit</a></li>
							<li>
								<form action="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}/users/delete" method="POST">
									<input type="hidden" value="{{$user->id}}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="submit" class="button tiny alert" value="Delete">
								</form>
							</li>
						</ul>
					</td>
				</tr>
			@endforeach
		  </tbody>
		</table>
	</div>
@endsection