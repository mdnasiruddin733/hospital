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
                <x-form.input-text name="whatsapp" labelcol="2" value='{{auth()->user()->doctor->whatsapp}}'>WhatsApp Number</x-form.input-text>
                <x-form.input-text name="meet_link" labelcol="2" value='{{auth()->user()->doctor->meet_link}}'>Meet Link</x-form.input-text>
                <x-form.input-text name="specialization" labelcol="2" value='{{auth()->user()->doctor->specialization}}'>Specialization</x-form.input-text>
                <x-form.input-text name="room" labelcol="2" value='{{auth()->user()->doctor->room}}'>Room No.</x-form.input-text>
                <x-form.select name="day" labelcol="2">
                    <x-slot name="label">Day</x-slot>
                    <x-slot name="option">
                        <option value="Saturday" {{auth()->user()->doctor->day=="Saturday" ? "selected":""}}>Saturday</option>
                        <option value="Sunday" {{auth()->user()->doctor->day=="Sunday" ? "selected":""}}>Sunday</option>
                        <option value="Monday" {{auth()->user()->doctor->day=="Monday" ? "selected":""}}>Monday</option>
                        <option value="tuesday" {{auth()->user()->doctor->day=="Tuesday" ? "selected":""}}>Tuesday</option>
                        <option value="Wednessday" {{auth()->user()->doctor->day=="Wednessday" ? "selected":""}}>Wednessday</option>
                        <option value="Thursday" {{auth()->user()->doctor->day=="Thursday" ? "selected":""}}>Thursday</option>
                        <option value="Friday" {{auth()->user()->doctor->day=="Friday" ? "selected":""}}>Friday</option>
                    </x-slot>
                </x-form.select>
                <x-form.input-text name="time" labelcol="2" value='{{auth()->user()->doctor->time}}'>Time</x-form.input-text>
                <x-form.input-number name="visit_fee" labelcol="2" value='{{auth()->user()->doctor->visit_fee}}'>Visit Fee</x-form.input-number>
                
                <x-form.editor name="detail" labelcol="2" value='{{auth()->user()->doctor->detail}}'>Detail</x-form.editor>
                <div class="row justify-content-end">
                    <div class="col-md-10 text-left mb-4"><button class="btn btn-primary">Save Settings</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>


$('[name=detail]').summernote({
    height: 250
})

$("[name=image]").imagePreview({
  container:"#preview-image"
})

</script>
@endsection