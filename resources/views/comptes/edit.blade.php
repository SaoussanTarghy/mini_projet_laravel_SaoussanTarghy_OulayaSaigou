@extends('layouts')
@section('content')
<div class="container">
    <h2>Modifier Compte</h2>

    <form action="{{ route('comptes.update', $compte->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- RIB -->
        <div class="mb-3">
            <label>RIB :</label>
            <input type="text" class="form-control" name="rib" value="{{ $compte->rib }}">
        </div>

        <!-- Solde -->
        <div class="mb-3">
            <label>Solde :</label>
            <input type="number" class="form-control" name="solde" value="{{ $compte->solde }}" step="0.01">
        </div>

        <!-- Client -->
        <div class="mb-3">
            <label>Client :</label>
            <select name="user_id" class="form-control">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" 
                        {{ $compte->user_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }} {{ $client->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
