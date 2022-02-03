@extends('layouts.backend')
@section('breadcrumb',"Settings")

@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("admin.settings.save")}}" method="post" enctype="multipart/form-data">
                @csrf
                <x-form.input-file name="logo" accept="image/*"  labelcol="2" placeholder="Logo">Site Logo</x-form.input-file>
                <div id="preview-logo" class="text-center my-2">
                     <img class="p-3" src="{{asset(settings()->logo)}}" alt="site logo" style="width:200px;height:140px;">
                </div>
                <x-form.input-file name="favicon" accept="image/*"  labelcol="2" placeholder="Favicon">Site Favicon</x-form.input-file>
                <div id="preview-favicon" class="text-center  my-2">
                     <img class="p-3" src="{{asset(settings()->favicon)}}" alt="site logo" style="width:200px;height:140px;">
                </div>
                <x-form.input-file name="banner" accept="image/*"  labelcol="2" placeholder="Banner">Site Banner</x-form.input-file>
                <div id="preview-banner" class="text-center  my-2">
                     <img class="p-3" src="{{asset(settings()->banner)}}" alt="site logo" style="width:200px;height:140px;">
                </div>
                <x-form.input-text name="name" labelcol="2" value='{{settings()->name}}'>Site Name</x-form.input-text>
                <x-form.input-text name="short_name" labelcol="2" value='{{settings()->short_name}}'>Site Short Name</x-form.input-text>
                <x-form.input-text name="email" labelcol="2" value='{{settings()->email}}'>Site Email</x-form.input-text>
                <x-form.input-text name="phone" labelcol="2" value='{{settings()->phone}}'>Site Phone</x-form.input-text>
                <x-form.input-text name="address" labelcol="2" value='{{settings()->address}}'>Office Address</x-form.input-text>
                <x-form.input-text name="map" labelcol="2" value='{{settings()->map}}'>Office Map(Iframe)</x-form.input-text>
                <x-form.input-text name="slogan" labelcol="2" value='{{settings()->slogan}}'>Site slogan</x-form.input-text>
                <x-form.input-text name="welcome_text_title" labelcol="2" value='{{settings()->welcome_text_title}}'>Welcome Text Title</x-form.input-text>
                <x-form.editor name="welcome_text_short" labelcol="2" value='{{settings()->welcome_text_short}}'>Short Welcome Text</x-form.editor>
                <x-form.editor name="welcome_text_long" labelcol="2" value='{{settings()->welcome_text_long}}'>Long Welcome Text</x-form.editor>
                <div class="row justify-content-end">
                    <div class="col-md-10 text-left mb-4"><button class="btn btn-primary">Save Settings</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$('[name=welcome_text_short]').summernote({
    height: 150
})

$('[name=welcome_text_long]').summernote({
    height: 250
})

$("[name=logo]").imagePreview({
  container:"#preview-logo"
})

$("[name=favicon]").imagePreview({
  container:"#preview-favicon"
})

$("[name=banner]").imagePreview({
  container:"#preview-banner"
})
</script>
@endsection