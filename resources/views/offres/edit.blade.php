@include('layouts.entete')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<main class="content-wrap container my-5">
<div class="content">
    <h1>Modifier</h1>

    <form action="{{ route('offres.update', $offre->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $offre->titre }}">

        </div>
        <div class="mb-4">
            <label for="description" class="form-labe">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control " value="{{ $offre->description}}">{{ $offre->description }}</textarea>

        </div>
        <div class="mb-4">
            <label for="entreprise" class="form-label text-sm font-medium text-gray-700 dark:text-gray-300">Entreprise</label>
            <input type="text" name="entreprise" id="entreprise" class="form-control @error('entreprise') is-invalid @enderror" value="{{ old('entreprise', $offre->entreprise) }}">
            @error('entreprise')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="date_limite" class="form-label text-sm font-medium text-gray-700 dark:text-gray-300">Date Limite</label>
            <input type="date" name="date_limite" id="date_limite" class="form-control @error('date_limite') is-invalid @enderror" value="{{ old('date_limite', $offre->date_limite) }}">
            @error('date_limite')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>

</div>
</main>