@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-8">
            <div class="accordion" id="accordionExample">
                @foreach(\App\Models\Source::query()->with('students')->get() as $source)
                    <div class="card">
                        <div class="card-header" id="heading{{$source->id}}">
                            <h2 class="mb-0">
                                <div class="d-flex justify-content-between div-link">
                                    <a href="{{$source->link}}" class="source-link" target="_blank" data-id="{{$source->id}}">{{$source->description}}</a>
                                    <div>
                                        <form action="{{route('sources.destroy', $source->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">
                                                <i class="nav-icon fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <button class="d-inline edit-source">
                                            <i class="nav-icon fas fa-edit"></i>
                                        </button>
                                    </div>

                                </div>
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapse{{$source->id}}"
                                        aria-expanded="true" aria-controls="collapseOne">
                                    students
                                </button>
                            </h2>
                        </div>

                        <div id="collapse{{$source->id}}" class="collapse show" aria-labelledby="heading{{$source->id}}"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    @foreach($source->students as $student)
                                        <li>{{$student->name}}</li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="col-4">
            <button id="btn-new-source" class="btn btn-outline-info mb-1">New source</button>
            <div  id="create-source">
                <p class="h3 m-auto">New source</p>
                <form method="post" action="{{route('sources.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" placeholder="Description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Link</label>
                        <input type="text" class="form-control" placeholder="Enter link" name="link">

                    </div>
                    <input type="hidden" name="teacher_id" value="1">
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div id="update-source">
                <p class="h3 m-auto">Update source</p>
                <form method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" placeholder="Description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Link</label>
                        <input type="text" class="form-control" placeholder="Enter link" name="link">
                    </div>
                    <input type="hidden" name="teacher_id" value="1">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    </div>
@endsection
