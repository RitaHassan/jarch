<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use PDO;

class SystemMembers extends MYModel
{
    use HasFactory;
    protected $fillable = [
        'ID',
        'SYSTEM_ID',
        'MEMBER_ID',
        'CREATED_BY',
        'UPDATED_BY',
    ];

    public function __construct() {
        parent::__construct();
        $this->table_name = $this->table_names['SYSTEM_MEMBERS'];
    }

    public static function Save_($array_in){
        $stmt = DB::getPdo()->prepare("begin SYSTEM_MEMBERS_PKG.SAVE(:P_SYSTEM_ID,:P_MEMBER_ID,:p_created_by,:P_STATUS,:P_MSG); end;");
        $stmt->bindValue(':P_SYSTEM_ID', $array_in['P_SYSTEM_ID'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_MEMBER_ID', $array_in['P_MEMBER_ID'], PDO::PARAM_NULL);
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
    $stmt = DB::getPdo()->prepare("begin SYSTEM_MEMBERS_PKG.update_system_members(:P_ID,:P_SYSTEM_ID,:P_MEMBER_ID,:p_updated_by,:P_STATUS,:P_MSG); end;");
    $stmt->bindValue(':P_ID', $array_in['P_ID'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_SYSTEM_ID', $array_in['P_SYSTEM_ID'], PDO::PARAM_NULL);
    $stmt->bindValue(':P_MEMBER_ID', $array_in['P_MEMBER_ID'], PDO::PARAM_NULL);
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


    public static function get_systems_by_id($P_SYSTEM_ID){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin SYSTEM_MEMBERS_PKG.get_systems_by_id(:P_SYSTEM_ID,:out_cursor); end;");
        $stmt->bindValue(':P_SYSTEM_ID', $P_SYSTEM_ID, PDO::PARAM_NULL);
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);
        return ['data'=>$data];
    }

    public static function get_systems_by_user_id($p_user_id){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin SYSTEM_MEMBERS_PKG.get_systems_by_user_id(:p_user_id,:out_cursor); end;");
        $stmt->bindValue(':p_user_id', $p_user_id, PDO::PARAM_NULL);
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

