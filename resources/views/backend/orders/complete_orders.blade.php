@extends('admin.admin_master')
@section('admin')

    <div class="page-content">

        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All Complete Orders </h5>
                    </div>
                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>SL</th>
                            <th>Product Name </th>
                            <th> Invoice No </th>
                            <th> Quantity </th>
                            <th> Total Price </th>
                            <th> Order Date </th>
                            <th> Order Stauts </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{ $i++ }}</td>

                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->invoice_no }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->total_price }}</td>
                                <td>{{ $item->order_date }}</td>
                                <td>

                                    <div class="badge rounded-pill bg-success w-100">{{ $item->order_status }}
                                    </div>
                                </td>

                                <td>
                                    <a id="delete" href="{{route('order.delete',$item->id)}}"
                                       class="btn btn-danger">Delete </a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>

@endsection
