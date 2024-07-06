@include('layouts.entete')

<main class="content-wrap">
    <header class="content-head">
        <div class="container">
            <h1 class="mt-4 mb-6">Postuler pour une offre</h1>
            <br>
            <br>
           
        </div>
    </header>

    <div class="container mt-5">
        <section>
            <form action="{{ route('candidatures.store') }}" method="POST" enctype="multipart/form-data" class="custom-form">
                @csrf
                <div class="form-group">
                    <label for="offre_id">Offre:</label>
                    <select name="offre_id" id="offre_id" class="form-control">
                        @foreach ($offres as $offre)
                            <option value="{{ $offre->id }}">{{ $offre->titre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{Auth::user()->name}}">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}" >
                </div>

                <div class="form-group">
                    <label for="cv">CV:</label>
                    <input type="file" name="cv" id="cv" class="form-control">
                </div>

                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" class="form-control">

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Postuler</button>
                </div>
            </form>
        </section>
    </div>
</main>

<style>
    /* Styles for custom form */
    .custom-form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .custom-form .form-group {
        margin-bottom: 20px;
    }

    .custom-form label {
        font-weight: bold;
        color: #333;
    }

    .custom-form input[type=text],
    .custom-form input[type=email],
    .custom-form select,
    .custom-form textarea,
    .custom-form input[type=file] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .custom-form button {
        padding: 12px 20px;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 18px;
    }

    .custom-form button:hover {
        background-color: #218838;
    }

    .custom-form button:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }
</style>

