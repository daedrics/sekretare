@extends('student.layout.master')

@section('styles')

@endsection

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
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
                    <div class="float-left">
                        <div class="page-title">
                            <strong>Studenti: </strong>{{$student->emer}} {{$student->mbiemer}}
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="page-title">
                            <strong>Grupi: </strong> {{$student->grup_mesimor->emer_G_M}}
                            {{$student->grup_mesimor->departament->emer_DEP}} {{$student->grup_mesimor->vit_akademik->emer_V_A}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 offset-1">
                            <table class="table table-striped" id="lendaTable">
                                <thead>
                                <tr>
                                    <th scope="col">Lenda</th>
                                    <th scope="col">Pedagogu</th>
                                    <th scope="col">Detyrimi Akademik</th>
                                    <th scope="col">Nota</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $('#lendaTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: APP_URL + '/student/list',
                columns: [
                    {data: 'lenda', name: 'lenda'},
                    {data: 'pedagog', name: 'pedagog'},
                    {data: 'ploteson', name: 'ploteson'},
                    {data: 'nota', name: 'nota'},
                ]
            });
        });
    </script>

@endsection