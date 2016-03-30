@extends('layouts.app')

@section('content')

@foreach ($data as $r)
                            <a href="{{ route('news.show', $r->id) }}"><h3>{!! html_entity_decode($r->title) !!}</h3></a>
                            <hr>
                        @endforeach

@endsection