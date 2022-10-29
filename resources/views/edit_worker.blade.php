@extends('layouts.app_worker')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                     Сотрудник
                </div>

                <div class="panel-body">

                    <form action="{{ url('/store')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="hidden" name="id" value="{{$worker->id}}">
                            <label for="worker-name" class="col-sm-6 control-label">Worker</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="worker-name" class="form-control"
                                       value="{{$worker->name}}">
                            </div>
                            <label for="worker_profession_id" class="col-sm-6 control-label">Profession</label>
                            <div class="col-sm-6">
                                <select name="profession_id" id="worker-profession_id" class="form-control">
                                    @foreach($professions as $profession)
                                        <option value="{{$profession->id}}" {{$worker->profession->id == $profession->id ?"selected":""}}>{{$profession->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="worker-age" class="col-sm-6 control-label">Age</label>
                            <div class="col-sm-6">
                                <input type="number" name="age" id="worker-age" class="form-control"
                                       value="{{$worker->age}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Edit Worker
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
