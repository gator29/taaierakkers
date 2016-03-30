@extends('layouts.app')

@section('content')

<h1>Bewerk verhaal </h1>
<p class="lead">Bewerk het verhaal hier beneden of <a href="{{ route('admin') }}">ga terug naar alle verhalen.</a></p>
<hr>

@if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                @include('common.errors')

{!! Form::model($story, [
    'method' => 'PATCH',
    'route' => ['story.update', $story->id]
]) !!}

<div class="form-group">
    {!! Form::label('title', 'Titel:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('story', 'Verhaal:', ['class' => 'control-label']) !!}
    {!! Form::textarea('story', null, ['class' => 'story', 'id' => 'story']) !!}
</div>

{!! Form::submit('Bewerk Verhaal', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

    

<script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace( 'story', {
            filebrowserImageBrowseUrl: 'localhost:8000/laravel-filemanager?type=Images',
            filebrowserBrowseUrl: 'localhost:8000/laravel-filemanager?type=Files'
        });
</script>
@endsection