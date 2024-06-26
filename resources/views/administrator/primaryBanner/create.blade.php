<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Settings / Public Front / Banner</a></li>
                <li class="breadcrumb-item"><a href="">New Banner</a></li>
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
                            <form action="{{ route('primary-banner.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                   <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="title"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Slogan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="slogan"
                                            value="{{ old('slogan') }}">
                                        @error('slogan')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Category</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="category"
                                            value="{{ old('category') }}">
                                        @error('category')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Link Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="link_title"
                                            value="{{ old('link_title') }}">
                                        @error('link_title')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg"name="link"
                                            value="{{ old('link') }}">
                                        @error('link')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="description"
                                            value="{{ old('description') }}">
                                        @error('description')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload Image</span>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control" name="image">
                                    </div>
                                </div>
                                @error('img')
                                    <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                @enderror
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
