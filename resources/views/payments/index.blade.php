@extends('layouts.backend')
@section('breadcrumb',"Payments")

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('backend.payment.create')}}" class="btn btn-primary">Create Payment</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="doctors-table" class="table">
                    <thead>
                        <tr>
                            <th>Patient ID.</th>
                            <th>Patient name</th>
                            <th>Patient phone</th>
                            <th>Patient email</th>
                             <th>Details</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($payments as $payment)
                       <tr>
                           <td>
                              {{$payment->patient_id}}
                           </td>
                           <td>
                              {{$payment->patient_name}}
                           </td>
                           <td>
                               {{$payment->patient_phone}}
                           </td>
                           <td>
                               {{$payment->patient_email}}
                           </td>
                           <td>
                               {!! $payment->details !!}
                           </td>
                           <td>
                               {{$payment->amount}}
                           </td>
                           <td>
                               <span class="badge badge-{{$payment->status==="Pending"?"warning":"success"}}"> {{$payment->status}}</span>
                           </td>
                           
                           <td>
                               <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('backend.payment.edit',$payment->id)}}" class="btn btn-primary" title="View"><i class="fa fa-pencil"></i></a>
                                   
                                    <button data-link="{{route('backend.payment.delete',$payment->id)}}" onclick="confirmDelete(event)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
                                   
                                </div>
                           </td>
                       </tr>
                       @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

$('#doctors-table').DataTable();

</script>
@endsection