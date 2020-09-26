"use strict";

// Class Definition
var KTLogin = function() {
    var _login;
	
    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleSignInForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_signin_form'),
			{
				fields: {
					username: {
						validators: {
							notEmpty: {
								message: 'Username is required'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signin_submit').on('click', function (e) {
            e.preventDefault();
			
            validation.validate().then(function(status) {
		        if (status == 'Valid') {
					$("#kt_login_signin_form").submit();
				} else {
					swal.fire({
		                text: "Kesalahan!.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, paham!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle forgot button
        $('#kt_login_forgot').on('click', function (e) {
            e.preventDefault();
            _showForm('forgot');
        });

        // Handle signup
        $('#kt_login_signup').on('click', function (e) {
            e.preventDefault();
            _showForm('signup');
        });
    }

    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			form,
			{
				fields: {
					nama: {
						validators: {
							notEmpty: {
								message: 'Nama Harus Diisi!'
							}
						}
					},
					no_hp: {
						validators: {
							notEmpty: {
								message: 'No. HP Harus Diisi!'
							}
						}
					},
					username: {
                        validators: {
							notEmpty: {
								message: 'Username Harus Diisi!'
							},
							stringLength: {
								min: 5,
								message: 'Username Minimal 5, ya!'
							},
							blank: {
								message: 'Username Sudah Digunakan!'
							},
						}
					},
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Password Harus Diisi!'
							},
							stringLength: {
								min: 5,
								message: 'Password Minimal 5, ya!'
							}
                        }
					},
					foto: {
                        validators: {
                            notEmpty: {
                                message: 'Upload foto dirimu, ya!'
							},
							file: {
								extension: 'jpeg,jpg,png',
                            	type: 'image/jpeg,image/png',
								message: 'Pilihnya file foto, ya!'
							}
                        }
					},
					foto_ktp: {
                        validators: {
                            notEmpty: {
                                message: 'Upload foto ktpmu, ya!'
							},
							file: {
								extension: 'jpeg,jpg,png',
                            	type: 'image/jpeg,image/png',
								message: 'Pilihnya file foto, ya!'
							}
                        }
                    },
                    cpassword: {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation is required'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'Passwordnya gak sama...'
							},
							stringLength: {
								min: 5,
								message: 'Password Minimal 5, ya!'
							}
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'You must accept the terms and conditions'
                            }
                        }
                    },
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signup_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
					
					$.ajax({
						url: '/jukir/checkUsernameUser',
						method: 'post',
						data: $('#kt_login_signup_form').serialize(), // prefer use serialize method
						success:function(data){
						  console.log(data);
							if(data > 0){
								$("#username").val('');
								swal.fire({
									text: "Maaf, usernamenya sudah digunakan...",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok.!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								});
								
							}else{
								$( "#kt_login_signup_form" ).submit();
							}
						}
					});
						
				} else {
					swal.fire({
		                text: "Kesalahan.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, paham!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            });
				}
		    });
        });

        // Handle cancel button
        $('#kt_login_signup_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    var _handleForgotForm = function(e) {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_forgot_form'),
			{
				fields: {
					no_seri_alat: {
						validators: {
							notEmpty: {
								message: 'Email address is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        // Handle submit button
        $('#kt_login_forgot_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    // Submit form
                    KTUtil.scrollTop();
				} else {
					swal.fire({
		                text: "Sorry, looks like there are some errors detected, please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle cancel button
        $('#kt_login_forgot_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
            _handleSignUpForm();
            _handleForgotForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
