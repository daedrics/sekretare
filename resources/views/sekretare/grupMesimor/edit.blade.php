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
                        <li class="active">Grup Mesimor/Edito</li>
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
                    <strong>Edito Grup Mesimor</strong>
                </div>
                {{ Form::model($grupMesimor, ['route' => ['sekretare.grupMesimor.update', $grupMesimor->id], 'method'=>'put', 'class'=>'margin-top-20']) }}
                <div class="card-body card-block">
                    <div class="row form-group">

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('emer_G_M', 'Emer Grupi Mesimor', ['class' => 'form-control-label']) !!}
                                {!! Form::text('emer_G_M', null, ['class' => 'form-control','placeholder' =>'Emer Grupi Mesimor', 'required']) !!}
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
                        <i class="fa fa-save"></i> Update
                    </button>
                    <a href="{{route('sekretare.grupMesimor.index')}}" class="btn btn-default btn-sm">
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