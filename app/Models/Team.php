<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use PDO;


class Team extends MYModel
{
    use HasFactory;
    
    protected $fillable = [
        'ID',
        'NAME',
        'CREATED_BY',
        'UPDATED_BY',
    ];

    public function __construct() {
        parent::__construct();
        $this->table_name = $this->table_names['teams'];
    }

    public static function LOAD_DATA($P_NAME,$P_STRAT,$P_LENGTH){
        $cursor =null;
        $data = array();
        $P_recordsTotal = 0;
        $stmt = DB::getPdo()->prepare("begin TEAM_PKG.LOAD_DATA(:P_NAME,:P_STRAT, :P_LENGTH, :P_recordsTotal, :out_cursor); end;");
        $stmt->bindValue(':P_NAME', $P_NAME, PDO::PARAM_NULL);
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
        $stmt = DB::getPdo()->prepare("begin TEAM_PKG.SAVE(:p_name,:p_created_by); end;");
        
        foreach ($array_in as $key => $value) {
            $stmt->bindValue(":$key",$value , PDO::PARAM_NULL);
        }
        $stmt->execute();
    }



    public static function Update_($array_in){
        $stmt = DB::getPdo()->prepare("begin TEAM_PKG.update_team(:P_ID,:p_name,:p_updated_by); end;");
        foreach ($array_in as $key => $value) {
            $stmt->bindValue(":$key",$value , PDO::PARAM_NULL);
        }
        $stmt->execute();
    }

    public static function sys_name(){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin TEAM_PKG.sys_name(:P_TEAM_ID,:out_cursor); end;");
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


    public static function give_data($P_NAME,$P_STRAT,$P_LENGTH){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin TEAM_PKG.give_data(:P_NAME,:P_STRAT, :P_LENGTH, :P_recordsTotal, :out_cursor); end;");
      // $stmt->bindValue(':P_TEAM_ID',$P_TEAM_ID, PDO::PARAM_NULL);
        $stmt->bindValue(':P_NAME',$P_NAME, PDO::PARAM_NULL);
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
        return ['data'=>$data];
    }

    public static function Save_by_id($array_in){
        $stmt = DB::getPdo()->prepare("begin TEAM_PKG.Save_by_id(:P_ID_NUM,:P_CREATED_BY,:P_MEM_NAME,:P_ACTIVE,:P_ROLE,:P_TEAM_ID,:P_STATUS,:P_MSG); end;");
        
        $stmt->bindValue(':P_ID_NUM', $array_in['P_ID_NUM'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_CREATED_BY', $array_in['P_CREATED_BY'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_MEM_NAME', $array_in['P_MEM_NAME'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_ACTIVE', $array_in['P_ACTIVE'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_ROLE', $array_in['P_ROLE'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_TEAM_ID', $array_in['P_TEAM_ID'], PDO::PARAM_NULL);
        $stmt->bindParam(':P_STATUS', $P_STATUS,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT, -1);
        $stmt->bindParam(':P_MSG', $P_MSG, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4000);
            $stmt->execute();    
            $res=[
                'MSG' => $P_MSG, 
                'STATUS' => $P_STATUS, 
            ];
            return $res;
            
    }
    

}
