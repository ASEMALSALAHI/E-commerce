@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All Review </h5>
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
                            <th>Reviewer Name </th>

                            <th>Comments </th>
                            <th>Rating </th>

                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach ($review as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->reviewer_name }}</td>

                                <td>{{ $item->reviewer_comments }}</td>



                                @switch($item->reviewer_rating )
                                    @case(1)
                                        <td>
                                            <span style="font-size: 24px" class="text-warning" ><i class="bx bxs-star"></i></span>
                                            <span style="font-size: 24px">
                                             <i class="bx bx-star"></i>
                                             <i class="bx bx-star"></i>
                                             <i class="bx bx-star"></i>
                                             <i class="bx bx-star"></i>

                                             </span>
                                        </td>

                                        @break
                                    @case(2)
                                        <td>
                                            <span style="font-size: 24px" class="text-warning" ><i class="bx bxs-star"> <i class="bx bx-star"></i></i></span>
                                            <span style="font-size: 24px">

                                             <i class="bx bx-star"></i>
                                             <i class="bx bx-star"></i>
                                             <i class="bx bx-star"></i>

                                             </span>
                                        </td>
                                        @break

                                    @case(3)
                                        <td>
                                                 <span style="font-size: 24px" class="text-warning" >
                                                  <i class="bx bxs-star"> </i>
                                                        <i class="bx bx-star"></i>
                                                        <i class="bx bx-star"></i>
                                                      </span>
                                            <span style="font-size: 24px">

                                                 <i class="bx bx-star"></i>
                                                 <i class="bx bx-star"></i>


                                                 </span>
                                        </td>
                                        @break
                                    @case(4)
                                        <td>
                                                     <span style="font-size: 24px" class="text-warning" >
                                                       <i class="bx bxs-star"></i>
                                                       <i class="bx bxs-star"></i>
                                                       <i class="bx bxs-star"></i>
                                                       <i class="bx bxs-star"></i></span>
                                            <span style="font-size: 24px">
                                                     <i class="bx bx-star"></i>

                                                     </span>
                                        </td>
                                        @break
                                    @case(5)
                                        <td>
                                                         <span style="font-size: 24px" class="text-warning" >
                                                            <i class="bx bxs-star"></i>
                                                            <i class="bx bxs-star"></i>
                                                            <i class="bx bxs-star"></i>
                                                            <i class="bx bxs-star"></i>
                                                            <i class="bx bxs-star"></i>
                                                         </span>

                                        </td>
                                        @break

                                    @default

                                @endswitch



                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
