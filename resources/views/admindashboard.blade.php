@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="bg-body-extra-light">
        <div class="content content-full">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
                </ol>
            </nav>

            <div class="container my-6">
                <h1 class="text-center mb-6">Admin Dashboard</h1>

                @include('admin.tables.apogee-users')
                @include('admin.tables.doctorat-demands')
                @include('admin.tables.calcul-notes-demands')
                @include('admin.tables.insc-annee-anterieure')
                @include('admin.tables.resultat-etudiant')
                @include('admin.tables.annulation-inscription')
                @include('admin.tables.suppression-note-etudiant')
                @include('admin.tables.insertion-resultat-module')

            </div>
        </div>
    </div>
@endsection
