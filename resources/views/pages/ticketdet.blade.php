<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{config('app.name', 'Vhire')}}</title>
</head>

<body>
        <h1>I am working</h1>
        <form action="add_Detail" method="POST">

                <input type="text" name="quantity" placeholder="quantity"><br>
                <input type="text" name="bookeddate"  placeholder="booked date"><br>
                <input type="text" name="status" placeholder="status"><br><br>

                <input type="text" name="conDate" placeholder="condate"><br>
                <input type="text" name="conTime"  placeholder="conTime"><br>
                <input type="text" name="accessed" placeholder="accessed"><br><br>



                <input type="submit" value="Submit">

        </form>

</body>

</html>