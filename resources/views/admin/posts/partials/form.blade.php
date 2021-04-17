<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del post', 'readonly']) !!}
    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoria:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Etiquetas:</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>
    @endforeach
    <br>
    @error('tags')
      <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estatus</p>
    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>
    @error('status')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
       <div class="image-wrapper">
               
           @isset ($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}">
           @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2020/12/13/16/21/stork-5828727_960_720.jpg" alt="">
           @endisset
           
       </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrará en el post') !!}
            {!! Form::file('file', ['class' => 'form-control-file','accept' => 'image/*']) !!}

            @error('file')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
       
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere repudiandae eius obcaecati ipsam error quas? Explicabo maiores sapiente recusandae, odio accusamus amet saepe error, deleniti doloribus expedita et natus consequuntur.</p>
    </div>
</div>


<div class="form-group">
    {!! Form::label('extract', 'Extracto:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
    @error('extract')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    @error('body')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>