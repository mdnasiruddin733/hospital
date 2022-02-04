@extends('layouts.backend')
@section('breadcrumb',"Prescription")

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
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                           
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($prescriptions as $prescription)
                       @php $user=getDoctorFromAppointment($prescription->doctor_id); @endphp
                       <tr>
                           <td>
                              {{$user->id}}
                           </td>
                           <td>
                               <img src="{{asset($user->image)}}" alt="Patient's photo" style="width:50px;height:50px;">
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
                           
                           <td>{{$prescription->created_at->format("d M, Y")}}</td>
                           <td>
                               <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('patient.prescription.show',$prescription->id)}}" class="btn btn-primary">View Prescription</a>
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