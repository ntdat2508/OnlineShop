@extends('admin.layout.master')

@section('title', 'Sản phẩm')

@section('body')
    <!-- Main -->
    <div class="app-main__inner">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Sản phẩm
                        <div class="page-title-subheading">
                            Xem, thêm, sửa, xoá sản phẩm.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" action="admin/product/{{ $product->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="position-relative row form-group">
                                <label for="brand_id"
                                    class="col-md-3 text-md-right col-form-label">Nhãn hàng</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="brand_id" id="brand_id" class="form-control">
                                        <option disabled>-- Nhãn hàng --</option>
                                        @foreach ($brands as $brand)
                                            <option {{ $product->brand_id == $brand->id ? 'selected' : '' }} 
                                                value="{{ $brand->id }}">
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="product_category_id"
                                    class="col-md-3 text-md-right col-form-label">Danh mục</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="category_id" id="product_category_id" class="form-control">
                                        <option disabled>-- Danh mục --</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option {{ $product->category_id == $productCategory->id ? 'selected' : '' }}
                                                value="{{ $productCategory->id }}">
                                                {{ $productCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="color" class="col-md-3 text-md-right col-form-label">Màu sắc</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="color" id="color" class="form-control">
                                        <option disabled>-- Màu sắc --</option>
                                        <option value="blue" {{ $product->color == 'blue' ? 'selected' : '' }}>Xanh dương</option>
                                        <option value="red" {{ $product->color == 'red' ? 'selected' : '' }}>Đỏ</option>
                                        <option value="violet" {{ $product->color == 'violet' ? 'selected' : '' }}>Tím</option>
                                        <option value="yellow" {{ $product->color == 'yellow' ? 'selected' : '' }}>Vàng</option>
                                        <option value="green" {{ $product->color == 'green' ? 'selected' : '' }}>Xanh lục</option>
                                        <option value="orange" {{ $product->color == 'orange' ? 'selected' : '' }}>Cam</option>
                                        <option value="black" {{ $product->color == 'black' ? 'selected' : '' }}>Đen</option>
                                        <option value="white" {{ $product->color == 'white' ? 'selected' : '' }}>Trắng</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="position-relative row form-group">
                                <label for="size" class="col-md-3 text-md-right col-form-label">Size</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="size" id="size" class="form-control">
                                        <option disabled>-- Size --</option>
                                        <option value="S" {{ $product->size == 'S' ? 'selected' : '' }}>S</option>
                                        <option value="M" {{ $product->size == 'M' ? 'selected' : '' }}>M</option>
                                        <option value="L" {{ $product->size == 'L' ? 'selected' : '' }}>L</option>
                                        <option value="XL" {{ $product->size == 'XL' ? 'selected' : '' }}>XL</option>
                                        <option value="XXL" {{ $product->size == 'XXL' ? 'selected' : '' }}>XXL</option>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="name" id="name" placeholder="Tên sản phẩm" type="text"
                                        class="form-control" value="{{ $product->name }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="quantity" class="col-md-3 text-md-right col-form-label">Số lượng</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="quantity" id="quantity" placeholder="Số lượng" type="text" class="form-control" value="{{ $product->quantity }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="price"
                                    class="col-md-3 text-md-right col-form-label">Giá</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="price" id="price"
                                        placeholder="Giá" type="text" class="form-control" value="{{ $product->price }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="tag"
                                    class="col-md-3 text-md-right col-form-label">Nhãn</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="tag" id="tag"
                                        placeholder="Nhãn" type="text" class="form-control" value="{{ $product->tag }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="description"
                                    class="col-md-3 text-md-right col-form-label">Mô tả</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea class="form-control" name="description" id="description" placeholder="Mô tả">{{ $product->description }}</textarea>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="./admin/product" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Huỷ</span>
                                    </a>

                                    <button type="submit"
                                        class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Lưu</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection