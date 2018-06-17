<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            background: #f1f1f1;

        }

        #notebook-paper {
            font-family: "Times New Roman", Times, serif;
            font-weight: 200;
            width: 960px;
            height: 1109px;
            background: white;
            margin: 50px auto;
            background-size: 100% 30px;
            position: relative;
            padding-top: 150px;
            padding-left: 50px;
            padding-right: 20px;
            overflow: hidden;
            border-radius: 5px;
            -webkit-box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2), 0px 0px 6px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2), 0px 0px 6px rgba(0, 0, 0, 0.2);
            -ms-box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2), 0px 0px 6px rgba(0, 0, 0, 0.2);
            -o-box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2), 0px 0px 6px rgba(0, 0, 0, 0.2);
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2), 0px 0px 6px rgba(0, 0, 0, 0.2);
        }

        #notebook-paper:before {
            content: '';
            display: block;
            position: absolute;
            z-index: 1;
            top: 0;
            left: 140px;
            height: 100%;
            width: 1px;

        }

        #notebook-paper header {
            height: 150px;
            width: 100%;
            background: white;
            position: absolute;
            top: 0;
            left: 0;
        }

        #notebook-paper header h1 {
            font-size: 60px;
            line-height: 60px;
            padding: 127px 20px 0 160px;
            margin: auto;
        }

        #notebook-paper #content {
            margin-top: 37px;
            font-size: 20px;
            line-height: 30px;
        }

        #notebook-paper #content p {
            margin: 0 0 0 0;
        }

        #notebook-paper #content h4, #notebook-paper #content h5, #notebook-paper #content h2 {
            margin-left: auto;
            margin-bottom: 1px;
            margin-top: 5px;
            margin-right: auto;
            text-align: center;
        }

        .logo {
            width: 128px;
            height: 128px;
            position: absolute;
            top: 50px;
            left: 435px;
        }

        .table {
            margin-top: 50px;
            width: 100%;
        }

        .table table {
            width: inherit;
        }

        #students {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }

        #students td, #students th {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-size: 16px;
        }

        #students tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #students th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #e0e0e0;
            color: black;
        }

    </style>

</head>
<body>

<div id="notebook-paper">
    <header>
        <h1><img class="logo" src="{{asset('images/upt.png')}}"></h1>

    </header>
    <div id="content">
        <h4>Universiteti Politeknik i Tiranes</h4>
        <h5>Sheshi Nene Tereza, Nr. 4 Tirane</h5>
        <hr>
        <h2 style="margin-bottom: 10px">Flete Provimi</h2>
        <div class="hipsum">
            <p style="float: right"><strong>Kryetar:</strong> {{$provim->kryetar->emer}} {{$provim->kryetar->mbiemer}}
            </p>
            <p><strong>Sezoni:</strong> {{strtoupper($provim->sezoni)}}</p>
            <p style="float: right"><strong>Anetar I:</strong> {{$provim->anetar1->emer}} {{$provim->anetar1->mbiemer}}
            </p>
            <p><strong>Data:</strong> {{$provim->data_provim}}</p>
            <p style="float: right"><strong>Anetar II:</strong> {{$provim->anetar2->emer}} {{$provim->anetar2->mbiemer}}
            </p>
            <p><strong>Lenda:</strong> {{$provim->lenda->emer}}</p>

        </div>

        <div class="table">
            <table border="1" id="students">
                <thead>
                <th>Nr.</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Data</th>
                <th>Nota</th>
                <th>Nenshkrimi i pedagogut</th>
                </thead>
                <tbody>

                @foreach($flete as  $key => $flet)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$flet->student->emer}}</td>
                        <td>{{$flet->student->mbiemer}}</td>
                        <td>{{$flet->updated_at}}</td>
                        <td>{{$flet->nota}}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <p style="font-size: 16px;margin-top: 10px">Mbyllet me numer rendor {{$flete->count()}}</p>
    </div>
</div>
</body>
</html>