<div class="screen holding">

    @extends('layouts.app')
    
    @section('content')
    
    <div class="technology-show p-5">
        <div class="container">
            <div class="button-manage">
                {{--? bottone indietro --}}
                <div class="back">
                    <a href="{{route('admin.technologies.index') }}">{{ __('Indietro')}}</a>              
                </div>
    
                {{--? bottoni gestione --}}
                <div class="manage">
                    <div class="create">
                        <a href="{{route('admin.technologies.create') }}">{{ __('Crea Nuovo')}}</a>
                    </div>
                    <a href="{{route('admin.technologies.edit', $technology)}}" class="ml-45 mr-10">
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
                        <form action="{{route('admin.technologies.destroy', $technology)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="delete" type="submit" value="Elimina Elemento">
                        </form>
                    </div>
                </div>
            </div>
    
            {{--? dettaglio informazioni --}}
            <div class="card p-5">
                <h2>Tecnologie Usate: </h2>
                <hr class="mb-5">
    
                <p>
                    <span>ID: </span>{{$technology->id}}
                </p>
                <p>
                    <span>Nome: </span>
                    {{$technology->name}}
                </p>
                <p>
                    <span>Slug: </span>{{$technology->slug}}
                    <i class="fas fa-circle"></i>
                </p>
                <p>
                    <span>Numeri di progetti fatti con questa tipologia di clienti: </span>{{$technology->projects->count()}}
                </p>
            </div>
        </div>
    </div>
        
    @endsection
    
    </div>