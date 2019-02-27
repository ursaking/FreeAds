@extends('layouts.app')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification d'un utilisateur</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($ads, ['route' => ['ads.update', $ads->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
					  	{!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
					  	{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
					  	{!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
					  	{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
					  	{!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Prix']) !!}
					  	{!! $errors->first('price', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('pics') ? 'has-error' : '' !!}">
					  	{!! Form::file('pics', null, ['class' => 'form-control', 'placeholder' => 'Add pics']) !!}
					  	{!! $errors->first('Pics', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
							</label>
						</div>
					</div>
						{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop