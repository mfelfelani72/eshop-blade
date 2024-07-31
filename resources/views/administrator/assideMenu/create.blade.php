@php
    // dd($errors);
@endphp
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Settings / Public Front / asside Menu</a></li>
                <li class="breadcrumb-item"><a href="">New Menu</a></li>
            </ol>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">asside Menu Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('asside-menu.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- asside menu --}}

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
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Icon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="icon"
                                            value="{{ old('icon') }}">
                                        @error('icon')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Priority</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="priority"
                                            value="{{ old('priority') }}">
                                        @error('priority')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- asside menu --}}

                                {{-- asside menu childs --}}

                                @php
                                    $status = 'disable';
                                    $checked = '';
                                    if (old('title')) {
                                        $status = '';
                                        $checked = 'checked';
                                    }
                                @endphp

                                <div class="col-sm-6 col-form-label col-form-label-lg">
                                    <input type="checkbox" class="form-check-input" {{ $checked }}
                                        id="customCheckBox1" name="addChild" onclick="addChildsDetails()">
                                    <label class="form-check-label" for="customCheckBox1">Would you like
                                        Add childs for this subject?</label>
                                </div>

                                <div class="{{ $status }}" id="asside-child">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Upload Image</span>
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-control" name="image">
                                        </div>
                                    </div>
                                    @error('image')
                                        <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <h4 class="card-title">Asside Menu Child Details</h4>
                                    <hr>
                                    <div class="col-xl-12">

                                        <div class="pt-4">

                                            <div class="mb-1 row">
                                                <label class="col-sm-2 col-form-label col-form-label-lg">
                                                    Child
                                                    Title</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="child[0][title]">
                                                    {{-- error --}}
                                                    @if ($errors->get('title_child'))
                                                        <div class="pt-1 pb-1 mt-2 alert alert-danger">
                                                            {{ $errors->get('title_child')[0] }}</div>
                                                    @endif
                                                    {{-- error --}}

                                                </div>
                                                <label class="col-sm-2 col-form-label col-form-label-lg">
                                                    Child
                                                    Link</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="child[0][link]">
                                                    {{-- error --}}
                                                    @if ($errors->get('link_child'))
                                                        <div class="pt-1 pb-1 mt-2 alert alert-danger">
                                                            {{ $errors->get('link_child')[0] }}</div>
                                                    @endif
                                                    {{-- error --}}
                                                </div>
                                            </div>
                                            <div class="mb-1 row" id="child" count=0>

                                            </div>

                                            <a href="javascript:void(0)" class="pointer"
                                                onclick="addChildDetails()"><span><i class="fa fa-plus"
                                                        aria-hidden="true"></i></span></a>
                                        </div>

                                    </div>
                                </div>
                        </div>


                    </div>
                    {{-- asside menu childs --}}
                    <div class="col-12">
                        <button type="submit" class="float-end btn btn-primary mx-4 my-4">Save</button>
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

        var child = document.getElementById("asside-child");
        var link = document.getElementById("menu_link");

        if (child.classList.value == 'disable') {
            child.classList.remove("disable");
            link.classList.add("disable");
        } else {
            child.classList.add("disable");
            link.classList.remove("disable");
        }
    }

    function addChildDetails() {

        let resultDiv = document.getElementById('child');

        var count = parseInt(document.getElementById('child').getAttribute("count"));

        count = count + 1;
        resultDiv.innerHTML += '<label class="col-sm-2 col-form-label col-form-label-lg">' +
            'Child Title' +
            '</label>' +
            '<div class="col-sm-3">' +
            '<input type="text" class="form-control form-control-lg" name="child[' + count +
            '][title]"></div>' +
            '<label class="col-sm-2 col-form-label col-form-label-lg">' +
            'Child Link' +
            '</label>' +
            '<div class="col-sm-5">' +
            '<input type="text" class="form-control form-control-lg" name="child[' + count +
            '][link]"></div>' +
            '</div>';
        document.getElementById('child').setAttribute("count", count);
    }
</script>
