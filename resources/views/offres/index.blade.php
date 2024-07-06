@include('layouts.entete')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<main class="content-wrap container my-5">
    <header class="content-head d-flex justify-content-between align-items-center mb-4">
        <h1>Toutes les offres</h1>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="action">
            <a href="{{ route('offres.create') }}" class="btn btn-primary">Publier une offre</a>
        </div>
    </header>

    <div class="content">
        <section>
            @foreach ($offres as $offre)
            <div class="card w-75 border-primary mb-3">
                <div class="card-header text-center" style="background-color: white; height: 88px;;">
                    <div class="box-avatar d-flex align-items-left justify-content-left">
                        <!-- Utilisation de l'URL dynamique de l'avatar -->
                        <img src="./assets/profile.png" alt="" class="rounded-circle me-2" width="20" height="30">
                        <span>{{ $offre->user->name }}
                            <br>
                            <cite style="color: blue;">{{ $offre->entreprise }}</cite><br>
                            <cite class="blockquote-footer">{{ $offre->created_at->diffForHumans() }}</cite>

                        </span><br>
                        <strong style="font-size: large; margin-left: 100px;">{{ $offre->titre }}</strong>
                        <br>
                    </div>

                </div>
                <div class="card-body" style="background-color: white;">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $offre->description }}</p>
                        <footer class="blockquote-footer" style="color: black;">
                            <strong>Date limite :</strong> {{ $offre->date_limite }}
                        </footer>
                    </blockquote>
                </div>
                <div class="card-footer" style="background-color: white;">
                    @if ($offre->user_id !== auth()->user()->id)
                    <a href="{{ route('candidatures.create', $offre->id) }}" type="button" class="btn btn-success">
                        <i class="fa fa-user"></i> Postuler
                    </a>
                    @else
                    <a href="{{ route('offres.show', $offre->id) }}" type="button" class="btn btn-primary">
                        <i class="fa fa-eye"></i> Voir
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
            <div class="pagination d-flex justify-content-center">
                {{$offres->Links()}}
            </div>
        </section>
    </div>
</main>

<style>
    .box-avatar img {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }
</style>