@extends('layouts.backend')
@section('breadcrumb',"Settings")

@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("backend.news.update")}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$news->id}}">
                <x-form.input-file name="image" accept="image/*"  labelcol="2" placeholder="Image">News Image</x-form.input-file>
                <div id="preview-image" class="text-center my-2">
                     <img class="p-3" src="{{asset($news->image)}}" alt="site logo" style="width:200px;height:140px;">
                </div>
                
                <x-form.input-text name="title" labelcol="2" value="{{$news->title}}">News Title</x-form.input-text>
                <x-form.tag-input name="tags" labelcol="2" value="{{$news->tags}}">Tags</x-form.tag-input>
                <x-form.select name="status" labelcol="2">
               
                <x-slot name="label">Status</x-slot>
                    <x-slot name="option">
                        <option value="Active" {{$news->status=="Active" ? "selected" : ""}}>Active</option>  
                        <option value="Inctive"  {{$news->status=="Inactive" ? "selected" : ""}}>Incative</option>  
                    </x-slot>
                </x-form.select>
                <x-form.select name="category" labelcol="2">
                @php $categories=["Radiology","Pathology","Cardiology","Sergery","Gastroenterology"] @endphp
                <x-slot name="label">News Category</x-slot>
                    <x-slot name="option">
                        @foreach($categories as $category)
                        <option value="{{$category}}"  {{$news->category==$category ? "selected" : ""}}>{{$category}}</option>  
                        @endforeach
                    </x-slot>
                </x-form.select>
                 <x-form.editor name="body" labelcol="2" value="{{$news->body}}">Body:</x-form.editor>
                <div class="row justify-content-end">
                    <div class="col-md-10 text-left mb-4"><button class="btn btn-primary">Submit</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$('[name=body]').summernote({
    height: 150
})


$("[name=image]").imagePreview({
  container:"#preview-image"
})

</script>
@endsection