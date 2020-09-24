$(document).ready( function () {
        $('#registerForm').submit(function (e) {
            e.preventDefault();
            debugger;
            $.ajax({
                type: "POST",
                url: '/',
                data: `${$(this).serialize()}&mode=reg`,
                success: function(response) {
                    debugger;
                    try {
                        const jsonData = JSON.parse(response);
                    } catch (error) {
                        console.log(error);
                        const jsonData = {
                            success: 'parseErr',
                            message: 'parsing data Error from server'
                        }
                    }

                    // user is logged in successfully in the back-end
                    if (jsonData.success == "1")
                    {
                        console.log(jsonData.message);
                        alert(jsonData.message);
                    }
                    else
                    {
                        console.log(jsonData.message);
                        alert('Invalid Credentials!');
                    }
                }
            });
        });
    }
);






