@extends('layouts.app')

@section('content')
<div class="container">
    <!-- upload verhaal -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                @include('common.errors')
            <div class="panel panel-default">
                
                <div class="panel-heading">Nieuw verhaal</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('story') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Titel</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Verhaal</label>

                            <div class="col-md-6">
                                
                                <textarea name="story" class="form-control" id="story" value="{{ old('story') }}"></textarea>

                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- show stories -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-heading">Verhalen</div>

                <div class="panel-body">
                    
                        @foreach ($data as $r)
                            <h3>{!! html_entity_decode($r->title) !!}</h3>
                            <p>{!! html_entity_decode($r->story) !!}</p>
                            <p>
                                @if ($r->trashed())
                                <a href="{{ route('story.restore', $r->id) }}" class="btn btn-success">Herstel verhaal</a>

                                @else
                                <a href="{{ route('story.show', $r->id) }}" class="btn btn-info">Bekijk Verhaal</a>
                                <a href="{{ route('story.edit', $r->id) }}" class="btn btn-primary">Bewerk Verhaal</a>

                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['story.delete', $r->id]
                                ]) !!}
                                    {!! Form::submit('Verwijder dit verhaal?', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}

                                @endif
                            </p>
                            <hr>
                        @endforeach
                    
                    

                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Replace the <textarea id="story"> with a CKEditor
// instance, using default configuration.
// This is for the texteditor to get it to work
CKEDITOR.replace( 'story', {
            filebrowserImageBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=images',
            filebrowserBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=images'

        });


</script>

@endsection