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
                    <li class="breadcrumb-item active" aria-current="page">Room Type List</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.room.type') }}" class=" btn btn-outline-primary px-5"> <i class='bx bx-add-to-queue'></i> Add Room Type</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="align-content-center text-center">
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $allData as $key=> $item )

                        @php
                            $rooms = App\Models\Room::where('roomtype_id', $item->id)->get();
                        @endphp

                        <tr>
                            <td class="align-content-center text-center">{{ $key+1 }}</td>
                            <td class="align-content-center text-center"> <img src="{{ !empty($item->room->image) ? url('upload/roomimg/'.$item->room->image) : url('upload/no_image.jpg') }}" alt="roomimage" style="width: 80px; height: 50px;"/> </td>

                            <td class="align-content-center text-center">{{ $item->name }}</td>

                            <td class="align-content-center text-center">
                            @foreach ($rooms as $rm)
                              <a href="{{ route('edit.room', $rm->id) }}" class=" btn btn-warning px-3 radius-30"><i class='bx bx-message-alt-edit'></i> Edit</a>
                              <a href="{{ route('delete.room',$rm->id) }}" class=" btn btn-danger px-3 radius-30" id="delete"><i class='bx bx-message-x' ></i> Delete</a>
                            @endforeach
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
