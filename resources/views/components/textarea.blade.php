<div class="form-group">
    <label for="{{$field}}">{{$label}}</label>
    <textarea class="form-control" name="{{$field}}" placeholder="Enter Your Subject" id="{{$field}}" rows="3">{{old($field)}}</textarea>
    @error($field)
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>