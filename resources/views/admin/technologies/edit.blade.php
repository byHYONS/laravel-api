@extends('layouts.app')

@section('content')

<div class="project-edit">
    <div class="container">
        {{--? bottone indietro --}}
        <div class="back">
            <a href="{{route('admin.technologies.show', $technology) }}">{{ __('Torna al Dettaglo')}}</a>              
            <a class="ml-25" href="{{route('admin.technologies.index') }}">{{ __('Torna alla Lista')}}</a>              
        </div>

        <div class="add-project">

            <h2>Modifica Tecnologia:</h2>
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

            <form action="{{route('admin.technologies.update', $technology)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Tecnologia Usata: </label>
                    <input type="text" class="form-control @if($errors->get('name')) is-invalid @endif" value="{{ old('name', $technology->name)}}" id="name" name="name">
                    @if ($errors->get('name'))
                    @foreach ($errors->get('name') as $message)
                    <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                  </div>
    
                {{--? bottone submit --}}
                <input class="submit" type="submit" class="btn " value="Modifica Tecnologia">
    
            </form>
        </div>

    </div>
</div>
    
@endsection