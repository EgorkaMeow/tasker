$('#auth_btn').click((e) => {
    e.preventDefault();

    let data = new FormData();

    data.append('username', $('#login').val());
    data.append('password', $('#password').val());

    $.ajax({
        url: './login',
        type: 'POST',
        data: JSON.stringify({
            username: $('#login').val(),
            password: $('#password').val()
        }),
        contentType: false,
        processData: false,
        dataType: 'json',
        success: (response) => {
            if(response){
                if(response.status == 'ok'){
                    location.href = './';
                }
                else {
                    alert(response.message);
                }
            }
        }
    });
})