<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use PDO;


class Member extends MYModel
{
    use HasFactory;
    protected $fillable = [
        'ID',
        'ID_NUM',
        'MEM_NAME',
        'ROLE',
        'ACTIVE',
        'TEAM_ID',
        'CREATED_BY',
        'UPDATED_BY',
    ];

    public function __construct() {
        parent::__construct();
        $this->table_name = $this->table_names['MEMBERS'];
    }

    public static function LOAD_DATA($P_NAME,$P_STRAT,$P_LENGTH){
        $cursor =null;
        $data = array();
        $P_recordsTotal = 0;
        $stmt = DB::getPdo()->prepare("begin MEMBER_PKG.LOAD_DATA(:P_MEM_NAME,:P_STRAT, :P_LENGTH, :P_recordsTotal, :out_cursor); end;");
        $stmt->bindValue(':P_MEM_NAME', $P_NAME, PDO::PARAM_NULL);
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
        $stmt = DB::getPdo()->prepare("begin MEMBER_PKG.SAVE(:p_id_num,:p_created_by,:p_MEM_NAME,:p_active,:p_role,:P_TEAM_ID,:P_STATUS,:P_MSG); end;");
      /*  foreach ($array_in as $key => $value) {
            $stmt->bindValue(":$key",$value , PDO::PARAM_NULL);
        }*/
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


    // public static function Save_by_id($array_in){
    //     $stmt = DB::getPdo()->prepare("begin TEAM_PKG.Save_by_id(:p_id_num,:p_created_by,:p_MEM_NAME,:p_active,:p_role,:P_TEAM_ID,:P_STATUS,:P_MSG); end;");

    //     $stmt->bindValue(':P_ID_NUM', $array_in['P_ID_NUM'], PDO::PARAM_NULL);
    //     $stmt->bindValue(':P_CREATED_BY', $array_in['P_CREATED_BY'], PDO::PARAM_NULL);
    //     $stmt->bindValue(':P_MEM_NAME', $array_in['P_MEM_NAME'], PDO::PARAM_NULL);
    //     $stmt->bindValue(':P_ACTIVE', $array_in['P_ACTIVE'], PDO::PARAM_NULL);
    //     $stmt->bindValue(':P_ROLE', $array_in['P_ROLE'], PDO::PARAM_NULL);
    //     $stmt->bindValue(':P_TEAM_ID', $array_in['P_TEAM_ID'], PDO::PARAM_NULL);
    //     $stmt->bindParam(':P_STATUS', $P_STATUS,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT, -1);
    //     $stmt->bindParam(':P_MSG', $P_MSG, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4000);
    //         $stmt->execute();
    //         $res=[
    //             'MSG' => $P_MSG,
    //             'STATUS' => $P_STATUS,
    //         ];
    //         return $res;

    // }


    public static function Update_($array_in){
    $stmt = DB::getPdo()->prepare("begin MEMBER_PKG.update_member(:p_id,:p_id_num,:p_updated_by,:p_MEM_NAME,:p_active,:p_role,:P_TEAM_ID,:P_STATUS,:P_MSG); end;");
    $stmt->bindValue(':P_ID', $array_in['P_ID'], PDO::PARAM_NULL);
    $stmt->bindValue(':p_id_num', $array_in['P_ID_NUM'], PDO::PARAM_NULL);
    $stmt->bindValue(':p_UPDATED_BY', $array_in['P_UPDATED_BY'], PDO::PARAM_NULL);
    $stmt->bindValue(':p_MEM_NAME', $array_in['P_MEM_NAME'], PDO::PARAM_NULL);
    $stmt->bindValue(':p_active', $array_in['P_ACTIVE'], PDO::PARAM_NULL);
    $stmt->bindValue(':p_role', $array_in['P_ROLE'], PDO::PARAM_NULL);
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




public static function memberTeamSelect($P_member_id){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin MEMBER_PKG.memberTeamSelect(:P_member_id,:out_cursor); end;");
        $stmt->bindValue(':P_member_id', $array_in['P_member_id'], PDO::PARAM_NULL);
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);
        return ['data'=>$data];
    }



public static function giveMembers_by_ID($p_TEAM_ID){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin TEAMS_PKG.giveMembers_by_ID(:p_TEAM_ID,:out_cursor); end;");
    $stmt->bindValue(':p_TEAM_ID', $array_in['p_TEAM_ID'], PDO::PARAM_NULL);
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
        $data[] = $row;
    }
    oci_free_cursor($cursor);
    return ['data'=>$data];
}

public static function GET_BY_ID($P_ID_NUM){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin MEMBER_PKG.GET_BY_ID(:P_ID_NUM,:out_cursor); end;");
    $stmt->bindValue(':P_ID_NUM', $P_ID_NUM, PDO::PARAM_NULL);
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    $row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS);
    oci_free_cursor($cursor);
    return $row;
}
}
