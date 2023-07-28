@extends('admin.layouts.template')

@section('title')
    Admin-Document-Management
@endsection

@section('content')

<div class="container">
    @include('admin.layouts.partials.sidebar')

    <div class="main">
        <div class="title">
            <p>Manage Document</p>
            <ion-icon name="document-text"></ion-icon>
        </div>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <div class="optional">
            <div class="buttons">
                <button class="filter">
                    <ion-icon name="filter"></ion-icon>
                    Filtrer
                </button>
                <button class="add">
                    <ion-icon name="add"></ion-icon>
                    <a href="{{ route('admin.document.create') }}">Ajouter Document</a>
                </button>
            </div>
            <div class="check-categorie-documents">
                <select name="" id="">
                    <option value="service informatique">Service Informatique</option>
                    <option value="service informatique">Secrétariat</option>
                    <option value="service informatique">Service Informatique et quelque chose</option>
                    <option value="service informatique">Service Informatique</option>
                </select>
            </div>
            <div class="search-box">
                <input type="text">
                <ion-icon name="search"></ion-icon>
            </div>
        </div>

        <div class="tableau">
            <table class="table">
                <thead>
                    <tr>
                        <td>Code</td>
                        <td>Libellé</td>
                        <td>Date de création</td>
                        <td>Taille</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($documents as $document)
                    <tr>
                        <td>{{ $document->signature }}</td>
                        <td>{{ $document->objet }}</td>
                        <td>{{ $document->created_at }}</td>
                        <td>{{ $document->dua }}</td>
                        <td>
                            <button class="edit"><a href="{{ route('admin.document.edit', ['document' => $document->id]) }}">Editer</a></button>
                            <button class="delete">Supprimer</button>
                        </td>
                    </tr>
                    @empty
                        AUCUN DOCUMENT EN BASE DE DONNÉES
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
