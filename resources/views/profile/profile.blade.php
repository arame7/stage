@include('layouts.entete')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container">
    <h1>Profil utilisateur</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="Post" action="{{ route('profile.update') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="tel" class="form-label">Numéro de téléphone</label>
            <input type="tel" class="form-control" id="tel" name="tel" value="{{ $user->tel }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <!-- Ajoutez d'autres champs selon les besoins -->
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
<hr>
    <h2> Mes Offres </h2>
    <ul class="list-group">
        @foreach ($offres as $offre)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>
                    <a href="{{ route('offres.show', $offre->id) }}">{{ $offre->titre }}</a>
                    <span class="text-muted"> ({{ $offre->created_at->format('d/m/Y') }})</span>
                </span>
                <span>
                    <a href="{{ route('offres.edit', $offre->id) }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('offres.destroy', $offre->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
</div>



