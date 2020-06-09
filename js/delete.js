
function deleteContact(idToDelete)
{
    if (!confirm("Are you sure you want to delete this contact?"))
    {
        return;
    }
    var object = {"id" : idToDelete};
    $.ajax({
        url: '/api/contacts/delete.php',
        method: 'DELETE',
        contentType: 'application/json',
        data: JSON.stringify(object),
        success: () => {
            window.location = '/home.html';
        }
    })
}