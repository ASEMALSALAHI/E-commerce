@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All Sliders </h5>
                    </div>
                    <div class="font-16 ms-auto">
                        <a href="{{ route('slider.add') }}"><i title="add" class="fadeIn animated bx bx-message-square-add"
                                                               style="font-size:25px;color:rgb(55, 206, 18);"></i></a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>SL</th>
                            <th>Slider Image </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach ($slider as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td hidden>{{ $row->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                            <img src=" {{ $row->slider_image }} " alt="">
                                        </div>
                                    </div>
                                </td>

                                <td><a class="editbtn"><i title="edit"
                                                          class="fadeIn animated bx bx-message-square-edit"
                                                          style="font-size:25px;color:rgb(47, 26, 165);"></i> </a>

                                    <a href="{{ route('slider.delete', $row->id) }}" id="delete"><i title="delete"
                                                                                                    class="fadeIn animated bx bx-trash"
                                                                                                    style="font-size:25px;color:rgb(233, 19, 30);"></i> </a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Update slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id">


                        <div class="mb-1">
                            <label for="recipient-name" class="col-form-label">Slider image</label>
                            <input type="file" class="form-control" id="image" name="slider_image" >
                        </div>



                        <div class="mb-1">
                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                 style="width:100px; height: 100px;">
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


    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#exampleModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#id').val(data[1]);
            });
        });
    </script>
@endsection
