@extends('adminlte::page')

@section('title', 'Liste des Utilisateurs')

@section('content_header')
    <h1>Gestion des Utilisateurs</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('utilisateurs.create') }}" class="btn btn-success">Ajouter un Utilisateur</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->id }}</td>
                    <td>{{ $utilisateur->nom }}</td>
                    <td>{{ $utilisateur->email }}</td>
                    <td>
                        <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
