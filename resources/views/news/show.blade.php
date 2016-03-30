@extends('layouts.app')

@section('content')

<h1>{!! html_entity_decode($news->title) !!}</h1>
<p class="lead">{!! html_entity_decode($news->report) !!}</p>
<hr>

@if (Auth::guest())
<div class="row">
    <div class="col-md-6">
        <a href="{{ route('news.index') }}" class="btn btn-info">Terug naar alle nieuws items</a>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-6">
    <a href="{{ route('news.add') }}" class="btn btn-info">Terug naar alle nieuws items</a>
    <a href="{{ route('news.edit', $news->id) }}" class="btn btn-primary">Bewerk nieuws item</a>
    </div>
    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['news.delete', $news->id]
        ]) !!}
            {!! Form::submit('Verwijder dit nieuws item?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endif

@endsection