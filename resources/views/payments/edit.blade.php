@extends('layouts.backend')
@section('breadcrumb',"Edit Payment")

@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("backend.payment.update")}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$payment->id}}">
                
                <x-form.input-text name="patient_id" labelcol="2" value="{{$payment->patient_id}}">Patient ID.</x-form.input-text>
                <x-form.input-text name="amount" labelcol="2" value="{{$payment->amount}}">Amount</x-form.input-text>
                <x-form.select name="status" labelcol="2">
               
                <x-slot name="label">Status</x-slot>
                    <x-slot name="option">
                        <option value="Active" {{$payment->status=="Active" ? "selected" :""}}>Active</option>  
                        <option value="Inactive"  {{$payment->status=="Inctive" ? "selected" :""}}>Incative</option>  
                    </x-slot>
                </x-form.select>
                
                 <x-form.editor name="details" labelcol="2" value="{{$payment->details}}">Details:</x-form.editor>
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