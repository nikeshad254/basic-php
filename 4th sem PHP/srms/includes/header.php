<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRMS</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        nav{
            background-color: purple;
            color: white;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 1rem;
            padding: 0.2rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        table{
            width: 99%;
            text-align: center;
            border-spacing: 0;
            margin: 0 auto;
            margin-top: 1rem;
        }
        .borderTable, .borderTable th, .borderTable td{
            border: 1px solid red;
        }
        form{
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            width: 20rem;
        }
        form div{
            display: flex;
            justify-content: space-between;
        }
        .marksheet{
            width: 40rem;
        }
        .link{
            text-decoration: none;
            color: inherit;
        }
        .btn{
            text-decoration: none;
            padding: 0.3rem;
            background-color: purple;
            color: #fff;
        }
        .buttons{
            display: flex;
            gap: 2rem;
            margin: 0 auto;
            align-items: center;
            justify-content: center;
        }
        
    </style>
</head>
<body>
    <nav><a href="./index.php" class="link">Student Record Management System</a></nav>