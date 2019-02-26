@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">

    <div class="card">
      <h5 class="card-header">Ajouter Image</h5>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <form action="{{route('images.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form">
            @csrf
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="titre"> Titre </label>

                <div class="col-sm-9">
                    <input type="text" id="titre" name="titre" class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" placeholder="titre" >

                    @if ($errors->has('titre'))
                    <span class="help-block">
                        <strong>{{ $errors->first('titre') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="url"> Url </label>
                <div class="col-sm-9">
                    <input type="text" id="url" name="url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="url" >

                    @if ($errors->has('url'))
                    <span class="help-block">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                    @endif
                </div>
            </div>


            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="email"> Description</label>

                <div class="col-sm-9">
                    <input type="text" id="description" name="description" placeholder="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">

                    @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="categories"> categories </label>

                <div class="col-sm-9">
                    <input type="text" id="categories" name="categories" placeholder="categories" class="form-control{{ $errors->has('categories') ? ' is-invalid' : '' }}">

                    @if ($errors->has('categories'))
                    <span class="help-block">
                        <strong>{{ $errors->first('categories') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="photo_local_link"> photo </label>

                <div class="col-sm-9">
                    <input id="photo_local_link" name="photo_local_link" data-with="200" type="file" class="dropify" data-max-file-size="2M" />

                    @if ($errors->has('photo_local_link'))
                    <span class="help-block">
                        <strong>{{ $errors->first('photo_local_link') }}</strong>
                    </span>
                    @endif
                </div>

            </div>



            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="Submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Envoyé
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>
                </div>
            </div>

        </form>

    </div>

</div>
</div>
</div>


@endsection
