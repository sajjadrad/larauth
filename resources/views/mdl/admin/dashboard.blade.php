@extends('layouts.admin_master')
@section('router')
	<ul class="breadcrumbs">
	  <li><a href="{{URL::to('')}}">Home</a></li>
	  <li><a href="{{URL::to(Config::get('app.settings.url.admin_dashboard'))}}">Admin</a></li>
	</ul>
@endsection
@section('content')
    Welcome to panel
@endsection