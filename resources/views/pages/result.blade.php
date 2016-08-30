@extends('app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3>Resultado</h3>
        <hr>
    {{--@if(is_array($resultado))--}}
        <!--<table class="table table-bordered">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            @foreach ($resultado as $url => $email)
                <tbody>
                    <tr>
                        <td>{!! $url !!}</td>
                        <td>{!! $email !!}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>-->
    {{--@else--}}
    <textarea class="form-control" readonly>@foreach ($resultado as $r){!! $r . "\n" !!}@endforeach</textarea>
    {{--@endif--}}
        <hr>
        <a href="/" class="btn btn-primary">Volver</a>
    </div>
</div>
@endsection

@section('head_styles')
<style>
    textarea {
        min-height: 600px;
    }
</style>
@endsection