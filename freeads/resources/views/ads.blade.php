@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
        @if(session()->has('ok'))
            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
        @endif
                <div class="container">
                <div class="row" style="margin-top: 50px">
                <div class="col-lg-6 col-lg-offset-3">
                <form action="/search" method="post" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search Ads"><span class="input-group-btn"></span>
                        <button type="submit" class="btn btn-default">Recherche</button>
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des Annonces</h3>
            </div>
            <table class="table">
                    @if(isset($details))
                    <p>Liste des annonces pour : {{ $query }}</p>
                    @foreach($details as $ad)
                    <tr>
                        <td>{{$ad->titre}}</td>
                        <td>{{$ad->price}}€</td>
                    </tr>
                    @endforeach
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    @endif
                    @if(isset($ads))
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>prix</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    @foreach ($ads as $ad)
                        <tbody>
                        <tr>
                            <td>{!! $ad->id !!}</td>
                            <td class="text-primary"><strong>{!! $ad->titre !!}</strong></td>
                            <td class="text-primary">{!! $ad->price !!}€</td>
                            <td>{!! link_to_route('ads.show', 'Voir', [$ad->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                            <td>{!! link_to_route('ads.edit', 'Modifier', [$ad->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['ads.destroy', $ad->id]]) !!}
                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! link_to_route('ads.create', 'Ajouter une annonce', [], ['class' => 'btn btn-info pull-right']) !!}
        {!! $links !!}
                    @endif
        </div>
    </div>
@stop
