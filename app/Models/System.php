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
        $this->table_name = $this->table_names['SYSTEMS'];
    }

    public static function LOAD_DATA($P_SYSTEM_NAME,$P_STRAT,$P_LENGTH ,$P_ACTIVE){
        $cursor =null;
        $data = array();
        // dd($P_ACTIVE);
        $P_recordsTotal = 0;
        //dd($P_NAME);
        $stmt = DB::getPdo()->prepare("begin SYSTEM_PKG.LOAD_DATA(:P_SYSTEM_NAME,:P_STRAT, :P_LENGTH, :P_recordsTotal,:P_ACTIVE, :out_cursor); end;");
        $stmt->bindValue(':P_SYSTEM_NAME', $P_SYSTEM_NAME, PDO::PARAM_NULL);
        $stmt->bindValue(':P_STRAT', $P_STRAT, PDO::PARAM_NULL);
        $stmt->bindValue(':P_LENGTH', $P_LENGTH, PDO::PARAM_NULL);
        $stmt->bindParam(':P_recordsTotal', $P_recordsTotal, PDO::PARAM_INT);
        $stmt->bindValue(':P_ACTIVE', $P_ACTIVE, PDO::PARAM_NULL);
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);
       // dd($data);
        return ['data'=>$data,'recordsFiltered'=>$P_recordsTotal,'recordsTotal'=>$P_recordsTotal];
    }


    public static function Save_($array_in){
        $stmt = DB::getPdo()->prepare("begin SYSTEM_PKG.SAVE(:P_TEAM_ID,:P_SYSTEM_NUM,:P_SYSTEM_NAME,:P_ACTIVE,:P_CREATED_BY,:P_STATUS,:P_MSG); end;");
        $stmt->bindValue(':P_TEAM_ID', $array_in['P_TEAM_ID'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_SYSTEM_NUM', $array_in['P_SYSTEM_NUM'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_SYSTEM_NAME', $array_in['P_SYSTEM_NAME'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_ACTIVE', $array_in['P_ACTIVE'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_CREATED_BY', $array_in['P_CREATED_BY'], PDO::PARAM_NULL);
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

    public static function TOGGEL($id){
        $stmt = DB::getPdo()->prepare("begin SYSTEM_PKG.TOGGEL(:p_id); end;");
        $stmt->bindValue(':P_ID', $id, PDO::PARAM_NULL);
        $stmt->execute();
    }


    public static function ALL_DATA($P_STRAT,$P_LENGTH){
        $cursor =null;
        $data = array();
        // dd($P_ACTIVE);
        $P_recordsTotal = 0;
        //dd($P_NAME);
        $stmt = DB::getPdo()->prepare("begin SYSTEM_PKG.ALL_DATA(:P_STRAT, :P_LENGTH, :P_recordsTotal,:out_cursor); end;");
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
       // dd($data);
        return ['data'=>$data,'recordsFiltered'=>$P_recordsTotal,'recordsTotal'=>$P_recordsTotal];
    }



}
