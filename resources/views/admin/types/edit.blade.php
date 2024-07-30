@extends('layouts.app')

@section('content')

<div class="project-edit">
    <div class="container">
        {{--? bottone indietro --}}
        <div class="back">
            <a href="{{route('admin.types.show', $type) }}">{{ __('Torna al Dettaglo')}}</a>              
            <a class="ml-25" href="{{route('admin.types.index') }}">{{ __('Torna alla Lista')}}</a>              
        </div>

        <div class="add-project">

            <h2>Modifica Tipologia:</h2>
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

            <form action="{{route('admin.types.update', $type)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Tipologia di Cliente: </label>
                    <input type="text" class="form-control @if($errors->get('title')) is-invalid @endif" value="{{ old('title', $type->title)}}" id="title" name="title">
                    @if ($errors->get('title'))
                    @foreach ($errors->get('title') as $message)
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