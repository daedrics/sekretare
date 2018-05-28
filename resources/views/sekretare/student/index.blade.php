@extends('sekretare.layout.master')

@section('styles')

@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Student</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Student</li>
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
                    <strong>Regjistro Student</strong>
                </div>
                {{ Form::open(['route'=>'sekretare.student.store', 'method'=>'post']) }}
                <div class="card-body card-block">
                    <div class="row form-group">

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('email', 'Email', ['class' => 'form-control-label']) !!}
                                {!! Form::email('email', null, ['class' => 'form-control','id'=>'email','placeholder' =>'Email']) !!}
                                @if($errors->first('email')) <span
                                        class="text text-danger">{{ $errors->first('email') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('password', 'Password', ['class' => 'form-control-label']) !!}
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                                @if($errors->first('password')) <span
                                        class="text text-danger">{{ $errors->first('password') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('role', 'Roli') !!}
                                {!! Form::select('role', ['' => 'Zgjidh...'] + ['pedagog'=>'Pedagog','student'=>'Student'],null, ['class' => 'select2 form-control']) !!}
                                @if($errors->first('role')) <span
                                        class="text text-danger">{{ $errors->first('role') }}</span> @endif
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
                    <table class="table table-striped" id="usersTable">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roli</th>
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
        $(document).ready(function() {
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: APP_URL + '/sekretare/student/list',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'email', name: 'email'},
                    {data: 'role', name: 'role'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });
        } );
    </script>

@endsection