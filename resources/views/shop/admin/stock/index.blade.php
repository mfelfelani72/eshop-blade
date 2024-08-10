<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-6 mt-2">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item active"><a>Settings / Shop / Stock</a></li>
                <li class="breadcrumb-item"><a href="">Index</a></li>
                </ol>
            </div>
            <div class="col-6">
                <a href="{{ route('stock.create') }}" class="float-end btn btn-rounded btn-success">New Stock +</a>
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
                                        <th>product</th>
                                        <th>count</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $item)
                                        <tr>
                                           
                                            <td>{{ $item->product_id }}</td>
                                            <td>{{ $item->count }}</td>
                                        
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('stock.edit', ['id' => $item->id]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-danger shadow btn-xs sharp me-1"
                                                        onclick="destroyItem(event,{{ $item->id }})"><i
                                                            class="fa fa-trash"></i></a>
                                                    <form
                                                        action="{{ route('stock.destroy', ['id' => $item->id]) }}"
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
