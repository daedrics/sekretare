@extends('sekretare.layout.master')

@section('styles')

@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Provim</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Provim/Edito</li>
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
                    <strong>Edito Provim</strong>
                </div>
                {{ Form::model($provim, ['route' => ['sekretare.provim.update', $provim->id], 'method'=>'put', 'id' => 'provimUpdate', 'class'=>'margin-top-20']) }}
                <div class="card-body card-block">

                    <div class="row form-group">

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('sezoni', 'Sezoni', ['class' => 'form-control-label']) !!}
                                {!! Form::select('sezoni', ['' => 'Zgjidh...'] + ['shkurt'=>'Shkurt','korrik'=>'Korrik','vjeshte'=>'Vjeshte'],null, ['class' => 'form-control']) !!}
                                @if($errors->first('sezoni')) <span
                                        class="text text-danger">{{ $errors->first('sezoni') }}</span> @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {{ Form::label('data_provim', 'Data Provim')}}
                                <div class='input-group date' id='data_provim'>
                                    <input type='text' placeholder="Data Provim" value="{{$provim->data_provim}}"
                                           name="data_provim"
                                           class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('ID_Lenda', 'Lenda') !!}
                                {!! Form::select('ID_Lenda', ['' => 'Zgjidh...'] + $lende,null, ['class' => 'select2 form-control']) !!}
                                <span class="text text-danger" id="userDetailIdRequired"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('ID_Kryetar', 'Kryetar') !!}
                                {!! Form::select('ID_Kryetar', ['' => 'Zgjidh...'] + $pedagog,null, ['id'=>'kryetar','class' => 'select2 form-control']) !!}
                                <span class="text text-danger" id="userDetailIdRequired"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('ID_Anetar_I', 'Anetar I') !!}
                                {!! Form::select('ID_Anetar_I', ['' => 'Zgjidh...'] + $pedagog,null, ['id'=>'anetar1','class' => 'select2 form-control']) !!}
                                <span class="text text-danger" id="userDetailIdRequired"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('ID_Anetar_II', 'Anetar II') !!}
                                {!! Form::select('ID_Anetar_II', ['' => 'Zgjidh...'] + $pedagog,null, ['id'=>'anetar2','class' => 'select2 form-control']) !!}
                                <span class="text text-danger" id="userDetailIdRequired"></span>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-save"></i> Update
                    </button>
                    <a href="{{route('sekretare.provim.index')}}" class="btn btn-default btn-sm">
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
            $('#data_provim').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('.select2').select2({
                placeholder: 'Zgjidh...'
            });

            $('#provimUpdate').on('submit', function (event) {
                var kryetar = $('#kryetar').val();
                var anetar1 = $('#anetar1').val();
                var anetar2 = $('#anetar2').val();
                if (kryetar === anetar1 || kryetar === anetar2 || anetar1 === anetar2) {
                    event.preventDefault();
                    toastr['error']('Anetaret e komisionit duhet te jene te ndryshem!');
                }
                else {
                    $(this).submit();
                }
            })

        });
    </script>
@endsection