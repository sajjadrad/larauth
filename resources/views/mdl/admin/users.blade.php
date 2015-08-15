@extends('layouts.admin_master')
@section('router')
	<ul class="breadcrumbs">
      <li><a href="{{URL::to('')}}">Home</a></li>
      <li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}">Admin</a></li>
      <li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}/users">Users</a></li>
    </ul>
@endsection
@section('content')
	<div>
		@if(isset($messages) and $messages)
			@foreach($messages as $message)
				 <div class="label {{$message['type']}}">{{$message['msg']}}</div>
			@endforeach
		@endif
	</div>
	<div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col">
        	<form>
        		<div class="mdl-grid">
        			<div class="mdl-cell mdl-cell--8-col">
						<div class="mdl-textfield mdl-js-textfield">
							<input class="mdl-textfield__input" type="text" id="query" />
							<label class="mdl-textfield__label" for="query">Query</label>
						</div>
					</div>
					<div class="mdl-cell mdl-cell--4-col" style="padding-top:15px">
	                	<input type="submit" name="search" value="Search" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
	                </div>
                </div>
            </form>
        </div>
        <div class="mdl-cell mdl-cell--8-col">
        	<form action="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}/users?action=new" method="POST">
        		<div class="mdl-grid">
	        		<div class="mdl-cell mdl-cell--2-col">
		        		<div class="mdl-textfield mdl-js-textfield">
							<input class="mdl-textfield__input" name="email" type="text" id="email" />
							<label class="mdl-textfield__label" for="email">User email</label>
						</div>
					</div>
					<div class="mdl-cell mdl-cell--2-col">
						<div class="mdl-textfield mdl-js-textfield">
							<input class="mdl-textfield__input" name="password" type="password" id="password" />
							<label class="mdl-textfield__label" for="password">User password</label>
						</div>
					</div>
					<div class="mdl-cell mdl-cell--2-col">
						<div class="mdl-textfield mdl-js-textfield">
							<input class="mdl-textfield__input" name="firstname" type="text" id="firstname" />
							<label class="mdl-textfield__label" for="firstname">User firstname</label>
						</div>
					</div>
					<div class="mdl-cell mdl-cell--2-col">
						<div class="mdl-textfield mdl-js-textfield">
							<input class="mdl-textfield__input" name="lastname" type="text" id="lastname" />
							<label class="mdl-textfield__label" for="lastname">User lastname</label>
						</div>
					</div>
					<div class="mdl-cell mdl-cell--2-col" style="padding-top:25px">
						<select name="group">
							<option value="god">God</option>
							<option value="superadmin">Super Admin</option>
							<option value="admin">Admin</option>
							<option value="premium">Premium</option>
							<option value="user" selected="">User</option>
				        </select>
					</div>
					<div class="mdl-cell mdl-cell--2-col" style="padding-top:15px">
						<input type="submit" value="New user" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"/>
					</div>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
				
        </div>
    </div>
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
@endsection