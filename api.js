$(document).ready( function () {
        $('#registerForm').submit(function (e) {
            e.preventDefault();
            debugger;
            $.ajax({
                type: "POST",
                url: '/scripts/routes.php',
                data: `${$(this).serialize()}&mode=reg`,
                success: function(response) {
                    debugger;
                    let jsonData = {};
                    try {
                        jsonData = JSON.parse(response);
                    } catch (error) {
                        console.log(error);
                        jsonData = {
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






