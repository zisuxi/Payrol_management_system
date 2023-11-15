@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-6">
                                <h3 style="font-size: 20px;"> View Category</h3>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a class="btn btn-outline-primary" id="add_category"> <i
                                        class="fa-regular fa-plus mr-2"></i></i>Add
                                    Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive table-bordered">
                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th style="font-size: 14px;">Sr/No</th>
                                    <th style="font-size: 14px;">Category Name</th>
                                    <th style="font-size: 14px;">Category Type</th>
                                    <th style="font-size: 14px;">Category Description</th>
                                    <th style="font-size: 14px;">Status</th>
                                    <th style="font-size: 14px;">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @forelse($categories as $vcate)
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $vcate->cat_name }}</td>
                                        <td>
                                            @if ($vcate->cat_type == 1)
                                                <p class="badge badge-pill badge-lg badge-success">Income</p>
                                            @else
                                                <p class="badge badge-pill badge-lg " style="background-color:pink ">Expence
                                                </p>
                                            @endif
                                        </td>
                                        <td style="text-wrap: wrap;">{{ $vcate->cat_description }}</td>
                                        <td>
                                            @if ($vcate->status == 1)
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="SwitchCheck1" value="{{ $vcate->id }}" checked>
                                                        <label class="form-check-label"
                                                            id="category_status_{{ $vcate->id }}" for="SwitchCheck1"><b
                                                                class="badge  text-white"
                                                                style="background-color: orange">Active</b> </label>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck1" value="{{ $vcate->id }}">
                                                    <label class="form-check-label" for="SwitchCheck1"
                                                        id="category_status_{{ $vcate->id }}"><b
                                                            class="badge badge-danger">In-active</b></label>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="margin">
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-default dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown" aria-expanded="false"
                                                        style="
                                                    background-color: #d1d3d3;
                                                ">
                                                        Action
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">

                                                        <a class="dropdown-item edit  " href="" id="edit"
                                                            data-edit="{{ $vcate->id }}"> <i
                                                                class="fa-solid fa-pen-to-square mr-2  bg-danger rounded-pill p-2 "></i><b>Edit</b></a>
                                                        <a class="dropdown-item delteBtn  "
                                                            data-delete="{{ $vcate->id }}" href=""> <i
                                                                class="fa-solid fa-trash mr-2  bg-warning rounded-pill p-2"></i><b>Delete</b></a>
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
                                    <h4 class="modal-title">Add Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <form id="form_data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Category Name :</label>
                                                        <input type="text" name="cat_name" class="form-control"
                                                            placeholder="Enter Category" id="categroy_name">
                                                        <span class="text-danger" id="category_name"></span>
                                                    </div>
                                                </div><br>
                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                name="cat_type" id="customCheckbox2">
                                                            <label for="customCheckbox2"
                                                                class="custom-control-label">Is-income category</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row mt-2">
                                                    <div class="col-md-12">
                                                        <label for="">Category Description:</label>
                                                        <input type="text" name="cat_description" class="form-control"
                                                            placeholder="Enter Category Description">
                                                        <span class="text-danger" id="categroy_description"></span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary submit" id="insert">Add
                                        Category</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                {{-- edit modal  --}}
                <div class="modal fade" id="modal-default1">
                    <div class="modal-dialog">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <form id="update_form" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">Category Name :</label>
                                                    <input type="hidden" id="hidden">
                                                    <input type="text" name="category_name" id="cat_name"
                                                        class="form-control" placeholder="Enter Category">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="income" type="checkbox" name="category_type"> Is
                                                        Income Category
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label for="">Cat Description:</label>
                                                    <input type="text" id="cat_description"
                                                        name="category_description" class="form-control"
                                                        placeholder="Enter Category Description">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary update" id="update">Update
                                    Category</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on("click", "#add_category", function(e) {
                e.preventDefault();
                const button = document.getElementById("add_category");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                setTimeout(function() {
                    button.removeAttribute("disabled");
                    button.innerHTML = "+ Add Category";
                }, 500);
                $("#modal-default").modal("show");
            })
            $(document).on("click", ".submit", function(e) {
                e.preventDefault();
                var formData = new FormData(form_data);
                const button = document.getElementById("insert");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                $.ajax({
                    url: "/category",
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(res) {
                        if (res.message == 200) {
                            $("#modal-default").modal("hide");
                            button.removeAttribute("disabled");
                            button.innerHTML = "Add Category";
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Categroy added successfully',
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
                            alert("data already exist");
                        }
                    },
                    error: function(erorr) {
                        button.removeAttribute("disabled");
                        button.innerHTML = "Add Category";
                        $("#category_name").append(erorr.responseJSON.errors.cat_name)
                        $("#categroy_description").append(erorr.responseJSON.errors
                            .cat_description)

                    }
                });
            })
            $(document).on("click", ".delteBtn", function(e) {
                e.preventDefault()
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#e12334",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        var deleteId = $(this).data("delete");
                        var element = this;
                        $.ajax({
                            url: "/category/" + deleteId,
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

            $(document).on("click", ".edit", function(e) {
                e.preventDefault();
                $("#modal-default1").modal("show");
                var editId = $(this).data('edit');
                $.ajax({
                    url: "category/" + editId + "/edit",
                    dataType: "json",
                    method: "get",
                    success: function(res) {
                        if (res.data.cat_type == 1) {
                            $('.income').prop('checked', true);
                        } else {
                            $('.income').prop('checked', false);
                        }
                        $('#cat_name').val(res.data.cat_name);
                        $('#cat_description').val(res.data.cat_description);
                        $("#hidden").val(res.data.id)
                    }
                })
            });
            $(document).on("click", ".update", function(e) {
                e.preventDefault();
                var id = $("#hidden").val();
                var formData = new FormData(update_form);
                const button = document.getElementById("update");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                $.ajax({
                    url: "/category/" + id,
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
                    },
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(res) {
                        if (res.message == 200) {
                            $("#modal-default1").modal("hide");
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Category  updated successfully',
                                animation: false,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 4000,
                                timeProgressBar: true,
                            })
                            button.removeAttribute("disabled");
                            button.innerHTML = "Add Category";
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
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
            $(document).on("change", "#SwitchCheck1", function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                $.ajax({
                    url: "/Statuschange/" + value,
                    method: "GET",
                    success: function(response) {
                        if (response.message.status == 1) {
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Status change successfully',
                                animation: false,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 2500,
                                timeProgressBar: true,
                            })
                            $("#category_status_" + response.message.id).empty();
                            $("#category_status_" + response.message.id).append(
                                "<span class='badge text-white' style='background-color:red'>In-active </span>"
                            );

                        } else {
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Status change successfully',
                                animation: false,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 2500,
                                timeProgressBar: true,
                            })
                            $("#category_status_" + response.message.id).empty();
                            $("#category_status_" + response.message.id).append(
                                "<span class='badge text-white' style='background-color:orange'>Active</span>"
                            );

                        }
                    }
                })
            })
        })
    </script>
@endsection
