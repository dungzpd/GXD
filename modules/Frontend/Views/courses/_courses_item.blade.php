<div class="course-wrap">
    <div class="course-image relative">
        <a href="{!! URL::to('/courses/view',['alias'=>$data->alias]) !!}">
            <img src="{!! $data->getImage('courses',$data->image,380,250) !!}">
        </a>
        <div class="rate" data-score="{!! $data->rate !!}"></div>
        <div class="counter-student">
            {!! $data->learned !!} <i class="fa fa-users"></i>
        </div>
    </div>
    <div class="course-content">
        <h3>
            <a href="{!! URL::to('/courses/view',['alias'=>$data->alias]) !!}">{!! $data->name !!}</a>
        </h3>
        <div class="row course-teacher">
            <div class="col-xs-2 teacher-image">
                <a href="{!! URL::to('/user/profile',['id'=>($data->teacher->id)]) !!}" class="relative">
                    <img src="{!! asset($data->teacher->avatar) !!}">
                </a>
            </div>
            <div class="col-xs-10 teacher-des">
                <h4>
                    <a href="{!! URL::to('/user/profile',['id'=>($data->teacher->id)]) !!}">
                        {!! $data->teacher->name !!}
                    </a>
                </h4>
                <p class="teacher-position">{!! $data->teacher->provider !!}</p>
            </div>
        </div>
        <div class="course-price">
            <p class="sale-price">
                @if($data->sell_price > 0)
                    {!! number_format($data->sell_price) !!} ₫
                @elseif($data->price>0)
                    {!! number_format($data->price) !!}
                @else
                    Miễn phí
                @endif
            </p>
            <p class="regular-price">
                @if($data->sell_price > 0)
                    <del>{!! number_format($data->price) !!} ₫</del>
                @endif
            </p>
        </div>
    </div>
</div>
