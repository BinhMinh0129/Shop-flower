<div class="shop_sidebar_area">

    <!-- ##### Single Widget ##### -->
    <div class="widget catagory mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Danh mục</h6>

        <!--  Catagories  -->
        <div class="catagories-menu">
            <ul>
                @if(!empty($categorys))
                    @foreach($categorys as $k=>$item)
                        <li 
                        @if(empty($categorySlug))
                            @if($title == $item->name)
                                class="active"
                            @endif
                        @endif
                        >
                            <a href="{{route('home.category-slug', ['slug'=>$item->slug])}}">{{$item->name}}</a>
                        </li>
                    @endforeach
                @else
                    <h3>Không có danh mục nào</h3>
                @endif
            </ul>
        </div>
    </div>
</div>