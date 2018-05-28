@extends('sekretare.layout.master')

@section('styles')

@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Fakultet</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Fakultet/Edito</li>
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
                    <strong>Edito Fakultet</strong>
                </div>
                {{ Form::model($fakultet, ['route' => ['sekretare.fakultet.update', $fakultet->id], 'method'=>'put', 'class'=>'margin-top-20']) }}
                <div class="card-body card-block">
                    <div class="row form-group">

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('emer_FAKUL', 'Emer Fakulteti', ['class' => 'form-control-label']) !!}
                                {!! Form::text('emer_FAKUL', null, ['class' => 'form-control','placeholder' =>'Emer Fakulteti', 'required']) !!}
                                @if($errors->first('emer_FAKUL')) <span
                                        class="text text-danger">{{ $errors->first('emer_FAKUL') }}</span> @endif
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-save"></i> Update
                    </button>
                    <a href="{{route('sekretare.fakultet.index')}}" class="btn btn-default btn-sm">
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