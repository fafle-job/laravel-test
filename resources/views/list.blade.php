@extends('layouts.app')


@section('content')
<div class="container" id='tasksList' ng-app="tasksApp" ng-controller="tasksController">
    <input type="hidden" id="api_token" value="{{Auth::user()->api_token}}" />
    @if (Auth::user()->group == 'manager')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="task.title">Task title:</label>
                <input type='text' class="form-control" ng-model="task.title">
            </div>
            <div class="form-group">
                <label for="task.close_date">Task close date:</label>
                <input class="form-control"  type='text' ng-model="task.close_date">
            </div>
            <div class="form-group">
                <label for="task.description">Task executor:</label>
                <select ng-model="task.user" id='taskEmployers' class="form-control">
                    <option ng-repeat='employer in employers' value="<% employer.id %>"><% employer.name %></option>
                </select>
            </div>
            <div class="form-group">
                <label for="task.description">Task status:</label>
                <select ng-model="task.status" class="form-control" ng-options="status.value as status.name for status in statuses"></select>
            </div>
            <div class="form-group">
                <label for="task.description">Task description:</label>
                <textarea class="form-control" ng-model="task.description"></textarea>
            </div>
            <div class="form-group">

                <button class="btn btn-primary btn-md"  ng-click="createTask()">Create</button>
                <i ng-show="loading" class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
    @endif
    
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tr ng-repeat='task in tasks'>
                    <td><% task.title %></td>
                    <td><% task.description %></td>
                    <td><% task.close_date %></td>
                    <td><select ng-model="task.status" class="form-control" ng-options="status.value as status.name for status in statuses" ng-change="updateTask(task)"></select></td>
                    <td><button class="btn btn-danger btn-xs" ng-click="deleteTask($index)">  <span class="glyphicon glyphicon-trash" ></span></button></td>
                </tr>
            </table>
        </div>
    </div>

    <button class="btn btn-success" ng-click="loadMore()">Load More</button>
</div>
@endsection