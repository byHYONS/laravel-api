<div class="screen holding">

    @extends('layouts.app')
    
    @section('content')
    
    <div class="project-show p-5">
        <div class="container">
            <div class="button-manage">
                {{--? bottone indietro --}}
                <div class="back">
                    <a href="{{route('admin.types.index') }}">{{ __('Indietro')}}</a>              
                </div>
    
                {{--? bottoni gestione --}}
                <div class="manage">
                    <div class="create">
                        <a href="{{route('admin.types.create') }}">{{ __('Crea Nuovo')}}</a>
                    </div>
                    <a href="{{route('admin.types.edit', $type)}}" class="ml-45 mr-10">
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
                        <form action="{{route('admin.types.destroy', $type)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="delete" type="submit" value="Elimina Elemento">
                        </form>
                    </div>
                </div>
            </div>
    
            {{--? dettaglio informazioni --}}
            <div class="card p-5">
                <h2>Tipologia Cliente</h2>
                <hr class="mb-5">
    
                <p>
                    <span>ID: </span>{{$type->id}}
                </p>
                <p>
                    <span>Nome: </span>
                    {{$type->title}}
                </p>
                <p>
                    <span>Slug: </span>{{$type->slug}}
                    <i class="fas fa-circle"></i>
                </p>
                <p>
                    <span>Numeri di progetti fatti con questa tipologia di clienti: </span>{{$type->projects->count()}}
                </p>
            </div>
        </div>
    </div>
        
    @endsection
    
    </div>