@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-7 m-1">
            <div class="accordion" id="accordionExample">
                <div class="modal fade" id="modalCreateMeeting" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" >Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                Form create meeting for student


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach(\App\Models\Student::query()->with('meetings')->get() as $student)
                    <div class="card">
                        <div class="card-header" id="heading{{$student->id}}">
                            <h2 class="mb-0">
                                <div class="d-flex justify-content-between">
                                    <p data-id="{{$student->id}}">{{$student->name}}</p>
                                    <div class="h6">
                                        <form action="{{route('students.destroy', $student->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">
                                                <i class="nav-icon fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <button class="d-inline edit-student" data-group="{{$student->group?->id}}" data-st="{{$student->name}}">
                                            <i class="nav-icon fas fa-edit"></i>
                                        </button>
                                    </div>

                                </div>
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapse{{$student->id}}"
                                        aria-expanded="true" aria-controls="collapseOne">
                                    meetings
                                </button>
                            </h2>
                        </div>

                        <div id="collapse{{$student->id}}" class="collapse show" aria-labelledby="heading{{$student->id}}"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <button type="button" class="btn btn-outline-light h6" data-toggle="modal" data-target="#modalCreateMeeting">
                                    +New
                                </button>
                                <ul>
                                    @foreach($student->meetings as $meeting)
                                        <li>{{$meeting->time_work}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="col-4 m-1">
            <button id="btn-new-student" class="btn btn-outline-info mb-1">New source</button>
            <div  id="create-student">
                <p class="h3 m-auto">New student</p>
                <form method="post" action="{{route('students.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Group</label>
                        <select class="form-select form-control" name="group_id">
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="teacher_id" value="1">
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div id="update-student">
                <p class="h3 m-auto">Update student</p>
                <form method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Group</label>
                        <select class="form-select form-control" name="group_id">
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </form>
            </div>
            <hr>
            <hr>
            <div  id="create-group">
                <p class="h3 m-auto">New group</p>
                <form method="post" action="{{route('groups.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name">
                    </div>
                    <!-- todo teacher_id -->
                    <input type="hidden" name="teacher_id" value="1">
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>


    </div>
@endsection
