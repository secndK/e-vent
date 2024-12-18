@extends('adminlte::page')

@section('title', 'Ajouter un Équipement')

@section('content_header')
    <h1>Ajouter un Équipement</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('equipements.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom de l'Équipement</label>
                <input type="text" name="name" class="form-control" placeholder="Nom de l'équipement" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Description" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('equipements.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@stop
