
@extends('layout.app')

@section('content')



<div class="container">
    <div class=" margin-tb">
        <div class="pull-center">
            <h2 class="text-center margin_header">User Details </h2>
        </div>
        </br></br>
        <div class="">
            <div class="card-body">
                <div class="row">
                    <div class="container">
                        <label>Name :</label>
                        <h4>{{$user->name}}</h4>
                        <hr>

                        <label>Phone No:</label>
                        <h4>{{$user->phoneNumber}}</h4>
                        <hr>
                        <label>Email</label>
                        <h4>{{$user->email}}</h4>
                        <hr>
                        <label>Address</label>
                        <h4>{{$user->address}}</h4>
                        <hr>
                        <label>Created at</label>
                        <h4>{{$user->created_at}}</h4>
                    </div>
                </div>
                <td>
                </br>
                    <a class="btn btn-info " href="{{route('user.index')}}" role="button">Back</a>
                </td>
                </table>
            </div>
        </div>
    </div>
</div>

