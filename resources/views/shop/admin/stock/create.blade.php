<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Settings / Shop / Category</a></li>
                <li class="breadcrumb-item"><a href="">Create</a></li>
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
                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Title</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-lg" name="title"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 col-form-label col-form-label-lg">Code</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-lg" name="code"
                                            value="{{ old('code') }}">
                                        @error('code')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @if (false)
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Description</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                class="form-control form-control-lg"name="description">
                                        </div>
                                    </div>
                                @endif
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
