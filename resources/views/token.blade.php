<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('APP_NAME')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.28/css/uikit.min.css" />

        <!-- jQuery is required -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- UIkit JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.28/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.28/js/uikit-icons.min.js"></script>
        <style>
            .full-height {
                height: 100vh;
            }
        </style>
    </head>
    <body>
    <div class="uk-flex uk-flex-center uk-flex-middle uk-text-center full-height uk-background-cover" style="background-image: url(/back_reset.jpeg);">
            <div class="uk-card uk-card-default uk-card-body uk-width-1-2 uk-container-center">
                <h2 class="uk-card-title">{{env('APP_NAME')}}</h2>
                <form method="post" action="/reset_password/{{$token}}">
                    {!! csrf_field() !!}
                    <table class="uk-table uk-table-middle uk-text-center">
                        <thead>
                        <tr>
                            <th class="uk-width-small" colspan="2">Recuperación de Contraseña</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>E-mail:</td>
                            <td>
                                <div class="uk-margin">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: user"></span>
                                        <input name="email" class="uk-input" type="email">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Nueva contraseña:</td>
                            <td>
                                <div class="uk-margin">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                                        <input name="password" class="uk-input" type="password">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Repita contraseña:</td>
                            <td>
                                <div class="uk-margin">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                                        <input name="password_confirmation" class="uk-input" type="password">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><button class="uk-button uk-button-primary" type="submit">Cambiar</button></td>
                            <td>
                                <button class="uk-button uk-button-danger" type="button">Cancelar</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
    </div>
    @if(isset($error))
        <script>
            $(document).ready(function () {
                UIkit.notification({
                    message: '{{$error}}',
                    status: '{{$status}}',
                    pos: 'top-right',
                    timeout: 5000
                });
            });
        </script>
    @endif
</body>
</html>