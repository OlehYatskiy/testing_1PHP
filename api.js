$(document).ready( function () {
        //send post to index.php, register
        $('#registerForm').submit(function (e) {
            debugger;
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/scripts/routes.php',
                data: `${$(this).serialize()}&mode=reg`,
                success: function(response) {
                    let jsonData = {};
                    try {
                        jsonData = JSON.parse(response);
                    } catch (error) {
                        console.log(error);
                        jsonData = {
                            success: 'parseErr',
                            message: ['parsing data Error from server']
                        }
                    }

                    // user is logged in successfully in the back-end
                    if (jsonData.success == 'ok') {
                        console.log(jsonData.message);
                        alert(jsonData.message);
                    } else if (jsonData.success == 'parseErr') {
                        console.log(jsonData.message);
                        alert('Invalid Credentials!');
                    } else {
                        jsonData.message.forEach(function(message) {
                            console.log(jsonData.message);
                            alert(jsonData.message);
                        });
                    }
                }
            });
        });
        //send post to index.php, auth
        $('#loginForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/scripts/routes.php',
                data: `${$(this).serialize()}&mode=auth`,
                success: function(response) {
                    let jsonData = {};
                    try {
                        jsonData = JSON.parse(response);
                    } catch (error) {
                        console.log(error);
                        jsonData = {
                            success: 'parseErr',
                            message: ['parsing data Error from server']
                        }
                    }

                    // user is logged in successfully in the back-end
                    if (jsonData.success == 'ok') {
                        console.log(jsonData.message);
                        window.location.href = `show.php`;
                    } else if (jsonData.success == 'parseErr') {
                        console.log(jsonData.message);
                        alert('Invalid Credentials!');
                    } else {
                        jsonData.message.forEach(function(message) {
                            console.log(jsonData.message);
                            alert(jsonData.message);
                        });
                    }
                }
            });
        });
    }
);






