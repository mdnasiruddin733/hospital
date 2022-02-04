@extends('layouts.backend')
@section('breadcrumb',"Profile")
@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("profile.store")}}" method="post" enctype="multipart/form-data">
                @csrf
                <x-form.input-file name="image" accept="image/*"  labelcol="2" placeholder="Your Image">Your Image</x-form.input-file>
                <div id="preview-image" class="text-center my-2">
                     <img class="p-3" src="{{asset(auth()->user()->image)}}" alt="doctor image" style="width:200px;height:200px;">
                </div>
                
                <x-form.input-text name="name" labelcol="2" value='{{auth()->user()->name}}'>Name</x-form.input-text>
                <x-form.input-text name="email" labelcol="2" value='{{auth()->user()->email}}'>Email</x-form.input-text>
                <x-form.input-text name="phone" labelcol="2" value='{{auth()->user()->phone}}'>Phone</x-form.input-text>
                <div class="row justify-content-end">
                    <div class="col-md-10 text-left mb-4"><button class="btn btn-primary">Save Settings</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>




$("[name=image]").imagePreview({
  container:"#preview-image"
})

</script>
@endsection