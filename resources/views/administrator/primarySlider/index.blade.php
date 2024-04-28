<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a>Settings / Public Front</a></li>
                <li class="breadcrumb-item"><a href="">Slider</a></li>
            </ol>
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
                                        <th>title</th>
                                        <th>slogan</th>
                                        <th>category</th>
                                        <th>link-title</th>
                                        <th>link</th>
                                        <th>description</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($primarySlider as $item )
                                        
                                    @endforeach
                                    <tr>
                                        {{-- <td><img class="rounded-circle" width="35"
                                                src="images/profile/small/pic1.jpg" alt=""></td> --}}
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->slogan }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ $item->link_title }}</td>
                                        <td>{{ $item->link }}</td>
                                        <td>{{ $item->description }}</td>
                                       
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
