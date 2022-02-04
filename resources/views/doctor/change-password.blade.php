@extends('layouts.backend')
@section('breadcrumb',"Change Password")
@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("password.reset")}}" method="post">
                @csrf
                
                <x-form.input-password name="current_password" labelcol="2">Current Password</x-form.input-password>
                <x-form.input-password name="password" labelcol="2">New Password</x-form.input-password>
                <x-form.input-password name="password_confirmation" labelcol="2">Confirm Password</x-form.input-password>
                <div class="row justify-content-end">
                    <div class="col-md-10 text-left mb-4"><button class="btn btn-primary">Submit</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection

