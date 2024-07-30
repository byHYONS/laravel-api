<div class="screen holding">

    @extends('layouts.app')
    
    @section('content')
        <div class="project-list py-75">
            <div class="container">
                {{--? bottone crea --}}
                <div class="create">
                    <a href="{{route('admin.technologies.create') }}">{{ __('Crea Nuovo')}}</a>
                </div>
    
                {{--? tabella liststa progetti --}}
                <div class="table-project">
                    <table class="table custom-table">
                        <thead class="table-deshboard">
                            <tr>
                                <th class="col-2">id</th>
                                <th class="col-4">Nome</th>
                                <th class="col-3">Slug</th>
                                <th class="col-3 text-center">Gestione</th>
                            </tr>   
                        </thead>
                        <tbody>
    
                            @foreach ($technologies as $technology)
                                <tr>
                                    <td>{{$technology->id}}</td>
                                    
                                    <td>{{$technology->name}}</td>
                                    <td>{{$technology->slug}}</td>
                                    {{--? gestione dell'istanza --}}
                                    <td>
                                        <div class="manage text-center">
                                            <a href="{{route('admin.technologies.show', $technology)}}" class="mr-10">
                                                <i class="fab fa-sistrix"></i>
                                            </a>
                                            <a href="{{route('admin.technologies.edit', $technology)}}" class="mr-10">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="{{$technology->slug}}" class="destroy" data-slug="{{$technology->slug}}">
                                                <i class="fas fa-trash"></i>
                                            </a>                                       
                                            {{--? modale --}}
                                            <div class="delete__modale holding" id="modale-{{$technology->slug}}">
                                                <span class="modale__exit">CHIUDI</span>
                                                <h4>Sei sicuro di voler cancellare?</h4>
                                                <p>La cancellazione è irreversibile</p>
                                                <form id="delete-form-{{$technology->slug}}" action="{{route('admin.technologies.destroy', $technology->slug)}}" method="POST">
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