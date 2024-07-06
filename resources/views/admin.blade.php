<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sama stage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="dashboard">
        <aside class="search-wrap">
            <div class="search">
                <label for="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
                    </svg>
                    <input type="text" id="search">
                </label>
            </div>

            <div class="user-actions d-flex">
                <a href="" type="button" class="btn btn-outline-primary">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fa fa-sign-out"></i>
                    </button>
                </form>

            </div>
        </aside>

        <header class="menu-wrap">
            <figure class="user">
                <div class="user-avatar">
                    <img src="https://images.unsplash.com/photo-1440589473619-3cde28941638?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=42ebdb92a644e864e032a2ebccaa25b6&auto=format&fit=crop&w=100&q=80" alt="Amanda King">
                </div>
                <figcaption>
                    {{ Auth::user()->name }}
                </figcaption>
            </figure>

            <nav>
                <section class="dicover">
                    <h3>DÉCOUVRIR</h3>

                  
                      
                
                </section>




            </nav>
        </header>

    <h1>Liste des offres</h1>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date de création</th>
            </tr>
        </thead>
        <tbody>
            @foreach($offres as $offre)
                <tr>
                    <td>{{ $offre->title }}</td>
                    <td>{{ $offre->description }}</td>
                    <td>{{ $offre->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
