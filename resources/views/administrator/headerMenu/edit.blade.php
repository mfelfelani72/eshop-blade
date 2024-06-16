<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Settings / Public Front / Banner</a></li>
                <li class="breadcrumb-item"><a href="">Edit</a></li>
            </ol>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Primary Banner Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('primary-banner.update', $primaryBanner->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg"
                                            value="{{ $primaryBanner->title }}" name="title">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Slogan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg"
                                            value="{{ $primaryBanner->slogan }}" name="slogan">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Category</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg"
                                            value="{{ $primaryBanner->category }}" name="category">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Link Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg"
                                            value="{{ $primaryBanner->link_title }}" name="link_title">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg"
                                            value="{{ $primaryBanner->link }}" name="link">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg"
                                            value="{{ $primaryBanner->description }}" name="description">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Image</label>
                                    <div class="col-sm-10">
                                        <img class="" width="200"
                                            src={{ asset('front/img/banner/' . $primaryBanner->img) }}>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload Image</span>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control" name="image">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="float-end btn btn-primary mb-2">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
