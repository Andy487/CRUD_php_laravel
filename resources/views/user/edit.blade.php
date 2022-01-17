@extends('layout.app')
@section('title','edit user')

@section('content')
  <form action="{{route('user.update',$user->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class=" form-group mb-3">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>

            <label for="name"><b>Name</b></label>
            <input class="form-control" type="text" placeholder="Enter Name" name="name" value="{{$user->name}}" id="name" required>
            <br>
            <label for="phoneNumber"><b>Phone no</b></label>
            <input class="form-control" type="text" placeholder="Enter phone number" name="phoneNumber" value="{{$user->phoneNumber}}" id="phoneNumber"
                required>
            <br>
            <label for="email"><b>Email</b></label>
            <input class="form-control" type="text" placeholder="Enter Email" name="email" value="{{$user->email}}" id="email" required>
            <br>
            <label for="address"><b>Address</b></label>
            <input class="form-control" type="text" placeholder="Enter Address" name="address" value="{{$user->address}}" id="address" required>

            <br>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

            <button type="submit" class="btn btn-info registerbtn">Register</button>
            <a class="btn btn-info registerbtn" href="{{route('user.index')}}" role="button">Back</a>
        </div>
        <div class="container signin">
            <p>Already have an account? <a href="#">Sign in</a>.</p>
        </div>
    </form>
   @endsection