@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-8">
            <p class="h1">Today</p>
            <ul>
                @foreach(\App\Models\Meeting::getCasheMeetingsToday() as $meeting)
                    <li><a href="#">{{$meeting->student->name}}</a> {{date('H:i',strtotime($meeting->time_work))}}</li>
                @endforeach
            </ul>

        </div>
        <div class="col-4">
            <div id="calendar" ></div>
        </div>
    </div>

@endsection
@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
    <script src="./calendar.js"></script>
@endsection
