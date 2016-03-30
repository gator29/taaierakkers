@extends('layouts.app')

@section('content')

<h1>Bewerk nieuws item </h1>
<p class="lead">Bewerk het nieuws items hier beneden of <a href="{{ route('news.add') }}">ga terug naar alle nieuws items.</a></p>
<hr>

@if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                @include('common.errors')

{!! Form::model($news, [
    'method' => 'PATCH',
    'route' => ['news.update', $news->id]
]) !!}

<div class="form-group">
    {!! Form::label('title', 'Titel:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('report', 'Nieuws:', ['class' => 'control-label']) !!}
    {!! Form::textarea('report', null, ['class' => 'news', 'id' => 'news']) !!}
</div>

{!! Form::submit('Bewerk Nieuws', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

    

<script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace( 'news', {
            filebrowserImageBrowseUrl: 'localhost:8000/laravel-filemanager?type=Images',
            filebrowserBrowseUrl: 'localhost:8000/laravel-filemanager?type=Files'
        });
</script>

@endsection