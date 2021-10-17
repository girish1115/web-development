<?php


   
    

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>olduser</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="header.css">
    <style>
         table{
             border:  1px solid rgb(161, 160, 160);
             border-collapse: collapse;
         }
        body{
            background-color: rgb(229, 231, 233);
            align-items: center;
            justify-content: center;
        }
        button{
            background-color:#ff0021;
            font-weight: normal;
            color: #fff;    
            /* width: 200px;
            height: 40px; */
            /* border-radius: 18px; */
            cursor: pointer;
            padding: 5px;
            font-size: 15px;
             border: none; 
        }
       
        .newentry{
            text-align: center;
            align-items: center;
            justify-content: center;
        }
        .table{
            background-color: #f5f5f5;
            width: 100%;
            /* box-shadow: inset -5px -5px 12px #ffffff,
                         inset     5px 5px 12px  rgba(0,0,0,.16); */
        }
        h1{
            font-size: 40px;
             font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
             font-weight: normal;
        }
        tr:nth-child(even){
            background-color:#d2d6d6 ;
        }
        th,td{
            border-bottom: 1px solid rgb(161, 160, 160);
            border-color: none;
            text-align: center;
        }
        th{
            background-color:rgb(61, 113, 129);
            color:white;
            height: 50px;
        }
        td{
            height: 40px;
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
        }
         
    </style>
</head>
<body>
    <nav>
        <div class="logo"> Sleep Tracker</div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
            <i class="fas fa-bars"></i>
        </label>
         <ul> <li><a  href="index.html">Home</a></li>
             <li><a  href="about.html">About Us</a></li>
             <li><a  href="graph.php">See Graph</a></li>
             
              
         </ul>
     </nav><br><br>
    <div>
        <h1>Last week's report</h1>
    </div><br>
    <div class="table" style="overflow-x: auto;">
           <table cellpadding="20" cellspacing="0"  width="100%" cellheight="20px">
               <tr>
                   <th>id</th>
                   <th>Date</th>
                   <th>Sleep Time</th>
                   <th>Wake Up Time</th>
                   <th>Sleep Duration</th>
                   <th>action</th>
               </tr>
              <?php
              error_reporting(0); 
              $db=new mysqli("localhost","root","","sleep");
              $result=$db->query("select * from `sleeptable`");
              while($res=mysqli_fetch_assoc($result)){
                  $diff1=$res['start']-$res['end'];
                  echo '<tr>';
                  echo '<td>'.$res['id'].'</td>';
                  echo '<td>'.$res['date'].'</td>';
                  echo '<td>'.$res['start'].'</td>';
                  echo '<td>'.$res['end'].'</td>';

                  
                  echo '<td>'.abs($diff1).' hrs</td>';
                  echo "<td><a href='delete.php?rn=$res[id]' style='text-decoration:none'><button>Delete</button></td>";
                  echo '</tr>';
              }
              
              
              
              
              
              
              ?>
            
           </table>
    </div><br><br>
    <div class="newentry">
       <a href="newentry.php"><button>Add a new entry</button></a>
    </div>
</body>
</html>