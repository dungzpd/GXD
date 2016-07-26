
<div class="col-sm-3 sidebar">
    <div class="sidebar-item">
        <h3><i class="fa fa-bars"></i> Danh mục khóa học</h3>
        <ul>
            @foreach(\Alloy\Models\Categories::allCategory() as $category)
            <li>
                <a href="{!! URL::to('/courses/category',['alias'=>$category->alias]) !!}">
                    {!! $category->name !!}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
