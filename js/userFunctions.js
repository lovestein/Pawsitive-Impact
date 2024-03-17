function InsertUser(){
    var addUserFirstName = $('#addUserFirstName').val();
    var addUserLastName = $('#addUserLastName').val();
    var addUserGender = $('#addUserGender').val();
    var addUserBirthdate = $('#addUserBirthdate').val();
    var addUserAddress = $('#addUserAddress').val();
    var addUserContact = $('#addUserContact').val();
    var addUserEmail = $('#addUserEmail').val();
    var addPassword = $('#addPassword').val();
    var addConfirmPassword = $('#addConfirmPassword').val();
    var addUserType = $('#addUserType').val();

    $.ajax({
        url: "insertUser.php",
        type: 'post',
        data: {
            addUserFirstName:addUserFirstName,
            addUserLastName: addUserLastName,
            addUserGender: addUserGender,
            addUserBirthdate: addUserBirthdate,
            addUserAddress: addUserAddress,
            addUserContact, addUserContact,
            addUserEmail: addUserEmail,
            addPassword: addPassword,
            addConfirmPassword: addConfirmPassword,
            addUserType: addUserType
        },
        success: function(data,status) {
            console.log(status);
            $('#CreateAccount').modal('hide');
        }
    })

}

function GetAnimalDetails(AnimalID){

    $('hiddenAnimalID').val(AnimalID);
    
    $.post('sendDonation.php'), {AnimalID:AnimalID}, function(data,status){
        var animal_id = JSON.parse(data);
        $('$addAnimalName').val(animal_id.animal_donation_id);
    }
}