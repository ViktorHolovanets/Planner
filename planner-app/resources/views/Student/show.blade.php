@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-8">
            <div class="m-2">
                <div class="h1">{{$student->name}}</div>
                <div>
                    <ul class="list-group">
                        <li class="list-group-item disabled">Sources</li>
                        @foreach($sources as $source)
                            <div class="d-flex justify-content-between">
                                <a href="{{$source->link}}" target="_blank"
                                   class="list-group-item list-group-item-action">{{$source->description}}</a>
                                <form action="{{route('students.delsource')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$student->id}}">
                                    <input type="hidden" name="source" value="{{$source->id}}">
                                    <input type="submit" value="❌" class="btn btn-outline-success h6">
                                </form>
                            </div>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="h3">Add source</div>
            <form action="{{route('students.addsource')}}" method="post">
                @csrf
                @foreach($isnotsources as $source)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sources[]" value="{{$source->id}}">
                        <label class="form-check-label">
                            <a href="{{$source->link}}" target="_blank">{{$source->description}}</a>
                        </label>
                    </div>
                @endforeach
                <input type="hidden" name="id" value="{{$student->id}}">
                <input type="submit" value="Add" class="btn btn-outline-success">
            </form>
        </div>
    </div>
@endsection
