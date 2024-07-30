<div class="screen holding">

    @extends('layouts.app')
    
    @section('content')
        <div class="project-list py-75">
            <div class="container">
                {{--? bottone crea --}}
                <div class="create">
                    <a href="{{route('admin.types.create') }}">{{ __('Crea Nuovo')}}</a>
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
    
                            @foreach ($types as $type)
                                <tr>
                                    <td>{{$type->id}}</td>
                                    
                                    <td>{{$type->title}}</td>
                                    <td>{{$type->slug}}</td>
                                    {{--? gestione dell'istanza --}}
                                    <td>
                                        <div class="manage text-center">
                                            <a href="{{route('admin.types.show', $type)}}" class="mr-10">
                                                <i class="fab fa-sistrix"></i>
                                            </a>
                                            <a href="{{route('admin.types.edit', $type)}}" class="mr-10">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="{{$type->slug}}" class="destroy" data-slug="{{$type->slug}}">
                                                <i class="fas fa-trash"></i>
                                            </a>                                       
                                            {{--? modale --}}
                                            <div class="delete__modale holding" id="modale-{{$type->slug}}">
                                                <span class="modale__exit">CHIUDI</span>
                                                <h4>Sei sicuro di voler cancellare?</h4>
                                                <p>La cancellazione è irreversibile</p>
                                                <form id="delete-form-{{$type->slug}}" action="{{route('admin.types.destroy', $type->slug)}}" method="POST">
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