@extends('admin.admin_master')
@section('admin')



    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Categories</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Category Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-9 mx-auto">

                <h6 class="mb-0 text-uppercase">Table head</h6>
                <div dir="rtl">
                    <a href="{{route('add.category') }}"><i title="add" class="fadeIn animated bx bx-message-square-add" style="font-size:25px;color:rgb(55, 206, 18);"></i>
                    </a>

                </div>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0">
                            <thead class="table-dark">
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($Category as $row)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$row->category_name}}</td>
                                <td><div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                            <img src=" {{ $row->category_image }} " alt="">
                                        </div>

                                    </div> </td>
                                <td>
                                    <a href="{{route('category.edit',$row->id)}}"><i title="edit" class="fadeIn animated bx bx-message-square-edit" style="font-size:25px;color:rgb(47, 26, 165);"></i> </a>
                                    <a href="{{route('category.delete',$row->id)}}" id="delete"><i title="delete" id="delete" class="fadeIn animated bx bx-trash" style="font-size:25px;color:rgb(233, 19, 30);"></i> </a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
@endsection
