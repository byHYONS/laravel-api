<div class="screen holding">

@extends('layouts.app')

@section('content')
    <div class="project-index py-75">
        <div class="container">
            {{--? bottone crea --}}
            <div class="create">
                <a href="{{route('admin.projects.create') }}">{{ __('Crea Nuovo')}}</a>
            </div>

            {{--? tabella liststa progetti --}}
            <div class="table-project">
                <table class="table custom-table">
                    <thead class="table-deshboard">
                        <tr>
                            <th class="col-2">Imagine</th>
                            <th class="col-4">Nome</th>
                            <th class="col-3">Stato</th>
                            <th class="col-3 text-center">Gestione</th>
                        </tr>   
                    </thead>
                    <tbody>

                        @foreach ($projects as $project)
                            <tr>
                                {{-- <td>{{$project->id}}</td> --}}
                                <td>
                                    {{--? immagine --}}
                                    <div class="thumb">
                                        @if ($project->image)
                                        <img src="{{ asset('storage/' . $project->image)}}" alt="{{$project->slug}}">                                        
                                        @else
                                        <img src="/no-image.webp" alt="no-image">
                                        @endif
                                    </div>                                    
                                </td>
                                <td>{{$project->title}}</td>
                                <td>
                                    @if($project->is_active)
                                    <div class="status active">
                                        <p class="mr-20">attivo</p>
                                        {{-- <a href="{{$project->slug}}" class="modale" data-slug="{{$project->slug}}">attiva</a> --}}
                                        <a href="{{$project->slug}}" class="modale" data-slug="{{$project->slug}}" data-type="deactivate">disattiva</a>
                                    </div>
                                    @elseif (!$project->is_active)
                                    <div class="status no_active">
                                        <p class="mr-20">bozza</p>
                                        {{-- <a href="{{$project->slug}}" class="modale" data-slug="{{$project->slug}}">attiva</a> --}}
                                        <a href="{{$project->slug}}" class="modale" data-slug="{{$project->slug}}" data-type="activate">attiva</a>
                                    </div>
                                    @endif
                                    {{--? Modale per il cambio di stato --}}
                                    <div class="modale__modale holding" id="modale-activate-{{$project->slug}}">
                                        <span class="modale__exit">CHIUDI</span>
                                        <h4>Sei sicuro di voler attivare questo progetto?</h4>
                                        <form action="{{ route('admin.projects.activate', $project->slug) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="submit" value="Attiva Progetto">
                                        </form>
                                    </div>
                                    <div class="modale__modale holding" id="modale-deactivate-{{$project->slug}}">
                                        <span class="modale__exit">CHIUDI</span>
                                        <h4>Sei sicuro di voler disattivare questo progetto?</h4>
                                        <form action="{{ route('admin.projects.deactivate', $project->slug) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="submit" value="Disattiva Progetto">
                                        </form>
                                    </div>
                                </td>
                                {{--? gestione dell'istanza --}}
                                <td>
                                    <div class="manage text-center">
                                        <a href="{{route('admin.projects.show', $project)}}" class="mr-10">
                                            <i class="fab fa-sistrix"></i>
                                        </a>
                                        <a href="{{route('admin.projects.edit', $project)}}" class="mr-10">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{$project->slug}}" class="modale" data-slug="{{$project->slug}}">
                                            <i class="fas fa-trash"></i>
                                        </a>                                       
                                        {{--? modale delete --}}
                                        <div class="modale__modale holding" id="modale-{{$project->slug}}">
                                            <span class="modale__exit">CHIUDI</span>
                                            <h4>Sei sicuro di voler cancellare?</h4>
                                            <p>La cancellazione è irreversibile</p>
                                            <form id="delete-form-{{$project->slug}}" action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input class="delete" type="submit" value="Elimina Elemento">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
    
                    </tbody>                   
                </table>
            </div>
        </div>
    </div>
    
@endsection

</div>