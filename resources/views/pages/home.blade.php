@extends('app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <h2>Colector de Informaci&oacute;n</h2>
        <form class="form" action="" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="type">Tipo de Input</label>
                <select id="type" name="type" class="form-control">
                    <option value="mailto">E-mails</option>
                    <option value="tel">Tel&eacute;fonos</option>
                </select>
            </div>
            <div class="form-group">
                <label for="urls">URLs</label>
                <textarea id="urls" name="urls" class="form-control">{!! old('urls') !!}</textarea>
                <small>Separados por l&iacute;neas</small>
            </div>
            <!--<fieldset class="form-group form-inline">
                <legend>Salida</legend>
                <div class="radio">
                    <label>
                        <input type="radio" name="output" value="text" class="form-control" checked>
                        Texto
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="output" value="table" class="form-control">
                        Tabla
                    </label>
                </div>
            </fieldset>-->
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Procesar</button>
                <button class="btn btn-danger" type="reset">Limpiar</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('head_styles')
<style>
    #urls {
        min-height: 300px;
    }
</style>
@endsection

@if(session('error'))
<script>window.alert("{!! session('error') !!}");</script>
@endif

