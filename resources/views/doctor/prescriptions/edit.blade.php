@extends('layouts.backend')
@section('breadcrumb',"Edit Prescription")
@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("doctor.prescription.update")}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$prescription->id}}">
                <x-form.input-text name="patient_id" labelcol="2" value="{{$prescription->patient_id}}">Patient ID.</x-form.input-text>
                <x-form.tag-input name="disease" labelcol="2" value="{{$prescription->disease}}">Disease:</x-form.tag-input>
                <x-form.tag-input name="symptoms" labelcol="2" value="{{$prescription->symptoms}}">Symptoms:</x-form.tag-input>
                <x-form.tag-input name="medicine" labelcol="2" value="{{$prescription->medicine}}">Medicines:</x-form.tag-input>              
                <x-form.editor name="procedure" labelcol="2" value="{{$prescription->procedure}}">Procedure to use:</x-form.editor>
                <div class="row justify-content-end">
                    <div class="col-md-10 text-left mb-4"><button class="btn btn-primary">Update Prescription</button></div>
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