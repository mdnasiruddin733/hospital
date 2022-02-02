<div class="form-group row">
    <label for="{{$id}}" class="col-md-{{$labelcol}} col-form-label text-md-left">{{$slot}}</label>

    <div class="col-md-{{12-$labelcol}}">
        <input id="{{$id}}" type="file" accept="{{$accept}}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}" @if($required) required @endif {{$multiple?"multiple":""}} placeholder="{{$placeholder}}">
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>