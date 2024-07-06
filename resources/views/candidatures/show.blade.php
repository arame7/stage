@include('layouts.entete')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<main class="container my-4">
    <div class="card">
        <div class="card-header text-center">
            <h1>Détails de la candidature</h1>
        </div>
        <div class="card-body">
            <p><strong>Nom:</strong> {{ $candidature->nom }}</p>
            <p><strong>Email:</strong> {{ $candidature->email }}</p>
            <p><strong>CV:</strong> <a href="{{ Storage::url($candidature->cv) }}" target="_blank" class="btn btn-primary">Télécharger le CV</a></p>
            <p><strong>Offre:</strong> <a href="{{ route('offres.show', $candidature->offre->id) }}">{{ $candidature->offre->titre }}</a></p>
        </div>
    </div>
</main>
 
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
