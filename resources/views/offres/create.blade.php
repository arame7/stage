@include('layouts.entete')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<main class="content-wrap">
    <header class="content-head">
        <div class="container">
            <h1 class="mt-4 mb-6">Publier une offre</h1>
            <br>
            <br>

        </div>
    </header>

    <div class="container mt-5">
        <section>
            <form action="{{ route('offres.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="titre" class="form-label text-sm font-medium text-gray-700 dark:text-gray-300">Titre</label>
                    <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}">
                    @error('titre')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                    <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="entreprise" class="form-label text-sm font-medium text-gray-700 dark:text-gray-300">Entreprise</label>
                    <input type="text" name="entreprise" id="entreprise" class="form-control @error('entreprise') is-invalid @enderror" value="{{ old('entreprise') }}">
                    @error('entreprise')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="date_limite" class="form-label text-sm font-medium text-gray-700 dark:text-gray-300">Date Limite</label>
                    <input type="date" name="date_limite" id="date_limite" class="form-control @error('date_limite') is-invalid @enderror" value="{{ old('date_limite') }}">
                    @error('date_limite')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </section>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Exemple de validation en temps réel (facultatif)
        document.getElementById('titre').addEventListener('input', function() {
            if (this.value.length < 3) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
    });
</script>