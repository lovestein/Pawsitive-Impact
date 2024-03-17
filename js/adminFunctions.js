$(document).ready(function() {
    displayUser();
    displayAnimals();
});

function displayUser() {
    var displayUser = "true";
    $.ajax({
        url: "displayUser.php",
        type: 'post',
        data: {
            displaySend: displayUser
        },
        success: function(data, status) {
            $('#displayUserTable').html(data);
        }
    })
}

function InsertAdmin(){
    var addAdminFirstName = $('#addAdminFirstName').val();
    var addAdminLastName = $('#addAdminLastName').val();
    var addAdminGender = $('#addAdminGender').val();
    var addAdminBirthdate = $('#addAdminBirthdate').val();
    var addAdminAddress = $('#addAdminAddress').val();
    var addAdminContact = $('#addAdminContact').val();
    var addAdminEmail = $('#addAdminEmail').val();
    var addAdminPassword = $('#addAdminPassword').val();
    var addUserType = $('#addUserType').val();
    
    $.ajax({
        url: "insertAdmin.php",
        type: 'post',
        data: {
            addAdminFirstName: addAdminFirstName,
            addAdminLastName: addAdminLastName,
            addAdminGender: addAdminGender,
            addAdminBirthdate: addAdminBirthdate,
            addAdminAddress: addAdminAddress,
            addAdminContact: addAdminContact,
            addAdminEmail: addAdminEmail,
            addAdminPassword: addAdminPassword,
            addUserType: addUserType
        },
        success: function(data,status) {
            console.log(status);
            $('#createAdmin').modal('hide');
            displayUser();
        }
    })

}

function DeleteUser(deleteUserID) {
    $.ajax({
        url: 'deleteUser.php',
        type: 'post',
        data: {
            deleteUserID:deleteUserID
        },
        success:function(data,status){
            displayUser();
        }
    });
}

function GetUserDetails(userDetailsID){

    $('#hiddenUserID').val(userDetailsID);
    
    $.post("updateUser.php", {userDetailsID:userDetailsID}, function(data,status){
        
        var user_id = JSON.parse(data); 

        $('#updateAdminFirstName').val(user_id.user_fname);
        $('#updateAdminLastName').val(user_id.user_lname);
        $('#updateAdminGender').val(user_id.user_gender);
        $('#updateAdminBirthdate').val(user_id.user_birthdate);
        $('#updateAdminAddress').val(user_id.user_address);
        $('#updateAdminContact').val(user_id.user_contactno);
        $('#updateAdminEmail').val(user_id.user_email);
        $('#updateAdminPassword').val(user_id.user_password);
        $('#updateUserType').val(user_id.user_type);

    });
    
    $('#editAdmin').modal("show");
}

function UpdateUser(){

    var updateAdminFirstName = $('#updateAdminFirstName').val();
    var updateAdminLastName = $('#updateAdminLastName').val();
    var updateAdminGender = $('#updateAdminGender').val();
    var updateAdminBirthdate = $('#updateAdminBirthdate').val();
    var updateAdminAddress = $('#updateAdminAddress').val();
    var updateAdminContact = $('#updateAdminContact').val();
    var updateAdminEmail = $('#updateAdminEmail').val();
    var updateAdminPassword = $('#updateAdminPassword').val();
    var updateUserType = $('#updateUserType').val();
    var hiddenUserID = $('#hiddenUserID').val();

    $.post("updateUser.php",{
        updateAdminFirstName:updateAdminFirstName,
        updateAdminLastName:updateAdminLastName,
        updateAdminGender:updateAdminGender,
        updateAdminBirthdate:updateAdminBirthdate,
        updateAdminAddress:updateAdminAddress,
        updateAdminContact:updateAdminContact,
        updateAdminEmail:updateAdminEmail,
        updateAdminPassword:updateAdminPassword,
        updateUserType:updateUserType,
        hiddenUserID:hiddenUserID
    }, function(data,status){
        console.log(status);
        $('#editAdmin').modal('hide');
        displayUser();
    });
}

$(document).ready(function() {
    displayAnimals();
});

function displayAnimals() {
    var displayAnimals = "true";
    $.ajax({
        url: "displayAnimals.php",
        type: 'post',
        data: {
            displaySendAnimals: displayAnimals
        },
        success: function(data, status) {
            console.log(statusd);
            $('#displayAnimalTable').html(data);
        }
    })
}