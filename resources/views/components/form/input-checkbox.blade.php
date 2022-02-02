<div class="form-group row">
    <label for="{{$id}}" class="col-md-{{$labelcol}} col-form-label text-md-left"></label>
    <div class="col-md-{{$labelcol==12?12:12-$labelcol}}">
        <label class="ckbox">
            <input type="checkbox" name="{{$name}}" value="{{$value}}" {{$required?"required":""}} {{$checked? "checked":""}} id="{{$id}}" >
            <span>{{$slot}}</span>
        </label>
    </div>
</div>