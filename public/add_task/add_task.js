$('#save').click((e) => {
    e.preventDefault();

    let username = $('#username').val();
    let email = $('#email').val();
    let task_text = $('#task_text').val();

    if(username && email && task_text){
        if(validateEmail(email)){
            $.ajax({
                url: '../task/add',
                type: 'POST',
                data: JSON.stringify({
                    username,
                    email,
                    task_text
                }),
                contentType: false,
                processData: false,
                dataType: 'json',
                success: (response) => {
                    if(response){
                        if(response.status == 'ok'){
                            alert('Задача создана!');
                            location.href = '../';
                        }
                        else {
                            alert(response.message);
                        }
                    }
                }
            });
        }
        else {
            alert('Введите корректный email');
        }
    }
    else {
        alert('Заполните все поля!');
    }
    
});

function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}