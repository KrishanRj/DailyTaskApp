<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Tasks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">

        <h1 align="center">Daily Tasks</h1>
        <hr>

        <br>

        @foreach ($errors -> all() as $error)
        <div class="alert alert-danger" role="alert">
          {{$error}}
        </div>
        @endforeach

        <form class="" action="/saveTask" method="post">
          {{csrf_field()}}
          <div class="row">
            <input class="form-control" type="text" name="task" value="" placeholder="Enter your task here">
          </div>
          <br>
          <button type="submit" name="button" class="btn btn-primary">Save</button>
          <button type="button" name="button" class="btn btn-warning">Clear</button>
        </form>

        <br><br>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Task</th>
              <th scope="col">Completed</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tasks as $task)
            <tr>
              <td>{{$task->id}}</td>
              <td>{{$task->task}}</td>
              <td>
                @if($task->iscompleted)
                <button type="button" class="btn btn-success">Completed</button>
                @else
                <button type="button" class="btn btn-danger">Not Completed</button>
                @endif
              </td>
              <td>
                @if(!($task->iscompleted))
                <a href="/markAsCompleted/{{$task->id}}" class="btn btn-success">Mark As Completed</a>
                @else
                <a href="/markAsNotCompleted/{{$task->id}}" class="btn btn-warning">Mark As NotCompleted</a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>

  </body>
</html>
