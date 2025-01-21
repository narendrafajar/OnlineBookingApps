// const { default: axios } = require("axios");



$('#btnLogin').on('click',function(){
    let email = $('#email').val();
    let pass = $('#password').val();

    // console.log(email, pass);

    axios
        .post('login', {
            email : email,
            password : pass
        })
        .then(response => {
            if (response.data.status === 'success') {
                console.log(response.data);
                localStorage.setItem('token', response.data.token);
                $('#loginModal').modal('hide');
                if(response.data.role === 'superadmin'){
                    alert('login admin Berhasil');
                    window.location.href = '/admin-home';
                } else {
                    alert('User login Berhasil');
                    window.location.href = '/user-home';
                }
            }
        })
        .catch(error => {
            if(error.response){
                alert(error.response.data.message);
            }
        })
});