<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use PDO;


class Transaction extends MYModel
{
    use HasFactory;
    protected $fillable = [
        'ID',
        'USER_BY',
        'TABLE_ID',
        'RECORD_ID',
        'ACTION_ID',
        'SCREEN_ID',
        'DESCRIPTION',
        'IP',
        'DEVICE',
        'TRANS_DATE'

    ];

    public function __construct() {
        parent::__construct();
        $this->table_name = $this->table_names['TRANSACTION'];
    }

    public static function Save_($array_in){
        $stmt = DB::getPdo()->prepare("begin TRANSACTION_PKG.SAVE(:P_USER_BY,:P_TABLE_ID ,:p_RECORD_ID,
        :p_ACTION_ID,:p_SCREEN_ID,:P_DESCRIPTION,:P_IP,:P_DEVICE); end;");
      /*  foreach ($array_in as $key => $value) {
            $stmt->bindValue(":$key",$value , PDO::PARAM_NULL);
        }*/
       // dd($array_in['USER_BY']);
        $stmt->bindValue(':P_USER_BY', $array_in['USER_BY'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_TABLE_ID', $array_in['TABLE_ID'], PDO::PARAM_NULL);
        $stmt->bindValue(':p_RECORD_ID', $array_in['RECORD_ID'], PDO::PARAM_NULL);
        $stmt->bindValue(':p_ACTION_ID', $array_in['ACTION_ID'], PDO::PARAM_NULL);
        $stmt->bindValue(':p_SCREEN_ID', $array_in['SCREEN_ID'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_DESCRIPTION', $array_in['DESCRIPTION'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_IP', $array_in['IP'], PDO::PARAM_NULL);
        $stmt->bindValue(':P_DEVICE', $array_in['DEVICE'], PDO::PARAM_NULL);
        $stmt->execute();


        return [];

    }

public static function GET_BY_ID($P_RECORD_ID){
    $cursor =null;
    $data = array();
    $stmt = DB::getPdo()->prepare("begin TRANSACTION_PKG.GET_LOG_BY_ID(:P_RECORD_ID,:out_cursor); end;");
    $stmt->bindValue(':P_RECORD_ID', $P_RECORD_ID, PDO::PARAM_NULL);
    $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
    $stmt->execute();
    oci_execute($cursor, OCI_DEFAULT);
    while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
        $data[] = $row;
    }
    oci_free_cursor($cursor);
    return ['data'=>$data];
    /*oci_execute($cursor, OCI_DEFAULT);
    $row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS);
    oci_free_cursor($cursor);
    return $row 'data'=>$data;*/
}

}
