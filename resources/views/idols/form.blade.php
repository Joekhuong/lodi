<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $idol ? $idol->name : '' }}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('img_url') ? 'has-error' : ''}}">
    <label for="img_url" class="control-label">{{ 'Img Url' }}</label>
    <input class="form-control" name="img_url" type="text" id="img_url" value="{{ $idol ? $idol->img_url : '' }}" >
    {!! $errors->first('img_url', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
    <label for="dob" class="control-label">{{ 'Dob' }}</label>
    <input class="form-control" name="dob" type="date" id="dob" value="{{ $idol ? $idol->formatDob('Y-m-d') : '' }}" >
    
    {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
