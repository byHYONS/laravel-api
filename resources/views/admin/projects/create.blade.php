@extends('layouts.app')

@section('content')

<div class="project-create">
    <div class="container">
        {{--? bottone indietro --}}
        <div class="back">
            <a href="{{route('admin.projects.index') }}">{{ __('Indietro')}}</a>              
        </div>

        <div class="add-project">

            <h2>Aggiungi Progetto:</h2>
            <hr class="mt-25 mb-50">

            {{--? messagio di avviso degli errori nella compilazione del form --}}
            @if ($errors ->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                    <li>{{$message}}</li>    
                    @endforeach
                </ul>
            </div>               
            @endif

            <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo: </label>
                    <input type="text" class="form-control @if($errors->get('title')) is-invalid @endif" value="{{ old('title')}}" id="title" name="title">
                    @if ($errors->get('title'))
                    @foreach ($errors->get('title') as $message)
                    <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                  </div>
                  <div class="mb-3">
                      <label for="description" class="form-label">Descrizione: </label>
                      <textarea class="form-control @if($errors->get('description')) is-invalid @endif" name="description" id="description" rows="3"> {{ old('description')}} </textarea>
                      @if ($errors->get('description'))
                        @foreach ($errors->get('description') as $message)
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                  </div>
                <div class="mb-3">
                    <label for="market_category" class="form-label">Categoria: </label>
                    <input type="text" class="form-control @if($errors->get('market_category')) is-invalid @endif" value="{{ old('market_category')}}" id="market_category" name="market_category">
                    @if ($errors->get('market_category'))
                        @foreach ($errors->get('market_category') as $message)
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                  </div>
                <div class="mb-3">
                    <label for="link" class="form-label">link: </label>
                        <input type="text" step="0.01" class="form-control group__input @if($errors->get('link')) is-invalid @endif"  value="{{ old('link')}}" id="link" name="link">
                        @if ($errors->get('link'))
                            @foreach ($errors->get('link') as $message)
                            <div class="invalid-feedback message__error">
                                {{$message}}
                            </div>
                            @endforeach                        
                        @endif
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine: </label>
                    <input type="file" class="form-control @if($errors->get('image')) is-invalid @endif" id="image" name="image">
                    @if ($errors->get('image'))
                        @foreach ($errors->get('image') as $message)
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                </div>
                <div class="mb-3">
                    <label for="video" class="form-label">Link Video: </label>
                    <input type="text" class="form-control @if($errors->get('video')) is-invalid @endif"  value="{{ old('video')}}" id="video" name="video">
                    @if ($errors->get('video'))
                        @foreach ($errors->get('video') as $message)
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                </div>
                <div class="mb-3">
                    <label for="start_project" class="form-label">Inizio Progetto: </label>
                    <input type="date" class="form-control @if($errors->get('start_project')) is-invalid @endif" value="{{ old('start_project')}}" id="start_project" name="start_project">
                    @if ($errors->get('start_project'))
                        @foreach ($errors->get('start_project') as $message)
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                </div>
                <div class="mb-3">
                    <label for="end_project" class="form-label">Fine Progetto: </label>
                    <input type="date" class="form-control @if($errors->get('end_project')) is-invalid @endif" value="{{ old('end_project')}}" id="end_project" name="end_project">
                    @if ($errors->get('end_project'))
                        @foreach ($errors->get('end_project') as $message)
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                </div>
                <div class="mb-3">
                    <label for="material_created" class="form-label">Materiale Creato: </label>
                    <input type="text" class="form-control @if($errors->get('material_created')) is-invalid @endif" value="{{ old('material_created')}}" id="material_created" name="material_created">
                    @if ($errors->get('material_created'))
                        @foreach ($errors->get('material_created') as $message)
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                </div>
                <div class="mb-3">
                    <legend>Seleziona le Tecnologie: </legend>
                <fieldset>
                    @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="technology-{{$technology->id}}" value="{{$technology->id}}" name="technologies[]"
                    {{in_array($technology->id, old('technologies', [])) ? 'checked' : ''}}>
                    <label for="technology-{{$technology->id}}">{{$technology->name}}</label>
                    </div>                   
                    @endforeach
                </fieldset>
                    @if ($errors->get('technology_id'))
                        @foreach ($errors->get('technology_id') as $message)
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                </div>
                <div class="mb-3">
                    <label for="collaborations" class="form-label">Collaborazioni: </label>
                    <input type="text" class="form-control @if($errors->get('collaborations')) is-invalid @endif" value="{{ old('collaborations')}}" id="collaborations" name="collaborations">
                    @if ($errors->get('collaborations'))
                        @foreach ($errors->get('collaborations') as $message)
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                </div>
                <div class="mb-3">
                    <label for="type_id" class="form-label">Tipologia di Cliente: </label>
                    <select name="type_id" id="type_id" class="form-select @if($errors->get('type_id')) is-invalid @endif">
                        <option value="">Seleziona la tipologia</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}" @if (old('type_id') == $type->id) selected @endif>
                                {{$type->title}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->get('type_id'))
                        @foreach ($errors->get('type_id') as $message)
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                </div>
                <div class="mb-3">
                    <label for="project_grade" class="form-label">Voto Progetto: </label>
                    <input type="number" class="form-control @if($errors->get('project_grade')) is-invalid @endif" value="{{ old('project_grade', 5)}}" id="project_grade" name="project_grade">
                    @if ($errors->get('project_grade'))
                        @foreach ($errors->get('project_grade') as $message)
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                </div>
    
                {{--? bottone submit --}}
                <input class="submit" type="submit" class="btn " value="Crea Progetto">
    
            </form>


        </div>

    </div>
</div>
    
@endsection
