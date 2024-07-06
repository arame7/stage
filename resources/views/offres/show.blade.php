@include('layouts.entete')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-KY4b2eP1J2T/Nm+5N3IOuM0aKZfsZ0zrwrBX3uS4Z5zLdtF9hoev0kql9v0u5g5vZw4zg5H6LS5LhXkq4p4Yow==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<main class="container my-4">
    <div class="card">
        <div class="card-header text-center">
            <h1>Détails de l'offre</h1>
        </div>
        <div class="card-body">
            <p><strong>Titre:</strong> {{ $offre->titre }}</p>
            <p><strong>Date Limite:</strong> {{ $offre->date_limite }}</p>
            <p><strong>Nombre de candidatures:</strong> {{ $offre->candidature->count() }}</p>

            <h2>Candidatures</h2>
            @if($offre->candidature->isEmpty())
            <p>Aucune candidature pour cette offre.</p>
            @else
            <ul class="list-group">
                @foreach($offre->candidature as $candidature)
                <li class="list-group-item">
                    <strong>Nom:</strong> {{ $candidature->nom }}<br>
                    <strong>Email:</strong> {{ $candidature->email }}<br>
                    <a href="{{ Storage::url($candidature->cv) }}" target="_blank" class="btn btn-primary mt-2"><i class="fa fa-download"></i> Télécharger le CV</a>

                    <form action="{{ route('candidature.accepter', $candidature->id) }}" method="POST">
                        @csrf
                        <button type="submit">Accepter</button>
                    </form>
                    <form action="{{ route('candidature.refuser', $candidature->id) }}" method="POST">
                        @csrf
                        <button type="submit">Refuser</button>
                    </form>

                </li>
                @endforeach
            </ul>
            @endif
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
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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