@extends('layouts.app')

@section('contant')
<div>
    <div class="p-3">
        <div class="row pb-5 pt-3">
            <div class="col"></div>
            <div class="col">
                <h1 class="text-center title">TO DO App page</h1>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="{{ route('addtask') }}" method="post">
                @csrf
                <div class="row">
                    <input class="form-control border border-dark-subtle" type="text" name="title" placeholder="Enter Task" aria-label="default input example">
                </div>
                <div class="row mt-3">
                    <input class="form-control border border-dark-subtle" type="text" name="description" placeholder="Task description" aria-label="default input example" style="height: 80px">
                </div>
            </div>
            <div class="col mt-5 pt-1">
                <button type="submit" class="btn btn-success">Add Task</button>
            </div>
            </form>
        </div>
        <div class="row pt-5">
            <div class="col-3"></div>
            <div class="col-6">
                <table class="table table-hover">
                    <caption>To Do List</caption>
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)

                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $task->title }}</td>
                                @if ($task->description)
                                    <td>{{$task->description}}</td>
                                @else
                                    <td>No Desc</td>
                                @endif

                                <td>
                                    <a href="{{ route('task.statusChange', $task->id) }}">
                                        @if ( $task->done )
                                            <span class="badge bg-success"> Completed</span>
                                        @else
                                            <span class="badge bg-danger"> Pending</span>
                                        @endif
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('task.delete', $task->id) }}" class="btn btn-outline-danger btn-sm"> Remove</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editTask"> change</a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="col"></div>
        </div>

    </div>

</div>



<!-- Modal -->
{{-- <div class="modal fade" id="editTask" tabindex="-1" aria-labelledby="editTaskLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editTaskLabel">Edit Task</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


            <div class="row">
                <form action="{{ route('edittask') }}" method="post">
                @csrf
                <div class="col">
                    <input class="form-control border border-dark-subtle" type="text" name="title" placeholder="Edit Task" aria-label="default input example">
                </div>
                <div class="col mt-3">
                    <input class="form-control border border-dark-subtle" type="text" name="description" placeholder="Edit description" aria-label="default input example" style="height: 80px">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ok</button>
        </form>
        </div>
      </div>
    </div>
  </div> --}}
@endsection

@push('css')
<style>

</style>
@endpush
