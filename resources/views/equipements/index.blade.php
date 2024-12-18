@extends('adminlte::page')

@section('title', 'Liste des Équipements')

@section('content_header')
    <h1>Gestion des Équipements</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <!-- Bouton pour ouvrir le modal -->
        <button class="btn btn-success" data-toggle="modal" data-target="#modalCreateEquipement">Ajouter un Équipement</button>
    </div>

    <div class="modal fade" id="modalCreateEquipement" tabindex="-1" role="dialog" aria-labelledby="modalCreateEquipementLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateEquipementLabel">Ajouter un Équipement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipements as $equipement)
                <tr>
                    <td>{{ $equipement->id }}</td>
                    <td>{{ $equipement->name }}</td>
                    <td>{{ $equipement->description }}</td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditEquipement{{ $equipement->id }}">Modifier</button>


                        {{-- le modal de modification --}}
                        <!-- Modal de mise à jour de l'équipement -->
    <div class="modal fade" id="modalEditEquipement{{ $equipement->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditEquipementLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditEquipementLabel">Modifier l'Équipement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('equipements.update', $equipement->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nom">Nom de l'Équipement</label>
                            <input type="text" name="name" class="form-control" value="{{ $equipement->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ $equipement->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

                        <form action="{{ route('equipements.destroy', $equipement->id) }}" method="POST" style="display: inline-block;">
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
