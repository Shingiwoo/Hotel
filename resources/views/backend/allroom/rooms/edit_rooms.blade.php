@extends('admin.admin_dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<div class="page-content">
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-door-open'></i>
                                        </div>
                                        <div class="tab-title">Manage Room</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-bookmark-alt-plus'></i>
                                        </div>
                                        <div class="tab-title">Room Number</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                <div class="col-xl-12 mx-auto">
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <h5 class="mb-4">Update Room</h5>
                                            <form class="row g-3" action="{{ route('update.room', $editData->id) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf

                                                <div class="col-md-4">
                                                    <label for="input1" class="form-label">Room Type Name</label>
                                                    <input type="text" name="roomtype_id" class="form-control"
                                                        id="input1" value="{{ $editData['type']['name'] }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input2" class="form-label">Total Adult</label>
                                                    <input type="number" min="0" name="total_adult" class="form-control"
                                                        id="input2" value="{{ $editData->total_adult }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input2" class="form-label">Total Child</label>
                                                    <input type="number" min="0" name="total_child" class="form-control"
                                                        id="input2" value="{{ $editData->total_child }}">
                                                </div>


                                                <div class="col-md-6">
                                                    <label for="input3" class="form-label">Main Image</label>
                                                    <input type="file" name="image" class="form-control" id="image">

                                                    <div class="mt-2">
                                                        <img id="showImage"
                                                            src="{{ !empty($editData->image) ? url('upload/roomimg/' . $editData->image) : url('upload/no_image.jpg') }}"
                                                            alt="Room Image" class="rounded-1 bg-primary" width="50"
                                                            height="50" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="input4" class="form-label">Gallery Image </label>
                                                    <input type="file" name="multi_img[]" class="form-control" multiple
                                                        id="multiImg"
                                                        accept="image/jpeg, image/jpg, image/gif, image/png">

                                                    @foreach ($multiimgs as $item)
                                                    <img src="{{ (!empty($item->multi_img)) ? url('upload/roomimg/multi_img/'.$item->multi_img) : url('upload/no_image.jpg') }}"
                                                        alt="Multi Images" class="bg-primary mt-2" width="50"
                                                        height="50">
                                                    <a href="{{ route('multi.image.delete',$item->id) }}"><i
                                                            class="lni lni-close"></i> </a>

                                                    @endforeach

                                                    <div class="row" id="preview_img"></div>
                                                </div>


                                                <div class="col-md-3">
                                                    <label for="input1" class="form-label">Room Price</label>
                                                    <input type="text" name="price" class="form-control" id="input1"
                                                        value="{{ $editData->price }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="input1" class="form-label">Room Size</label>
                                                    <input type="text" name="size" class="form-control" id="input1"
                                                        value="{{ $editData->size }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="input2" class="form-label">Discount (%)</label>
                                                    <input type="text" name="discount" class="form-control" id="input2"
                                                        value="{{ $editData->discount }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="input2" class="form-label">Room Capacity</label>
                                                    <input type="number" min="0" name="room_capacity"
                                                        class="form-control" id="input2"
                                                        value="{{ $editData->room_capacity }}">
                                                </div>


                                                <div class="col-md-6">
                                                    <label for="input7" class="form-label">Room View </label>
                                                    <select name="view" id="input7" class="form-select">
                                                        <option selected="">Choose...</option>
                                                        <option value="Sea View" {{ $editData->view == 'Sea View'?'selected':''}}>Sea View </option>
                                                        <option value="Hill View" {{ $editData->view == 'Hill View'?'selected':''}}>Hill View </option>

                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="input7" class="form-label">Bed Style</label>
                                                    <select name="bed_style" id="input7" class="form-select">
                                                        <option selected="">Choose...</option>
                                                        <option value="Queen Bed" {{ $editData->bed_style == 'Queen Bed'?'selected':''}}> Queen Bed </option>
                                                        <option value="Twin Bed" {{ $editData->bed_style == 'Twin Bed'?'selected':''}}>Twin Bed </option>
                                                        <option value="King Bed" {{ $editData->bed_style == 'King Bed'?'selected':''}}>King Bed </option>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="input11" class="form-label">Short Description</label>
                                                    <textarea class="form-control" name="short_desc" id="input11"
                                                        rows="3">{{ $editData->short_desc }}</textarea>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="input11" class="form-label">Description</label>
                                                    <textarea class="form-control" name="description"
                                                        id="myeditorinstance"
                                                        rows="3">{!! $editData->description !!}</textarea>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-md-12 mb-3">
                                                        @forelse ($basic_facility as $item)
                                                        <div class="basic_facility_section_remove">
                                                            <div class="row add_item">
                                                                <div class="col-md-8">
                                                                    <label for="facility_name" class="form-label">Room Facilities</label>
                                                                    <select name="facility_name[]" class="form-control">
                                                                        <option value="">Select Facility</option>
                                                                        <option value="Complimentary Breakfast" {{$item->facility_name == 'Complimentary Breakfast'?'selected':''}}>Complimentary Breakfast</option>
                                                                        <option value="32/42 inch LED TV" {{$item->facility_name == '32/42 inch LED TV'?'selected':''}}>32/42 inch LED TV</option>
                                                                        <option value="Smoke alarms" {{$item->facility_name == 'Smoke alarms'?'selected':''}}>Smoke alarms</option>
                                                                        <option value="Minibar" {{$item->facility_name == 'Minibar'?'selected':''}}>Minibar</option>
                                                                        <option value="Work Desk" {{$item->facility_name == 'Work Desk'?'selected':''}}>Work Desk</option>
                                                                        <option value="Free Wi-Fi" {{$item->facility_name == 'Free Wi-Fi'?'selected':''}}>Free Wi-Fi</option>
                                                                        <option value="Safety box" {{$item->facility_name == 'Safety box'?'selected':''}}>Safety box</option>
                                                                        <option value="Rain Shower" {{$item->facility_name == 'Rain Shower'?'selected':''}}>Rain Shower</option>
                                                                        <option value="Slippers" {{$item->facility_name == 'Slippers'?'selected':''}}>Slippers</option>
                                                                        <option value="Hair dryer" {{$item->facility_name == 'Hair dryer'?'selected':''}}>Hair dryer</option>
                                                                        <option value="Wake-up service" {{$item->facility_name == 'Wake-up service'?'selected':''}}>Wake-up service</option>
                                                                        <option value="Laundry & Dry Cleaning" {{$item->facility_name == 'Laundry & Dry Cleaning'?'selected':''}}>Laundry & Dry Cleaning</option>
                                                                        <option value="Electronic door lock" {{$item->facility_name == 'Electronic door lock'?'selected':''}}>Electronic door lock</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 d-flex align-items-center">
                                                                    <button type="button" class="btn btn-success addeventmore"><i class="lni lni-circle-plus"></i></button>
                                                                    <button type="button" class="btn btn-danger btn-sm removeeventmore"><i class="lni lni-circle-minus"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @empty
                                                        <div class="basic_facility_section_remove">
                                                            <div class="row add_item">
                                                                <div class="col-md-8">
                                                                    <label for="basic_facility_name" class="form-label">Room Facilities</label>
                                                                    <select name="facility_name[]" class="form-control">
                                                                        <option value="">Select Facility</option>
                                                                        <option value="Complimentary Breakfast">Complimentary Breakfast</option>
                                                                        <option value="32/42 inch LED TV">32/42 inch LED TV</option>
                                                                        <option value="Smoke alarms">Smoke alarms</option>
                                                                        <option value="Minibar">Minibar</option>
                                                                        <option value="Work Desk">Work Desk</option>
                                                                        <option value="Free Wi-Fi">Free Wi-Fi</option>
                                                                        <option value="Safety box">Safety box</option>
                                                                        <option value="Rain Shower">Rain Shower</option>
                                                                        <option value="Slippers">Slippers</option>
                                                                        <option value="Hair dryer">Hair dryer</option>
                                                                        <option value="Wake-up service">Wake-up service</option>
                                                                        <option value="Laundry & Dry Cleaning">Laundry & Dry Cleaning</option>
                                                                        <option value="Electronic door lock">Electronic door lock</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 d-flex align-items-center">
                                                                    <button type="button" class="btn btn-success addeventmore"><i class="lni lni-circle-plus"></i></button>
                                                                    <button type="button" class="btn btn-danger removeeventmore"><i class="lni lni-circle-minus"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="col-md-12">
                                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                                        <button type="submit" class="btn btn-primary px-4">Save
                                                            Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade active show" id="primaryprofile" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-lg-flex align-items-center mb-4 gap-3">
                                            <div class="position-relative">
                                                <a class="btn btn-primary radius-30 mt-2 mt-lg-0" onclick="addRoomNo()" id="addRoomNo"><i
                                                        class="bx bxs-plus-square"></i>Add New</a>
                                            </div>
                                        </div>
                                        <div class="roomnoHide" id="roomnoHide">
                                            <form action="{{ route('store.room.no',$editData->id) }}" method="post">
                                                @csrf

                                                <input type="hidden" name="room_type_id" value="{{ $editData->roomtype_id }}" >

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="input1" class="form-label">Room No</label>
                                                        <input type="text" name="room_no" class="form-control"
                                                            id="input1">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="input7" class="form-label">Status</label>
                                                        <select name="status" id="input7" class="form-select">
                                                            <option selected="">Select Status...</option>
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive </option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn btn-success"
                                                            style="margin-top: 30px;">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <hr>
                                        <div class="mt-1">
                                            <table class="table mb-0 table-striped" id="roomview">
                                                <thead>
                                                    <tr class="align-content-center text-center">
                                                        <th style="width: 20%" scope="col">Room Number</th>
                                                        <th style="width: 40%" scope="col">Status</th>
                                                        <th style="width: 40%" scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allroomNo as $item)
                                                    <tr class="align-content-center text-center">
                                                        <td scope="row"  class="align-content-center text-center">{{ $item->room_no }}</td>
                                                        <td class="align-content-center text-center">{{ $item->status }}</td>
                                                        <td class="align-content-center text-center">
                                                            <a href="{{ route('edit.roomno',$item->id) }}" class=" btn btn-warning px-3 radius-30"><i
                                                                    class='bx bx-message-alt-edit'></i> Edit</a>
                                                            <a href="{{ route('delete.roomno',$item->id) }}" class=" btn btn-danger px-3 radius-30"
                                                                id="delete"><i class='bx bx-message-x'></i> Delete</a>

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
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0'])
            });
        });
