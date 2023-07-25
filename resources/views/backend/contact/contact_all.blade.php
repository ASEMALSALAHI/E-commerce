@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All Message </h5>
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
                            <th>Name </th>
                            <th>Email </th>
                            <th>Message </th>
                            <th>Date </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach ($message as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ Str::limit($item->message, 25, '..') }}</td>
                                <td>{{ $item->contact_date }}</td>
                                <td hidden>{{ $item->message }}</td>


                                <td><a class="viewbtn"><i title="show" class="fadeIn animated bx bx-show-alt" style="font-size:25px;color:rgb(47, 26, 165);"></i> </a>
                                    <a href="{{ route('message.delete', $item->id) }}" id="delete" ><i title="delete"   class="fadeIn animated bx bx-trash" style="font-size:25px;color:rgb(233, 19, 30);"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-1">
                        <label for="recipient-name" class="col-form-label">sender:</label>
                        <input type="text" class="form-control" id="name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">email:</label>
                        <input type="text" class="form-control" id="email" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" rows="10" id="message" readonly></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.viewbtn').on('click',function(){
                $('#exampleModal').modal('show');

                $tr=$(this).closest('tr');

                var data=$tr.children("td").map(function(){
                    return $(this).text();
                }).get();


                $('#id').val(data[0]);
                $('#name').val(data[1]);
                $('#email').val(data[2]);
                $('#message').val(data[5]);


            });
        });

    </script>
@endsection
