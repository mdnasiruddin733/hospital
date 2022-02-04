@extends('layouts.backend')
@section('breadcrumb',"Settings")

@section("content")
    <div class="row">
        <div class="col-md-12" style="color:#000;">
            <form action="{{route("backend.news.store")}}" method="post" enctype="multipart/form-data">
                @csrf
                <x-form.input-file name="image" accept="image/*"  labelcol="2" placeholder="Image">News Image</x-form.input-file>
                <div id="preview-image" class="text-center my-2">
                     {{-- <img class="p-3" src="{{asset(settings()->logo)}}" alt="site logo" style="width:200px;height:140px;"> --}}
                </div>
                
                <x-form.input-text name="title" labelcol="2">News Title</x-form.input-text>
                <x-form.tag-input name="tags" labelcol="2">Tags</x-form.tag-input>
                <x-form.select name="status" labelcol="2">
               
                <x-slot name="label">Status</x-slot>
                    <x-slot name="option">
                        <option value="Active">Active</option>  
                        <option value="Inactive">Incative</option>  
                    </x-slot>
                </x-form.select>
                <x-form.select name="category" labelcol="2">
                @php $categories=["Radiology","Pathology","Cardiology","Sergery","Gastroenterology"] @endphp
                <x-slot name="label">News Category</x-slot>
                    <x-slot name="option">
                        @foreach($categories as $category)
                        <option value="{{$category}}">{{$category}}</option>  
                        @endforeach
                    </x-slot>
                </x-form.select>
                 <x-form.editor name="body" labelcol="2" value=''>Body:</x-form.editor>
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