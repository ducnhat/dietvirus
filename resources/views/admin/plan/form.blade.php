@if(!empty($errors->all()))
    <p class="bg-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </p>
@endif

<div class="form-group">

    {!! Form::Label('name', 'Tên gói:') !!}
    {!! Form::Text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('price', 'Giá:') !!}
    {!! Form::Text('price', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('type', 'Thời hạn:') !!}
    {!! Form::Select('type', array('1' => 'Hàng tháng', '2' => 'Hàng năm'), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('status', 'Tình trạng:') !!}
    {!! Form::Select('status', array('1' => 'Kích hoạt', '0' => 'Khóa'), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Submit('Lưu lại', ['class' => 'btn btn-primary form-control']) !!}

</div>