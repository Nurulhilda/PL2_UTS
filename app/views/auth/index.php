<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <title>UTS PL2 Ismi</title>
</head>

<body>
    <table style="margin:auto;">
        <form method="POST" action="<?= BASEURL ?>logincontroller/login">
            <tr>
                <th colspan="2">
                    <h3 style="text-align: center;">Login</h3>
                </th>
            </tr>
            <tr>
                <td><label>Username</label></td>
                <td><input type="text" name="inputUsername" required></td>
            </tr>
            <tr>
                <td><label>Password</label></td>
                <td><input type="password" name="inputPassword" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button type="submit">Login</button></td>
            </tr>
        </form>
    </table>
</body>

</html>