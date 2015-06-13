@if(!empty($errors->all()))
<p class="bg-danger">
    @foreach($errors->all() as $error)
    {{ $error }} <br/>
    @endforeach
</p>
@endif

<div class="form-group">

    {!! Form::Label('name', 'Khóa học:') !!}
    {!! Form::Text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('level', 'Cấp độ:') !!}
    {!! Form::Select('level', array('1' => 'Beginner', '2' => 'Intermediate', '3' => 'Advanced'), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('description', 'Mô tả:') !!}
    {!! Form::Textarea('description', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('status', 'Tình trạng:') !!}
    {!! Form::Select('status', array('1' => 'Active', '0' => 'Inactive'), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Submit('Lưu lại', ['class' => 'btn btn-primary form-control']) !!}

</div>
