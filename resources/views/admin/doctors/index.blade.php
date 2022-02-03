@extends('layouts.backend')
@section('breadcrumb',"Doctors")

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('admin.doctors.create')}}" class="btn btn-primary">Create New Doctor</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="doctors-table" class="table">
                    <thead>
                        <tr>
                            <th>ID.</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Specialization</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($users as $user)
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
                               {{$user->doctor->specialization}}
                           </td>
                           <td>
                               <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.doctors.show',$user->id)}}" class="btn btn-primary" title="View"><i class="fa fa-eye"></i></a>
                                    <button data-link="{{route('admin.doctors.delete',$user->id)}}" onclick="confirmDelete(event)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
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