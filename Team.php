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
        $stmt = DB::getPdo()->prepare("begin schedule_admin.TEAM_PKG.LOAD_DATA(:P_NAME,:P_STRAT, :P_LENGTH, :P_recordsTotal, :out_cursor); end;");
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
        $stmt = DB::getPdo()->prepare("begin schedule_admin.TEAM_PKG.SAVE(:p_name,:p_created_by); end;");
        
        foreach ($array_in as $key => $value) {
            $stmt->bindValue(":$key",$value , PDO::PARAM_NULL);
        }
        $stmt->execute();
    }



    public static function Update_($array_in){
        $stmt = DB::getPdo()->prepare("begin schedule_admin.TEAM_PKG.update_team(:P_ID,:p_name,:p_updated_by); end;");
        foreach ($array_in as $key => $value) {
            $stmt->bindValue(":$key",$value , PDO::PARAM_NULL);
        }
        $stmt->execute();
    }

    public static function sys_name(){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin schedule_admin.TEAM_PKG.sys_name(:P_TEAM_ID,:out_cursor); end;");
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
        $stmt = DB::getPdo()->prepare("begin schedule_admin.TEAM_PKG.giveMembers(:P_TEAM_ID,:out_cursor); end;");
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
    

}
