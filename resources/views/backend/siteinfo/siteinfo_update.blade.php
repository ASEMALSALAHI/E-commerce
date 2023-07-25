@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Site Info Update</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Site Info Update</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="{{ route('update.siteinfo') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $siteinfo->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">About </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <textarea name="about" class="form-control"  rows="4">{{ $siteinfo->about }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <textarea name="address" class="form-control"  rows="2">{{ $siteinfo->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">youtub link </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="youtub_link" class="form-control"
                                                   value="{{ $siteinfo->youtub_link }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">linkedin link </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="linkedin_link" class="form-control"
                                                   value="{{ $siteinfo->linkedin_link }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">facbook_link </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="facebook_link" class="form-control"
                                                   value="{{ $siteinfo->facebook_link }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> twitter_link </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="twitter_link" class="form-control"
                                                   value="{{ $siteinfo->twitter_link }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">instagram_link </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="instegram_link" class="form-control"
                                                   value="{{ $siteinfo->instegram_link }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">copyright_text </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="copyright" class="form-control"
                                                   value="{{ $siteinfo->copyright }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Update SiteInfo">
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
