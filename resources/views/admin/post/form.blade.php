@if(!empty($errors->all()))
    <p class="bg-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </p>
@endif

<div class="form-group">

    {!! Form::Label('title', trans('post.title')) !!}
    {!! Form::Text('title', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('image', trans('post.image')) !!}
    {!! Form::File('image') !!}

</div>

<div class="form-group">

    {!! Form::Label('description', trans('post.description')) !!}
    {!! Form::Textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}

</div>

<div class="form-group">

    {!! Form::Label('content', trans('post.content')) !!}
    {!! Form::Text('content', null, ['class' => 'form-control', 'id' => 'ckeditor1']) !!}

</div>

<div class="form-group">

    {!! Form::Label('publish_at', trans('post.publish_at')) !!}
    {!! Form::Text('publish_at', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('category', trans('post.category')) !!}
    {!! Form::Select('category', $categories, null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('is_published', trans('post.is_published')) !!}
    {!! Form::Checkbox('is_published', 1, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    <div class="col-md-3">
        {!! Form::Submit(trans('form.save'), ['class' => 'btn btn-primary form-control']) !!}
    </div>

    <div class="col-md-2">
        {!! Form::button(trans('form.cancel'), ['class' => 'btn btn-default form-control']) !!}
    </div>

</div>