@extends('layouts.backend')
@section('breadcrumb',"My Appointments")

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <table id="doctors-table" class="table">
                    <thead>
                        <tr>
                            <th>Doctor ID.</th>
                            <th>Doctor Photo</th>
                            <th>Doctor Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($appointments as $appointment)
                       @php $user=getPatientFromAppointment($appointment->doctor_id); @endphp
                       <tr>
                           <td>
                              {{$user->id}}
                           </td>
                           <td>
                               <img src="{{asset($user->image)}}" alt="Doctor's photo" style="width:50px;height:50px;">
                           </td>
                           <td>
                               {{$user->name}}
                           </td>
                           <td>
                               {{$user->email}}
                           </td>
                           <td>
                               {{$user->phone}}
                           </td>
                           <td>
                               <span class="badge badge-{{$appointment->status=="Pending"?"warning":"success"}}">{{$appointment->status}}</span>
                           </td>
                           <td>{{$appointment->created_at->format("d M, Y")}}</td>
                           <td>
                               <div class="btn-group" role="group" aria-label="Basic example">
                                    <button data-link="{{route('patient.appointment.delete',$appointment->id)}}" onclick="confirmDelete(event)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
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