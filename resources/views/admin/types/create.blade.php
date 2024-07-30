@extends('layouts.app')

@section('content')

<div class="project-create">
    <div class="container">
        {{--? bottone indietro --}}
        <div class="back">
            <a href="{{route('admin.types.index') }}">{{ __('Indietro')}}</a>              
        </div>

        <div class="add-project">

            <h2>Aggiungi Tipologia di cliente:</h2>
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

            <form action="{{route('admin.types.store')}}" method="POST">
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
                     
                {{--? bottone submit --}}
                <input class="submit" type="submit" class="btn " value="Crea Progetto">
    
            </form>


        </div>

    </div>
</div>
    
@endsection