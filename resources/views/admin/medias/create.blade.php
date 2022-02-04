@extends('layouts.backend')
@section('breadcrumb',"Create Social Media")

@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("admin.media.store")}}" method="post">
                @csrf
                <x-form.input-text name="name" labelcol="2" value=''>Name</x-form.input-text>
                <x-form.input-text name="icon" labelcol="2" value='' placeholder="mai-logo-facebook-f">Icon</x-form.input-text>
                <x-form.input-text name="link" labelcol="2" value=''>Link</x-form.input-text>
                <div class="row justify-content-end">
                    <div class="col-md-10 text-left mb-4"><button class="btn btn-primary">Create</button></div>
                </div>
                
            </form>
        </div>
    </div>
@endsection

