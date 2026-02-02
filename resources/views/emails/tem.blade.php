<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no" />

    {{--<link rel="stylesheet" href="{{ asset('emails/base.css') }}">--}}

    <!-- MESSAGE SUBJECT -->
    <title>{{ @$data['subject'] }}</title>

</head>

<!-- BODY -->
<!-- Set message background color (twice) and text color (twice) -->

<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%"
    style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
	background-color: #F0F0F0;
	color: ##ff0000;"
    bgcolor="#F0F0F0" text="#000000">

    <!-- SECTION / BACKGROUND -->
    <!-- Set message background color one again -->
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0"
        style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
        <tr>
            <td align="center" valign="top"
                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;" bgcolor="#8a00000F0">

                <!-- WRAPPER -->
                <!-- Set wrapper width (twice) -->
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560"
                    style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;max-width: 560px;" class="wrapper">
                    <tr>
                        <td align="center" valign="top"
                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;padding-top: 20px;padding-bottom: 20px;">
                            <!-- PREHEADER -->
                            <!-- Set text color to background color -->
                            <!-- LOGO -->
                            <a target="_blank" style="text-decoration: none;" href="{{ @$data['baseURL'] }}"><img
                                    border="0" vspace="0" hspace="0"
                                    src="https://fintopdata.vn/clients/img/LogoFinTop_red.png" width="120"
                                    height="120" alt="Logo" title="Logo"
                                    style="color: #000000;font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>
                        </td>
                    </tr>
                </table>
                <!-- WRAPPER / CONTEINER -->
                <!-- Set conteiner background color -->
                <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560"
                    style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	                    max-width: 560px;"
                    class="container">

                    <!-- HEADER -->
                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
                    <tr>
                        <td align="center" valign="top"
                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                padding-top: 25px;
                                color: #fdffa9;background:#8a0000;
                                font-family: sans-serif;"
                            class="header">
                            {{ @$data['subject'] }}
                        </td>
                    </tr>
                    <!-- BUTTON -->
                    <tr style="background-color: darkred">
                        <td align="center" valign="top"
                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 100%;
                                padding-top: 25px;
                                padding-bottom: 5px;"
                            class="button">
                                <table border="0" cellpadding="0" cellspacing="0" align="center"
                                    style="border-collapse: collapse; border-spacing: 0; padding: 0;">
                                    <tr>
                                        <td valign="middle"
                                            style="width: 400px; padding: 12px 24px; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;
                                            background: #ffe782;font-family: auto;color: #000000;font-size: 20px;">
                                                Mã OTP của bạn là: <span style="color:red;font-weight: 600;">{{ @$data['otp'] }}</span> <br>
                                                Có hiệu lực trong vòng 30 phút ,vui lòng không chia sẻ mã cho bất kỳ ai.<br>
                                                Chúc nhà đầu tư có một trải nghiệm thú vị!
                                        </td>
                                    </tr>
                                </table>
                        </td>
                    </tr>


        <!-- End of WRAPPER -->
    </table>

    <!-- End of SECTION / BACKGROUND -->
    </td>
    </tr>
    </table>

</body>

</html>
