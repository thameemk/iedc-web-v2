<?php
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('../config/development/database.php');

if (strlen($_SESSION['alogin']) == 0) {
    header("Location: index.php"); //
} else { ?>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Branch</th>
                <th>Batch</th>
                <th>Phone</th>
                <th>Pref 1</th>
                <th>Pref 2</th>
                <th>Pref 3</th>
                <th>Pref 4</th>
                <th>Why ISTE</th>
                <th>Text</th>
            </tr>
        </thead>

        <?php
        $filename = "Users list";
        $sql = "SELECT * from users";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {

                echo '  
<tr>  
<td>' . $cnt . '</td> 
<td>' . $Name = $result->name . '</td> 
<td>' . $Email = $result->email . '</td>
<td>' . $Name = $result->branch . '</td> 
<td>' . $Email = $result->batch . '</td> 
<td>' . $Phone = $result->mobile . '</td> 
<td>' . $Name = $result->prefa . '</td> 
<td>' . $Email = $result->prefb . '</td>
<td>' . $Name = $result->prefc . '</td> 
<td>' . $Email = $result->prefd . '</td>
<td>' . $Name = $result->why . '</td> 
<td>' . $Email = $result->text . '</td> 					
</tr>  
';
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=" . $filename . "-report.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                $cnt++;
            }
        }
        ?>
    </table>
<?php } ?>