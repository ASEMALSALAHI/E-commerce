@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <div class="page-content">
        <!--breadcrumb-->
        <h5 class="card-title">Add New Product</h5>
        <hr>
        <div class="form-body mt-4">

            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">

                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Product Title</label>
                                <input type="text" name="title" class="form-control" id="inputProductTitle"
                                       placeholder="Enter product title">
                            </div>

                            <div class="mb-3">

                                <label for="inputProductTitle" class="form-label">Product Code</label>
                                <input type="text" name="product_code" class="form-control" id="inputProductTitle"
                                       placeholder="Enter product title">
                            </div>



                            <div class="mb-3">
                                <label for="formFile" class="form-label">Product Thumbnail </label>
                                <input class="form-control" name="image" type="file" id="image">
                            </div>


                            <div class="mb-3">
                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                     style="width:100px; height: 100px;">
                            </div>




                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image One</label>
                                <input class="form-control" name="image_one" type="file">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image Two</label>
                                <input class="form-control" name="image_two" type="file">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image Three</label>
                                <input class="form-control" name="image_three" type="file">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image Four</label>
                                <input class="form-control" name="image_four" type="file">
                            </div>




                            <div class="mb-3">
                                <label for="inputProductDescription" class="form-label">Short
                                    Description</label>
                                <textarea name="short_description" class="form-control" id="inputProductDescription" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="inputProductDescription" class="form-label">Long Description</label>
                                <textarea name="long_description" class="form-control" id="inputProductDescription" rows="3"></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputPrice" class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" id="inputPrice"
                                           placeholder="00.00">
                                </div>




                                <div class="col-md-6">
                                    <label for="inputCompareatprice" class="form-label">Special Price</label>
                                    <input type="text" name="special_price" class="form-control"
                                           id="inputCompareatprice" placeholder="00.00">
                                </div>


                                <div class="col-md-12">
                                    <label for="inputCompareatprice" class="form-label">Brand</label>
                                    <input type="text" name="brand" class="form-control"
                                    >
                                </div>




                                <div class="col-12">
                                    <label for="inputProductType" class="form-label">Product Category</label>
                                    <select name="category" class="form-select" id="inputProductType">


                                        <option selected="" disabled="">Select Category</option>
                                        @foreach($category as $row)
                                            <option value="{{ $row->category_name }}" >{{ $row->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="inputProductType" class="form-label">Product SubCategory</label>
                                    <select name="subcategory" class="form-select" id="inputProductType">

                                        <option disabled="" selected="">Select SubCategory</option>

                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Product Size</label>
                                    <input  name="size" class="form-control visually-hidden" data-role="tagsinput" value="S,M,L,XL">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Product Color</label>
                                    <input  name="color" class="form-control visually-hidden" data-role="tagsinput" value="Red,White,Black">
                                </div>



                                <div class="form-check">
                                    <input class="form-check-input" name="remark" type="radio" value="FEATURED"
                                           id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">FEATURED</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" name="remark" type="radio" value="NEW"
                                           id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">NEW</label>
                                </div>


                                <div class="form-check">
                                    <input class="form-check-input" name="remark" type="radio" value="COLLECTION"
                                           id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">COLLECTION</label>
                                </div>


                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Save Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->


            </form>


        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category"]').on('change', function() {

                var category_id = $(this).val();

                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory"]').
                                append('<option value="' + value.subcategory_name +
                                    '">' + value.subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>



@endsection
