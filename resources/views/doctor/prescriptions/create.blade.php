@extends('layouts.backend')
@section('breadcrumb',"Create Prescription")
@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("doctor.prescription.store")}}" method="post">
                @csrf
                <x-form.input-text name="patient_id" labelcol="2">Patient ID.</x-form.input-text>
                <x-form.tag-input name="disease" labelcol="2">Disease:</x-form.tag-input>
                <x-form.tag-input name="symptoms" labelcol="2">Symptoms:</x-form.tag-input>
                <x-form.tag-input name="medicine" labelcol="2">Medicines:</x-form.tag-input>              
                <x-form.editor name="procedure" labelcol="2" value=''>Procedure to use:</x-form.editor>
                <div class="row justify-content-end">
                    <div class="col-md-10 text-left mb-4"><button class="btn btn-primary">Save Prescription</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>


$('[name=procedure]').summernote({
    height: 250
})



</script>
@endsection