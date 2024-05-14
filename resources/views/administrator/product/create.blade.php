<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Settings / Shop / Products</a></li>
                <li class="breadcrumb-item"><a href="">Create</a></li>
            </ol>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-1 col-form-label col-form-label-lg">Title</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control form-control-lg" name="title" value="{{ old('title') }}">
                                        @error('title')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label col-form-label-lg">Code</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control form-control-lg" name="code" value="{{ old('code') }}">
                                        @error('code')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Information
                                            Title</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control form-control-lg"
                                                name="infoTitle[]">
                                            @error('informations')
                                                <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <label class="col-sm-3 col-form-label col-form-label-lg">Information
                                            description</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control form-control-lg"
                                                name="infoDesc[]">
                                            @error('informations')
                                                <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row" id="addInfoTiDes">


                                    </div>

                                    <a href="javascript:void(0)" class="pointer" onclick="addInfoTiDes()"><span><i
                                                class="fa fa-plus" aria-hidden="true"></i></span></a>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-1 col-form-label col-form-label-lg">details</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" id="" rows="10" style="height: 100%" 
                                        name="details" value="{{ old('details') }}">{{ old('details') }}</textarea>
                                        @error('details')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label col-form-label-lg">desc</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" id="" rows="10" style="height: 100%" 
                                        name="description" {{ old('description') }}>{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-5 mb-3 row">
                                    <label class="col-sm-1 col-form-label col-form-label-lg">Price</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-lg" name="price" value='{{ old('price') }}'>
                                        @error('price')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-1 col-form-label col-form-label-lg">Price off</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-lg" name="price_off" value='{{ old('price_off') }}'>
                                        @error('price_off')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Category</label>
                                    <div class="col-sm-4">
                                        <select id="multi-value-select3" multiple="" name="category[]"
                                            data-select2-id="multi-value-select3" tabindex="-1"
                                            class="select2-hidden-accessible" aria-hidden="true">
                                            @foreach ($categories as $category)
                                                <option data-select2-id={{ $category->id }}>{{ $category->title }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload Image</span>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control" name="image[]"
                                            multiple>
                                    </div>
                                </div>
                                @error('image')
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
<script>
    function addInfoTiDes() {
        let resultDiv = document.getElementById('addInfoTiDes');

        resultDiv.innerHTML += '<label class="col-sm-2 col-form-label col-form-label-lg">' +
            'Information Title' +
            ' </label>' +
            ' <div class="col-sm-2">' +
            '<input type="text" class="form-control form-control-lg" name="infoTitle[]"></div>' +
            '<label class="col-sm-3 col-form-label col-form-label-lg">Information description</label>' +
            '<div class="col-sm-5">' +
            '<input type="text" class="form-control form-control-lg" name="infoDesc[]">' +
            '</div>';
    }
</script>
