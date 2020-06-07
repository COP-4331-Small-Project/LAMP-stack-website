let employeeData = $('#contactList').DataTable({
    "lengthChange": false,
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
        url:"action.php",
        type:"POST",
        data:{action:'listContacts'},
        dataType:"json"
    },
    "columnDefs":[
        {
            "targets":[0, 6, 7],
            "orderable":false,
        },
    ],
    "pageLength": 10
});