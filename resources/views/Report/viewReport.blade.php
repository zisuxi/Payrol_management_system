@extends('layouts.app')
@section('content')
    <div class="card-body">
        <div class="row ">
            <div class="col-md-2">
                <label for="" style="font-size: 12px;">Select Category</label>
                <select class="form-control select2 filterNow" id="category_id">
                    <option value="" selected disabled> Choose ....</option>
                    <option value="income">Income </option>
                    <option value="expence">Expence </option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="" id="" style="font-size: 12px;">Select <span
                        id="select_Exp">(Expences)</span></label>
                <select class="form-control select2 select3 filterNow" id="expense_id" style="width: 100%;">
                    <option value="" selected disabled> Choose ....</option>
                    @foreach ($allCats as $vdata)
                        {{-- <option value="{{ ucfirst($array_data[$vdata->id]['cat_name']) }}">{{ ucfirst($array_data[$vdata->id]['cat_name']) }} </option> --}}
                        <option value="{{ $vdata['id'] }}">{{ ucfirst($vdata['cat_name']) }} </option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-3  ">
                <div class="form-group">
                    <form>
                        @csrf
                        <label class="" style="font-size: 12px;">Select Period</label>
                        <select class="form-control select2 filterNow" id="select_period" style="width: 100%;">
                            <option value="" selected disabled> Choose option....</option>
                            <option value="Today">Today</option>
                            <option value="Yesterday">Yesterday</option>
                            <option value="This week">This week</option>
                            <option value="Last Week">Last Week</option>
                            <option value="Last 7 Days">Last 7 Days</option>
                            <option value="Last 30 Days">Last 30 Days</option>
                            <option value="Last 60 Days">Last 60 Days</option>
                            <option value="Last 90 Days">Last 90 Days</option>
                            <option value="This Year">This Year</option>
                        </select>
                    </form>
                </div>
            </div>


            <div class="col-md-2">
                <label for="" style="font-size: 12px;"> Current Date</label>
                <input type="text" id="from_date" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="" style="font-size: 12px;"> Last Date</label>
                <input type="text" id="to_date" class="form-control">
            </div>
        </div>
    </div>
    <div class="card-body table-responsive table-bordered ">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="font-size: 14px;">Sr/No</th>
                    <th style="font-size: 14px;">Date</th>
                    <th style="font-size: 14px;">Category Type</th>
                    <th style="font-size: 14px;">Category Name</th>
                    <th style="font-size: 14px;">Price</th>
                    <th style="font-size: 14px;">Description</th>
                </tr>
            </thead>
            <tbody id="TableEmpty">
                @forelse ($viewData as $vdata)
                    <tr>
                        <td>{{ $vdata->id }}</td>
                        @php
                            $date = $vdata->date;
                            $dateformat = date('d-M-Y', strtotime($date));
                        @endphp
                        <td> {{ $dateformat }} </td>
                        <td>
                            @if ($array_data[$vdata->id]['cat_type'] == 0)
                                <span class="badge  text-white" style="background-color:red;">
                                    {{ 'Expence Category' }}</span>
                            @else
                                <span class="badge bg-success text-white">{{ 'Income Category' }}</span>
                            @endif
                        </td>
                        <td> {{ ucfirst($array_data[$vdata->id]['cat_name']) }} </td>

                        <td>{{ $vdata->price }}</td>
                        <td>{{ $vdata->description }}</td>

                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $('#select_period').change(function() {
            var selectedValue = $(this).val();
            var currentDate = new Date();
            var selectedDate;

            if (selectedValue === "Today") {
                selectedDate = new Date(currentDate);
            } else if (selectedValue === "Yesterday") {
                selectedDate = new Date(currentDate);
                selectedDate.setDate(selectedDate.getDate() - 1);
            } else if (selectedValue == "This week") {
                // Calculate the start of the current week (Sunday)
                var startOfWeek = new Date(currentDate);
                startOfWeek.setDate(currentDate.getDate() - currentDate.getDay());
                selectedDate = startOfWeek;
            } else if (selectedValue == "Last Week" || selectedValue == "Last 7 Days") {
                selectedDate = new Date(currentDate);
                selectedDate.setDate(selectedDate.getDate() - 7);
            } else if (selectedValue == "Last 30 Days") {
                selectedDate = new Date(currentDate);
                selectedDate.setDate(selectedDate.getDate() - 30);
            } else if (selectedValue == "Last 60 Days") {
                selectedDate = new Date(currentDate);
                selectedDate.setDate(selectedDate.getDate() - 60);
            } else if (selectedValue == "Last 90 Days") {
                selectedDate = new Date(currentDate);
                selectedDate.setDate(selectedDate.getDate() - 90);
            } else if (selectedValue == "This Year") {
                selectedDate = new Date(currentDate);
                selectedDate.setDate(selectedDate.getDate() - 365);
            }

            var formattedCurrentDate = currentDate.toISOString().split('T')[0];
            var formattedSelectedDate = selectedDate.toISOString().split('T')[0];

            $('#from_date').val(formattedCurrentDate); // Adjusted for "This Week"
            $('#to_date').val(formattedSelectedDate);
        });

        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["csv", "pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $(".filterNow").on("change", function() {

                var niche = $("#category_id").val();
                var catType = $("#expense_id").val();
                var period = $("#select_period").val();
                var from_date = $("#from_date").val();
                var to_date = $("#to_date").val();


                $.ajax({
                    type: 'POST',
                    url: "{{ route('apply_filters') }}",
                    data: {
                        niche: niche,
                        catType: catType,
                        from_date: from_date,
                        to_date: to_date,
                        period: period,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        $("#TableEmpty").empty();
                        var id = 1;
                        $.each(res.record, function(key, value) {
                            var categoryType = (value.cat_type == 1) ?
                                "<span  class='badge text-white bg-success'>Income Category</span>" :
                                " <span  class='badge text-white bg-danger'>Expense Category</span>";
                            $("#TableEmpty").append('<tr><td>' + id++ +
                                '</td><td>' + value.date + '</td><td>' +
                                categoryType + '</td><td>' + value.cat_name +
                                '</td><td>' + value.price + '</td><td>' + value
                                .description + '</td></tr>');
                        })

                    }
                })

            });

        });
    </script>
@endsection
