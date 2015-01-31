@extends('layout.default')
@section ('content')
<h1>Edit new user</h1>
{{ Form::open(['method'=>'PUT','route'=> array('user.update', $users->id)]) }}
	<div>
	{{Form::label('username','Username:') }}
	{{Form::text('username', $value= $users->username) }}
	{{ $errors->first('username') }}
	</div>

	<div>
	{{Form::label('email','Email:') }}
	{{Form::email('email', $value=$users->email) }}
	{{ $errors->first('email') }}
	</div>

	<div>
	{{Form::submit('Edit User') }}
	</div>


{{ Form::close() }}
@stop
