@if(!empty($errors->all()))
    <p class="bg-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </p>
@endif

<div class="form-group">

    {!! Form::Label('name', trans('user.name')) !!}
    {!! Form::Text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('phone', trans('user.phone')) !!}
    {!! Form::Text('phone', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('email', trans('user.email')) !!}
    {!! Form::Text('email', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('password', trans('user.password')) !!}
    {!! Form::Password('password', ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('repassword', trans('user.repassword')) !!}
    {!! Form::Password('repassword', ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('role', trans('user.role')) !!}
    {!! Form::Select('role', array(USER_ROLE_GUEST => trans('user.role_guest'), USER_ROLE_MEMBER => trans('user.role_member'), USER_ROLE_ADMIN => trans('user.role_admin')), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('status', trans('user.status')) !!}
    {!! Form::Select('status', array('1' => 'Kích hoạt', '0' => 'Khóa'), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    <div class="col-md-3">
        {!! Form::Submit('Lưu lại', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    <div class="col-md-2">
        {!! Form::button('Hủy', ['class' => 'btn btn-default form-control', 'id' => 'cancel']) !!}
    </div>

</div>

@section('script')
    <script>
        $(document).ready(function(){
            $('button#cancel').click(function(){
                window.location.href = "{{ action('Admin\UserController@index') }}";
            });
        });
    </script>
@endsection