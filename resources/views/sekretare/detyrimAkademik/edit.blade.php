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
                        <li class="active">Detyrim Akademik/Edito</li>
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
                    <strong>Edito Detyrim Akademik</strong>
                </div>
                {{ Form::model($detyrimAkademik, ['route' => ['sekretare.detyrimAkademik.update', $detyrimAkademik->id], 'method'=>'put', 'id' => 'provimUpdate', 'class'=>'margin-top-20']) }}
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

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('grup_mesimor', 'Grup Mesimor', ['class' => 'form-control-label']) !!}
                                {!! Form::text('grup_mesimor', $grupMesimor, ['class' => 'form-control','id'=>'grup_mesimor','placeholder' =>'Grup Mesimor', 'disabled']) !!}
                            </div>
                        </div>
                        <input type="hidden" name="grupMesimorId" value="{{$grupMesimorId}}">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-save"></i> Update
                    </button>
                    <a href="{{route('sekretare.detyrimAkademik.index')}}" class="btn btn-default btn-sm">
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
            $('.select2').select2({
                placeholder: 'Zgjidh...'
            });
        });
    </script>
@endsection