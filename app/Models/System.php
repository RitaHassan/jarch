<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use PDO;


class System extends MYModel
{
    use HasFactory;
    protected $fillable = [
        'ID',
        'TEAM_ID',
        'SYSTEM_NUM',
        'SYSTEM_NAME',
        'ACTIVE',
        'CREATED_BY',
        'UPDATED_BY',
    ];

    public function __construct() {
        parent::__construct();
        $this->table_name = $this->table_names['system_team'];
    }

    public static function LOAD_DATA($P_NAME,$P_STRAT,$P_LENGTH){
        $cursor =null;
        $data = array();
        $P_recordsTotal = 0;
        $stmt = DB::getPdo()->prepare("begin SYSTEM_PKG.LOAD_DATA(:P_SYSTEM_NAME,:P_STRAT, :P_LENGTH, :P_recordsTotal, :out_cursor); end;");
        $stmt->bindValue(':P_SYSTEM_NAME', $P_NAME, PDO::PARAM_NULL);
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
        $stmt = DB::getPdo()->prepare("begin SYSTEM_PKG.SAVE(:P_TEAM_ID,:P_SYSTEM_NUM,:P_SYSTEM_NAME,:p_active,:p_created_by); end;");
        foreach ($array_in as $key => $value) {
            $stmt->bindValue(":$key",$value , PDO::PARAM_NULL);
        }
        $stmt->execute();
    }


    public static function Update_($array_in){
    $stmt = DB::getPdo()->prepare("begin SYSTEM_PKG.update_system(:p_id,:P_TEAM_ID,:P_SYSTEM_NUM,:P_SYSTEM_NAME,:p_active,:P_updated_by); end;");
    $stmt->bindValue(':P_ID', $array_in['P_ID'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_TEAM_ID', $array_in['P_TEAM_ID'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_SYSTEM_NUM', $array_in['P_SYSTEM_NUM'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_SYSTEM_NAME', $array_in['P_SYSTEM_NAME'], PDO::PARAM_NULL);
    $stmt->bindValue(':p_active', $array_in['P_ACTIVE'], PDO::PARAM_NULL);
    $stmt->bindValue(':p_UPDATED_BY', $array_in['P_UPDATED_BY'], PDO::PARAM_NULL);
        $stmt->execute();
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
   

   
}