@if(!empty($errors->all()))
<p class="bg-danger">
    @foreach($errors->all() as $error)
    {{ $error }} <br/>
    @endforeach
</p>
@endif

<div class="form-group">

    {!! Form::Label('name', 'Danh mục:') !!}
    {!! Form::Text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('course_id', 'Khóa học:') !!}
    {!! Form::Select('course_id', $courses, null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('status', 'Tình trạng:') !!}
    {!! Form::Select('status', array('1' => 'Active', '0' => 'Inactive'), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Submit('Lưu lại', ['class' => 'btn btn-primary form-control']) !!}

</div>