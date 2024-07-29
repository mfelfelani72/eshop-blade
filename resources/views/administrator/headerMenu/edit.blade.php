@php
    $backUrl = app('router')
        ->getRoutes()
        ->match(app('request')->create(url()->previous()))
        ->getName();
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
                            <form action="{{ route('header-menu.update', $headerMenu->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- header menu --}}

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="title"
                                            value="{{ $headerMenu->title }}">
                                        @error('title')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @php
                                    $status = '';
                                    if ($headerMenu->child) {
                                        $status = 'disable';
                                    }
                                @endphp
                                <div class="mb-3 row {{ $status }}" id="menu_link">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="link"
                                            value="{{ $headerMenu->link }}">
                                        @error('link')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Lable</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="lable"
                                            value="{{ $headerMenu->lable }}">
                                        @error('lable')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">priority</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="priority"
                                            value="{{ $headerMenu->priority }}">
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
                                    if ($headerMenu->child || $backUrl == 'header-menu.edit') {
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

                                    @if ($headerMenu->child)
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label col-form-label-lg">Image</label>
                                            <div class="col-sm-10">
                                                <img class="" width="200"
                                                    src={{ asset('front/img/header-menu/' . $headerMenu->child->image) }}>
                                            </div>
                                        </div>
                                    @endif


                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Upload Image</span>
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-control" name="image">
                                        </div>
                                    </div>
                                    @error('image')
                                        <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                    @enderror


                                    {{-- childs --}}

                                    <div class="col-xl-12">
                                        <div class="card-body">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                @php
                                                    $countChild = 0;
                                                @endphp
                                                @foreach ($headerMenu->childs as $key => $row)
                                                    @php
                                                        $active = '';
                                                        if ($key == 0) {
                                                            $active = 'active';
                                                        }
                                                    @endphp

                                                    <li class="nav-item">
                                                        <a class="nav-link {{ $active }}" data-bs-toggle="tab"
                                                            href='#child-{{ $key + 1 }}'>
                                                            <span>
                                                                child {{ $key + 1 }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    {{ $countChild = $key }}
                                                @endforeach
                                                @while ($countChild <= 3)
                                                    @php
                                                        $active = '';
                                                        if ($countChild == 0) {
                                                            $active = 'active';
                                                        }
                                                    @endphp
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ $active }}" data-bs-toggle="tab"
                                                            href='#child_{{ $countChild + 1 }}'>
                                                            <span>
                                                                child {{ $countChild + 1 }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $countChild++;
                                                    @endphp
                                                @endwhile
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content tabcontent-border">
                                                @php
                                                    $countChild = 0;
                                                @endphp
                                                @foreach ($headerMenu->childs as $key => $row)
                                                    @php
                                                        $active = '';
                                                        if ($key == 0) {
                                                            $active = 'active show';
                                                        }
                                                    @endphp
                                                    <div class="tab-pane fade {{ $active }}"
                                                        id="child-{{ $key + 1 }}" role="tabpanel">

                                                        @php
                                                            $child_count[$key + 1] = 0;
                                                            $child = 'child_' . $key + 1;
                                                        @endphp

                                                        <div class="pt-4">
                                                            <div class="mb-3 row">
                                                                <label
                                                                    class="col-sm-2 col-form-label col-form-label-lg">Child
                                                                    Title</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="title_child[]" {{-- value="{{ old('title_child') }}" --}}
                                                                        value="{{ $row->title }}">
                                                                    @error('title_child')
                                                                        <div class="pt-1 pb-1 mt-2 alert alert-danger">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            @foreach ($row->grandChilds as $row2)
                                                                <div class="mb-1 row">
                                                                    <label
                                                                        class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                                        Child
                                                                        Title</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text"
                                                                            class="form-control form-control-lg"
                                                                            name="grand_child[{{ $child }}][{{ $child_count[$key + 1] }}][title]"
                                                                            value="{{ $row2->title }}">

                                                                    </div>
                                                                    <label
                                                                        class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                                        Child
                                                                        Link</label>
                                                                    <div class="col-sm-5">
                                                                        <input type="text"
                                                                            class="form-control form-control-lg"
                                                                            name="grand_child[{{ $child }}][{{ $child_count[$key + 1] }}][link]"
                                                                            value="{{ $row2->link }}">
                                                                    </div>
                                                                    @php
                                                                        $child_count[$key + 1]++;
                                                                    @endphp
                                                                </div>
                                                            @endforeach

                                                            <div id="{{ $child }}"
                                                                count="{{ $child_count[$key + 1] }}"></div>

                                                            <div class="mb-1 row"
                                                                id="grand_details_child_{{ $key + 1 }}">

                                                            </div>

                                                            <a href="javascript:void(0)" class="pointer"
                                                                onclick="addGrandChildDetails('{{ $child }}')"><span><i
                                                                        class="fa fa-plus"
                                                                        aria-hidden="true"></i></span></a>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $countChild = $key;
                                                    @endphp
                                                @endforeach
                                                @php
                                                    $child = ['child_1', 'child_2', 'child_3', 'child_4'];
                                                    $grand_details_child = [
                                                        'grand_details_child_1',
                                                        'grand_details_child_2',
                                                        'grand_details_child_3',
                                                        'grand_details_child_4',
                                                    ];
                                                @endphp
                                                @while ($countChild <= 3)
                                                    @php
                                                        $active = '';
                                                        if ($countChild == 0) {
                                                            $active = 'active show';
                                                        }
                                                    @endphp
                                                    <div class="tab-pane fade {{ $active }}" id="{{ $child[$countChild] }}"
                                                        role="tabpanel">



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
                                                                        name="grand_child[{{ $child[$countChild] }}][{{ $countChild }}][title]">
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
                                                                <div class="col-sm-5" id="{{ $child[$countChild] }}"
                                                                    count="{{ $countChild }}">
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="grand_child[{{ $child[$countChild] }}][{{ $countChild }}][link]">
                                                                    {{-- error --}}
                                                                    @if ($errors->get('link_gchild'))
                                                                        <div class="pt-1 pb-1 mt-2 alert alert-danger">
                                                                            {{ $errors->get('link_gchild')[0] }}</div>
                                                                    @endif
                                                                    {{-- error --}}
                                                                </div>
                                                            </div>
                                                            <div class="mb-1 row"
                                                                id="{{ $grand_details_child[$countChild] }}">

                                                            </div>

                                                            <a href="javascript:void(0)" class="pointer"
                                                                onclick="addGrandChildDetails('{{ $child[$countChild] }}')"><span><i
                                                                        class="fa fa-plus"
                                                                        aria-hidden="true"></i></span></a>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $countChild++;
                                                    @endphp
                                                @endwhile
                                            </div>
                                        </div>
                                    </div>

                                    {{-- childs --}}


                                    @if (false)
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label col-form-label-lg">Child
                                                Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-lg"
                                                    name="title_child"
                                                    @if ($headerMenu->child) value="{{ $headerMenu->child->title }}" @endif
                                                    @if (old('title')) value="{{ old('title_child') }}" @endif>
                                                @error('title_child')
                                                    <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        @php
                                            $count = 0;
                                        @endphp
                                        @if ($headerMenu->child)
                                            @foreach ($headerMenu->child->grandChilds as $item)
                                                <div class="mb-1 row">
                                                    <label class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                        Child
                                                        Title</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control form-control-lg"
                                                            name="grand_child[{{ $count }}][title]"
                                                            value="{{ $item->title }}">

                                                    </div>
                                                    <label class="col-sm-2 col-form-label col-form-label-lg">Grand
                                                        Child
                                                        Link</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control form-control-lg"
                                                            name="grand_child[{{ $count++ }}][link]"
                                                            value="{{ $item->link }}">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="disable" id="count" count="{{ $count }}"></div>

                                        <div class="mb-1 row" id="grand_child_details">

                                        </div>

                                        <a href="javascript:void(0)" class="pointer"
                                            onclick="addGrandChildDetails()"><span><i class="fa fa-plus"
                                                    aria-hidden="true"></i></span></a>

                                </div>
                                @endif


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


    function addGrandChildDetails(child) {
        console.log(child);
        let resultDiv = document.getElementById('grand_details_' + child);
        console.log(resultDiv)
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
