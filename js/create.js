$(() => {
    function objectifyForm(formArray) {

        var returnArray = {};
        for (var i = 0; i < formArray.length; i++){
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }
	$('#createForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/api/contacts/create.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(objectifyForm($("#createForm").serializeArray())),
            success: () => {
                window.location = '/home.php';
            }
        });
    });
});