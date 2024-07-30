@php
    // dd($errors);
@endphp
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

                                {{-- header menu --}}

                                {{-- header menu childs --}}

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

                                    <div class="col-xl-12">
                                        <div class="card-body">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#child-1">
                                                        <span>
                                                            Child 1
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#child-2">
                                                        <span>
                                                            Child 2
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#child-3">
                                                        <span>
                                                            Child 3
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#child-4">
                                                        <span>
                                                            Child 4
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content tabcontent-border">
                                                <div class="tab-pane fade active show" id="child-1" role="tabpanel">

                                                    @php
                                                        $child_1_count = 0;
                                                        $child = 'child_1';
                                                    @endphp

                                                    <div class="pt-4">
                                                        <div class="mb-3 row">
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Child
                                                                Title</label>
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="title_child[]"
                                                                    value="{{ old('title_child[0]') }}">
                                                                {{-- error --}}
                                                                @if ($errors->get('title_child'))
                                                                    <div class="pt-1 pb-1 mt-2 alert alert-danger">
                                                                        {{ $errors->get('title_child')[0] }}</div>
                                                                @endif
                                                                {{-- error --}}
                                                            </div>
                                                        </div>

                                                        <div class="mb-1 row">
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                                Child
                                                                Title</label>
                                                            <div class="col-sm-3">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="grand_child[{{ $child }}][{{ $child_1_count }}][title]">
                                                                {{-- error --}}
                                                                @if ($errors->get('title_gchild'))
                                                                    <div class="pt-1 pb-1 mt-2 alert alert-danger">
                                                                        {{ $errors->get('title_gchild')[0] }}</div>
                                                                @endif
                                                                {{-- error --}}

                                                            </div>
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                                Child
                                                                Link</label>
                                                            <div class="col-sm-5" id="{{ $child }}"
                                                                count="{{ $child_1_count }}">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="grand_child[{{ $child }}][{{ $child_1_count }}][link]">
                                                                {{-- error --}}
                                                                @if ($errors->get('link_gchild'))
                                                                    <div class="pt-1 pb-1 mt-2 alert alert-danger">
                                                                        {{ $errors->get('link_gchild')[0] }}</div>
                                                                @endif
                                                                {{-- error --}}
                                                            </div>
                                                        </div>
                                                        <div class="mb-1 row" id="grand_details_child_1">

                                                        </div>

                                                        <a href="javascript:void(0)" class="pointer"
                                                            onclick="addGrandChildDetails('{{ $child }}')"><span><i
                                                                    class="fa fa-plus"
                                                                    aria-hidden="true"></i></span></a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="child-2" role="tabpanel">
                                                    @php
                                                        $child_2_count = 0;
                                                        $child = 'child_2';
                                                    @endphp

                                                    <div class="pt-4">
                                                        <div class="mb-3 row">
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Child
                                                                Title</label>
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="title_child[]">
                                                            </div>
                                                        </div>

                                                        <div class="mb-1 row">
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                                Child
                                                                Title</label>
                                                            <div class="col-sm-3">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="grand_child[{{ $child }}][{{ $child_2_count }}][title]">

                                                            </div>
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                                Child
                                                                Link</label>
                                                            <div class="col-sm-5" id="{{ $child }}"
                                                                count="{{ $child_2_count }}">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="grand_child[{{ $child }}][{{ $child_2_count }}][link]">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1 row" id="grand_details_child_2">

                                                        </div>

                                                        <a href="javascript:void(0)" class="pointer"
                                                            onclick="addGrandChildDetails('{{ $child }}')"><span><i
                                                                    class="fa fa-plus"
                                                                    aria-hidden="true"></i></span></a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="child-3" role="tabpanel">
                                                    @php
                                                        $child_3_count = 0;
                                                        $child = 'child_3';
                                                    @endphp

                                                    <div class="pt-4">
                                                        <div class="mb-3 row">
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Child
                                                                Title</label>
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="title_child[]">

                                                            </div>
                                                        </div>

                                                        <div class="mb-1 row">
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                                Child
                                                                Title</label>
                                                            <div class="col-sm-3">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="grand_child[{{ $child }}][{{ $child_3_count }}][title]">

                                                            </div>
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                                Child
                                                                Link</label>
                                                            <div class="col-sm-5" id="{{ $child }}"
                                                                count="{{ $child_3_count }}">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="grand_child[{{ $child }}][{{ $child_3_count }}][link]">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1 row" id="grand_details_child_3">

                                                        </div>

                                                        <a href="javascript:void(0)" class="pointer"
                                                            onclick="addGrandChildDetails('{{ $child }}')"><span><i
                                                                    class="fa fa-plus"
                                                                    aria-hidden="true"></i></span></a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="child-4" role="tabpanel">
                                                    @php
                                                        $child_4_count = 0;
                                                        $child = 'child_4';
                                                    @endphp

                                                    <div class="pt-4">
                                                        <div class="mb-3 row">
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Child
                                                                Title</label>
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="title_child[]">

                                                            </div>
                                                        </div>

                                                        <div class="mb-1 row">
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                                Child
                                                                Title</label>
                                                            <div class="col-sm-3">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="grand_child[{{ $child }}][{{ $child_4_count }}][title]">

                                                            </div>
                                                            <label
                                                                class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                                Child
                                                                Link</label>
                                                            <div class="col-sm-5" id="{{ $child }}"
                                                                count="{{ $child_4_count }}">
                                                                <input type="text"
                                                                    class="form-control form-control-lg"
                                                                    name="grand_child[{{ $child }}][{{ $child_4_count }}][link]">
                                                            </div>
                                                        </div>
                                                        <div class="mb-1 row" id="grand_details_child_4">

                                                        </div>

                                                        <a href="javascript:void(0)" class="pointer"
                                                            onclick="addGrandChildDetails('{{ $child }}')"><span><i
                                                                    class="fa fa-plus"
                                                                    aria-hidden="true"></i></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>


                    </div>
                    {{-- header menu childs --}}
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

    function addGrandChildDetails(child) {
        console.log(child);
        let resultDiv = document.getElementById('grand_details_' + child);

        var count = parseInt(document.getElementById(child).getAttribute("count"));

        count = count + 1;
        resultDiv.innerHTML += '<label class="col-sm-2 col-form-label col-form-label-lg">' +
            'Grand Child Title' +
            '</label>' +
            '<div class="col-sm-3">' +
            '<input type="text" class="form-control form-control-lg" name="grand_child[' + child + '][' + count +
            '][title]"></div>' +
            '<label class="col-sm-2 col-form-label col-form-label-lg">' +
            'Grand Child Link' +
            '</label>' +
            '<div class="col-sm-5">' +
            '<input type="text" class="form-control form-control-lg" name="grand_child[' + child + '][' + count +
            '][link]"></div>' +
            '</div>';
        document.getElementById(child).setAttribute("count", count);
    }
</script>
