$(document).ready(() => {
    $('#login-form').on('submit',(e) => {
        e.preventDefault();
        const email = $("input[name='email']").val().trim();
        const password = $("input[name='password']").val().trim();
        const token = $("input[name='_token']").val();
        const actionUrl = $(this).attr('action');
        $('.error').text('');
        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: {
                email: email,
                password: password,
                _token: token
            },
            dataType: 'json',
            success: (res) => {
                console.log(res);
            },
            error: (err) => {
                const errors = err.responseJSON.errors;
                for(let item in errors) {
                    $('.'+item+'-error').text(errors[item][0]);
                }
            }
        });
    })
})
