@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All Notivications </h5>
                    </div>
                    <div class="font-22 ms-auto">
                        <a href="{{ route('add.notification') }}"><i title="add" class="fa fa-plus-square-o"
                                                                     style="font-size:22px;color:green;"> add</i> </a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>SL</th>
                            <th>Title </th>
                            <th>Message </th>
                            <th>Date </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach ($notifications as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td> {{ $item->title }}</td>
                                <td>{{ Str::limit($item->message, 25, '..') }}</td>
                                <td>{{ $item->date }}</td>
                                <td hidden>{{ $item->message }}</td>
                                <td hidden>{{ $item->id }}</td>


                                <td><a class="editbtn"><i title="edit"
                                                          class="fadeIn animated bx bx-message-square-edit"
                                                          style="font-size:25px;color:rgb(47, 26, 165);"></i> </a>
                                    <a href="{{ route('notificcation.delete', $item->id) }}" id="delete"><i
                                            title="delete" class="fadeIn animated bx bx-trash"
                                            style="font-size:25px;color:rgb(233, 19, 30);"></i> </a>
                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-l">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update notfication</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form method="post" action="{{ route('update.notification') }}">
                                @csrf
                                <input type="hidden" class="form-control" id="id" name="id">



                                <div class="mb-1">
                                    <label for="recipient-name" class="col-form-label">title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Date</label>
                                    <input type="text" class="form-control" id="date" name="date">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" rows="10" id="message" name="message"></textarea>
                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">update</button>

                        </div>
                        </form>

                    </div>



                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#exampleModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#id').val(data[5]);
                $('#title').val(data[1]);
                $('#message').val(data[4]);
                $('#date').val(data[3]);
            });
        });
    </script>









@endsection
