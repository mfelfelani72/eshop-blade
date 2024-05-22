<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Settings / Public Front / Slider</a></li>
                <li class="breadcrumb-item"><a href="">New Image</a></li>
            </ol>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Primary Slider Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('primary-slider.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-6 col-form-label col-form-label-lg">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox1" name="setDetails">
                                        <label class="form-check-label" for="customCheckBox1">Would you like to set
                                            details?</label>
                                    </div>
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
                                <hr>
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
