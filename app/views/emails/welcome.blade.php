<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <table bgcolor="#f4fff7" border="0" cellpadding="0" cellspacing="0" width="98%">
        <tr>
            <td style="padding: 20px 0 30px 0;">
                <table align="center" border="1" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                    <tr>
                        <td bgcolor="#1a158a">
                            <img src="/../../img/compLogo.png" alt="Flit Logo" width="51" height="56" style="display: block; padding: 0px 0px 0px 5px;">
                        </td>
                    </tr>
                    <tr>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style=" border: 1px solid #153643;">
                            <tr>
                                <td align="center" style="padding: 40px 0px 40px 5px; color: #153643; font-family: serif; font-size: 24px;">
                                    <b>Welcome to FLIT, Your Personal Assistant!</b>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 40px 0px 10px 5px; color: #153643; font-family: serif; font-size: 18px;">
                                    {{-- <p>Dear {{{$user['first_name']}}},</p><br> --}}
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 40px 20px 10px 20px; color: #153643; font-family: serif; font-size: 18px;">
                                    <p>We hope you enjoy the ability to easily track your projects with FLIT. Click the button below to login to your account.</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 20px 0px 20px; color: #153643; font-family: serif; font-size: 18px;">
                                    <p>Sincerely,</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 20px 30px 20px; color: #153643; font-family: serif; font-size: 18px;">
                                    <p>Alan, Bobbie, and Kristen</p>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 0px 0px 30px 5px">
                                    <a style="color: #16471a;" href="{{{action('HomeController@showHome')}}}">Login to Your Account</a>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#1a158a" style="color: #f4fff7; font-family: serif; font-size: 16px; padding: 0px 0px 0px 5px">
                                    <p>&#169; 2016</p>
                                </td>
                            </tr>
                        </table>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>




                    