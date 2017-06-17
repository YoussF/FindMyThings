@extends('layouts.master')

@section('content')
<div class="container page_info">
    <div class="panel panel-default">
      <div class="panel-body">
             <a class="btn btn-warning" href="/group">
                Create new group
             </a>
              <a class="btn btn-warning" href="/groups">
                Show groups
             </a>
            <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->description }}</td>
                        <td>
                         <a class="btn btn-warning" href="/edit/group/{{$group->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $groups->links() }}
      </div>
    </div>
</div>
@endsection