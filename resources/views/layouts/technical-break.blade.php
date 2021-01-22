<!DOCTYPE html>
<html lang="{{ locale() }}" class="h-100">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="Author" content="{{ env('APP_NAME') }}" />
    @include('layouts.partials.fav')
    <meta name="robots" content="noindex, nofollow" />
    <title>{{ env('APP_NAME') }}</title>

    <link rel="stylesheet" href="{{ mix('/css/subpage-stack.css') }}" />
</head>
    <body class="h-100" style="overflow: hidden;">
        <div class="container-fluid2 h-100">
            <div class="row align-items-center h-100">
                <div class="col-12 mx-auto">
                    <div class="jumbotron text-center">
                        <h1 class="cover-heading h3">{{ env('APP_NAME') }} - Technical break</h1>
                        <p class="lead">
                            We currently upgrade the website. It could take a while
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <footer class="text-center bg-secondary p-2 text-white" style="position:absolute;bottom:0;left:0;width:100%;">
            <div class="inner">
                Copyright © <strong>{{ env('APP_NAME') }}</strong> {{ date('Y') }}. All rights reserved
            </div>
        </footer>
    </body>
</html>
