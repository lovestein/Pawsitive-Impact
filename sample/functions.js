// $(function() {
//     $('#datepicker').datepicker({
//             'format': 'yyyy-mm-dd',
//             'autoclose': true
//         });
// });

$(document).ready(function() {
    displayData();
});

function displayData() {
    var displayData = "true";
    $.ajax({
        url: "displayUserSample.php",
        type: 'post',
        data: {
            displaySend: displayData
        },
        success: function(data, status) {
            $('#displayDataTable').html(data);
        }
    })
}
function AddUser() {
    var addFirstName = $('#first_name').val();
    var addLastName = $('#last_name').val();
    var addGender = $('#gender').val();
    var addContact = $('#contact_no').val();
    var addBirthdate = $('#birthdate').val();
    var addEmail = $('#email').val();
    var addPassword = $('#password').val();

    $.ajax({
        url: "createUser.php",
        type: "post",
        data: {
            sendFirstName: addFirstName,
            sendLastName: addLastName,
            sendGender: addGender,
            sendContact: addContact,
            sendBirthdate: addBirthdate,
            sendEmail: addEmail,
            sendPassword: addPassword
        },
        success: function(data, status) {
            console.log(status);
            $('#createUser').modal('hide');
            displayData();
        }
    })
}

function DeleteUser(deleteUser) {
    $.ajax({
        url: 'deleteUserSample.php',
        type: 'post',
        data: {
            sendDeleteUser:deleteUser
        },
        success:function(data,status){
            displayData();
        }
    });
}

function GetUserDetails(UserDetails){

    $('#hiddenID').val(UserDetails);
    
    $.post("updateUserSample.php", {UserDetails:UserDetails}, function(data,status){
        
        var userID = JSON.parse(data); 

        $('#update_first_name').val(userID.first_name);
        $('#update_last_name').val(userID.last_name);
        $('#update_gender').val(userID.gender);
        $('#update_contact_no').val(userID.contact);
        $('#update_birthdate').val(userID.birthdate);
        $('#update_email').val(userID.email);
        $('#update_password').val(userID.password);

    });
    
    $('#updateUser').modal("show");
}

function UpdateUser(){
    var update_first_name = $('#update_first_name').val();
    var update_last_name = $('#update_last_name').val();
    var update_gender = $('#update_gender').val();
    var update_contact_no = $('#update_contact_no').val();
    var update_birthdate = $('#update_birthdate').val();
    var update_email = $('#update_email').val();
    var update_password = $('#update_password').val();
    var hiddenID = $('#hiddenID').val();

    $.post("updateUserSample.php",{
        update_first_name:update_first_name,
        update_last_name:update_last_name,
        update_gender:update_gender,
        update_contact_no:update_contact_no,
        update_birthdate:update_birthdate,
        update_email:update_email,
        update_password:update_password,
        hiddenID:hiddenID
    }, function(data,status){
        console.log(status);          
        $('#updateUser').modal('hide');
        displayData();
    });
}