<?php
$host="localhost";
$user="root";
$password="";
$database="test_db";
$fname="";
$lname="";
$comment="";


$id="";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
    $connect=mysqli_connect($host,$user,$password,$database);

}catch(Exception $ex)
{
    echo 'Error';
}
function getposts()
{
    $posts=array();
    $posts[0]=$_POST['fname'];
    $posts[1]=$_POST['lname'];
    $posts[2]=$_POST['comment'];
    return $posts;
}
if(isset($_POST['search']))
{
    $data=getposts();
    $search_Query ="SELECT * FROM users where fname LIKE '$data[0]'";
    $search_Result =mysqli_query($connect,$search_Query);
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row=mysqli_fetch_array($search_Result))
            {
                $fname=$row['fname'];
                $lname=$row['lname'];
                $comment=$row['comment'];

            }
        }else{
        echo 'No Goals available for this id';
        }
    }else{
        echo 'Error';
    }

}

if(isset($_POST['insert']))
{
    $data=getposts();
    $insert_Query="INSERT INTO users (fname,lname,comment) VALUES ('$data[0]','$data[1]','$data[2]')";
    try{
        $insert_Result=mysqli_query($connect,$insert_Query);
        
        if($insert_Result)
        {
              if(mysqli_affected_rows($connect)>0)
              {
                  echo 'Data Inserted';
              }else{
                  echo 'Data Not Inserted';
              }
        }

    }catch (Exception $ex){
        echo 'Error' . $ex->getMessage();
    }
}
?>
<html>
<head>
</head>
<style type="text/css">
body{
background-image:url("images1.jpg");
background-repeat:no-repeat;
background-size:cover;

}
h1{
  font-family: "ALGERIAN";
 
}
p{
    color:Blue;
}

</style>
<body>
<h1><center>GOAL SETTINGS</center></h1>
<form action="1.php" method="post">
<input type="text" name="fname" placeholder="fname" value="<?php echo $fname ?>"><br><br>
<input type="text" name="lname" placeholder="lname" value="<?php echo $lname ?>"><br><br>
<input type="textarea   " rows="5" name="comment" palceholder="comment" value="<?php echo $comment ?>"><br><br>
<p><input type="checkbox" name="check" value="click" >completed</p>
<p><input type="checkbox" name="check" value="click" >Yet to complete</p>


<div>
<input type="submit" name="insert" value="Add">
<input type="submit" name="search" value="Show">
</div>
</form>
</body>
</html>
