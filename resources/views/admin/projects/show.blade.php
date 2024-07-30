<div class="screen holding">

@extends('layouts.app')

@section('content')

<div class="project-show p-5">
    <div class="container">
        <div class="button-manage">
            {{--? bottone indietro --}}
            <div class="back">
                <a href="{{route('admin.projects.index') }}">{{ __('Indietro')}}</a>              
            </div>

            {{--? bottoni gestione --}}
            <div class="manage">
                <div class="create">
                    <a href="{{route('admin.projects.create') }}">{{ __('Crea Nuovo')}}</a>
                </div>
                <a href="{{route('admin.projects.edit', $project)}}" class="ml-45 mr-10">
                    <i class="fas fa-pen"></i>
                </a>
                <a href="#" class="destroy">
                    <i class="fas fa-trash"></i>
                </a>

                {{--? modale --}}
                <div class="delete__modale holding">
                    <span class="modale__exit">CHIUDI</span>
                    <h4>Sei sicuro di voler cancellare?</h4>
                    <p>La cancellazione è irreversibile</p>
                    <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="delete" type="submit" value="Elimina Elemento">
                    </form>
                </div>
            </div>
        </div>

        {{--? dettaglio informazioni --}}
        <div class="card p-5">
            <h2>{{$project->title}}</h2>
            <hr class="mb-5">

            <div class="crd">
                <div class="image">
                    @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image)}}" alt="{{$project->slug}}">
                    @else
                    <img src="/no-image.webp" alt="no-image">
                    @endif
                </div>
                <div class="text">
                    <ul>
                        <li class="mb-3">
                            <span>Qualit&agrave; del Progetto: </span>{{$project->project_grade}} su 10 
                        </li>
                        <li class="mb-3">
                            <span>Categoria: </span>{{$project->market_category}}
                        </li>
                        <li class="mb-3">
                            <span>Materiale Creato: </span>{{$project->material_created}}
                        </li>
                        <li class="mb-3">
                            <span>Tecnologia Usata: </span>
                            @forelse ($project->technologies as $technology)
                            {{ $technology->name }}
                            @empty
                            Nessuna tecnologia selezionata
                        </li>
                        @endforelse
                        <li class="mb-3">
                            <span>Tipo Cliente: </span>{{$project->type?->title ?: 'Tipologia cliente non definita'}}
                        </li>
                    </ul>
                </div>
            </div>
            <p>
                <span>Descrizione: </span>{{$project->description}}
            </p>
            <p>
                <span>Collaborazione: </span>
                {{$project->collaborations}}
            </p>
            <p>
                <span>Inizio Progetto: </span>{{ Carbon::parse($project->start_project)->format('d.m.Y') }}
                <i class="fas fa-circle"></i>
                <span>Fine Progetto: </span>{{ Carbon::parse($project->start_project)->format('d.m.Y') }}
            </p>
            <p>
                <span>Link Progetto: </span> 
                <a class="no-btn" href="{{$project->link}}" target="_blank">{{$project->link}}</a>
            </p>

        </div>
    </div>
</div>
    
@endsection

</div>