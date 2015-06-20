@if(!empty($errors->all()))
    <p class="bg-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </p>
@endif

<div class="form-group">

    {!! Form::Label('name', trans('coupon.name')) !!}
    {!! Form::Text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('coupon', trans('coupon.coupon')) !!}
    {!! Form::Text('coupon', null, ['class' => 'form-control']) !!}

</div>

{{--<div class="form-group">--}}

    {{--{!! Form::Label('target', trans('coupon.targets')) !!}--}}
    {{--{!! Form::Select('target', $targets, null, ['class' => 'form-control']) !!}--}}

{{--</div>--}}

<div class="form-group">

    {!! Form::Label('condition', trans('coupon.condition')) !!}
    {!! Form::Hidden('type', 'promo') !!}
    {!! Form::Hidden('target', 1) !!}
    {!! Form::Text('condition', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('value', trans('coupon.value')) !!}
    {!! Form::Text('value', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('quantity', trans('coupon.quantity')) !!}
    {!! Form::Text('quantity', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('start_date', trans('coupon.start_date')) !!}
    {!! Form::Text('start_date', (isset($data))? $data['start_date']->format('d-m-Y H:i') : null, ['class' => 'form-control', 'id' => 'start_date', 'readonly']) !!}

</div>

<div class="form-group">

    {!! Form::Label('end_date', trans('coupon.end_date')) !!}
    {!! Form::Text('end_date', (isset($data))? $data['end_date']->format('d-m-Y H:i') : null, ['class' => 'form-control', 'id' => 'end_date', 'readonly']) !!}

</div>

<div class="form-group">

    <div class="col-md-3">
        {!! Form::hidden('user_id', $currentUser->id) !!}
        {!! Form::Submit('Lưu lại', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    <div class="col-md-2">
        {!! Form::button('Hủy', ['class' => 'btn btn-default form-control']) !!}
    </div>

</div>

@section('script')
<script src="{{ asset('admin/admin-tools/admin-forms/js/jquery-ui-timepicker.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#start_date').datetimepicker({
        dateFormat: 'dd-mm-yy',
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        beforeShow: function(input, inst) {
            var newclass = 'admin-form';
            var themeClass = $(this).parents('.admin-form').attr('class');
            var smartpikr = inst.dpDiv.parent();
            if (!smartpikr.hasClass(themeClass)) {
                inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
            }
        },
        onClose: function( selectedDate ) {
            $( "#end_date" ).datepicker( "option", "minDate", selectedDate );
        }
    });

    $('#end_date').datetimepicker({
        dateFormat: 'dd-mm-yy',
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        beforeShow: function(input, inst) {
            var newclass = 'admin-form';
            var themeClass = $(this).parents('.admin-form').attr('class');
            var smartpikr = inst.dpDiv.parent();
            if (!smartpikr.hasClass(themeClass)) {
                inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
            }
        },
        onClose: function( selectedDate ) {
            $( "#start_date" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
});
</script>
@endsection