@extends('sekretare.layout.master')

@section('styles')

@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Detyrim Akademik</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Detyrim Akademik</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Regjistro Detyrim Akademik</strong>
                </div>
                {{ Form::open(['route'=>'sekretare.detyrimAkademik.store', 'method'=>'post']) }}
                <div class="card-body card-block">

                    <div class="row form-group">

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('ID_Lenda', 'Lenda') !!}
                                {!! Form::select('ID_Lenda', ['' => 'Zgjidh...'] + $lende,null, ['id'=>'ID_Lenda','class' => 'select2 form-control','required']) !!}
                                <span class="text text-danger" id="userDetailIdRequired"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('ID_Pedagog', 'Pedagogu') !!}
                                {!! Form::select('ID_Pedagog', ['' => 'Zgjidh...'] + $pedagog,null, ['id'=>'ID_Pedagog','class' => 'select2 form-control','required']) !!}
                                <span class="text text-danger" id="userDetailIdRequired"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('grup_mesimor', 'Grupi Mesimor') !!}
                                {!! Form::select('grupMesimorId', ['' => 'Zgjidh...'] + $grup_mesimor,null, ['id'=>'grup_mesimor','class' => 'select2 form-control','required']) !!}
                                <span class="text text-danger" id="userDetailIdRequired"></span>
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
                    <table class="table table-striped" id="detyrimAkademikTable">
                        <thead>
                        <tr>
                            <th scope="col">Lenda</th>
                            <th scope="col">Pedagogu</th>
                            <th scope="col">Grupi Mesimor</th>
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
    <script>
        $(function () {
            $('.select2').select2({
                placeholder: 'Zgjidh...'
            });
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            var table = $('#detyrimAkademikTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: APP_URL + '/sekretare/detyrimAkademik/list',
                columns: [
                    {data: 'lenda', name: 'lenda'},
                    {data: 'pedagogu', name: 'pedagogu'},
                    {data: 'grupi_mesimor', name: 'grupi_mesimor'},
                    {data: 'actions', name: 'actions'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });

        });
    </script>

@endsection