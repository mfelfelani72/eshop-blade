<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-6 mt-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a>Settings / Public Front</a></li>
                    <li class="breadcrumb-item"><a href="">Header Menu</a></li>
                </ol>
            </div>
            <div class="col-6">
                <a href="{{ route('header-menu.create') }}" class="float-end btn btn-rounded btn-success">New Menu +</a>
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
                                        <th>link</th>
                                        <th>lable</th>
                                        <th>operator</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($headerMenus as $item)
                                        <tr>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->link }}</td>
                                            <td>{{ $item->lable }}</td>
                                            <td>{{ Auth::user($item->operator)->name }}</td>

                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('header-menu.edit', ['id' => $item->id]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-danger shadow btn-xs sharp"
                                                        onclick="destroyItem(event,{{ $item->id }})"><i
                                                            class="fa fa-trash"></i></a>
                                                    <form
                                                        action="{{ route('header-menu.destroy', ['id' => $item->id]) }}"
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
