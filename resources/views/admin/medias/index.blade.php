@extends('layouts.backend')
@section('breadcrumb',"Social Media")

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('admin.media.create')}}" class="btn btn-primary">Create New Social Media Link</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="doctors-table" class="table">
                    <thead>
                        <tr>
                            <th>ID.</th>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($medias as $media)
                       <tr>
                           <td>
                              {{$media->id}}
                           </td>
                           <td>
                               <span class="{{$media->icon}}"></span>
                           </td>
                           <td>
                               {{$media->name}}
                           </td>
                           <td>
                               {{$media->link}}
                           </td>

                           <td>
                               <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('admin.media.edit',$media->id)}}" class="btn btn-primary" title="Edit"><i class="fa fa-eye"></i></a>
                                    <button data-link="{{route('admin.media.delete',$media->id)}}" onclick="confirmDelete(event)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
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