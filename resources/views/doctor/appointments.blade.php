@extends('layouts.backend')
@section('breadcrumb',"Doctors")

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <table id="doctors-table" class="table">
                    <thead>
                        <tr>
                            <th>Patient ID.</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($appointments as $appointment)
                       @php $user=getPatientFromAppointment($appointment->patient_id); @endphp
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
                               <a href="{{route('doctor.appointment.status',$appointment->id)}}" class="btn btn-{{$appointment->status=="Pending"?"warning":"success"}}">{{$appointment->status}}</a>
                           </td>
                           <td>{{$appointment->created_at->format("d M, Y")}}</td>
                           <td>
                               <div class="btn-group" role="group" aria-label="Basic example">
                                    <button data-link="{{route('doctor.appointment.delete',$appointment->id)}}" onclick="confirmDelete(event)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
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