<div class="row form-group">
    <label for="" class="col-md-{{$labelcol}} col-form-label text-left">{{$label}}</label>
    <div class="col-md-{{$labelcol=='12' ? 12: 12-$labelcol}}">
        <select class="form-control @error($name) is-invalid @enderror" name="{{$name}}" {{$required?"required":""}} id="{{$id}}">
           {{$option}}
        </select>
        @error($name)<span class="invalid-feedback">{{$message}}</span>@enderror
    </div>
</div>