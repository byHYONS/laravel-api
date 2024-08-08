@extends('layouts.app')

@section('content')

<div class="technology-create">
    <div class="container">
        {{--? bottone indietro --}}
        <div class="back">
            <a href="{{route('admin.technologies.index') }}">{{ __('Indietro')}}</a>              
        </div>

        <div class="add-project">

            <h2>Aggiungi Tecnologie:</h2>
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

            <form action="{{route('admin.technologies.store')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Neme: </label>
                    <input type="text" class="form-control @if($errors->get('name')) is-invalid @endif" value="{{ old('name')}}" id="name" name="name">
                    @if ($errors->get('name'))
                    @foreach ($errors->get('name') as $message)
                    <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endforeach                        
                    @endif
                  </div>
                     
                {{--? bottone submit --}}
                <input class="submit" type="submit" class="btn " value="Crea Tecnologia">
    
            </form>


        </div>

    </div>
</div>
    
@endsection