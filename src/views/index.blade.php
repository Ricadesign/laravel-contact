@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 text-center">
                <h1>Contacto</h1>
                <form action="/test" method="post">
                  {{ csrf_field() }}
                  @if($errors->has('name'))
                    <div class="form-group has-error">
                      <label class="control-label" for="name">Nombre</label>
                      <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name')}}">
                      <span class="help-block">{{ $errors->first('name')}}</span>
                    </div>
                  @else
                  <div class="form-group">
                    <label class="control-label" for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="">
                  </div>
                  @endif
                  @if($errors->has('email'))
                    <div class="form-group has-error">
                      <label class="control-label" for="email">Email</label>
                      <input type="text" name="email" class="form-control" placeholder="johndoe@example.com" value="{{old('email')}}">
                      <span class="help-block">{{ $errors->first('email')}}</span>
                    </div>
                  @else
                    <div class="form-group">
                      <label class="control-label" for="email">Email</label>
                      <input type="text" name="email" class="form-control" placeholder="johndoe@example.com" value="">
                    </div>
                  @endif
                  @if($errors->has('message'))
                    <div class="form-group has-error">
                      <label class="control-label" for="message">Mensaje</label>
                      <textarea name="message" class="form-control" placeholder="Mensaje" rows="5">{{ old('message')}}</textarea>
                      <span class="help-block">{{ $errors->first('message')}}</span>
                    </div>
                  @else
                    <div class="form-group">
                      <label class="control-label" for="message">Mensaje</label>
                      <textarea name="message" class="form-control" placeholder="Mensaje" rows="5"></textarea>
                    </div>
                  @endif
                  <input class="btn btn-default" type="submit" name="" value="Enviar">
                </form>

            </div>
        </div>
    </div>
@endsection
