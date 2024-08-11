<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-6 mt-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a>Settings / Shop / Products</a></li>
                    <li class="breadcrumb-item"><a href="">Index</a></li>
                </ol>
            </div>
            <div class="col-6">
                <a href="{{ route('product.create') }}" class="float-end btn btn-rounded btn-success">New Product +</a>
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
                                        <th>image</th>
                                        <th>code</th>
                                        <th>title</th>
                                        <th>count</th>
                                        <th>operator</th>
                                        <th>status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>
                                                @if (!empty($item->coverImage->img))
                                                    <img class="" width="100" height="100em"
                                                        src={{ asset('front/img/products/' . $item->coverImage->img) }}
                                                        alt="">
                                                @endif

                                            </td>

                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->title }}</td>
                                            @if ($item->stock)
                                                <td>{{ $item->stock->count }}</td>
                                            @else
                                                <td>0</td>
                                            @endif
                                            <td>{{ Auth::user($item->operator)->name }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('product.edit', ['id' => $item->id]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-danger shadow btn-xs sharp me-1"
                                                        onclick="destroyItem(event,{{ $item->id }})"><i
                                                            class="fa fa-trash"></i></a>
                                                    <form action="{{ route('product.destroy', ['id' => $item->id]) }}"
                                                        id="itemDelete-{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                    </form>

                                                    <a href="#" title="trend"
                                                        class="btn btn-info shadow btn-xs sharp me-1"
                                                        onclick="trendItem(event,{{ $item->id }})">
                                                        <i class="fa fa-trophy"></i>
                                                    </a>
                                                    <form action="{{ route('trend', ['id' => $item->id]) }}"
                                                        id="itemTrend-{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method('put')
                                                    </form>

                                                    <a href="#" title="featured"
                                                        class="btn btn-success shadow btn-xs sharp me-1"
                                                        onclick="featuredItem(event,{{ $item->id }})">
                                                        <i class="fa fa-clock"></i>
                                                    </a>
                                                    <form action="{{ route('featured', ['id' => $item->id]) }}"
                                                        id="itemFeatured-{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method('put')
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

<script>
    function trendItem(event, $id) {

        event.preventDefault();
        document.querySelector('#itemTrend-' + $id).submit();
    }

    function featuredItem(event, $id) {

        event.preventDefault();
        document.querySelector('#itemFeatured-' + $id).submit();
    }
</script>
