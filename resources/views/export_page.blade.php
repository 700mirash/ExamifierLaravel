@extends('layouts.app')

@section('content')



<div class="container exam-conatiner">

    <center>
        <h1 class="mb-2">Result Board</h1>
        <h3 align="center" class="mb-2">{{ $data->Exam[0]->subject}} - {{ $data->Exam[0]->name }}</h3>
         <p align="center">{{\Carbon\Carbon::parse($date)->format('Y-m-d h:i a')}}</p>
        <p align="center">Total Mark {{$total}}</p>
    </center>



    <table class="table border" style="font-size: 24px ">
        <thead>
          <tr class="table-danger">

            <th scope="col">Merit Position</th>
            <th scope="col">Name</th>
            <th scope="col">Mark</th>

          </tr>
        </thead>
        <tbody>


            @php
                $i = 1;
            @endphp
            @foreach ($score as $item)

            <tr @if($item['id'] == Auth::user()->id) class="table-success" @endif>

                <th scope="row">{{$i}}</th>
                <td>{{$item['name']}}</td>
                <td>{{$item['marks']}}</td>

              </tr>

            @php
                $i++;
            @endphp
            @endforeach









        </tbody>
      </table>










</div>




@endsection
