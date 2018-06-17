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
                        <li class="active">Provim</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Regjistro Provim</strong>
                </div>
                {{ Form::open(['route'=>'sekretare.provim.store', 'method'=>'post','id'=>'provimStore']) }}
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
                                    <input type='text' placeholder="Data Provim" name="data_provim"
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
                    <table class="table table-striped" id="provimTable">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Sezoni</th>
                            <th scope="col">Data Provim</th>
                            <th scope="col">Lenda</th>
                            <th scope="col">Kryetari</th>
                            <th scope="col">Anetari I</th>
                            <th scope="col">Anetari II</th>
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
    <script>
        $(function () {
            $('#data_provim').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('.select2').select2({
                placeholder: 'Zgjidh...'
            });

            $('#provimStore').on('submit', function (event) {
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

    <script type="text/javascript">

        $(document).ready(function () {
            var table = $('#provimTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: APP_URL + '/sekretare/provim/list',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'sezoni', name: 'sezoni'},
                    {data: 'data_provim', name: 'data_provim'},
                    {data: 'lenda', name: 'lenda'},
                    {data: 'kryetar', name: 'kryetar'},
                    {data: 'anetarI', name: 'anetarI'},
                    {data: 'anetarII', name: 'anetarII'},
                    {data: 'actions', name: 'actions'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });

//            $('#provimTable tbody').on('click', '.btnShow', function () {
//                var data = table.row($(this).closest('tr').index()).data();
//                console.log(data);
//                $('#content').empty();
//                var html = ' <p style="float: right"><strong>Kryetar:</strong> ' + data.kryetar + '</p>' +
//                    '<p><strong>Sezoni:</strong> ' + data.sezoni + '</p> ' +
//                    '<p style="float: right"><strong>Anetar I:</strong> ' + data.anetarI + '</p> ' +
//                    '<p><strong>Data:</strong> ' + data.data_provim + '</p> ' +
//                    '<p style="float: right"><strong>Anetar II:</strong> ' + data.anetarII + '</p> ' +
//                    '<p><strong>Lenda:</strong> ' + data.lenda + '</p>';
//                $('#content').append(html);
//                $('#mediumModal').modal('show');
//            });

        });
    </script>

@endsection