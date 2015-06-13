@if(!empty($errors->all()))
<p class="bg-danger">
    @foreach($errors->all() as $error)
    {{ $error }} <br/>
    @endforeach
</p>
@endif

<div class="form-group">

    {!! Form::Label('name', 'Bài học:') !!}
    {!! Form::Text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('section_id', 'Danh mục:') !!}
    {!! Form::Select('section_id', $sections, null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('url', 'Link:') !!}
    {!! Form::Text('url', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('status', 'Tình trạng:') !!}
    {!! Form::Select('status', array('1' => 'Active', '0' => 'Inactive'), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Submit('Lưu lại', ['class' => 'btn btn-primary form-control']) !!}

</div>