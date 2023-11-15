@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 style="font-size: 20px;"> Manage Staff</h3>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a class="btn btn-outline-primary" id="add_staff"> <i class="fa-regular fa-plus mr-2"></i>Add
                                    Staff</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive table-bordered ">
                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th style="font-size: 14px;">Sr/No </th>
                                    <th style="font-size: 14px;"> Join Date</th>
                                    <th style="font-size: 14px;">Employee Name</th>
                                    <th style="font-size: 14px;">Job Postal </th>
                                    <th style="font-size: 14px;">Basic Sallery </th>
                                    <th style="font-size: 14px;"> Detail </th>
                                    <th style="font-size: 14px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @forelse ($viewData as $vdata)
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        @php
                                            $Vdata = $vdata->emp_join_date;
                                            $date = date('d-M-Y', strtotime($Vdata));
                                        @endphp
                                        <td>{{ $date }}</td>
                                        <td>{{ $vdata->emp_name }}</td>
                                        <td>{{ $vdata->emp_department }}</td>
                                        <td>{{ $vdata->emp_sallery }}</td>

                                        <td>
                                            <button class="btn btn-success  btn-sm doted mt-2 "
                                                data-show="{{ $vdata->id }}">View Detail<i
                                                    class="fa-solid fa-angles-right ml-2"></i></button>
                                        </td>
                                        <td>
                                            <div class="margin">
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-default dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown"
                                                        style="
                                                        background-color: #d1d3d3;
                                                    ">Actiion
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item editBtn" href="" id="edit"
                                                            href="" data-edit="{{ $vdata->id }}"> <i
                                                                class="fa-solid fa-eye mr-2  bg-warning rounded-pill p-2"></i><b>Edit</b></a>
                                                        <a class="dropdown-item deleteBtn" data-delete="{{ $vdata->id }}"
                                                            href=""> <i
                                                                class="fa-solid fa-trash mr-2  bg-danger rounded-pill p-2"></i><b>Delete</b></a>

                                                    </div>
                                                </div>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            <p>Data not found</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Edit MOdal  --}}
        <div class="modal fade" id="show-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Staff </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="update_form">
                            @method('PUT')
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <label for=""> Name </label>
                                    <input type="hidden" id="hidden">
                                    <input type="text" name="employe_name" class="form-control"
                                        placeholder="Enter Your Name" id="employe_name">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Email Address </label>
                                    <input type="email" name="employe_email" class="form-control"
                                        placeholder="Enter Your Email" id="employe_email">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Contact</label>
                                    <input type="number" name="employe_no" class="form-control"
                                        placeholder="(XXX) XXX-XXXX" id="phone">
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <label for=""> Country </label>
                                    <input type="text" name="employe_country" class="form-control"
                                        placeholder="Enter Your " id="employe_country">
                                </div>
                                <div class="col-md-4">
                                    <label for=""> State </label>
                                    <input type="text" name="employe_state" class="form-control"
                                        placeholder="Enter Your State" id="employe_state">
                                </div>
                                <div class="col-md-4">
                                    <label for="">City </label>
                                    <input type="text" name="employe_city" class="form-control"
                                        placeholder="Enter Your City " id="employe_city">
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label for=""> Address </label>
                                    <textarea name="employe_address" id="employe_address" cols="30" rows="1" class="form-control"
                                        placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for=""> Department </label>
                                    <select class="form-control select2" name="employe_department" style="width: 100%;"
                                        id="employe_department">
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for=""> Join Date </label>
                                    <input type="date" name="employe_join_date" class="form-control"
                                        placeholder="Enter Your " id="employe_join_date">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6 ">
                                    <label for=""> Contract Period </label>
                                    <select class="form-control select2 " name="employe_contract_period"
                                        id="employe_contract_period" style="heigth:200px;">
                                    </select>
                                    <span class="text-danger" id="emp_contract_period"> </span>

                                </div>
                                <div class="col-md-6">
                                    <label for=""> Sallery </label>
                                    <input type="number" name="employe_sallery" class="form-control"
                                        placeholder="Enter Sallery" id="employe_sallery">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="update" class="btn btn-primary ">Update Staff</button>
                    </div>
                </div>

            </div>

        </div>
        {{-- Edit MOdal end --}}
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg" style="margin-right:260px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Staff </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_data">
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <label for=""> Name </label>
                                    <input type="text" name="emp_name" class="form-control"
                                        placeholder="Enter Your Name">
                                    <span class="text-danger" id="emp_name"> </span>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Email Address </label>
                                    <input type="email" name="emp_email" class="form-control"
                                        placeholder="Enter Email">
                                    <span class="text-danger" id="emp_email"> </span>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Contact </label>
                                    <input type="number" name="emp_no" class="form-control"
                                        placeholder="(XXX) XXX-XXXX" id="phone">
                                    <span class="text-danger" id="emp_no"></span>
                                </div>

                            </div>
                            <div class="row mt-2">

                                <div class="col-md-4">
                                    <label for=""> Country </label>
                                    <input type="text" name="emp_country" class="form-control"
                                        placeholder="Enter Your Country">
                                    <span class="text-danger" id="emp_country"> </span>
                                </div>
                                <div class="col-md-4">
                                    <label for=""> State </label>
                                    <input type="text" name="emp_state" class="form-control"
                                        placeholder="Enter Your State">
                                    <span class="text-danger" id="emp_state"> </span>
                                </div>
                                <div class="col-md-4">
                                    <label for="">City </label>
                                    <input type="text" name="emp_city" class="form-control"
                                        placeholder="Enter Your  City">
                                    <span class="text-danger" id="emp_city"> </span>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label for=""> Address </label>
                                    <textarea name="emp_address" id="" cols="30" rows="1" class="form-control"
                                        id="employe_address" placeholder="Enter Description"></textarea>
                                    {{-- <span class="text-danger" id="emp_address"> </span> --}}
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for=""> Department </label>
                                    <select class="form-control select2" name="emp_department" style="width: 100%;">
                                        <option selected="selected">Select Option</option>
                                        <option value="Development">Development</option>
                                        <option value="Graphic Designing">Graphic Designing</option>
                                        <option value="Digital Marketing">Digital Marketing</option>
                                    </select>
                                    <span class="text-danger" id="emp_department"> </span>
                                </div>
                                <div class="col-md-6">
                                    <label for=""> Contract Period </label>
                                    <select class="form-control select2 h-50" name="emp_contract_period"
                                        style="width: 100%;">
                                        <option selected="selected">Select Option</option>
                                        <option value="one month">One month</option>
                                        <option value="2 month">2 month</option>
                                        <option value="3 month">3 month</option>
                                        <option value="6 month">6 month</option>
                                        <option value="1 year">1 year</option>
                                    </select>
                                    <span class="text-danger" id="emp_contract_period"> </span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for=""> Join Date </label>
                                    <input type="date" name="emp_join_date" class="form-control"
                                        placeholder="Enter join date">
                                    <span class="text-danger" id="emp_join_date"> </span>
                                </div>

                                <div class="col-md-6">
                                    <label for=""> Sallery </label>
                                    <input type="number" name="emp_sallery" class="form-control"
                                        placeholder="Enter Your  Sallery">
                                    <span class="text-danger" id="emp_sallery"> </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="insert" class="btn btn-primary submit">Add Staff</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    {{-- show Detail --}}
    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 771px;">
                <div class="modal-header">
                    <h4 class="modal-title">View Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="emptyData">
                    <div class="card-body table-responsive table-bordered ">
                        <table id="example2" class="table">
                            <thead>
                                <tr>
                                    <th style="font-size: 14px;">Sr/No </th>
                                    <th style="font-size: 14px;"> Join Date</th>
                                    <th style="font-size: 14px;">Employee Number</th>
                                    <th style="font-size: 14px;">Email</th>
                                    <th style="font-size: 14px;">Department </th>
                                    <th style="font-size: 14px;"> Country </th>
                                    <th style="font-size: 14px;"> Contract Period</th>
                                    <th style="font-size: 14px;"> sallery</th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        {{-- edit modal --}}
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on("click", ".doted", function() {
                    $("#modal-xl").modal("show");
                    var detailId = $(this).data('show');
                    $.ajax({
                        url: 'viewDetail/' + detailId,
                        method: "get",
                        success: function(res) {
                            $("#example2 tbody").empty();
                            $("#example2 tbody").append('<tr><td>' + res.message.id + '</td><td>' +
                                res.message.emp_join_date + '</td><td>' + res.message.emp_no +
                                '</td><td>' + res.message.emp_email + '</td><td>' + res.message
                                .emp_department + '</td><td>' + res.message.emp_country +
                                '</td><td>' + res.message.emp_contract_period + '</td><td>' +
                                res.message.emp_sallery + '</td></tr>')

                        }
                    })
                })

                //  <!========================insert staff========================>
                $(document).on("click", "#add_staff", function(e) {
                    e.preventDefault();
                    $("#modal-lg").modal("show");
                });
                $(document).on("click", ".submit", function(e) {
                    e.preventDefault()
                    var formData = new FormData(form_data);
                    const button = document.getElementById("insert");
                    button.innerHTML =
                        "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                    button.setAttribute("disabled", "disabled");
                    $.ajax({
                        url: "/staff",
                        method: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(res) {
                            if (res.message == 200) {
                                button.removeAttribute("disabled");
                                button.innerHTML = "Add Category";
                                $("#modal-lg").modal("hide");
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Staff added successfully',
                                    animation: false,
                                    position: 'top-right',
                                    showConfirmButton: false,
                                    timer: 4000,
                                    timeProgressBar: true,
                                })
                            }
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        },
                        error: function(error) {
                            button.removeAttribute("disabled");
                            button.innerHTML = "Add Category";
                            var error = error.responseJSON;
                            $.each(error.errors, function(key, value) {
                                $("#" + key).html(value);
                            })
                        }
                    })
                });
                //  <!========================insert end========================>

                //  <!========================Deleted staff========================>

                $(document).on("click", ".deleteBtn", function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var deleteId = $(this).data("delete");
                            var element = this;
                            $.ajax({
                                url: "/staff/" + deleteId,
                                method: "DELETE",
                                success: function(response) {
                                    if (response.message == 200) {
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "Data Deleted Successfully..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        $(element).closest("tr").fadeOut();
                                    } else {
                                        Swal.fire({
                                            toast: true,
                                            icon: "error",
                                            title: "Data Not Deleted ..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });

                                    }
                                },
                            });
                        }
                    });

                });
                //  <!========================Deleted End========================>

                //  <!========================Edit staff========================>

                $(document).on("click", ".editBtn", function(e) {
                    e.preventDefault();
                    $("#show-modal").modal("show");
                    var editid = $(this).data('edit');
                    $.ajax({
                        url: "/staff/ " + editid + '/edit',
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            $("#hidden").val(response.message.id)
                            $("#employe_name").val(response.message.emp_name);
                            $("#phone").val(response.message.emp_no);
                            $("#employe_email").val(response.message.emp_email);
                            $("#employe_address").append(response.message.emp_address);
                            $("#employe_city").val(response.message.emp_city);
                            $("#employe_state").val(response.message.emp_state);
                            $("#employe_country").val(response.message.emp_country);
                            $("#employe_join_date  ").val(response.message.emp_join_date);
                            $("#employe_sallery").val(response.message.emp_sallery);
                            var arr = ["Development", "Graphic Designing", "Digital Marketing"];
                            $("#employe_department").empty()
                            $("#employe_department").append(
                                '<option selected disabled>Choose One...</option>')
                            $.each(arr, function(key, value) {
                                $("#employe_department").append('<option value="' + value +
                                    '">' + value + '</option>')
                            })
                            $("#employe_department").val(response.message.emp_department);
                            var arra2 = ['one month', '2 month', '3 month', '6 month', '1 year'];
                            $("#employe_contract_period").empty();
                            $("#employe_contract_period").append(
                                '<option selected disabled>Choose One...</option>');
                            $.each(arra2, function(key, value) {
                                $("#employe_contract_period").append('<option value="' +
                                    value + '" >' + value + '</option>');
                            });
                            $("#employe_contract_period").val(response.message.emp_contract_period);

                        }
                    })
                });
                //  <!========================Edit end========================>

                //  <!========================Update staff========================>

                $(document).on("click", "#update", function(e) {

                    e.preventDefault();
                    var hiddenid = $("#hidden").val();
                    var formData = new FormData(update_form);

                    const button = document.getElementById("insert");
                    button.innerHTML =
                        "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                    button.setAttribute("disabled", "disabled");
                    $.ajax({
                        url: "/staff/" + hiddenid,
                        method: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(res) {
                            if (res.message == 200) {
                                button.removeAttribute("disabled");
                                button.innerHTML = "Add Category";
                                $("#show-modal").modal("hide");
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Staff update successfully',
                                    animation: false,
                                    position: 'top-right',
                                    showConfirmButton: false,
                                    timer: 4000,
                                    timeProgressBar: true,
                                })
                            }
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }
                    })
                });
                //  <!========================update end========================>

            })
        </script>
    @endsection
