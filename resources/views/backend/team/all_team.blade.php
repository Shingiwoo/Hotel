@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Team</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.team') }}" class=" btn btn-outline-primary px-5"> <i class='bx bx-add-to-queue'></i> Add Team</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="align-content-center text-center">
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Facebook</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $team as $key=> $item )
                        <tr>
                            <td class="align-content-center text-center">{{ $key+1 }}</td>
                            <td class="align-content-center text-center"> <img src="{{ asset($item->image) }}" alt="" style="width: 44px; height: 60px;"/> </td>
                            <td class="align-content-center text-center">{{ $item->name }}</td>
                            <td class="align-content-center text-center">{{ $item->position }}</td>
                            <td class="align-content-center text-center">{{ $item->facebook }}</td>
                            <td class="align-content-center text-center">
                              <a href="{{ route('edit.team', $item->id) }}" class=" btn btn-warning px-3 radius-30"><i class='bx bx-message-alt-edit'></i> Edit</a>
                              <a href="{{ route('delete.team', $item->id) }}" class=" btn btn-danger px-3 radius-30" id="delete"><i class='bx bx-message-x' ></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr/>

</div>



@endsection
