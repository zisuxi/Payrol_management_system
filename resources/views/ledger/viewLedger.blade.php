@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 style="font-size: 20px;"> View Ledger</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn btn-outline-primary ledger"><i class="fa-regular fa-plus mr-2"></i>Add ledger Entry </a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive table-bordered ">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="font-size: 14px;">Sr/No</th>
                        <th style="font-size: 14px;">Date</th>
                        <th style="font-size: 14px;">Category Name</th>
                        <th style="font-size: 14px;">Category Type</th>
                        <th style="font-size: 14px;">Price</th>
                        <th style="font-size: 14px;">Description</th>
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
                                $date = $vdata->date;
                                $formattedDate = date('d-M-Y', strtotime($date));
                            @endphp
                            <td> {{ $formattedDate }} </td>
                            <td> {{ ucfirst($array_data[$vdata->id]['cat_name']) }} </td>
                            <td>
                                @if ($array_data[$vdata->id]['cat_type'] == 0)
                                    <span class="badge  text-white   bg-danger">
                                        {{ 'Expence Category' }}</span>
                                @else
                                    <span class="badge bg-success text-white">{{ 'Income Category' }}</span>
                                @endif
                            </td>


                            <td>{{ $vdata->price }}</td>
                            <td style="text-wrap: wrap;">{{ $vdata->description }}</td>
                            <td>
                                <div class="margin">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown"
                                            style="
                                            background-color: #d1d3d3;
                                        ">Action
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">

                                            <a class="dropdown-item edit" data-edit="{{ $vdata->id }}" href=""
                                                id="edit"> <i
                                                    class="fa-solid fa-pen-to-square mr-2  bg-warning rounded-pill p-2"></i><b>Edit</b></a>
                                            <a class="dropdown-item deleteBtn" data-delete="{{ $vdata->id }}"
                                                href="">
                                                <i
                                                    class="fa-solid fa-trash mr-2  bg-danger rounded-pill p-2"></i><b>Delete</b></a>
                                        </div>
                                    </div>
                            </td>
                        </tr>

                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Add ledger</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <form id="form_data">
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2">
                                                <label for="customCheckbox2" class="custom-control-label">Is-income
                                                    category</label>
                                            </div>
                                        </div>
                                    </div> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Category Type : <span class="text-muted"
                                                    id="category_t">(Expence)</span></label>
                                            <select name="category_type" id="select_category" class="form-control select2">
                                            </select>
                                        </div>
                                        <span id="category_type" class="text-danger"></span>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="">Date</label>
                                            <input type="date" name="date" class="form-control"
                                                placeholder="Enter Date">
                                        </div>
                                        <span id="date" class="text-danger"></span>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="">Price :</label>
                                            <input type="number" name="price" class="form-control"
                                                placeholder="Enter Price">
                                        </div>
                                        <span class="text-danger" id="price"> </span>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for=""> Description:</label>
                                            <textarea name="description" cols="30" rows="2" class="form-control" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary submit" id="insert">Add
                            ledger Entry</button>
                    </div>
                </div>

            </div>

        </div>

        {{-- Edit model --}}
        <div class="modal fade" id="modal-default1">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit ledger</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <form id="form_data1">
                                    @method('PUT')
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3">
                                                <label for="customCheckbox3" class="custom-control-label">Is-income
                                                    category</label>
                                            </div>
                                        </div>
                                    </div> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Category Type : <span class="text-muted"
                                                    id="category_tt"></span></label>
                                            <select name="cat_type" id="select_category1" class="form-control select2">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <input type="hidden" name="hidden" id="hidden">
                                            <label for="">Date</label>
                                            <input type="date" name="exp_date" class="form-control"
                                                placeholder="Enter Date" id="exp_date">
                                        </div>

                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="">Price :</label>
                                            <input type="number" name="exp_price" class="form-control"
                                                placeholder="Enter Price" id="exp_price">
                                        </div>

                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for=""> Description:</label>
                                            <textarea name="exp_description" cols="30" rows="2" class="form-control" placeholder="Enter Description"
                                                id="exp_description"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update" id="insert">Update
                            ledger Entry</button>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
        $(document).ready(function() {
            $(document).on("click", ".ledger", function(e) {
                e.preventDefault();
                $("#modal-default").modal("show");
                $.ajax({
                    url: "/ledger/create",
                    method: "GET",
                    success: function(response) {
                        $("#select_category").empty();
                        $("#select_category").append(
                            '<option selected disabled>Chose option ...</option>');
                        $.each(response.category, function(key, value) {
                            $("#select_category").append('<option value=' + value.id +
                                '>' + value.cat_name + '</option>')
                        });
                    },
                    error: function() {
                        alert('An error occurred while fetching expenses.');
                    }
                })
            })
        })
        //<!======================= check box ======================>
        $(document).ready(function() {
            $(document).on("change", "#customCheckbox2", function(e) {
                e.preventDefault();
                var isIncomeCategory = $(this).prop("checked");
                if (isIncomeCategory == true) {
                    $.ajax({
                        url: "/getincomeCategory",
                        method: "GET",
                        success: function(res) {
                            $("#select_category").empty();
                            $("#select_category").append('<option>Select Option ....</option>');
                            $.each(res.message, function(key, value) {
                                $("#select_category").append('<option value="' + value
                                    .id + '">' + value
                                    .cat_name + '</option>');
                                $("#category_t").text("(Income)")
                            })
                        }

                    })
                } else {

                    $.ajax({
                        url: "/getexpenceCategroy",
                        method: "GET",
                        success: function(res) {
                            $("#select_category").empty();


                            $("#select_category").append('<option>Select Option ....</option>');
                            $.each(res.message, function(key, value) {
                                $("#select_category").append('<option  value="' + value
                                    .id + '" >' + value
                                    .cat_name + '</option>');

                                $("#category_t").text("(Expense)");

                            })
                        }
                    })
                }
            });
        });
        //<!======================= End check box ======================>

        // insert data
        $(document).ready(function() {
            // < !===============================Data Added===================>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on("click", ".submit", function() {
                var formData = new FormData(form_data);
                const button = document.getElementById("insert");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                $.ajax({
                    url: "/ledger",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(respo) {
                        if (respo.message == 200) {
                            $("#modal-default").modal("hide");
                            button.removeAttribute("disabled");
                            button.innerHTML = "Add Category";
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Ledger  added sucessfully',
                                animation: false,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 4000,
                                timeProgressBar: true,
                            })
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            button.removeAttribute("disabled");
                            button.innerHTML = "Add Category";
                        }
                    },
                    error: function(error) {
                        button.removeAttribute("disabled");
                        button.innerHTML = "Add staff";
                        var error = error.responseJSON;
                        $.each(error.errors, function(key, value) {
                            $("#" + key).append(value)
                        })
                    }
                })
            });
            // < !===============================Data ended ===================>

            // < !===============================delete Data ===================>
            $(document).on("click", ".deleteBtn", function(stop) {
                stop.preventDefault();
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
                            url: "/ledger/" + deleteId,
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
            })
            // < !===============================deleted end ===================>

            // < !===============================Edit Data ===================>
            $(document).on("click", ".edit", function(e) {
                e.preventDefault();
                $("#modal-default1").modal("show");
                var editId = $(this).data('edit');
                $.ajax({
                    url: "/ledger/" + editId + "/edit",
                    method: "GET",
                    success: function(res) {
                        if (res.message2 == "Expence") {
                            $("#customCheckbox3").prop("checked", false)
                        } else {
                            $("#customCheckbox3").prop("checked", true)
                        }
                        var dateString = res.message.date;
                        var dateComponents = dateString.split('-');
                        var year = dateComponents[0];
                        var month = dateComponents[1];
                        var day = dateComponents[2];
                        var newDateString = year + '-' + month + '-' + day;
                        $("#hidden").val(res.message.id);
                        $('#exp_date').val(newDateString);
                        $("#exp_price").val(res.message.price);
                        $("#exp_description").append(res.message.description);
                        if (res.message2 == "Expence") {
                            $("#category_tt").empty();
                            $("#category_tt").append("(Expence)");
                            $("#select_category1").empty();
                            $.each(res.allcategory, function(key, value) {
                                if (value.cat_type == 0) {
                                    $("#select_category1").append('<option value=' +
                                        value.id + ' >' + value.cat_name +
                                        '</option>')
                                }
                            })
                            $("#select_category1").val(res.message.category_type);
                        } else {
                            $("#category_tt").empty();
                            $("#category_tt").append("(Income)");
                            $("#select_category1").empty();
                            $.each(res.allcategory, function(key, value) {
                                if (value.cat_type == 1) {
                                    $("#select_category1").append('<option value=' +
                                        value.id + '>' + value.cat_name +
                                        '</option>')
                                }
                            })
                            $("#select_category1").val(res.message.category_type);

                        }

                    }
                })
            });
            // < !===============================Edit data end ===================>


            // < !===============================Update Data ===================>
            $(document).on("click", ".update", function(e) {
                e.preventDefault();
                var formData = new FormData(form_data1);
                var id = $("#hidden").val();
                $.ajax({
                    url: "/ledger/" + id,
                    method: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(res) {
                        if (res.update == 200) {
                            $("#modal-default1").modal("hide")
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Ledger  Updated updated successfully',
                                animation: false,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 4000,
                                timeProgressBar: true,
                            })
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                            button.removeAttribute("disabled");
                            button.innerHTML = "Add Category";

                        } else {
                            button.removeAttribute("disabled");
                            button.innerHTML = "Add Category";
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Some thing went wronge',
                                animation: false,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 4000,
                                timeProgressBar: true,
                            })
                        }

                    }
                })
            });
            // < !===============================Update Data  end===================>
            $(document).ready(function() {
                $(document).on("change", "#customCheckbox3", function(e) {
                    e.preventDefault();
                    var isIncomeCategory = $(this).prop("checked");
                    if (isIncomeCategory == true) {
                        $.ajax({
                            url: "/getincomeCategory",
                            method: "GET",
                            success: function(res) {
                                $("#select_category1").empty();
                                $("#select_category1").append(
                                    '<option>Select Option ....</option>');
                                $.each(res.message, function(key, value) {
                                    $("#select_category1").append(
                                        '<option value="' + value
                                        .id + '">' + value
                                        .cat_name + '</option>');
                                    $("#category_tt").text("(Income)")
                                })
                            }

                        })

                    } else {

                        $.ajax({
                            url: "/getexpenceCategroy",
                            method: "GET",
                            success: function(res) {
                                $("#select_category1").empty();
                                $("#select_category1").append(
                                    '<option>Select Option ....</option>');
                                $.each(res.message, function(key, value) {
                                    $("#select_category1").append(
                                        '<option  value="' + value
                                        .id + '" >' + value
                                        .cat_name + '</option>');
                                    $("#category_tt").text("(Expense)");
                                })
                            }

                        })
                    }
                });
            });
        })
    </script>
@endsection
