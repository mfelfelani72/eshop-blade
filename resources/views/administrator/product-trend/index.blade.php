<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-6 mt-2">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item active"><a>Settings / Shop / Product Trend</a></li>
                <li class="breadcrumb-item"><a href="">Index</a></li>
                </ol>
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
                                        <th>product title</th>
                                        <th>description</th>
                                        <th>operator</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productsTrends as $item)
                                        <tr>
                                           <td>
                                                @if (!empty($item->product->coverImage->img))
                                                    <img class="" width="100"
                                                        src={{ asset('front/img/products/' . $item->product->coverImage->img) }}
                                                        alt="">
                                                @endif

                                            </td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->product->title }}</td>
                                            <td>{{ $item->description }}</td>
                                             <td>{{ Auth::user($item->operator)->name }}</td>
                                           

                                            <td>
                                                <div class="d-flex">
                                                
                                                    <a href="#" class="btn btn-danger shadow btn-xs sharp"
                                                        onclick="destroyItem(event,{{ $item->id }})"><i
                                                            class="fa fa-trash"></i></a>
                                                    <form
                                                        action="{{ route('trend.destroy', ['id' => $item->id]) }}"
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
