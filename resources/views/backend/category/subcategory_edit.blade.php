@extends('admin.admin_master')

@section('admin')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit SubCategory</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">SubCategory</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row  justify-content-center">


                    <div class="col-lg-8">


                        <form method="post" action="{{route('subcategory.update',$subCategory->id)}}">
                            @csrf

                            <div class="card">

                                <div class="card-header">
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger"> {{ $error }}  </p>
                                    @endforeach
                                </div>

                                <div class="card-body">
                                    <div class="row mb-3">


                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Category Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select name="category_name" class="form-select mb-3"  aria-label="Default select example">

                                                <option selected="" disabled >choose category name </option>

                                                @foreach( $Category as $row)
                                                    <option value="{{  $row->category_name }}"> {{ $row->category_name }}</option>
                                                @endforeach




                                            </select>


                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">SubCategory Name </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="subcategory_name" class="form-control" value="{{$subCategory->subcategory_name }}">

                                        </div>
                                    </div>













                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Update subcategory" />
                                        </div>
                                    </div>


                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
