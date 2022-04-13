$(function () {
    "use strict";
  
    $('#AsigninForm').validate({
        rules: {
            username: "required",
            password: "required"
        },
        messages: {
            username: 'Please provide your username',
            password: "Please provide a password"
        },
        errorPlacement: function(error, element){
            error.insertAfter(element).addClass('text-danger')
        }
    })
    
    $('#signinForm').validate({
        rules: {
            email: {
                email: true,
                required: true
            },
            password: "required"
        },
        messages: {
            email: {
                required: "Please provide an email"
            },
            password: "Please provide a password"
        },
        errorPlacement: function(error, element){
            error.insertAfter(element).addClass('text-danger')
        }
    })

    $('#signupForm').validate({
        rules: {
            firstname: "required",
            lastname: "required",
            email: {
                email: true,
                required: true
            },
            gender: "required",
            password: {
                required: true,
                minlength: 5
            },
            conpassword: {
                required: true,
                minlength: 5,
                equalTo: '#password'
            }
        },
        messages: {
            firstname: "Firstname cannot be empty",
            lastname: "Lastname cannot be empty",
            email: {
                required: "Please provide an email"
            },
            gender: {
                required: "Please select a gender"
            },
            password: {
                required: "Please provide a password",
                minlength: "At least 5 characters is required"
            },
            conpassword: {
                required: "Please provide a password",
                minlength: "At least 5 characters is required",
                equalTo: "Passwords do not match"
            }
        },
        errorPlacement: function(error, element){
            error.insertAfter(element).addClass('text-danger')
        }
    })

    $('#addNomineeFrm').validate({
        rules: {
            fullname: "required",
            club: "required",
            age: "required",
            gender: "required",
            image: "required",
            type: "required",
        },
        messages: { 
            fullname: "Please provide Player's Fullname",
            club: "Please provide player's club",
            age: "Provide Player's age",
            gender: "Provide Player's gender",
            image: "Provide player's image name",
            type: "Select nomination type",
        },
        errorPlacement: function(label, element){
            label.insertAfter(element).addClass('text-danger')
        }
    })

    $('#forgotForm').validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email:{
                required: "Please enter an email",
            }
        },
        errorPlacement: function(label, element){
            label.insertAfter(element).addClass('text-danger')
        }
    })
    
    $('#resetForm').validate({
        rules: {
            password: {
                required: true,
                minlength: 5
            },
            conpassword: {
                required: true,
                minlength: 5,
                equalTo: '#password'
            }
        },
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "At least 5 characters is required"
            },
            conpassword: {
                required: "Please provide a password",
                minlength: "At least 5 characters is required",
                equalTo: "Passwords do not match"
            }
        },
        errorPlacement: function(label, element){
            label.insertAfter(element).addClass('text-danger')
        }
    })
});