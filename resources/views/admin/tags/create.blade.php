@extends('adminlte::page')

@section('title', 'LeeyCrece')

@section('content_header')
    <h1>Crear Etiquetas</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>

</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.tags.store']) !!}

            @include('admin.tags.partials.form')

            {!! Form::submit('Crear etiqueta', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script>
    $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
         });
    });
</script>
@endsection
@stop

