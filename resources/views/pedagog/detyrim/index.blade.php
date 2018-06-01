@extends('pedagog.layout.master')

@section('styles')

@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Detyrime Akademike</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Detyrime Akademike</li>
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
                    <strong>Kerko Detyrim</strong>
                </div>
                {{ Form::open(['route'=>'pedagog.detyrime.search', 'method'=>'post']) }}
                <div class="card-body card-block">
                    <div class="row form-group">

                        <div class="col-md-4 offset-2">
                            <div class="form-group">
                                {!! Form::label('ID_Lenda', 'Lenda') !!}
                                {!! Form::select('ID_Lenda', ['' => 'Zgjidh...'] + $lende,null, ['class' => 'select2 form-control']) !!}
                                <span class="text text-danger" id="userDetailIdRequired"></span>
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
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm offset-2">
                        <i class="fa fa-save"></i> Kerko
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

    @if(session('detyrime') )
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="float-left">
                            <div class="page-title">
                                <strong>Lenda: </strong>{{session('lenda')->emer}}
                            </div>
                        </div>
                        <div class="float-right">
                            <div class="page-title">
                                <strong>Grupi: </strong>{{session('grupi')->emer_G_M . ' '.
                                session('grupi')->departament->emer_DEP .' '. session('grupi')->vit_akademik->emer_V_A}}
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="col-md-9 offset-1">
                            <table class="table table-striped" id="detyrimeTable">
                                <thead>
                                <tr>
                                    <th scope="col">Emri</th>
                                    <th scope="col">Mbiemri</th>
                                    <th scope="col">Ploteson</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(session('detyrime') as $detyrim)
                                    <tr>
                                        <td>{{$detyrim->student->emer}}</td>
                                        <td>{{$detyrim->student->mbiemer}}</td>
                                        <td>
                                            <label class="switch switch-text switch-success switch-pill">
                                                <input type="checkbox" class="switch-input" id="{{$detyrim->id}}"
                                                        {!!  $detyrim->ploteson ? 'checked="true"' : ''!!}>
                                                <span data-on="Po" data-off="Jo" class="switch-label"></span> <span
                                                        class="switch-handle"></span>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection


@section('scripts')

    <script>
        $(function () {

            $('.select2').select2({
                placeholder: 'Zgjidh...'
            });

        });

        $(document).ready(function () {
            $('#detyrimeTable').DataTable();

            $('.switch-input').on('click', function () {
                $.ajax({
                    url: APP_URL + '/pedagog/detyrime/ploteson/' + $(this).attr('id'),
                    type: 'POST',
                    data: {
                        _token: $('input[name="_token"]').val()
                    },
                    success: function (d) {
                        toastr['success'](d.message);
                    },
                    error: function (d) {
                        toastr['error']('Dicka shkoi gabim, provo perseri!');
                    }
                })
            })
        });

    </script>
@endsection