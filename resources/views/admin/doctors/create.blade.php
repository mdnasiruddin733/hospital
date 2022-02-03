@extends('layouts.backend')
@section('breadcrumb',"Create Doctor")

@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("admin.doctors.store")}}" method="post">
                @csrf
                <x-form.input-text name="name" labelcol="2" value=''>Name</x-form.input-text>
                <x-form.input-email name="email" labelcol="2" value=''>Email</x-form.input-email>
                <x-form.input-text name="phone" labelcol="2" value=''>Phone</x-form.input-text>
                <div class="row justify-content-end">
                    <div class="col-md-10 text-left mb-4"><button class="btn btn-primary">Create</button></div>
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