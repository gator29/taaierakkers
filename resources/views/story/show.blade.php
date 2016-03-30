@extends('layouts.app')

@section('content')

<h1>{!! html_entity_decode($story->title) !!}</h1>
<p class="lead">{!! html_entity_decode($story->story) !!}</p>
<hr>

@if (Auth::guest())
<div class="row">
    <div class="col-md-6">
        <a href="{{ route('story.index') }}" class="btn btn-info">Terug naar alle verhalen</a>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-6">
 	<a href="{{ route('admin') }}" class="btn btn-info">Terug naar alle verhalen</a>
	<a href="{{ route('story.edit', $story->id) }}" class="btn btn-primary">Edit Story</a>
	</div>
    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['story.delete', $story->id]
        ]) !!}
            {!! Form::submit('Verwijder dit verhaal?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endif

@endsection