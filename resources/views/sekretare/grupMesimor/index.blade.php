@extends('sekretare.layout.master')

@section('styles')

@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Grup Mesimor</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Grup Mesimor</li>
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
                    <strong>Regjistro Grup Mesimor</strong>
                </div>
                {{ Form::open(['route'=>'sekretare.grupMesimor.store', 'method'=>'post']) }}
                <div class="card-body card-block">
                    <div class="row form-group">

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('emer_G_M', 'Emer Grupi Mesimor', ['class' => 'form-control-label']) !!}
                                {!! Form::text('emer_G_M', null, ['class' => 'form-control','id'=>'email','placeholder' =>'Emer Grupi Mesimor', 'required']) !!}
                                @if($errors->first('emer_G_M')) <span
                                        class="text text-danger">{{ $errors->first('emer_G_M') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('ID_Departament', 'Departamenti') !!}
                                {!! Form::select('ID_Departament', ['' => 'Zgjidh...'] + $departamente,null, ['class' => 'select2 form-control', 'required']) !!}
                                <span class="text text-danger" id="userDetailIdRequired"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('ID_Viti_Akademik', 'Viti Akademik') !!}
                                {!! Form::select('ID_Viti_Akademik', ['' => 'Zgjidh...'] + $vite,null, ['class' => 'select2 form-control','required']) !!}
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
                    <table class="table table-striped" id="grupMesimorTable">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Emer</th>
                            <th scope="col">Departamenti</th>
                            <th scope="col">Viti Akademik</th>
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
            $('#grupMesimorTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: APP_URL + '/sekretare/grupMesimor/list',
                error: function (xhr, err) {
                    if (err === 'parsererror')
                        location.reload();
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'emer_G_M', name: 'emer_G_M'},
                    {data: 'departamenti', name: 'departamenti'},
                    {data: 'vit_akademik', name: 'vit_akademik'},
                    {data: 'actions', name: 'actions'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });
        });
    </script>

@endsection