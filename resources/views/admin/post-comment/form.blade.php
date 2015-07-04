@if(!empty($errors->all()))
    <p class="bg-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </p>
@endif

<div class="form-group">

    {!! Form::Label('name', trans('post.name'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Label('name', $data->name, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('email', trans('post.email'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Label('email', $data->email, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('message', trans('post.message'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Textarea('message', $data->message, ['class' => 'form-control', 'readonly', 'rows' => '5']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('is_display', trans('post.is_display'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::radio('is_display', 1, $data->is_display) !!}
        {{ trans('form.yes') }}
        {!! Form::radio('is_display', 0, $data->is_display) !!}
        {{ trans('form.no') }}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('reply_message', trans('post.reply_message'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Textarea('reply_message', $data->reply_message, ['class' => 'form-control', 'rows' => '5']) !!}
    </div>

</div>

<div class="form-group">

    <div class="col-lg-2">
        {!! Form::hidden('user_id', $currentUser->id) !!}
        {!! Form::Submit(trans('post.reply'), ['class' => 'btn btn-primary form-control']) !!}
    </div>

    <div class="col-lg-2">
        {!! Form::button(trans('form.go_back'), ['class' => 'btn btn-default form-control', 'id' => 'go-back']) !!}
    </div>

</div>

@section('script')
    <script>
        $('button#go-back').click(function(){
            window.location.href="{{ action('Admin\PostCommentController@index') }}";
        });
    </script>
@endsection