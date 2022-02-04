@extends('layouts.backend')
@section('breadcrumb',"News")

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('backend.news.create')}}" class="btn btn-primary">Create News</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="doctors-table" class="table">
                    <thead>
                        <tr>
                            <th>ID.</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Posted By</th>
                            <th>Posted At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($newses as $news)
                       <tr>
                           <td>
                              {{$news->id}}
                           </td>
                           <td>
                               <img src="{{asset($news->image)}}" alt="Doctor's photo" style="width:50px;height:50px;">
                           </td>
                           <td>
                               {{$news->title}}
                           </td>
                           <td>
                               {{$news->category}}
                           </td>
                           
                           <td>
                               {{$news->user->name}}
                           </td>
                           <td>
                               {{$news->created_at->format("d M, Y")}}
                           </td>
                           <td>
                               {{$news->status}}
                           </td>
                           <td>
                               <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('backend.news.edit',$news->id)}}" class="btn btn-primary" title="View"><i class="fa fa-pencil"></i></a>
                                    <button data-link="{{route('backend.news.delete',$news->id)}}" onclick="confirmDelete(event)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
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