<?php
require 'database.php';
// $link = mysqli_connect("localhost", "root", "", "results");
// if($link === false){
//   die("ERROR: Could not connect. " . mysqli_connect_error());}


try
{ 
  $pdo = new PDO("mysql:host=localhost;dbname=results;charset=utf8mb4", "root","");
// set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully";
  }
  catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  }




// QUERY ZA VKUPNO
        $sql = "SELECT team, COUNT(*) Matches, 
        COUNT(CASE WHEN postignati_golovi_tim1 > postignati_golovi_tim2 then 1 end) Win, 
        COUNT(CASE WHEN postignati_golovi_tim1 = postignati_golovi_tim2 then 1 END) Equal, 
        COUNT(CASE WHEN postignati_golovi_tim1 < postignati_golovi_tim2 then 1 END) Lost,
        SUM(postignati_golovi_tim1) Scoredgoals,
        SUM(postignati_golovi_tim2) Receivedgoals,
        SUM(postignati_golovi_tim1) - SUM(postignati_golovi_tim2) Difference,
        SUM(CASE WHEN postignati_golovi_tim1 > postignati_golovi_tim2 then 3 else 0 end + case when postignati_golovi_tim1 = postignati_golovi_tim2 then 1 else 0 END) Points
       FROM ( SELECT tim1 AS team, postignati_golovi_tim1, postignati_golovi_tim2 FROM natprevari 
       UNION ALL SELECT tim2 AS team, postignati_golovi_tim2, postignati_golovi_tim1 FROM natprevari 
       ) a
       GROUP BY team
  ORDER BY Points DESC;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $natprevari = $stmt->fetchAll();


// PRIKAZVUVANJE VO TABELA
        // if($natprevari = mysqli_query($link, $sql)){
        //   if(mysqli_num_rows($natprevari) > 0){
        //       echo "<table border= '2'>";
        //           echo "<tr>";
        //               echo "<th> </th>";
        //               echo "<th colspan='8'>Вкупно</th>";
                    
        //           echo "</tr>";
        //           echo "<tr>";
        //           echo "<td>Екипа</td>";
        //           echo "<td>Бр.</td>";
        //           echo "<td>Пб</td>";
        //           echo "<td>Н</td>";
        //           echo "<td>З</td>";
        //           echo "<td>ДГ</td>";
        //           echo "<td>ПрГ</td>";
        //           echo "<td>Раз</td>";
        //           echo "<td>ПОЕ</td>";
        //       echo "</tr>";
        //           while($row = mysqli_fetch_array($natprevari)){
        //             echo "<tr>";
        //                 echo "<td>" . $row['team'] . "</td>";
        //                 echo "<td>" . $row['Matches'] . "</td>";
        //                 echo "<td>" . $row['Win'] . "</td>";
        //                 echo "<td>" . $row['Equal'] . "</td>";
        //                 echo "<td>" . $row['Lost'] . "</td>";
        //                 echo "<td>" . $row['Scoredgoals'] . "</td>";
        //                 echo "<td>" . $row['Receivedgoals'] . "</td>";
        //                 echo "<td>" . $row['Difference'] . "</td>";
        //                 echo "<td>" . $row['Points'] . "</td>";

        //             echo "</tr>";
        //         }
        //       echo "</table>";
         
        //       mysqli_free_result($natprevari);
        //   } else{
        //       echo "No records matching your query were found.";
        //   }
        // } else{
        //   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        // }



// QUERY ZA DOMA
      $sql2 = "SELECT teamHome, COUNT(*) MatchesHome, 
               COUNT(CASE WHEN postignati_golovi_tim1 > postignati_golovi_tim2 then 1 end) WinHome, 
               COUNT(CASE WHEN postignati_golovi_tim1 = postignati_golovi_tim2 then 1 END) EqualHome, 
               COUNT(CASE WHEN postignati_golovi_tim1 < postignati_golovi_tim2 then 1 END) LostHome,
               SUM(postignati_golovi_tim1) ScoredgoalsHome,
               SUM(postignati_golovi_tim2) ReceivedgoalsHome,
               SUM(postignati_golovi_tim1) - SUM(postignati_golovi_tim2) DifferenceHome,
               SUM(CASE WHEN postignati_golovi_tim1 > postignati_golovi_tim2 then 3 else 0 end + case when postignati_golovi_tim1 = postignati_golovi_tim2 then 1 else 0 END) PointsHome
              FROM 
                (
                    SELECT tim1 AS teamHome, postignati_golovi_tim1, postignati_golovi_tim2 FROM natprevari 
       
                ) a  GROUP BY teamHome;";
        $stmt = $pdo->prepare($sql2);
        $stmt->execute();
        $natprevaridoma = $stmt->fetchAll();
        
      //   if($natprevaridoma = mysqli_query($link, $sql2)){
      //     if(mysqli_num_rows($natprevaridoma) > 0){
      //         echo "<table border= '2'>";
      //             echo "<tr>";
      //                 echo "<th colspan='8'>Дома</th>";
                    
      //             echo "</tr>";
      //             echo "<tr>";
      //             echo "<td>Екипа</td>";
      //             echo "<td>Бр.</td>";
      //             echo "<td>Пб</td>";
      //             echo "<td>Н</td>";
      //             echo "<td>З</td>";
      //             echo "<td>ДГ</td>";
      //             echo "<td>ПрГ</td>";
      //             echo "<td>Раз</td>";
      //             echo "<td>ПОЕ</td>";
      //         echo "</tr>";
      //             while($row = mysqli_fetch_array($natprevaridoma)){
      //               echo "<tr>";
      //                   echo "<td>" . $row['teamHome'] . "</td>";
      //                   echo "<td>" . $row['MatchesHome'] . "</td>";
      //                   echo "<td>" . $row['WinHome'] . "</td>";
      //                   echo "<td>" . $row['EqualHome'] . "</td>";
      //                   echo "<td>" . $row['LostHome'] . "</td>";
      //                   echo "<td>" . $row['ScoredgoalsHome'] . "</td>";
      //                   echo "<td>" . $row['ReceivedgoalsHome'] . "</td>";
      //                   echo "<td>" . $row['DifferenceHome'] . "</td>";
      //                   echo "<td>" . $row['PointsHome'] . "</td>";

      //               echo "</tr>";
      //           }
      //         echo "</table>";
         
      //         mysqli_free_result($natprevaridoma);
      //     } else{
      //         echo "No records matching your query were found.";
      //     }
      //   } else{
      //     echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
      //   }



