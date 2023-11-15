// $(document).on("change", "#category_id", function(stop) {
//     stop.preventDefault();
//     var category = $(this).val();
//     $("#select_category").val(category);
//     $("#select_expence").val("");
//     $("#select_date").val("");
//     var value_category = $("#select_category").val();
//     var value_expence = $("#select_expence").val();
//     var value_date = $("#select_date").val();
//     $.ajax({
//         url: '/select_period',
//         method: "POST",
//         data: {
//             "category": value_category,
//             "expence": value_expence,
//             "date": value_date,
//         },
//         success: function(res) {
//             function formatDate(inputDate) {
//                 const months = [
//                     'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug',
//                     'Sep', 'Oct', 'Nov', 'Dec'
//                 ];

//                 const parts = inputDate.split('-');
//                 const year = parts[0];
//                 const month = months[parseInt(parts[1]) -
//                     1];
//                 const day = parts[2];

//                 return day + '-' + month + '-' + year;
//             }
//             if (value_category == "income") {
//                 var cat =
//                     "<span class='badge text-white bg-success' >Income Category</span>";
//             } else {
//                 var cat =
//                     "<span class='badge text-white bg-danger' style='background-color:red;'>Expense Category</span>";

//             }
//             $("#example1 tbody").empty();
//             var tableRowsHTML = '';
//             $.each(res.ledger, function(key, value) {
//                 $.each(value, function(key1, value1) {
//                     tableRowsHTML += '<tr><td>' + value1.id +
//                         '</td><td>' + formatDate(value1.date) +
//                         '</td><td>' + cat + '</td><td>' +
//                         key + '</td><td>' +
//                         value1.price + '</td><td>' +
//                         value1.description + '</td></tr>';
//                 })
//             });

//             $("#example1 tbody").append(tableRowsHTML);
//             $('#select_Exp').empty();


//             if (value_category == "income") {
//                 value_cat = "(Income)";
//             } else {
//                 value_cat = "(Expense)";
//             }
//             $('#select_Exp').empty();
//             $('#select_Exp').append(value_cat);
//             $("#expense_id").empty().append(
//                 "<option selected disabled>choose...</option>");
//             var selectOptionsHTML = '';
//             $.each(res.category, function(key, value) {
//                 selectOptionsHTML += '<option value="' + value.id + '">' +
//                     value.cat_name +
//                     '</option>';
//             });
//             $("#expense_id").append(selectOptionsHTML);

//         }
//     })
// });
// <------  End select  Category -------->

// <=====select eXPENCE Categroy ========>
// $(document).on("change", "#expense_id", function(stop) {
//     stop.preventDefault();
//     var expence = $(this).val();
//     $("#select_expence").val(expence);
//     var value_category = $("#select_category").val();
//     var value_expence = $("#select_expence").val();
//     var value_date = $("#select_date").val();
//     $.ajax({
//         url: '/select_period',
//         method: "POST",
//         data: {
//             "category": value_category,
//             "expence": value_expence,
//             "date": value_date,
//         },
//         success: function(res) {
//             if (value_category == "income") {
//                 var cat =
//                     "<span class='badge text-white bg-success' >Income Category</span>";
//             } else {
//                 var cat =
//                     "<span class='badge text-white bg-danger' style='background-color:red;'>Expense Category</span>";

//             }

//             $("#example1 tbody").empty();
//             var tableRowsHTML = '';
//             $.each(res.ledger, function(key, value) {
//                 $.each(value, function(key1, value1) {
//                     tableRowsHTML += '<tr><td>' + value1.id +
//                         '</td><td>' + formatDate(value1.date) +
//                         '</td><td>' + cat + '</td><td>' +
//                         key + '</td><td>' +
//                         value1.price + '</td><td>' +
//                         value1.description + '</td></tr>';
//                 })
//             });

//             function formatDate(inputDate) {
//                 const months = [
//                     'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug',
//                     'Sep', 'Oct', 'Nov', 'Dec'
//                 ];

//                 const parts = inputDate.split('-');
//                 const year = parts[0];
//                 const month = months[parseInt(parts[1]) -
//                     1];
//                 const day = parts[2];

//                 return day + '-' + month + '-' + year;
//             }
//             $("#example1 tbody").append(tableRowsHTML);

//             if (value_category == "income") {
//                 value_cat = "(Income)";
//             } else {
//                 value_cat = "(Expense)";
//             }
//             $('#select_Exp').empty();

//             $('#select_Exp').append(value_cat);

//             $.each(res.message, function(key, value) {
//                 $("#example1 tbody").append('<tr><td>' + value.id +
//                     '</td><td>' + formatDate(value.date) + '</td><td>' +
//                     cat +
//                     '</td><td>' + key + '</td><td>' + value.price +
//                     '</td><td>' + value.description + '</td></tr>');
//             });
//         }
//     })
// });
//< ---------- select EXPENCE Categroy ------>

// $(document).on("change", "#select_period", function(stop) {
//     stop.preventDefault();
//     var period = $(this).val();
//     $("#select_date").val(period);
//     var value_category = $("#select_category").val();
//     var value_expence = $("#select_expence").val();
//     var value_date = $("#select_date").val();
//     $.ajax({
//         url: '/select_period',
//         method: "POST",
//         data: {
//             "category": value_category,
//             "expence": value_expence,
//             "date": value_date,
//         },
//         success: function(res) {
//             $("#example1 tbody").empty();
//             if (value_category == "income") {
//                 var cat =
//                     "<span class='badge text-white bg-success' >Income Category</span>";
//             } else {
//                 var cat =
//                     "<span class='badge text-white bg-danger' style='background-color:red;'>Expense Category</span>";

//             }

//             function formatDate(inputDate) {
//                 const months = [
//                     'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug',
//                     'Sep', 'Oct', 'Nov', 'Dec'
//                 ];

//                 const parts = inputDate.split('-');
//                 const year = parts[0];
//                 const month = months[parseInt(parts[1]) -
//                     1];
//                 const day = parts[2];

//                 return day + '-' + month + '-' + year;
//             }
//             $.each(res.message2, function(key, value) {
//                 alert(key)
                // $.each(value, function(key2, value2) {
                //     $("#example1 tbody").append('<tr><td>' + value2
                //         .id +
                //         '</td><td>' + formatDate(value2.date) +
                //         '</td><td>' + cat + '</td><td>' +
                //         key + '</td><td>' +
                //         value2.price + '</td><td>' +
                //         value2.description + '</td></tr>');
                // })
//             })

            //    Relation between select and date
//             $.each(res.message1, function(key, value) {
//                 $.each(value, function(key2, value2) {
//                     $("#example1 tbody").append('<tr><td>' + value2
//                         .id +
//                         '</td><td>' + formatDate(value2.date) +
//                         '</td><td>' + cat + '</td><td>' +
//                         key + '</td><td>' +
//                         value2.price + '</td><td>' +
//                         value2.description + '</td></tr>');
//                 })
//             })
//         }
//     })
// })
