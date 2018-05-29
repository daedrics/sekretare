@extends('sekretare.layout.master')

@section('styles')

@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Pedagog</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Pedagog/Edito</li>
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
                    <strong>Edito Pedagog</strong>
                </div>
                {{ Form::model($pedagog, ['route' => ['sekretare.pedagog.update', $pedagog->id], 'method'=>'put', 'class'=>'margin-top-20']) }}
                <div class="card-body card-block">
                    <div class="row form-group">

                        <div class="col-4 offset-md-2">
                            <div class="form-group">
                                {!! Form::label('email', 'Email', ['class' => 'form-control-label']) !!}
                                {!! Form::email('email', $pedagog->user->email, ['class' => 'form-control','id'=>'email','placeholder' =>'Email']) !!}
                                @if($errors->first('email')) <span
                                        class="text text-danger">{{ $errors->first('email') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('titull', 'Titulli', ['class' => 'form-control-label']) !!}
                                {!! Form::text('titull', null, ['class' => 'form-control','id'=>'titull','placeholder' =>'Titulli']) !!}
                                @if($errors->first('titull')) <span
                                        class="text text-danger">{{ $errors->first('titull') }}</span> @endif
                            </div>
                        </div>


                    </div>

                    <div class="row form-group">

                        <div class="col-4 offset-md-2">
                            <div class="form-group">
                                {!! Form::label('emer', 'Emer', ['class' => 'form-control-label']) !!}
                                {!! Form::text('emer', null, ['class' => 'form-control','id'=>'emer','placeholder' =>'Emer']) !!}
                                @if($errors->first('emer')) <span
                                        class="text text-danger">{{ $errors->first('emer') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('mbiemer', 'Mbiemer', ['class' => 'form-control-label']) !!}
                                {!! Form::text('mbiemer', null, ['class' => 'form-control','id'=>'mbiemer','placeholder' =>'Mbiemer']) !!}
                                @if($errors->first('mbiemer')) <span
                                        class="text text-danger">{{ $errors->first('mbiemer') }}</span> @endif
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="offset-md-2">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <a href="{{route('sekretare.pedagog.index')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-arrow-circle-left"></i> Back
                            </a>
                        </div>
                    </div>

                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection


@section('scripts')

@endsection