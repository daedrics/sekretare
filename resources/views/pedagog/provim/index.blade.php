@extends('pedagog.layout.master')

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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Kerko Provim</strong>
                </div>
                {{ Form::open(['route'=>'pedagog.provim.search', 'method'=>'post']) }}
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
                        <i class="fa fa-search"></i> Kerko
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
                                    <th width="40%" scope="col">Nota</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(session('detyrime') as $detyrim)
                                    @if($detyrim->ploteson)
                                        <tr>
                                            <td>{{$detyrim->student->emer}}</td>
                                            <td>{{$detyrim->student->mbiemer}}</td>
                                            <td>
                                                <div class="col-md-5">
                                                    <input id="input{{$detyrim->student->id}}" class="form-control"
                                                           type="text" placeholder="Nota"
                                                           value="{{$detyrim->student->flete_provim[0]->nota}}"
                                                            {{$detyrim->student->flete_provim[0]->nota == null ? '' : 'disabled'}}>
                                                </div>
                                                <div id="saveMark{{$detyrim->student->id}}"
                                                     style="display: {{$detyrim->student->flete_provim[0]->nota == null ? '' : 'none'}}"
                                                     class="col-md-1"><a id="{{$detyrim->student->id}}"
                                                                         data-lenda="{{session('lenda')->id}}"
                                                                         style="margin-top: 8px" href="#"
                                                                         class="btn btn-xs btn-primary save-mark">
                                                        <i data-toggle="tooltip" data-placement="top"
                                                           title="Konfirmo"
                                                           class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                                <div id="editMark{{$detyrim->student->id}}"
                                                     style="display: {{$detyrim->student->flete_provim[0]->nota != null ? '' : 'none'}}"
                                                     class="col-md-1"><a id="{{$detyrim->student->id}}"
                                                                         data-lenda="{{session('lenda')->id}}"
                                                                         style="margin-top: 8px" href="#"
                                                                         class="btn btn-xs btn-success edit-mark">
                                                        <i data-toggle="tooltip" data-placement="top"
                                                           title="Konfirmo"
                                                           class="fa fa-pencil"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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

            $('.save-mark').on('click', function () {
                var idStudent = $(this).attr('id');
                var nota = $('#input' + idStudent).val();
                var lenda = $(this).attr('data-lenda');
                if (nota === '') {
                    toastr['error']('Ju lutem vendosni noten!');
                    return false;
                }

                if (parseInt(nota) < 4 || parseInt(nota) > 10) {
                    toastr['error']('Ju lutem vendosni noten valide!');
                    return false;
                }

                else {
                    $.ajax({
                        url: APP_URL + '/pedagog/provim/nota/' + idStudent,
                        type: 'POST',
                        data: {
                            _token: $('input[name="_token"]').val(),
                            nota: nota,
                            lenda: lenda
                        },
                        success: function (d) {
                            $('#input' + idStudent).prop('disabled', true);
                            $('#editMark' + idStudent).show();
                            $('#saveMark' + idStudent).hide();
                            toastr['success'](d.message);
                        },
                        error: function (d) {
                            toastr['error']('Dicka shkoi gabim, provo perseri!');
                        }
                    })
                }
            });

            $('.edit-mark').on('click', function () {
                var idStudent = $(this).attr('id');
                $('#input' + idStudent).prop('disabled', false);
                $('#saveMark' + idStudent).show();
                $('#editMark' + idStudent).hide();
            });


        });

    </script>
@endsection