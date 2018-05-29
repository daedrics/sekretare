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
                        <li class="active">Student/Edito</li>
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
                    <strong>Edito Student</strong>
                </div>
                {{ Form::model($student, ['route' => ['sekretare.student.update', $student->id], 'method'=>'put', 'class'=>'margin-top-20']) }}
                <div class="card-body card-block">
                    <div class="row form-group">

                        <div class="col-4 offset-md-2">
                            <div class="form-group">
                                {!! Form::label('email', 'Email', ['class' => 'form-control-label']) !!}
                                {!! Form::email('email', $student->user->email, ['class' => 'form-control','id'=>'email','placeholder' =>'Email']) !!}
                                @if($errors->first('email')) <span
                                        class="text text-danger">{{ $errors->first('email') }}</span> @endif
                            </div>
                        </div>

                        {{--<div class="col-4">--}}
                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('password', 'Password', ['class' => 'form-control-label']) !!}--}}
                        {{--{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}--}}
                        {{--@if($errors->first('password')) <span--}}
                        {{--class="text text-danger">{{ $errors->first('password') }}</span> @endif--}}
                        {{--</div>--}}
                        {{--</div>--}}

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
                                    <input type='text' placeholder="Ditelindje" value="{{$student->ditelindje}}"
                                           name="ditelindje" class="form-control"/>
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
                                           value="{{$student->data_regjistrim}}"
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
                        <i class="fa fa-save"></i> Update
                    </button>
                    <a href="{{route('sekretare.student.index')}}" class="btn btn-default btn-sm">
                        <i class="fa fa-arrow-circle-left"></i> Back
                    </a>
                </div>
                {{Form::close()}}
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

            $('.select2').select2({
                placeholder: 'Zgjidh...'
            });
        });
    </script>
@endsection