$(() => {
	// Get user details
    $.ajax({
    	url: '/api/login.php',
    	method: 'POST',
    	success: (user) => {
    		$('#welcomeText').text('Welcome, ' + user.username);
    		$('body').addClass(user.house);
    	},
    	error: () => {
    		window.location = '/';
    	}
    });





    // Sets the table with the given contacts
    function setTable(contacts) {


    	const table = $('#contacts tbody').empty();
    	contacts.forEach((contact) => {
    		table.append(`
    			<tr>
    				<th>${contact.firstName}</th>
    				<th>${contact.lastName}</th>
    				<th>${contact.phoneNumber}</th>
    				<th>${contact.email}</th>
    				<th>${contact.house}</th>
    				<th>${contact.dateCreated}</th>
    				<th><button type="button" class="btn btn-primary" onclick="setID(${contact.id})" data-toggle="modal" data-target="#editbannerformodal">Edit</button></th>
    				<th><button type="button" class="btn btn-primary" onclick="deleteContact(${contact.id})">Delete</button></th>
    			</tr>
			`);
    	});
    }

    $.ajax({
    	url: '/api/contacts/search.php',
    	method: 'GET',
    	success: (contacts) => {
    		setTable(contacts);
    	},
    	error: () => {

    	}
    });

	let tid;
	$("#searchText").on("keyup", function() {
		if (tid) {
			clearTimeout(tid);
		}
		tid = setTimeout(() => {
			const value = $(this).val().toLowerCase();
			$.ajax({
				url: '/api/contacts/search.php',
				method: 'GET',
				data: { search: value },
				success: (contacts) => {
					setTable(contacts);
				},
			});
			tid = undefined;
		}, 500);
	});
});