@extends('front.layouts.master')

@section('content')
    <form class="place_form" role="form" method="POST" action="/settings" enctype="multipart/form-data">
        {{ csrf_field() }}

        <label>Firstname * :<input type="text" name="firstname" value="{{ $user->firstname }}"></label>

        <label>Last name * :<input type="text" name="lastname" value="{{ $user->lastname }}"></label>

        <label>Gender * :    
            <select class="form-control" id="sel1" name="gender">
                <option value=""  >-- Select a gender</option>
                <option value=0 {{$user->gender == 0 ? 'selected' : ''}}>Male</option>
                <option value=1 {{$user->gender == 1 ? 'selected' : ''}}>Female</option>
            </select>
        </label>

        <label>E-Mail Address * :<input type="text" name="email" value="{{ $user->email }}"></label>

        <label>Phone :<input type="text" name="phone" value="{{ $user->phone }}"></label>

        <label>Password :<input type="password" name="password"></label>

        <label>Confirm Password :<input type="password" name="password_confirmation"></label>

        <label>Upload new picture :<input id="avatar" name="avatar" type="file" /></label>

        <label><button type="submit" class="btn btn-success pull-right">Update</button></label>
                
    </form>
@endsection