


function objectifyForm(formArray) {

    var returnArray = {};
    for (var i = 0; i < formArray.length; i++){
        returnArray[formArray[i]['name']] = formArray[i]['value'];
    }
    return returnArray;
}
function editContact(idToEdit)
{

    var data = objectifyForm($("#editForm").serializeArray());
    data["id"] = window.localStorage.getItem('id');


    $.ajax({
        url: '/api/contacts/update.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(data),
        success: () => {
            window.location = '/home.html';
                 }
    })
}