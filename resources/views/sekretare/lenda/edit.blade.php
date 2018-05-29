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
                        <li class="active">Lende/Edito</li>
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
                    <strong>Edito Lende</strong>
                </div>
                {{ Form::model($lenda, ['route' => ['sekretare.lenda.update', $lenda->id], 'method'=>'put', 'class'=>'margin-top-20']) }}
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
                        <i class="fa fa-save"></i> Update
                    </button>
                    <a href="{{route('sekretare.lenda.index')}}" class="btn btn-default btn-sm">
                        <i class="fa fa-arrow-circle-left"></i> Back
                    </a>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection


@section('scripts')

@endsection