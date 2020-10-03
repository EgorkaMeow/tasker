$('#edit').click((e) => {
    e.preventDefault();

    let task_id = $('#task_id').val();
    let task_text = $('#task_text').val();
    let status = $('#status').is(':checked') ? 1 : 0;

    if(task_text){
        $.ajax({
            url: '../../task/edit',
            type: 'POST',
            data: JSON.stringify({
                id: task_id,
                task_text,
                status
            }),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (response) => {
                if(response){
                    if(response.status == 'ok'){
                        alert('Изменения сохранены!');
                        location.reload();
                    }
                    else {
                        alert(response.message);
                        if(response.status == 'login_error') {
                            location.href = '../../login';
                        }
                    }
                }
            },
            error:function(xhr, status, errorThrown) { 
                console.log(errorThrown+'\n'+status+'\n'+xhr.statusText); 
           }
        });
    }
    else {
        alert('Заполните все поля!');
    }
    
});