// QUERY ZA GOSTI
    // $sql3 = "SELECT  teamGuest, COUNT(*) MatchesGuest, 
    //         COUNT(CASE WHEN postignati_golovi_tim1 < postignati_golovi_tim2 then 2 end) WinGuest, 
    //         COUNT(CASE WHEN  postignati_golovi_tim1 = postignati_golovi_tim2 then 1 END) EqualGuest, 
	  //         COUNT(CASE WHEN  postignati_golovi_tim1 > postignati_golovi_tim2 then 1 END) LostGuest,
    //         SUM(postignati_golovi_tim2) ScoredgoalsGuest,
    //         SUM(postignati_golovi_tim1) ReceivedgoalsGuest,
    //         SUM(postignati_golovi_tim1) - SUM(postignati_golovi_tim2) DifferenceGuest,
    //         SUM(CASE WHEN  postignati_golovi_tim1 < postignati_golovi_tim2 then 3 else 0 end + case when postignati_golovi_tim1 = postignati_golovi_tim2 then 1 else 0 END) PointsGuest
    //         FROM (
    //                SELECT tim1 as teamGuest, postignati_golovi_tim1, postignati_golovi_tim2 from natprevari 
     
    //             ) a  GROUP BY teamGuest;";

    //   $stmt = $pdo->prepare($sql3);
    //   $stmt->execute();
    //   $natprevargosti = $stmt->fetchAll();



    //   if($natprevargosti = mysqli_query($link, $sql3)){
    //     if(mysqli_num_rows($natprevargosti) > 0){
    //         echo "<table border= '2'>";
    //             echo "<tr>";
    //                 echo "<th colspan='8'>Гости</th>";
                  
    //             echo "</tr>";
    //             echo "<tr>";
    //             echo "<td>Екипа</td>";
    //             echo "<td>Бр.</td>";
    //             echo "<td>Пб</td>";
    //             echo "<td>Н</td>";
    //             echo "<td>З</td>";
    //             echo "<td>ДГ</td>";
    //             echo "<td>ПрГ</td>";
    //             echo "<td>Раз</td>";
    //             echo "<td>ПОЕ</td>";
    //         echo "</tr>";
    //             while($row = mysqli_fetch_array($natprevargosti)){
    //               echo "<tr>";
    //                   echo "<td>" . $row['teamGuest'] . "</td>";
    //                   echo "<td>" . $row['MatchesGuest'] . "</td>";
    //                   echo "<td>" . $row['WinGuest'] . "</td>";
    //                   echo "<td>" . $row['EqualGuest'] . "</td>";
    //                   echo "<td>" . $row['LostGuest'] . "</td>";
    //                   echo "<td>" . $row['ScoredgoalsGuest'] . "</td>";
    //                   echo "<td>" . $row['ReceivedgoalsGuest'] . "</td>";
    //                   echo "<td>" . $row['DifferenceGuest'] . "</td>";
    //                   echo "<td>" . $row['PointsGuest'] . "</td>";

    //               echo "</tr>";
    //           }
    //         echo "</table>";
       
    //         mysqli_free_result($natprevargosti);
    //     } else{
    //         echo "No records matching your query were found.";
    //     }
    //   } else{
    //     echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link);
    //   }




  // Close connection
  // mysqli_close($link);
  
        foreach($natprevari as $natprevar){
            $key = $natprevar['team'];
            $arrayVkupno[$key] = $natprevar;
        }
            foreach($natprevaridoma as $natprevarDoma){
                    $key = $natprevarDoma['teamHome'];
                    $arrayDoma[$key] = $natprevarDoma;
            }
       
            $total=array_merge_recursive($arrayVkupno,$arrayDoma);
            echo json_encode($total);


//   print_r($arrayVkupno);


?>

