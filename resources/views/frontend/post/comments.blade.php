<!--comments-->
<h2 class="tt_uppercase color_dark m_bottom_30">{{ trans('post.comment') }}</h2>
<div class="m_bottom_45">
    @if($comments = $data->getComments())
        @if($comments->count())
            @foreach($comments as $comment)
                <div class="clearfix comment_wrap m_bottom_25">
                    <!--comment author photo-->
                    <img src="{{ asset('frontend/images/testimonial_img_1.jpg') }}" class="f_left circle" alt="">
                    <div class="comment_content_wrap">
                            <header class="m_bottom_5">
                                <a href="#" class="color_dark"><b>{{ $comment->name }}</b></a> - {{ $comment->created_at->format('H:i, d M Y') }}
                                {{--<a href="#" class="f_right color_dark">Quote</a>--}}
                            </header>
                            <div class="comment relative bg_light_color_3 r_corners shadow">
                                {{ $comment->message }}
                            </div>
                    </div>
                </div>
                @if(strlen($comment->reply_message))
                    <!--comment second level-->
                    <div class="clearfix comment_wrap m_left_20 m_bottom_25">
                    <!--comment author photo-->
                    <img src="{{ asset('frontend/images/testimonial_img_2.jpg') }}" class="f_left circle" alt="">
                    <div class="comment_content_wrap">
                    <header class="m_bottom_5">
                    <a href="#" class="color_dark"><b>{{ $comment->user->name }}</b></a> - {{ $comment->reply_at->format('H:i d M Y') }}
                    {{--<a href="#" class="f_right color_dark">Quote</a>--}}
                    </header>
                    <div class="comment relative bg_light_color_3 r_corners shadow">
                        {{ $comment->reply_message }}
                    </div>
                    </div>
                    </div>
                @endif
            @endforeach
        @endif
    @else
        <em>{{ trans('post.no_comments') }}</em>
    @endif
</div>
<!--add comment-->
<h2 class="tt_uppercase color_dark m_bottom_30">{{ trans('post.add_comment') }}</h2>
@if(!empty($errors->all()))
    <div class="alert_box r_corners error m_bottom_0">
        <i class="fa fa-exclamation-triangle"></i>
        @foreach($errors->all() as $error)
            <p>{{ $error }} </p>
        @endforeach
    </div>
@endif
{!! Form::open(['method' => 'post', 'action' => ['PostController@show', 'id' => $data->id, 'slug' => convertStringToSlug($data->title)], 'class' => 'bs_inner_offsets full_width bg_light_color_3 r_corners shadow m_xs_bottom_30']) !!}
    <ul>
        <li class="clearfix m_bottom_15">
            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0 m_xs_bottom_15">
                <label for="name" class="d_inline_b m_bottom_5">{{ trans('post.name') }} ({{ trans('post.required') }})</label><br>
                <input type="text" id="name" name="name" class="r_corners full_width">
            </div>
            <div class="f_left half_column f_xs_none w_xs_full p_xs_hr_0">
                <label for="email" class="d_inline_b m_bottom_5">{{ trans('post.email') }} ({{ trans('post.required_not_display') }})</label><br>
                <input type="email" id="email" name="email" class="r_corners full_width">
            </div>
        </li>
        <li class="m_bottom_15">
            <label for="message" class="d_inline_b m_bottom_5">{{ trans('post.message') }} ({{ trans('post.required') }})</label><br>
            <textarea id="comments" name="message" class="r_corners full_width"></textarea>
        </li>
        <li class="m_bottom_15">
            <input value="1" type="checkbox" class="d_none" id="checkbox_1">
            <label for="checkbox_1">
                Không phải spam
            </label>
        </li>
        <li class="m_bottom_10">
            <button class="r_corners button_type_4 bg_light_color_2 mw_0 color_dark tr_all_hover">Submit</button>
        </li>
    </ul>
{!! Form::Hidden('post_id', $data->id) !!}
{!! Form::Close() !!}