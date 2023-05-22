<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use PDO;


class Tasks extends MYModel
{
    use HasFactory;

    protected $fillable = [
        'ID',
        'TEAM_ID',
        'SYSTEM_ID',
        'DESCRIPTION',
        'PRIORITY',
        'TASK_TYPE',
        'PLANNED_START_DT',
        'PLANNED_FINISH_DT',
        'ACTUAL_START_DT',
        'ACTUAL_FINISH_DT',
        'COMPLETION_PERIOD',
        'COMPLETION_STATUS',
        'NOTES',
        'IN_PLAN',
        'CREATED_BY',
        'ISCANCEL',
        'ISDELAY'   ,     
        'CANCELED_REASON',
        'DELAIED_REASON' ,
        'UPDATED_BY',
        'TITLE',
        'DURATION_TYPE',
        'MEM_ID' ,
        'ACTUAL_FINISH_MONTH',
        'ACTUAL_FINISH_YEAR',

    ];

   


    public function __construct() {
        parent::__construct();
        $this->table_name = $this->table_names['tasks'];
    }

    public static function LOAD_DATA($P_TITLE,$P_ACTUAL_FINISH_MONTH,$P_ACTUAL_FINISH_YEAR,$P_MEM_ID,$P_COMPLETION_STATUS,$P_STRAT,$P_LENGTH){
        $cursor =null;
        $data = array();
        $P_recordsTotal = 0;
        $stmt = DB::getPdo()->prepare("begin TASKS_PKG.LOAD_DATA(:P_TITLE,:P_ACTUAL_FINISH_MONTH,:P_ACTUAL_FINISH_YEAR,:P_MEM_ID,:P_COMPLETION_STATUS,:P_STRAT,:P_LENGTH,:P_recordsTotal,:out_cursor); end;");
        $stmt->bindValue(':P_TITLE', $P_TITLE, PDO::PARAM_NULL);
        $stmt->bindValue(':P_ACTUAL_FINISH_MONTH', $P_ACTUAL_FINISH_MONTH, PDO::PARAM_NULL);
        $stmt->bindValue(':P_ACTUAL_FINISH_YEAR', $P_ACTUAL_FINISH_YEAR, PDO::PARAM_NULL);
        $stmt->bindValue(':P_MEM_ID', $P_MEM_ID, PDO::PARAM_NULL);
        $stmt->bindValue(':P_COMPLETION_STATUS', $P_COMPLETION_STATUS, PDO::PARAM_NULL);
        $stmt->bindValue(':P_STRAT', $P_STRAT, PDO::PARAM_NULL);
        $stmt->bindValue(':P_LENGTH', $P_LENGTH, PDO::PARAM_NULL);
        $stmt->bindParam(':P_recordsTotal', $P_recordsTotal, PDO::PARAM_INT);
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);
        return ['data'=>$data,'recordsFiltered'=>$P_recordsTotal,'recordsTotal'=>$P_recordsTotal];
    }

 
    public static function Save_($array_in){
        $stmt = DB::getPdo()->prepare("begin TASKS_PKG.SAVE(:P_TEAM_ID,:P_SYSTEM_ID,:P_DESCRIPTION,:P_PRIORITY,:P_TASK_TYPE,:P_PLANNED_START_DT,:P_PLANNED_FINISH_DT,:P_ACTUAL_START_DT,:P_ACTUAL_FINISH_DT,:P_COMPLETION_PERIOD,:P_COMPLETION_STATUS,:P_NOTES,:P_IN_PLAN,:p_created_by,:P_TITLE,:P_DURATION_TYPE,:P_MEM_ID,:P_STATUS,:P_MSG); end;");
      /*  foreach ($array_in as $key => $value) {
            $stmt->bindValue(":$key",$value , PDO::PARAM_NULL);
        }*/
        $stmt->bindValue(':P_TEAM_ID', $array_in['P_TEAM_ID'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_SYSTEM_ID', $array_in['P_SYSTEM_ID'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_DESCRIPTION', $array_in['P_DESCRIPTION'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_PRIORITY', $array_in['P_PRIORITY'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_TASK_TYPE', $array_in['P_TASK_TYPE'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_PLANNED_START_DT', $array_in['P_PLANNED_START_DT'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_PLANNED_FINISH_DT', $array_in['P_PLANNED_FINISH_DT'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_ACTUAL_START_DT', $array_in['P_ACTUAL_START_DT'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_ACTUAL_FINISH_DT', $array_in['P_ACTUAL_FINISH_DT'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_COMPLETION_PERIOD', $array_in['P_COMPLETION_PERIOD'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_COMPLETION_STATUS', $array_in['P_COMPLETION_STATUS'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_NOTES', $array_in['P_NOTES'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_IN_PLAN', $array_in['P_IN_PLAN'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_CREATED_BY', $array_in['P_CREATED_BY'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_TITLE', $array_in['P_TITLE'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_DURATION_TYPE', $array_in['P_DURATION_TYPE'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_MEM_ID', $array_in['P_MEM_ID'], PDO::PARAM_NULL);
        $stmt->bindParam(':P_STATUS', $P_STATUS,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT, -1);
        $stmt->bindParam(':P_MSG', $P_MSG, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4000);
        $stmt->execute();
        $res=[
            'MSG' => $P_MSG, 
            'STATUS' => $P_STATUS, 
        ];
        return $res;
    }

    public static function Update_($array_in){
   // $stmt = DB::getPdo()->prepare("begin TASKS_PKG.update_task(:p_id,:P_TEAM_ID,:P_SYSTEM_ID,:P_DESCRIPTION,:P_PRIORITY,:P_TASK_TYPE,:P_PLANNED_START_DT,:P_PLANNED_FINISH_DT,:P_ACTUAL_START_DT,:P_ACTUAL_FINISH_DT,:P_COMPLETION_PERIOD,:P_COMPLETION_STATUS,:P_NOTES,:P_IN_PLAN,:P_updated_by,:P_TITLE,:P_DURATION_TYPE); end;");
    
    
    $stmt = DB::getPdo()->prepare("begin TASKS_PKG.update_task(:P_ID ,:P_TEAM_ID,:P_SYSTEM_ID,:P_DESCRIPTION,:P_PRIORITY,:P_TASK_TYPE,:P_PLANNED_START_DT,:P_PLANNED_FINISH_DT,:P_ACTUAL_START_DT,:P_ACTUAL_FINISH_DT,:P_COMPLETION_PERIOD,:P_COMPLETION_STATUS,:P_NOTES,:P_IN_PLAN,:p_updated_by,:P_TITLE ,:P_DURATION_TYPE,:P_MEM_ID,:P_STATUS,P_MSG); end;");
    

    $stmt->bindValue(':P_ID', $array_in['P_ID'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_TEAM_ID', $array_in['P_TEAM_ID'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_SYSTEM_ID', $array_in['P_SYSTEM_ID'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_DESCRIPTION', $array_in['P_DESCRIPTION'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_PRIORITY', $array_in['P_PRIORITY'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_TASK_TYPE', $array_in['P_TASK_TYPE'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_PLANNED_START_DT', $array_in['P_PLANNED_START_DT'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_PLANNED_FINISH_DT', $array_in['P_PLANNED_FINISH_DT'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_ACTUAL_START_DT', $array_in['P_ACTUAL_START_DT'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_ACTUAL_FINISH_DT', $array_in['P_ACTUAL_FINISH_DT'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_COMPLETION_PERIOD', $array_in['P_COMPLETION_PERIOD'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_COMPLETION_STATUS', $array_in['P_COMPLETION_STATUS'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_NOTES', $array_in['P_NOTES'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_IN_PLAN', $array_in['P_IN_PLAN'], PDO::PARAM_NULL);
    $stmt->bindValue(':p_UPDATED_BY', $array_in['P_UPDATED_BY'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_TITLE', $array_in['P_TITLE'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_DURATION_TYPE', $array_in['P_DURATION_TYPE'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_MEM_ID', $array_in['P_MEM_ID'], PDO::PARAM_NULL);
    /*$stmt->bindValue(':P_ISCANCEL', $array_in['P_ISCANCEL'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_ISDELAY', $array_in['P_ISDELAY'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_CANCELED_REASON', $array_in['P_CANCELED_REASON'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_DELAIED_REASON', $array_in['P_DELAIED_REASON'], PDO::PARAM_NULL);*/
    $stmt->bindParam(':P_STATUS', $P_STATUS,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT, -1);
    $stmt->bindParam(':P_MSG', $P_MSG, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4000);
    $stmt->execute();
    
    $res=[
        'MSG' => $P_MSG, 
        'STATUS' => $P_STATUS, 
    ];
    return $res;
    }


    public static function teamSelect(){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin MEMBER_PKG.teamSelect(:out_cursor); end;");
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }

        oci_free_cursor($cursor);
        return ['data'=>$data];
    }
    
    
    public static function systemSelect(){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin TASKS_PKG.GET_SYSTEMS(:out_cursor); end;");
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }

        oci_free_cursor($cursor);
        return ['data'=>$data];
    }
   
    

    public static function GET_MEMBERS(){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin TASKS_PKG.GET_MEMBERS(:out_cursor); end;");
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }

        oci_free_cursor($cursor);
        return ['data'=>$data];
    }

    public static function giveMembers($P_TEAM_ID){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin TEAM_PKG.giveMembers(:P_TEAM_ID,:out_cursor); end;");
        $stmt->bindValue(':P_TEAM_ID', $P_TEAM_ID, PDO::PARAM_NULL);
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);
        return ['data'=>$data];
    }
    public static function sysName_mem($P_NUM_ID){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin TASKS_PKG.sysName_mem(:P_NUM_ID,:out_cursor); end;");
        $stmt->bindValue(':P_NUM_ID', $P_NUM_ID, PDO::PARAM_NULL);
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);
        return ['data'=>$data];
    }
    public static function update_reason($array_in){

         $stmt = DB::getPdo()->prepare("begin TASKS_PKG.update_reason(:P_ID,:P_ISCANCEL,:P_ISDELAY,:P_CANCELED_REASON,:P_DELAIED_REASON,:p_UPDATED_BY,:P_STATUS,:P_MSG); end;");
         $stmt->bindValue(':P_ID', $array_in['P_ID'], PDO::PARAM_NULL);
         $stmt->bindValue(':P_ISCANCEL', $array_in['P_ISCANCEL'], PDO::PARAM_NULL);
         $stmt->bindValue(':P_ISDELAY', $array_in['P_ISDELAY'], PDO::PARAM_NULL);
         $stmt->bindValue(':P_CANCELED_REASON', $array_in['P_CANCELED_REASON'], PDO::PARAM_NULL);
         $stmt->bindValue(':P_DELAIED_REASON', $array_in['P_DELAIED_REASON'], PDO::PARAM_NULL);
         $stmt->bindValue(':p_UPDATED_BY', $array_in['P_UPDATED_BY'], PDO::PARAM_NULL);
         $stmt->bindParam(':P_STATUS', $P_STATUS,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT, -1);
         $stmt->bindParam(':P_MSG', $P_MSG, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4000);
         $stmt->execute();
         
         $res=[
             'MSG' => $P_MSG, 
             'STATUS' => $P_STATUS, 
         ];
         return $res;
         }



         public static function get_all_members(){
            $cursor =null;
            $data = array();
            $stmt = DB::getPdo()->prepare("begin TASKS_PKG.get_all_members(:out_cursor); end;");
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