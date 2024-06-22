<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Settings / Public Front / Header Menu</a></li>
                <li class="breadcrumb-item"><a href="">New Menu</a></li>
            </ol>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Header Menu Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('header-menu.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- header menu --}}

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
                                <div class="mb-3 row" id="menu_link">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="link"
                                            value="{{ old('link') }}">
                                        @error('link')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Lable</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="lable"
                                            value="{{ old('lable') }}">
                                        @error('lable')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- header menu --}}

                                {{-- header menu childs --}}

                                @php
                                    $status = 'disable';
                                    $checked= "";
                                    if (old('title')) {
                                        $status = '';
                                        $checked="checked";
                                    }
                                @endphp

                                <div class="col-sm-6 col-form-label col-form-label-lg">
                                    <input type="checkbox" class="form-check-input" {{ $checked }} id="customCheckBox1" name="addChild"
                                        onclick="addChildsDetails()">
                                    <label class="form-check-label" for="customCheckBox1">Would you like
                                        Add childs for this subject?</label>
                                </div>
                                
                                <div class="{{ $status }}" id="menu-child">
                                    <h4 class="card-title">Header Menu Child Details</h4>
                                    <hr>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Upload Image</span>
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-control" name="image">
                                        </div>
                                    </div>
                                    @error('image')
                                        <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Child Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-lg"
                                                name="title_child" value="{{ old('title_child') }}">
                                            @error('title_child')
                                                <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    @php
                                        $count = 0;
                                    @endphp
                                    <div class="mb-1 row">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Grand Child
                                            Title</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-lg"
                                                name="grand_child[{{ $count }}][title]">

                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Grand Child
                                            Link</label>
                                        <div class="col-sm-5" id="count" count="{{ $count }}">
                                            <input type="text" class="form-control form-control-lg"
                                                name="grand_child[{{ $count }}][link]">
                                        </div>
                                    </div>
                                    <div class="mb-1 row" id="grand_child_details">

                                    </div>

                                    <a href="javascript:void(0)" class="pointer"
                                        onclick="addGrandChildDetails()"><span><i class="fa fa-plus"
                                                aria-hidden="true"></i></span></a>

                                </div>
                                {{-- header menu childs --}}


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
    function addChildsDetails() {

        var child = document.getElementById("menu-child");
        var link = document.getElementById("menu_link");

        if (child.classList.value == 'disable') {
            child.classList.remove("disable");
            link.classList.add("disable");
        } else {
            child.classList.add("disable");
            link.classList.remove("disable");
        }
    }

    function addGrandChildDetails() {
        let resultDiv = document.getElementById('grand_child_details');
        var count = parseInt(document.getElementById("count").getAttribute("count"));
        console.log(count);
        count = count + 1;
        resultDiv.innerHTML += '<label class="col-sm-2 col-form-label col-form-label-lg">' +
            'Grand Child Title' +
            '</label>' +
            '<div class="col-sm-3">' +
            '<input type="text" class="form-control form-control-lg" name="grand_child[' + count + '][title]"></div>' +
            '<label class="col-sm-2 col-form-label col-form-label-lg">' +
            'Grand Child Link' +
            '</label>' +
            '<div class="col-sm-5">' +
            '<input type="text" class="form-control form-control-lg" name="grand_child[' + count + '][link]"></div>' +
            '</div>';
        document.getElementById('count').setAttribute("count", count);
    }
</script>
