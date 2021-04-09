<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
    style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">

<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ env('APP_NAME') }}</title>
    <style type="text/css">
        img {
            max-width: 100%;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            height: 100%;
            line-height: 1.6;
            background-color: #f6f6f6;
        }

        @media only screen and (max-width: 640px) {

            .container {
                width: 100% !important;
            }

            .content {
                padding: 10px !important;
            }

            .content-wrapper {
                padding: 10px !important;
            }

            .invoice {
                width: 100% !important;
            }
        }
    </style>
</head>

<body
    style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6; background: #f6f6f6; margin: 0; padding: 0;">
    <table class="body-wrap"
        style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background: #f6f6f6; margin: 0; padding: 0;">
        <tr
            style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
            <td style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;"
                valign="top"></td>
            <td class="container" width="600"
                style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;"
                valign="top">
                <div class="content"
                    style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 10px;">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0" style="
                    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; 
                    box-sizing: border-box; 
                    border-radius: 3px 3px 0 0;
                    background: #343a40; 
                    margin: 0; 
                    padding: 25px; 
                    border: 1px solid #343a40;
                    color: #fff;
                    text-align: center;
                    font-size: 25px;
                    ">
                        <tr>
                            <th>
                                <a href="{{ env('APP_URL') }}"style="color: #fff; text-decoration: none;">{{ env('APP_NAME') }}</a>
                            </th>
                        </tr>
                    </table>

                    <table class="main" width="100%" cellpadding="0" cellspacing="0"
                        style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 0 0 3px 3px; background: #fff; margin: 0; padding: 0; border: 1px solid #e9e9e9;">
                        <tr
                            style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
                            <td class="content-wrap"
                                style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 10px;"
                                valign="top">

                                @include($partial)

                                <table width="100%">
                                    <tr
                                        style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
                                        <td class="content-block"
                                            style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                            valign="top">
                                            <br />
                                            <br />
                                            <br />
                                            <hr />
                                            Best Regards, <br />
                                            <b>{{ env('APP_NAME') }} team</b>
                                            <br />
                                            <br />
                                            E-mail: <a href="mailto:{{ env('MAIL_FROM_ADDRESS') }}" target="_blank" style="color: #000;">{{ env('MAIL_FROM_ADDRESS') }}</a>
                                            <br />
                                            <a href="{{ url('/') }}" target="_blank" style="color: #000;">{{ url('/') }}</a>
                                            <hr />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>