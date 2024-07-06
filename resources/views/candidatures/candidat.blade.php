@extends('layouts.entete')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<main class="container my-4">
    <div class="card">
        <div class="card-header text-center">
            <h1>Détails de l'offre</h1>
        </div>
        <div class="card-body">
            <p><strong>Titre:</strong> {{ $offre->titre }}</p>
            <p><strong>Description:</strong> {{ $offre->description }}</p>
            <p><strong>Date Limite:</strong> {{ $offre->date_limite }}</p>
            <p><strong>Nombre de candidatures:</strong> {{ $offre->candidatures->count() }}</p>
            
            <h2>Candidatures</h2>
            @if($offre->candidatures->isEmpty())
                <p>Aucune candidature pour cette offre.</p>
            @else
                <ul class="list-group">
                    @foreach($offre->candidatures as $candidature)
                        <li class="list-group-item">
                            <strong>Nom:</strong> {{ $candidature->nom }}<br>
                            <strong>Email:</strong> {{ $candidature->email }}<br>
                            <a href="{{ Storage::url($candidature->cv) }}" target="_blank" class="btn btn-primary mt-2">Télécharger le CV</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</main>
@endsection

<style>
    h1 {
        font-size: 2.5em;
        text-align: center;
        margin-bottom: 20px;
    }
    .card {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-radius: 10px;
    }
    .card-header {
        background-color: #007bff;
        color: white;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
