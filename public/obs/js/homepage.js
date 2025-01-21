// const { default: axios } = require("axios");



$('#btnLogin').on('click',function(){
    let email = $('#email').val();
    let pass = $('#password').val();

    $('#loginForm').hide('fast');
    $('#loaderForm').show('fast');

    axios
        .post('login', {
            email : email,
            password : pass
        })
        .then(response => {
            if (response.data.status === 'success') {
                localStorage.setItem('token', response.data.token);
                $('#loginForm').show('fast');
                $('#loaderForm').hide('fast');
                $('#loginModal').modal('hide');
                if(response.data.role === 'superadmin'){
                    messageAlert(response.message);
                    window.location.href = '/admin-home';
                } else {
                    messageAlert('Anda berhasil login',1);
                    window.location.href = '/user-home';
                }
            }
        })
        .catch(error => {
            if(error.response){
                messageAlert(error.response.data.message,1);
                $('#loginForm').show('fast');
                $('#loaderForm').hide('fast');
            }
        })
});