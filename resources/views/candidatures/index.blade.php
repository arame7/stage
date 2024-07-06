@include('layouts.entete')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<main class="container my-4">
    <div class="card">
        <div class="card-header text-center">
            <h1>Mes Candidatures</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="card-body">
            @if($candidatures->isEmpty())
            <p>Aucune candidature soumise.</p>
            @else
            <ul class="list-group">
                @foreach($candidatures as $candidature)
                <li class="list-group-item">
                    <strong>Offre:</strong> <a href="{{ route('offres.show', $candidature->offre->id) }}">{{ $candidature->offre->titre }}</a><br>
                    <strong>Statut:</strong>
                    @if( $candidature->statut == 1 )
                    <em style="color: green;">Acceptée</em>
                    @endif
                    @if( $candidature->statut == 0 )
                    <em style="color: blue;">En cours de traitement</em>
                    @endif
                    <br>
                    <strong>Soumis le:</strong> {{ $candidature->created_at->format('d/m/Y') }}<br>
                    <a href="{{ Storage::url($candidature->cv) }}" target="_blank" class="btn btn-primary mt-2">Télécharger le CV</a>
                    <!-- annuler une candidature -->



                    <a href="{{ route('candidatures.destroy', $candidature->id) }}" class="btn btn-danger mt-2" onclick="event.preventDefault();
            if (confirm('Êtes-vous sûr de vouloir annuler cette candidature ?')) {
                document.getElementById('delete-candidature-form-{{ $candidature->id }}').submit();
            }">
                        Annuler
                    </a>

                    <form id="delete-candidature-form-{{ $candidature->id }}" action="{{ route('candidatures.destroy', $candidature->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
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