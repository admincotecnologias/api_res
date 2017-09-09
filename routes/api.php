<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);

        //Users
        $api->group(['prefix' => 'Users'],function(Router $api){
            $api->post('/','App\\Api\\V1\\Controllers\\UsersController@post_Create_User');
            $api->get('/','App\\Api\\V1\\Controllers\\UsersController@get_AllUsers');
            $api->get('/Current','App\\Api\\V1\\Controllers\\UsersController@get_AuthUser');
            $api->get('/{id}','App\\Api\\V1\\Controllers\\UsersController@get_UserByID');
            $api->delete('/{id}','App\\Api\\V1\\Controllers\\UsersController@delete_UserByID');
            $api->post('/Reset_Password','App\\Api\\V1\\Controllers\\UsersController@post_User_Change_Password');
        });

        //Enterprises
        $api->group(['prefix' => 'Enterprises'],function(Router $api){
            $api->post('/AddUser','App\\Api\\V1\\Controllers\\EnterpriseController@addUser');
            $api->post('/','App\\Api\\V1\\Controllers\\EnterpriseController@create_Enterprise');
            $api->get('/','App\\Api\\V1\\Controllers\\EnterpriseController@get_AllEnterprises');
            $api->get('/Trashed','App\\Api\\V1\\Controllers\\EnterpriseController@get_Enterprises_deleted');
            $api->put('/Restore/{id}','App\\Api\\V1\\Controllers\\EnterpriseController@put_Restore_Enterprise');
            $api->get('/{id}','App\\Api\\V1\\Controllers\\EnterpriseController@get_EnterpriseByID');
            $api->delete('/{id}','App\\Api\\V1\\Controllers\\EnterpriseController@delete_EnterpriseByID');
            $api->post('/{id}','App\\Api\\V1\\Controllers\\EnterpriseController@put_Enterprise');
            $api->delete('/{idE}/{idU}','App\\Api\\V1\\Controllers\\EnterpriseController@delete_User_From_Enterprise_By_ID_User');
        });
        //Formats
        $api->group(['prefix'=>'Formats'],function(Router $api){
            $api->post('/','App\\Api\\V1\\Controllers\\FormatController@post_Create');
            $api->post('/Files','App\\Api\\V1\\Controllers\\FormatController@post_File');
            $api->put('/{id}','App\\Api\\V1\\Controllers\\FormatController@put_Actualizar');
            $api->get('/','App\\Api\\V1\\Controllers\\FormatController@get_All');
            $api->get('/{id}','App\\Api\\V1\\Controllers\\FormatController@get_ByIDFormat');
            $api->get('/Enterprise/{id}','App\\Api\\V1\\Controllers\\FormatController@get_By_Enterprise');
            $api->get('/User/{id}','App\\Api\\V1\\Controllers\\FormatController@get_By_User');
            $api->get('/Week/Current','App\\Api\\V1\\Controllers\\FormatController@get_Current_Week');
            $api->get('/Week/{id}','App\\Api\\V1\\Controllers\\FormatController@get_By_Week');
            $api->get('/Week/{idW}/Enterprise/{idE}','App\\Api\\V1\\Controllers\\FormatController@get_By_Week_Enterprise');
            $api->get('/Enterprise/{idE}/User/{idU}','App\\Api\\V1\\Controllers\\FormatController@get_By_Enterprise_User');
            $api->get('/Week/{idW}/Enterprise/{idE}/User/{idU}','App\\Api\\V1\\Controllers\\FormatController@get_By_Week_Enterprise_User');
            //Files
            $api->post('/Files','App\\Api\\V1\\Controllers\\FormatController@post_File');
            $api->delete('/Files/{id}','App\\Api\\V1\\Controllers\\FormatController@delete_File');
        });
        //Weeks
        $api->group(['prefix'=>'Weeks'],function(Router $api){
            $api->get('/','App\\Api\\V1\\Controllers\\FormatController@get_All_Weeks');
            $api->get('/{id}','App\\Api\\V1\\Controllers\\FormatController@get_Week_By_ID');
            $api->post('/','App\\Api\\V1\\Controllers\\FormatController@post_Weeks_Between_Two_Dates');
        });

    });

    $api->get('hello', function() {
        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
        ]);
    });

    $api->get('Mail','App\\Api\\V1\\Controllers\\MailerController@post_Mail_Single');
    $api->post('MailHtml','App\\Api\\V1\\Controllers\\MailerController@post_Mail_Html_Single');
    $api->post('MailBi','App\\Api\\V1\\Controllers\\MailerController@post_Mail_Bi');
    $api->post('MailBiPass','App\\Api\\V1\\Controllers\\MailerController@post_Mail_Password_Bi');

});
