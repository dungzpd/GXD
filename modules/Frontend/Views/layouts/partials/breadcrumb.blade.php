<div class="breadcrumb-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 breadcrumbs">
                @if ($breadcrumbs)
                    <ul class="breadcrumb">
                        @foreach ($breadcrumbs as $breadcrumb)
                            @if ($breadcrumb->url)
                                <li class="{!! $breadcrumb->last ? 'active' : '' !!}">
                                    @if(!empty($breadcrumb->icon))
                                        <i class="{!! $breadcrumb->icon !!}"></i>
                                    @endif

                                    {!! $breadcrumb->last ? $breadcrumb->title : "<a href='$breadcrumb->url'>$breadcrumb->title</a>" !!}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-sm-5 top-search">
                <form action="{!! URL::to('/courses/search') !!}">
                    <div class="input-group">
                        <input type="text" class="form-control  input-lg" name="keyword" placeholder="Tìm kiếm">
						<span class="input-group-btn">
							<button class="btn btn-default btn-lg" type="submit"><i class="fa fa-search"></i></button>
						</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
