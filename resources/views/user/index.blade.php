@extends('layout.app')

@section('content')
<div class="row container">

    <div class="col-lg-12 margin-tb">
        <div>
        </br>
            <h2 class="text-center py-3"><strong>User Form </strong></h2>
        </div>
        <div class="container justify-content-center">
            <a class="btn btn-success" href="{{route('user.create')}}" title="Create a user">
                Add User </a><br>
            <br>
            <div class="d-flex justify-content-center">
                <table class="table table-borderd table-striped container">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">address</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach($user as $item)
                    <tr>
                        <td scope="row">{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phoneNumber}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->address}}</td>

                        <td>
                            <form action="{{route('user.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <!-- <td>
                            <a class="btn btn-info" href="{{route('user.destroy',$item->id)}}">Delete</a>
                        </td> -->

                        <!-- <td><button class="btn btn-danger servideletebtn" type="button">Delete</button></td> -->

                        <td>
                            <a class="btn btn-info" href="{{route('user.edit',$item->id)}}">Edit</a>
                        </td>

                        <td>
                            <a class="btn btn-secondary" href="{{route('user.show',$item->id)}}">Show</a>
                        </td>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>