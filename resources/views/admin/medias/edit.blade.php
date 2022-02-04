@extends('layouts.backend')
@section('breadcrumb',"Edit Social Media")

@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("admin.media.update")}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$media->id}}">
                <x-form.input-text name="name" labelcol="2" value='{{$media->name}}'>Name</x-form.input-text>
                <x-form.input-text name="icon" labelcol="2" value='{{$media->icon}}' placeholder="mai-logo-facebook-f">Icon</x-form.input-text>
                <x-form.input-text name="link" labelcol="2" value='{{$media->link}}'>Link</x-form.input-text>
                <div class="row justify-content-end">
                    <div class="col-md-10 text-left mb-4"><button class="btn btn-primary">Create</button></div>
                </div>
                
            </form>
        </div>
    </div>
@endsection

