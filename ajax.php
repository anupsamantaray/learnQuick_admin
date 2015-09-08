<?php
include_once('classes/config.php');
include_once('classes/admin.php');
include_once('new_config.php');

if(isset($_REQUEST['action']) && $_REQUEST['action']=='changeStatusUSer')
{
    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];
    

    $sql = "UPDATE `register` set status = '".$status."' where user_id ='".$id."'";
    $result = mysql_query($sql,$link);

}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='DeleteUser')
{
    $id = $_REQUEST['id'];
    

    $sql = "DELETE FROM  `register` where user_id ='".$id."'";
    $result = mysql_query($sql,$link);
    if($result){
    	echo"successfully Delete";
    }

}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='Qdelete')
{
  $id = $_REQUEST['q_id']; 
  $sql = "DELETE FROM  `questions` where `q_id` ='".$id."'";
    $result = $conn->query($sql);
    if($result)
    {
        echo "successfully Deleted";
    }
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='changeSubject')
{
    $id = $_REQUEST['id'];
    

    $sql="SELECT * FROM `tbl_subjects` where `standard` ='".$id."'";
    $result=mysql_query($sql,$link);
    echo '<option value="0"> select subject </option>';
    while($row=mysql_fetch_array($result))
    {
        $id=$row['sub_id'];
        $data=$row['subject_name'];
        echo '<option value="'.$id.'">'.$data.'</option>';
    }
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='AddChapter')
{
    $id = $_REQUEST['id'];
    

    $sql="SELECT * FROM `tbl_chapters` where `sub_id` ='".$id."'";
    $result=mysql_query($sql,$link);
    echo '<option value="0"> select chapter </option>';
    while($row=mysql_fetch_array($result))
    {
        $id=$row['chap_id'];
        $data=$row['chapter_name'];
        echo '<option value="'.$id.'">'.$data.'</option>';
    }
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='AddQuestions')
{
    $chapter = $_REQUEST['chapter'];
    $category = $_REQUEST['category'];
    $que = $_REQUEST['que'];
    $opt1 = $_REQUEST['opt1'];
    $opt2 = $_REQUEST['opt2'];
    $opt3 = $_REQUEST['opt3'];
    $opt4 = $_REQUEST['opt4'];
    $ans = $_REQUEST['ans'];
    
    $sql="insert into `questions` values('','$chapter ','$que','$opt1','$opt2','$opt3','$opt4','$ans','$category',NOW())";
   
    $result=mysql_query($sql,$link);
   if($result)
   {
     echo "Question Added Successfully!!";

   }
   
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='UpdateQuestions')
{
    $qid = $_REQUEST['qid'];
    $que = $_REQUEST['que'];
    $opt1 = $_REQUEST['opt1'];
    $opt2 = $_REQUEST['opt2'];
    $opt3 = $_REQUEST['opt3'];
    $opt4 = $_REQUEST['opt4'];
    $ans = $_REQUEST['ans'];
    
    $sql="update `questions` set `question`='$que',a='$opt1',b='$opt2',c='$opt3',d='$opt4',`ans`='$ans',`time_stamp`=NOW() where `q_id`='$qid'";
   
   print_r($sql); die;
   $result = $conn->query($sql);
   if($result)
   {
     echo "successfully Updated";

   }
   
}


if(isset($_REQUEST['action']) && $_REQUEST['action']=='manualHallOfFame')
{
    $requestArr=explode(',',$_REQUEST['postVal']);
	$uid=$requestArr[0];
	$standard=$requestArr[1];
	$sub_id=$requestArr[2];
	$level=$requestArr[3];
	$rslt=$requestArr[4];
	$rts=$requestArr[5];
	
    $sql="SELECT * FROM `tbl_result_temp` where `standard`='".$standard."' and `sub_id` ='".$sub_id."'";
    $result=mysql_query($sql,$link);
	$row=mysql_num_rows($result);
	if($row<10)
	{
		$sql1="insert into `tbl_result_temp` values('','$standard','$sub_id','$uid','','$level','$rslt','$rts')";
		$result1=mysql_query($sql1,$link);
		$msg="Successfully Inserted";
	}
	else
	{
		$msg="Number of Students Exeeds limit 10";
	}
	print $msg;
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='manualHallOfFameRemove')
{
    $res_id_arr=explode(",",$_REQUEST['postVal']);
	foreach($res_id_arr as $key=>$val)
	{
		$sql = "DELETE FROM  `tbl_result_temp` where `res_id`='$val' limit 1";
		$result = $conn->query($sql);
	}

	if($result)
	{
		$msg="Successfully Deleted";
	}
	else
	{
		$msg="Something went wrong while deleting the record. Please try again after some time.";
	}
	print $msg;
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='updateHofMode')
{
    $getMode=$_REQUEST['mode'];
	
	$sql = "update  `tbl_hof_mode` set mode='$getMode' where `id`=1 limit 1";
	$result=mysql_query($sql,$link);
	
	if($result)
	{
		$msg="Successfully Changed the mode to ".ucfirst($getMode);
	}
	else
	{
		$msg="Something went wrong while changing the Mode. Please try again after some time.";
	}
	print $msg;
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='subject_delete')
{
  $subject_id = $_REQUEST['subject_id']; 
  $sql = "DELETE FROM  `tbl_subjects` where `sub_id` ='".$subject_id."'";
    $result = $conn->query($sql);
    if($result)
    {
        echo "successfully Deleted";
    }
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='chapter_delete')
{
  $chapter_id = $_REQUEST['chapter_id']; 
  $sql = "DELETE FROM  `tbl_chapters` where `chap_id` ='".$chapter_id."'";
    $result = $conn->query($sql);
    if($result)
    {
        echo "successfully Deleted";
    }
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='i_delete')
{
    $i_name = $_REQUEST['i_name'];
    
    
  $sql = "DELETE FROM  `tbl_image` where `image_name` ='".$i_name."'";
    $result = $conn->query($sql);
    if($result)
    {
        echo "successfully Deleted";
    }
    @unlink('upload/images/'.$i_name);
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='d_delete')
{
    $d_name = $_REQUEST['d_name'];
    
    
  $sql = "DELETE FROM  `tbl_docs` where `doc_name` ='".$d_name."'";
  
    $result = $conn->query($sql);
    if($result)
    {
        echo"successfully Deleted";
    }    
@unlink('upload/docs/'.$d_name);
}


if(isset($_REQUEST['action']) && $_REQUEST['action']=='v_delete')
{
    $v_name = $_REQUEST['v_name'];
    
    
  $sql = "DELETE FROM  `tbl_video` where `video_name` ='".$v_name."'";
    $result = $conn->query($sql);
    if($result)
    {
        echo"successfully Deleted";
    }    
@unlink('upload/videos/'.$v_name);
}


?>