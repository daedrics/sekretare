@extends('sekretare.layout.master')

@section('styles')

@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Departament</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Departament</li>
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
                    <strong>Regjistro Departament</strong>
                </div>
                {{ Form::open(['route'=>'sekretare.departament.store', 'method'=>'post']) }}
                <div class="card-body card-block">
                    <div class="row form-group">

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('emer_DEP', 'Emer Departamenti', ['class' => 'form-control-label']) !!}
                                {!! Form::text('emer_DEP', null, ['class' => 'form-control','id'=>'email','placeholder' =>'Emer Departamenti', 'required']) !!}
                                @if($errors->first('emer_DEP')) <span
                                        class="text text-danger">{{ $errors->first('emer_DEP') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('ID_Fakultet', 'Fakulteti') !!}
                                {!! Form::select('ID_Fakultet', ['' => 'Zgjidh...'] + $fakultete,null, ['class' => 'select2 form-control']) !!}
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
                    <table class="table table-striped" id="departamentTable">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Departamenti</th>
                            <th scope="col">Fakulteti</th>
                            <th scope="col">Universiteti</th>
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
            $('#departamentTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: APP_URL + '/sekretare/departament/list',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'emer_DEP', name: 'emer_DEP'},
                    {data: 'fakulteti', name: 'fakulteti'},
                    {data: 'universiteti', name: 'universiteti'},
                    {data: 'actions', name: 'actions'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });
        });
    </script>

@endsection