@extends('layouts.backend')
@section('breadcrumb',"Create Payment")

@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("backend.payment.store")}}" method="post">
                @csrf
                
                
                <x-form.input-text name="patient_id" labelcol="2">Patient ID.</x-form.input-text>
                <x-form.input-text name="amount" labelcol="2">Amount</x-form.input-text>
                <x-form.select name="status" labelcol="2">
               
                <x-slot name="label">Status</x-slot>
                    <x-slot name="option">
                        <option value="Pending">Pending</option>  
                        <option value="Completed">Completed</option>  
                    </x-slot>
                </x-form.select>
                
                 <x-form.editor name="details" labelcol="2" value=''>Details:</x-form.editor>
                <div class="row justify-content-end">
                    <div class="col-md-10 text-left mb-4"><button class="btn btn-primary">Submit</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$('[name=details]').summernote({
    height: 150
})


</script>
@endsection