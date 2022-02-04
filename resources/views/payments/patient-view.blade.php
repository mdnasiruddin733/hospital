@extends('layouts.backend')
@section('breadcrumb',"Payments")

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                My Payments
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
                           @if($payment->status=="Pending")
                           <td>
                               <a href="{{route("patient.pay",$payment->id)}}" class="btn btn-success">Pay Now</a>
                           </td>

                           @else
                               <td>
                                   <span class="badge badge-success">Paid</span>
                               </td>          
                           @endif
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