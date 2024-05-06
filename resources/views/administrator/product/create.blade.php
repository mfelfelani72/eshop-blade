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
                                        <input type="text" class="form-control form-control-lg" name="title">
                                    </div>
                                    <label class="col-sm-1 col-form-label col-form-label-lg">Code</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control form-control-lg" name="title">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Information
                                            Title</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control form-control-lg" name="title">
                                        </div>
                                        <label class="col-sm-3 col-form-label col-form-label-lg">Information
                                            description</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control form-control-lg" name="title">
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
                                        <textarea class="form-control" id="" rows="10" style="height: 100%"></textarea>
                                    </div>
                                    <label class="col-sm-1 col-form-label col-form-label-lg">desc</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" id="" rows="10" style="height: 100%"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-1 col-form-label col-form-label-lg">Price</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-lg" name="title">
                                    </div>
                                    <label class="col-sm-1 col-form-label col-form-label-lg">Price off</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-lg" name="title">
                                    </div>
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Category</label>
                                    <div class="col-sm-4">
                                        <select id="multi-value-select3" multiple=""
                                            data-select2-id="multi-value-select3" tabindex="-1"
                                            class="select2-hidden-accessible" aria-hidden="true">
                                            <option selected="selected" data-select2-id="482">orange</option>
                                            <option data-select2-id="1323">white</option>
                                            <option selected="selected" data-select2-id="49fer">purple</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload Image</span>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control" name="image[]">
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
<script>
    function addInfoTiDes() {
        let resultDiv = document.getElementById('addInfoTiDes');
        resultDiv.innerHTML += '<label class="col-sm-2 col-form-label col-form-label-lg">' +
            'Information Title' +
            ' </label>' +
            ' <div class="col-sm-2">' + '<input type="text" class="form-control form-control-lg" name="title"></div>' +
            '<label class="col-sm-3 col-form-label col-form-label-lg">Information description</label>' +
            '<div class="col-sm-5">' +
            '<input type="text" class="form-control form-control-lg" name="title">' +
            '</div>';
    }
</script>
