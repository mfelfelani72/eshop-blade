<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Shop / Stock / Increase</a></li>
                <li class="breadcrumb-item"><a href="">New Record</a></li>
            </ol>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Increase product</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('store-product-stock', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-5">
                                    @if (!empty($product->coverImage->img))
                                        <div class="col-3 col-md-2">
                                            <img class="" width="100" height="100"
                                                src={{ asset('front/img/products/' . $product->coverImage->img) }}
                                                alt="">
                                        </div>
                                        <div class="col-9 col-md-10">
                                            <label class="col-12 col-form-label col-form-label-lg">Title :
                                                {{ $product->title }}</label>
                                            <label class="col-5 col-form-label col-form-label-lg">Code :
                                                {{ $product->code }}</label>
                                            <label class="col-5 col-form-label col-form-label-lg">Count :
                                                @php
                                                    if ($product->stock) {
                                                        echo $product->stock->count;
                                                    } else {
                                                        echo 0;
                                                    }
                                                @endphp
                                            </label>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Type</label>
                                    <div class="col-sm-4">
                                        <select id="dynamic-option-creation" name="type">
                                            <option value="increase">Increase</option>
                                            <option value="decrease">Decrease</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Count</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-lg" name="count"
                                            value="{{ old('count') }}">
                                        @error('count')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Details</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="details"
                                            value="{{ old('details') }}">
                                        @error('details')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
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
