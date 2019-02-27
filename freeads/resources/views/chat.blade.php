@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
        @if(session()->has('ok'))
            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Message</h3>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Message</th>
                        <th>Nom</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($messages as $user)
                        <tr>
                            <td>{!! $user->id !!}</td>
                            <td class="text-primary"><strong>{!! $user->user_id !!}</strong></td>
                            <!-- <td>{!! link_to_route('chats.show', 'Voir', [$user->id], ['class' => 'btn btn-success btn-block']) !!}</td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {!! link_to_route('chats.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-info pull-right']) !!}
        {!! $links !!}
    </div>
@stop
