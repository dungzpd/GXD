<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('title')
        <small>@yield('subTitle')</small>
    </h1>

    @if ($breadcrumbs)
        <ol class="breadcrumb">
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
        </ol>
    @endif
</section>



