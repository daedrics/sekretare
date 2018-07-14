@extends('sekretare.layout.master')

@section('styles')

@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Lende</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Lende</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Regjistro Lende</strong>
                </div>
                {{ Form::open(['route'=>'sekretare.lenda.store', 'method'=>'post']) }}
                <div class="card-body card-block">

                    <div class="row form-group">

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('emer', 'Emer', ['class' => 'form-control-label']) !!}
                                {!! Form::text('emer', null, ['class' => 'form-control','id'=>'emer','placeholder' =>'Emer']) !!}
                                @if($errors->first('emer')) <span
                                        class="text text-danger">{{ $errors->first('emer') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('numer_leksione', 'Numer Leksione', ['class' => 'form-control-label']) !!}
                                {!! Form::number('numer_leksione', null, ['class' => 'form-control','id'=>'numer_leksione','placeholder' =>'Numer Leksione']) !!}
                                @if($errors->first('numer_leksione')) <span
                                        class="text text-danger">{{ $errors->first('numer_leksione') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('numer_seminar', 'Numer Seminar', ['class' => 'form-control-label']) !!}
                                {!! Form::number('numer_seminar', null, ['class' => 'form-control','id'=>'numer_seminar','placeholder' =>'Numer Seminar']) !!}
                                @if($errors->first('numer_seminar')) <span
                                        class="text text-danger">{{ $errors->first('numer_seminar') }}</span> @endif
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('numer_lab', 'Numer Laborator', ['class' => 'form-control-label']) !!}
                                {!! Form::text('numer_lab', null, ['class' => 'form-control','id'=>'numer_lab','placeholder' =>'Numer Laborator']) !!}
                                @if($errors->first('numer_lab')) <span
                                        class="text text-danger">{{ $errors->first('numer_lab') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('detyre_kursi', 'Detyre Kursi', ['class' => 'form-control-label']) !!}
                                {!! Form::text('detyre_kursi', null, ['class' => 'form-control','id'=>'detyre_kursi','placeholder' =>'Detyre Kursi']) !!}
                                @if($errors->first('detyre_kursi')) <span
                                        class="text text-danger">{{ $errors->first('detyre_kursi') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('kredite', 'Kredite', ['class' => 'form-control-label']) !!}
                                {!! Form::number('kredite', null, ['class' => 'form-control','id'=>'kredite','placeholder' =>'Kredite']) !!}
                                @if($errors->first('kredite')) <span
                                        class="text text-danger">{{ $errors->first('kredite') }}</span> @endif
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-save"></i> Regjistro
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="lendaTable">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Emer</th>
                            <th scope="col">Numer Leksione</th>
                            <th scope="col">Numer Seminar</th>
                            <th scope="col">Numer Laboratori</th>
                            <th scope="col">Detyre Kursi</th>
                            <th scope="col">Kredite</th>
                            <th scope="col">Veprime</th>
                            <th scope="col">Krijuar me</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

@endsection


@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $('#lendaTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: APP_URL + '/sekretare/lenda/list',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'emer', name: 'emer'},
                    {data: 'numer_leksione', name: 'numer_leksione'},
                    {data: 'numer_seminar', name: 'numer_seminar'},
                    {data: 'numer_lab', name: 'numer_lab'},
                    {data: 'detyre_kursi', name: 'detyre_kursi'},
                    {data: 'kredite', name: 'kredite'},
                    {data: 'actions', name: 'actions'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });
        });
    </script>

@endsection