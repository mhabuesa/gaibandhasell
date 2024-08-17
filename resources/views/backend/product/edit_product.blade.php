@extends('layouts.backend')
@push('title')
<title>Edit Product | Gaibandhasell.com</title>
@endpush
@push('header')
    	<!-- Selectize -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
    integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"/>
    <style>
        .upload__box {
        padding: 0;
        }
        .upload__inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
        }
        .upload__btn {
        display: block;
        font-weight: 600;
        color: #fff;
        text-align: center;
        min-width: 116px;
        padding: 6px;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid;
        background-color: transparent;
        border-color: #f2f2f2;
        font-size: 14px;
        color: #000

        }
        .upload__btn:hover {
        background-color: unset;
        color: #4045ba;
        transition: all 0.3s ease;
        }
        .upload__btn-box {
        margin-bottom: 10px;
        }
        .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
        }
        .upload__img-box {
        width: 150px;
        padding: 0 10px;
        margin-bottom: 12px;
        }
        .upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
        }
        .upload__img-close:after {
        content: "✖";
        font-size: 14px;
        color: white;
        }

        .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
        }


        .toggle-off{
            border: 1px solid green;
        }
    </style>
@endpush

@section('content')

    <div class="row">
        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Add Product</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('update.product',$product)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input required type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Brand Name</label>
                                    <select name="brand_id" class="form-control">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand )
                                            <option {{$brand->id == $product->brand_id?'selected':''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category )
                                            <option {{$category->id == $product->category_id?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input required type="number" name="price" class="form-control" value="{{$product->price}}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Discount Type</label>
                                    <select required name="discount_type" class="form-control">
                                        <option value="">Select Discount Type</option>
                                        <option {{$product->discount_type == 'percentage'?'selected':''}} value="percentage">Percentage</option>
                                        <option {{$product->discount_type == 'flat'?'selected':''}} value="flat">Flat</option>
                                    </select>
                                        @error('brand')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Discount</label>
                                    <input required type="number" name="discount" class="form-control" value="{{$product->discount}}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Tags</label>
                                    <input required type="text" name="tags" placeholder="Tags Here"  id="input-tags" value="{{$product->tags}}" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Short Description </label>
                                    <textarea class="form-control" name="short_desp" id="" cols="30" rows="5" >{{$product->short_desp}}</textarea>
                                </div>
                                @error('short_desp')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Description </label>
                                    <textarea id="summernote" class="form-control" name="long_desp">{{$product->long_desp}}</textarea>
                                </div>
                                @error('long_desp')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Additional Info </label>
                                    <textarea id="summernote2" class="form-control" name="addi_info" cols="30"
                                        rows="10">{{$product->addi_info}}</textarea>
                                </div>
                                @error('addi_info')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Preview Images</label>
                                   <div class="upload__btn-box">
                                        <label class="upload__btn">
                                            <p class="">Upload Product Preview Image</p>
                                            <input type="file" name="preview" multiple="" data-max_length="20"
                                                class="upload__inputfile" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        </label>
                                        <img class="mt-3" height="150" id="blah" src="{{asset('uploads')}}/product/preview/{{$product->preview}}" title="Product Image" alt="">
                                    </div>
                                </div>
                                @error('preview')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="col-lg-6">
                                <label class="form-label">Gallery Images</label>
                                <div class="upload__box">
                                    <div class="upload__btn-box">
                                        <label class="upload__btn">
                                            <p class="">Upload Product Gallery images</p>
                                            <input type="file" name="gallery[]" multiple="" data-max_length="20"
                                                class="upload__inputfile">
                                        </label>
                                    </div>
                                    <div class="prev_gallery d-flex mb-3">
                                        @foreach ($galleries as $gallery )
                                            <div class="img m-auto">
                                                <img height="150" src="{{asset('uploads')}}/product/gallery/{{$gallery->image}}" alt="">
                                            <p class="text-center m-2"><a class="text-danger" href="{{route('gall.delete', $gallery->id)}}">Delete</a></p>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="upload__img-wrap"></div>
                                </div>
                                @error('gallery')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                        </div>

                        <div class=" col-lg-6 m-auto">
                            <div class="mt-5 d-flex justify-content-center">
                                <button class="btn btn-primary w-50" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')


    	<!-- Selectize JS -->

        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        ></script>
        <script>
            $('#select-gear').selectize({ sortField: 'text' })
        </script>

        <script>
            $("#input-tags").selectize({
        delimiter: ",",
        persist: false,
        create: function (input) {
                return {
                    value: input,
                    text: input,
                };
            },
            });
        </script>

<script>
    $(document).ready(function () {
        $('#summernote').summernote();
        $('#summernote2').summernote();
    });
</script>

<script>
    jQuery(document).ready(function () {
        ImgUpload();
    });

    function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function () {
            $(this).on('change', function (e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function (f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);

                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var html =
                                    "<div class='upload__img-box'><div style='background-image: url(" +
                                    e.target.result + ")' data-number='" + $(
                                        ".upload__img-close").length + "' data-file='" + f
                                    .name +
                                    "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

        $('body').on('click', ".upload__img-close", function (e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    }

</script>

@endpush
