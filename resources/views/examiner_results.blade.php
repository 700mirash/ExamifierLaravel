@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-3 mt-4">

            <div class="list-group">

                <a href="{{url('examiner/dashboard')}}" class="list-group-item list-group-item-action active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="{{url('examiner/exams')}}" class="list-group-item list-group-item-action"><i class="fas fa-pencil-ruler"></i> Exams</a>
                <a href="{{url('examiner/results')}}" class="list-group-item list-group-item-action"><i class="fas fa-clock"></i> Results</a>
                <a href="{{url('examiner/notice')}}" class="list-group-item list-group-item-action"><i class="fas fa-exclamation-triangle"></i> Notice</a>

            </div>

        </div>


        <div class="col-md-9 mt-4">

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a>Examiner</a></li>
                <li class="breadcrumb-item active"><a>Exam Results</a></li>
              </ol>


            <div class="row">

                @foreach ($exams as $item)
                <div class="col-md-4">
                    <a href="{{url('/examiner/result/')}}/{{$item->id}}">
                    <div class="card text-white bg-primary mb-4" style="max-width: 20rem;">
                        <div class="card-header">{{$item->name}}</div>
                        <div class="card-body">

                            <center>
                                <div class="mb-4" style="background:rgb(248, 79, 0); width: 60px;
                                height: 60px; border-radius:50px;">
                                    <i style="font-size: 20px; margin-top:1.2rem" class="fas fa-drafting-compass "></i>

                                </div>
                            </center>

                          {{-- <h4 class="card-title">Time : 20 Min</h4>
                          <p class="card-text">Total Marks: 20</p> --}}
                        </div>
                      </div>
                    </a>
               </div>




               @endforeach





            </div>


        </div>
    </div>
</div>



@endsection
