<div class="item">
    <div class="wImage">
        <a href="{{ route('get.product.detail',$list->pro_slug.'-'.$list->id)}}" class="image">
            <img data-src="{{ $list->pro_avatar }}" alt="{{ $list->pro_name}}" class="lazy" src="/view/lazy.jpg"/>
        </a>
    </div>
    <div class="info">
        <a href="{{ route('get.product.detail',$list->pro_slug.'-'.$list->id)}}" class="name">{{ $list->pro_name}}</a>
        <div style="display:flex">

        </div>
        <div class="price">
            <p class="new">{{ number_format($list->pro_price) }} đ</p>
        </div>
        <div class="count">
            <div class="bg" style="width: {{ rand(10,100)}}%"></div>
            <span class="text">Còn lại {{ $list->pro_amount ?? 0}}</span>
        </div>
    </div>
</div>
