@extends('layouts.app')

@section('content')
    <h1>Modifier la candidature</h1>
    <form action="{{ route('candidatures.update', $candidature->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="offre_id">Offre:</label>
        <select name="offre_id" id="offre_id">
            @foreach ($offres as $offre)
                <option value="{{ $offre->id }}" {{ $candidature->offre_id == $offre->id ? 'selected' : '' }}>{{ $offre->titre }}</option>
            @endforeach
        </select>
        <br>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="{{ $candidature->nom }}">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $candidature->email }}">
        <br>
        <label for="cv">CV:</label>
        <input type="file" name="cv" id="cv">
        <br>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
