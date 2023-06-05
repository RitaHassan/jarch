<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

class Statistics extends MYModel
{
    use HasFactory;



public static function teams_count(){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.teams_count(:out_cursor); end;");
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
        $data[] = $row;
    }
    oci_free_cursor($cursor);
    //dd(['data'=>$data]) ;
    return ['data'=>$data];
}
public static function members_count(){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.members_count(:out_cursor); end;");
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
        $data[] = $row;
    }
    oci_free_cursor($cursor);
    return ['data'=>$data];
}
public static function systems_count(){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.systems_count(:out_cursor); end;");
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
        $data[] = $row;
    }
    oci_free_cursor($cursor);
    return ['data'=>$data];
}
public static function systems_disable(){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.systems_disable(:out_cursor); end;");
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
        $data[] = $row;
    }
    oci_free_cursor($cursor);
    return ['data'=>$data];
}
public static function tasks_count(){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.tasks_count(:out_cursor); end;");
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
        $data[] = $row;
    }
    oci_free_cursor($cursor);
    return ['data'=>$data];
}
public static function completed_tasks_count(){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.completed_tasks_count(:out_cursor); end;");
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
        $data[] = $row;
    }
    oci_free_cursor($cursor);
    return ['data'=>$data];
}
public static function my_tasks_count($P_MEMBER_ID){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.my_tasks_count(:P_MEMBER_ID,:out_cursor); end;");
    $stmt->bindValue(':P_MEMBER_ID', $P_MEMBER_ID, PDO::PARAM_NULL);
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
        $data[] = $row;
    }
    oci_free_cursor($cursor);
    return ['data'=>$data];
}
public static function my_completed_tasks_count($P_MEMBER_ID){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.my_completed_tasks_count(:P_MEMBER_ID,:out_cursor); end;");
    $stmt->bindValue(':P_MEMBER_ID', $P_MEMBER_ID, PDO::PARAM_NULL);
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
        $data[] = $row;
    }
    oci_free_cursor($cursor);
    return ['data'=>$data];
}
public static function last_tasks_count($P_MEMBER_ID){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.last_tasks_count(:P_MEMBER_ID,:out_cursor); end;");
    $stmt->bindValue(':P_MEMBER_ID', $P_MEMBER_ID, PDO::PARAM_NULL);
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
        $data[] = $row;
    }
    oci_free_cursor($cursor);
    return ['data'=>$data];
}
  public static function my_last_completed_tasks_count($P_MEMBER_ID){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.my_last_completed_tasks_count(:P_MEMBER_ID,:out_cursor); end;");
        $stmt->bindValue(':P_MEMBER_ID', $P_MEMBER_ID, PDO::PARAM_NULL);
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);
        return ['data'=>$data];
    }


    public static function tasks_count_year(){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.tasks_count_year(:out_cursor); end;");
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);
        return ['data'=>$data];
    }


    public static function tasks_completed_year(){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin STATISTICS_PKG.tasks_completed_year(:out_cursor); end;");
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);
        return ['data'=>$data];
    }
}