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
                                {!! Form::label('ID_Grup_Mesimor', 'Grupi Mesimor') !!}
                                {!! Form::select('ID_Grup_Mesimor', ['' => 'Zgjidh...'] + $grupe ,null, ['class' => 'select2 form-control']) !!}
                                @if($errors->first('ID_Grup_Mesimor')) <span
                                        class="text text-danger">{{ $errors->first('ID_Grup_Mesimor') }}</span> @endif
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-3">
                            <div class="form-group">
                                {!! Form::label('emer', 'Emer', ['class' => 'form-control-label']) !!}
                                {!! Form::text('emer', null, ['class' => 'form-control','id'=>'emer','placeholder' =>'Emer']) !!}
                                @if($errors->first('emer')) <span
                                        class="text text-danger">{{ $errors->first('emer') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                {!! Form::label('mbiemer', 'Mbiemer', ['class' => 'form-control-label']) !!}
                                {!! Form::text('mbiemer', null, ['class' => 'form-control','id'=>'mbiemer','placeholder' =>'Mbiemer']) !!}
                                @if($errors->first('mbiemer')) <span
                                        class="text text-danger">{{ $errors->first('mbiemer') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('ditelindje', 'Ditelindje')}}
                                <div class='input-group date' id='ditelindje'>
                                    <input type='text' placeholder="Ditelindje" name="ditelindje" class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                {{ Form::label('data_regjistrim', 'Date Regjistrim')}}
                                <div class='input-group date' id='date_regjistrim'>
                                    <input type='text' placeholder="Date Regjistrim" name="data_regjistrim"
                                           class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
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
                    <table class="table table-striped" id="studentTable">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Emer</th>
                            <th scope="col">Mbiemer</th>
                            <th scope="col">Grupi</th>
                            <th scope="col">Ditelindja</th>
                            <th scope="col">Regjistruar me</th>
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
            $('#ditelindje, #date_regjistrim').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#studentTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: APP_URL + '/sekretare/student/list',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'emer', name: 'emer'},
                    {data: 'mbiemer', name: 'mbiemer'},
                    {data: 'grupi', name: 'grupi'},
                    {data: 'ditelindje', name: 'ditelindje'},
                    {data: 'data_regjistrim', name: 'data_regjistrim'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });
        });
    </script>

@endsection