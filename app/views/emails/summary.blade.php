<!DOCTYPE html>
<html>
<head>
    <title>Summary Email</title>
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
                        <td>
                            <table align="center" border="1" cellpadding="0" cellspacing="0" width="600" style=" border: 1px solid #153643;">
                                <tr>
                                    <td align="center" style="padding: 40px 0px 10px 5px; color: #153643; font-family: serif; font-size: 24px;">
        
                                        <b>{{{ $user['first_name'] }}}, here is your Weekly Summary</b>
                                    </td>
                                </tr>

                                <tr align="center">
                                    <td style="padding: 0px 0px 10px 5px; color: #153643; font-family: serif; font-size: 18px;">
                                        <p class="flow-text"><a href="{{{action('ProjectsController@showOverdue')}}}">Projects Overdue: {{{$overdueProjects}}}</a>
                                        </p>  
                                    </td>
                                </tr>

                                <tr align="center">
                                    <td style="padding: 40px 0px 10px 5px; color: #153643; font-family: serif; font-size: 20px;">
                                        <b>Upcoming Project Due Dates</b>
                                    </td>

                                    <table align="center" border="1" cellpadding="0" cellspacing="0" width="600">
                                        
                                        <tr align="center">
                                            <td style="padding: 40px 0px 10px 5px; color: #153643; font-family: serif; font-size: 18px;">
                                                <b>Project</b>
                                            </td>
                                            <td style="padding: 40px 0px 10px 5px; color: #153643; font-family: serif; font-size: 18px;">
                                                <b>Project Due Date</b>
                                            </td>
                                            <td style="padding: 40px 0px 10px 5px; color: #153643; font-family: serif; font-size: 16px;">
                                                <b>Description</b>
                                            </td>
                                        </tr>
                                          
                                        @foreach($projects as $project)
                                            <tr align="center">
                                                <td style="padding: 40px 0px 10px 5px; color: #153643; font-family: serif; font-size: 18px;"><a href="{{{action('ProjectsController@show', $project['id'])}}}">{{{$project['name']}}}</a></td>
                                                <td style="padding: 40px 0px 10px 5px; color: #153643; font-family: serif; font-size: 18px;">{{{ $project['due_date']}}}</td>
                                                <td style="padding: 40px 0px 10px 5px; color: #153643; font-family: serif; font-size: 16px;">{{{$project['description']}}}</td>
                                            </tr>
                                        @endforeach
                                       
                                    </table>
                                </tr>

                                <tr bgcolor="#1a158a">
                                    <td style="color: #f4fff7; font-family: serif; font-size: 18px; padding: 0px 0px 0px 5px">&#169; 2016</td>
                                </tr> 
                            </table>
                        </td>
                    </tr>
                </table>               
            </td>
        </tr>
    </table>
</body>
</html>
