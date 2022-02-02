<div class="form-group row">
    <label for="{{$id}}" class="col-md-{{$labelcol}} col-form-label text-md-left">{{$slot}}</label>

    <div class="col-md-{{$labelcol==12?12:12-$labelcol}}">
        <textarea id="{{$id}}" type="text" class="form-control @error($name) is-invalid @enderror" name="{{$name}}" @if($required) required @endif @if($autocomplete) autocomplete="{{$name}}" @endif @if($autofocus) autofocus @endif placeholder="{{$placeholder}}">{!! $value !!}</textarea>
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>