@extends('layouts.app_worker')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Новый сотрудник
                </div>

                <div class="panel-body">

                    <!-- New Task Form -->
                    <form action="{{ url('/worker')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="worker-name" class="col-sm-6 control-label">Worker</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="worker-name" class="form-control"
                                       value="{{ old('worker') }}">
                            </div>
                            <label for="worker_profession_id" class="col-sm-6 control-label">Profession</label>
                            <div class="col-sm-6">
                                <select name="profession_id" id="worker-profession_id" class="form-control">
                                    @foreach($professions as $profession)
                                        <option value="{{$profession->id}}">{{$profession->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Worker
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($workers) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Workers
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped worker-table">
                            <thead>
                            <th>Worker</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($workers as $worker)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $worker->name }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $worker->profession->name }}</div>
                                    </td>

                                    <!-- Task Delete Button -->
                                    <td>
                                        <form action="{{ url('worker/'.$worker->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
