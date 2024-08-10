<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Settings / Shop / Products</a></li>
                <li class="breadcrumb-item"><a href="">Edit</a></li>
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
                            <form action="{{ route('product.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row">
                                    <label class="col-sm-1 col-form-label col-form-label-lg">Title</label>
                                    <div class="col-sm-5">
                                        <input type="text" value='{{ $product->title }}'
                                            class="form-control form-control-lg" name="title">
                                    </div>
                                    <label class="col-sm-1 col-form-label col-form-label-lg">Code</label>
                                    <div class="col-sm-5">
                                        <input type="text" value='{{ $product->code }}'
                                            class="form-control form-control-lg" name="code">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">

                                        @foreach ($product->getInformations() as $key => $item)
                                            <label class="col-sm-2 col-form-label col-form-label-lg">Information
                                                Title</label>
                                            <div class="col-sm-2">
                                                <input type="text" value='{{ $key }}'
                                                    class="form-control form-control-lg" name="infoTitle[]">
                                            </div>
                                            <label class="col-sm-3 col-form-label col-form-label-lg">Information
                                                description</label>


                                            <div class="col-sm-5">
                                                <input type="text" value='{{ $item }}'
                                                    class="form-control form-control-lg" name="infoDesc[]">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row" id="addInfoTiDes">


                                    </div>

                                    <a href="javascript:void(0)" class="pointer" onclick="addInfoTiDes()"><span><i
                                                class="fa fa-plus" aria-hidden="true"></i></span></a>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-1 col-form-label col-form-label-lg">details</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" rows="10" style="height: 100%" name="details">{{ $product->details }}</textarea>
                                    </div>
                                    <label class="col-sm-1 col-form-label col-form-label-lg">desc</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" id="" rows="10" style="height: 100%" name="description">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-1 col-form-label col-form-label-lg">Price</label>
                                    <div class="col-sm-2">
                                        <input type="text" value={{ $product->price }}
                                            class="form-control form-control-lg" name="price">
                                    </div>
                                    <label class="col-sm-1 col-form-label col-form-label-lg">Price off</label>
                                    <div class="col-sm-2">
                                        <input type="text" value={{ $product->price_off }}
                                            class="form-control form-control-lg" name="price_off">
                                    </div>
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Category</label>
                                    <div class="col-sm-4">
                                        <select id="multi-value-select3" multiple="" name="category[]"
                                            data-select2-id="multi-value-select3" tabindex="-1"
                                            class="select2-hidden-accessible" aria-hidden="true">
                                            @foreach ($categories as $category)
                                                @php
                                                    $select = '';
                                                    if (in_array($category->id, $productCategoriesIds)) {
                                                        $select = 'selected';
                                                    }
                                                @endphp
                                                <option {{ $select }} data-select2-id={{ $category->id }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Images</label>
                                    <div class="col-sm-6 col-form-label col-form-label-lg">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox1" name="changeImg">
                                        <label class="form-check-label" for="customCheckBox1">Would you like to change
                                            Images?</label>
                                    </div>
                                    <div class="col-sm-10">
                                        @foreach ($product->ProductImages as $item)
                                            <img class="m-1" width="200" height="100"
                                                src={{ asset('front/img/products/' . $item->img) }}>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload Image</span>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control" name="image[]"
                                            multiple>
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
            ' <div class="col-sm-2">' +
            '<input type="text" class="form-control form-control-lg" name="infoTitle[]"></div>' +
            '<label class="col-sm-3 col-form-label col-form-label-lg">Information description</label>' +
            '<div class="col-sm-5">' +
            '<input type="text" class="form-control form-control-lg" name="infoDesc[]">' +
            '</div>';
    }
</script>
