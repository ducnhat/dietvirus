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
    @if(isset($data->image))
        <img height="100" src="{{ $data->image }}">
    @endif

</div>

<div class="form-group">

    {!! Form::Label('description', trans('post.description')) !!}
    {!! Form::Textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}

</div>

<div class="form-group">

    {!! Form::Label('content', trans('post.content')) !!}
    {!! Form::Textarea('content', null, ['class' => 'form-control', 'rows' => '12', 'id' => 'ckeditor']) !!}

</div>

<div class="form-group">

    {!! Form::Label('publish_at', trans('post.publish_at')) !!}
    {!! Form::Text('publish_at', (isset($data))? $data['publish_at']->format('d-m-Y H:i') : null, ['class' => 'form-control', 'id' => 'publish_at', 'readonly']) !!}

</div>

<div class="form-group">

    {!! Form::Label('category_id', trans('post.category')) !!}
    {!! Form::Select('category_id', $categories, null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('is_published', trans('post.is_published')) !!}
    {!! Form::Checkbox('is_published', 1, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    <div class="col-md-3">
        {!! Form::hidden('user_id', $currentUser->id) !!}
        {!! Form::Submit(trans('form.save'), ['class' => 'btn btn-primary form-control']) !!}
    </div>

    <div class="col-md-2">
        {!! Form::button(trans('form.cancel'), ['class' => 'btn btn-default form-control', 'id' => 'cancel']) !!}
    </div>

</div>

@section('script')

    <!-- Datetime picker JS -->
    <script src="{{ asset('admin/admin-tools/admin-forms/js/jquery-ui-timepicker.min.js') }}"></script>

    <!-- CK Editor JS -->
    <script type="text/javascript" src="{{ asset('vendor/editors/ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function(){
            CKEDITOR.disableAutoInline = true;

            // Init Ckeditor
            CKEDITOR.replace('ckeditor', {
                height: 210,
                on: {
                    instanceReady: function(evt) {
                        $('.cke').addClass('admin-skin cke-hide-bottom');
                    }
                }
            });

            $('#publish_at').datetimepicker({
                dateFormat: 'dd-mm-yy',
                prevText: '<i class="fa fa-chevron-left"></i>',
                nextText: '<i class="fa fa-chevron-right"></i>',
                minDateTime: 0  ,
                beforeShow: function(input, inst) {
                    var newclass = 'admin-form';
                    var themeClass = $(this).parents('.admin-form').attr('class');
                    var smartpikr = inst.dpDiv.parent();
                    if (!smartpikr.hasClass(themeClass)) {
                        inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                    }
                }
            });

            $("button#cancel").click(function(){
                window.location.href = "{{ action('Admin\PostController@index') }}";
            });
        });
    </script>
@endsection