</script>

<script>
    $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb rounded-1')
                                        .attr('src', e.target.result).width(100)
                                        .height(80).css('margin-top',
                                        '10px'); //create image element
                                    $('#preview_img').append(
                                    img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
</script>

<!--========== Start of add Basic Plan Facilities ==============-->
<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="basic_facility_section_remove">
            <div class="row">
                <div class="col-md-8">
                    <label for="basic_facility_name">Room Facilities</label>
                    <select name="facility_name[]" class="form-control">
                        <option value="">Select Facility</option>
                        <option value="Complimentary Breakfast">Complimentary Breakfast</option>
                        <option value="32/42 inch LED TV">32/42 inch LED TV</option>
                        <option value="Smoke alarms">Smoke alarms</option>
                        <option value="Minibar">Minibar</option>
                        <option value="Work Desk">Work Desk</option>
                        <option value="Free Wi-Fi">Free Wi-Fi</option>
                        <option value="Safety box">Safety box</option>
                        <option value="Rain Shower">Rain Shower</option>
                        <option value="Slippers">Slippers</option>
                        <option value="Hair dryer">Hair dryer</option>
                        <option value="Wake-up service">Wake-up service</option>
                        <option value="Laundry & Dry Cleaning">Laundry & Dry Cleaning</option>
                        <option value="Electronic door lock">Electronic door lock</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <button type="button" class="btn btn-success addeventmore"><i class="lni lni-circle-plus"></i></button>
                    <button type="button" class="btn btn-danger removeeventmore"><i class="lni lni-circle-minus"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var counter = 0;

        // Add new facility
        $(document).on("click", ".addeventmore", function () {
            var new_item = $("#whole_extra_item_add").html();
            $(".row.mt-2 .col-md-12").append(new_item);
            counter++;
        });

        // Remove facility
        $(document).on("click", ".removeeventmore", function () {
            $(this).closest(".basic_facility_section_remove").remove();
            counter--;
        });
    });
</script>
<!--========== End of Basic Plan Facilities ==============-->

 <!--========== Start Room Number Add ==============-->
 <script>
    $('#roomnoHide').hide();
    $('#roomview').show();
    function addRoomNo(){
        $('#roomnoHide').show();
        $('#roomview').hide();
        $('#addRoomNo').hide();
    }
</script>
<!--========== End Room Number Add ==============-->
@endsection
