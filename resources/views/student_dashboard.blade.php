@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-3 mt-4">

            <div class="list-group">

                <a href="{{url('student/dashboard')}}" class="list-group-item list-group-item-action active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="{{url('student/exams')}}" class="list-group-item list-group-item-action"><i class="fas fa-pencil-ruler"></i> Exams</a>
                <a href="{{url('student/results')}}" class="list-group-item list-group-item-action"><i class="fas fa-clock"></i> Results</a>
                <a href="{{url('student/notice')}}" class="list-group-item list-group-item-action"><i class="fas fa-exclamation-triangle"></i> Notice</a>

            </div>

        </div>


        <div class="col-md-9 mt-4">

            @foreach ($exams as $item)

                @php
                    $check = App\StudentData::where('student_id', Auth::user()->id)->where('exam_id', $item->id)->count();
                @endphp

                @if ($check == 0)

                <div class="content">
                    <canvas class="snow" id="snow"></canvas>
                    <div class="main-text">
                        <h1>Welcome !<br/>To Mediexams..</h1><a class="home-link" href="{{route('student.exams')}}">Start An Exam.</a>
                    </div>
                    <div class="ground">
                        <div class="mound">

                            <div class="mound_spade"></div>
                        </div>
                    </div>
                </div>


                @else

                <div class="content">
                    <canvas class="snow" id="snow"></canvas>
                    <div class="main-text">
                        <h1>Welcome !<br/>To Mediexams ..</h1><a class="home-link" href="{{route('student.results')}}">See Your Result.</a>
                    </div>
                    <div class="ground">
                        <div class="mound">

                            <div class="mound_spade"></div>
                        </div>
                    </div>
                </div>

                @endif

               @endforeach




        </div>



    </div>
</div>


<script>
    (function() {
        function ready(fn) {
            if (document.readyState != 'loading') {
                fn();
            } else {
                document.addEventListener('DOMContentLoaded', fn);
            }
        }

        function makeSnow(el) {
            var ctx = el.getContext('2d');
            var width = 0;
            var height = 0;
            var particles = [];

            var Particle = function() {
                this.x = this.y = this.dx = this.dy = 0;
                this.reset();
            }

            Particle.prototype.reset = function() {
                this.y = Math.random() * height;
                this.x = Math.random() * width;
                this.dx = (Math.random() * 1) - 0.5;
                this.dy = (Math.random() * 0.5) + 0.5;
            }

            function createParticles(count) {
                if (count != particles.length) {
                    particles = [];
                    for (var i = 0; i < count; i++) {
                        particles.push(new Particle());
                    }
                }
            }

            function onResize() {
                width = window.innerWidth;
                height = window.innerHeight;
                el.width = width;
                el.height = height;

                createParticles((width * height) / 10000);
            }

            function updateParticles() {
                ctx.clearRect(0, 0, width, height);
                ctx.fillStyle = '#f6f9fa';

                particles.forEach(function(particle) {
                    particle.y += particle.dy;
                    particle.x += particle.dx;

                    if (particle.y > height) {
                        particle.y = 0;
                    }

                    if (particle.x > width) {
                        particle.reset();
                        particle.y = 0;
                    }

                    ctx.beginPath();
                    ctx.arc(particle.x, particle.y, 5, 0, Math.PI * 2, false);
                    ctx.fill();
                });

                window.requestAnimationFrame(updateParticles);
            }

            onResize();
            updateParticles();

            window.addEventListener('resize', onResize);
        }

        ready(function() {
            var canvas = document.getElementById('snow');
            makeSnow(canvas);
        });
    })();
</script>

@endsection
