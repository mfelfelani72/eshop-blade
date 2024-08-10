<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-6 mt-2">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item active"><a>Settings / Shop / Cateogories</a></li>
                <li class="breadcrumb-item"><a href="">Index</a></li>
                </ol>
            </div>
            <div class="col-6">
                <a href="{{ route('category.create') }}" class="float-end btn btn-rounded btn-success">New Category +</a>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">

                    @if (false)
                        <div class="card-header">
                            <h4 class="card-title">Profile Datatable</h4>
                        </div>
                    @endif


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>code</th>
                                        <th>title</th>
                                        {{-- <th>description</th> --}}
                                        <th>operator</th>
                                        {{-- <th>status</th> --}}
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>
                                           
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->title }}</td>
                                            {{-- <td>{{ $item->description }}</td> --}}
                                            <td>{{ Auth::user($item->operator)->name }}</td>
                                            {{-- <td>{{ $item->status }}</td> --}}

                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('category.edit', ['id' => $item->id]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-danger shadow btn-xs sharp me-1"
                                                        onclick="destroyItem(event,{{ $item->id }})"><i
                                                            class="fa fa-trash"></i></a>
                                                    <form
                                                        action="{{ route('category.destroy', ['id' => $item->id]) }}"
                                                        id="itemDelete-{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                    </form>


                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
