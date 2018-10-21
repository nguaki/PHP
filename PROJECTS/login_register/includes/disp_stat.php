<!DOCTYPE htm>
<html>
<head>
    <title>Visitor Statistics</title>
    <style type="text/css">
     <!--   table {
            border-collapse: collapse;
            width: 50%;
            color: #d96459;
            font-family:monospace;
            font-size:25px;
            text-align:Left;
        }
        th{
            background-color:#588c7e;
            color:white;
        }
        tr:nth-child(even) {background-color:#f2f2f2};-->
    </style>
</head>
<body>
<?php
    require_once "../core/init.php";
    
    $sql = "SELECT * FROM users ORDER BY visit_count DESC";
    
    $Report = new MostVisitsReport($sql);
    
    $Report->ExtractFromDB();
    $Report->Format()

?>
</table>
</body>
</html>