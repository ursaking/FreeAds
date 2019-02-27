@extends('layouts.app')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Fiche d'utilisateur</div>
			<div class="panel-body">
				<p>Titre : {{ $ads->titre }}</p>
				<p>Description : {{ $ads->description }}</p>
				<p>Prix : {{ $ads->price }} €</p>
				<img src="{{ URL::to('/') . $ads->pics}}">
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop