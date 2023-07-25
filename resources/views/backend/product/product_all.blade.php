@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All Product </h5>
                    </div>
                    <div class="font-16 ms-auto">
                        <a href="{{route('add.product')}}"><i title="add" class="fadeIn animated bx bx-message-square-add" style="font-size:25px;color:rgb(55, 206, 18);"></i>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>SL</th>
                            <th>Product Image </th>
                            <th>Product Name </th>
                            <th>Product Code </th>
                            <th>Product Category </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach ($products as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                            <img src=" {{ $row->image }} " alt="">
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->product_code }}</td>
                                <td>{{ $row->category }}</td>
                                <td><a href="{{ route('product.edit',$row->id) }}"><i title="edit" class="fadeIn animated bx bx-message-square-edit" style="font-size:25px;color:rgb(47, 26, 165);"></i> </a>
                                    <a href="{{ route('product.delete',$row->id) }}" id="delete" ><i title="delete"   class="fadeIn animated bx bx-trash" style="font-size:25px;color:rgb(233, 19, 30);"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
