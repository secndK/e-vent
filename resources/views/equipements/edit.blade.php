@extends('adminlte::page')

@section('title', 'Modifier un Équipement')

@section('content_header')
    <h1>Modifier un Équipement</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('equipements.update', $equipement->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom de l'Équipement</label>
                <input type="text" name="nom" class="form-control" value="{{ $equipement->name}}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="3" required>{{ $equipement->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à Jour</button>
            <a href="{{ route('equipements.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@stop
