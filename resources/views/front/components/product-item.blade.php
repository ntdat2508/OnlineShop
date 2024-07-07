<div class="product-item item {{ $product->tag }}">
    <div class="pi-pic">
        <img src="{{ $product->productImages[0]->path ?? '' }}" alt="">
        <div class="sale">Sale</div>
        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>
        <ul>
            <li class="w-icon active"><a href="javascript:addCart({{ $product->id }})"><i class="icon_bag_alt"></i></a>
            </li>
            <li class="quick-view"><a href="shop/product/{{ $product->id }}">Xem sản phẩm</a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="catagory-name">{{ $product->tag }}</div>
        <a href="shop/product/{{ $product->id }}">
            <h5>{{ $product->name }}</h5>
        </a>
        <div class="product-price">
            {{ $product->price }} vnđ
        </div>
    </div>
</div>
