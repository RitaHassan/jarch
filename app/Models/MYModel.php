<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

class MYModel extends Model
{
    use HasFactory;
    public $table_names = array(
        'teams' => 'teams',
        'MEMBERS' => 'MEMBERS',
        'SYSTEMS' => 'SYSTEMS',
        'tasks' => 'tasks',
        'SYSTEM_MEMBERS' => 'SYSTEM_MEMBERS'


    );
    public static $table_name;


    public  function find_by_id($id)
    {
        $cursor =null;
        $stmt = DB::getPdo()->prepare("begin COMMEN_PKG.FIND(:P_ID, :P_TABLE, :out_cursor); end;");
        $stmt->bindValue(':P_ID', $id, PDO::PARAM_NULL);
        $stmt->bindValue(':P_TABLE', $this->table_name, PDO::PARAM_NULL);
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        $row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS);
        oci_free_cursor($cursor);
        return $row;
    }

    public  function find_by_parameter($parme,$parme_id)
    {
        $cursor =null;
        $stmt = DB::getPdo()->prepare("begin COMMEN_PKG.FIND_BY_PARAM(:P_PARAMETER_VALUE, :P_TABLE, :P_PARAMETER, :out_cursor); end;");
        $stmt->bindValue(':P_PARAMETER_VALUE', $parme_id, PDO::PARAM_NULL);
        $stmt->bindValue(':P_TABLE', $this->table_name, PDO::PARAM_NULL);
        $stmt->bindValue(':P_PARAMETER', $parme, PDO::PARAM_NULL);
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        $row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS);
        oci_free_cursor($cursor);
        return $row;
    }

    public  function delete_by_id($id)
    {
        $stmt = DB::getPdo()->prepare("begin COMMEN_PKG.DELETE_BY_ID(:P_ID, :P_TABLE); end;");
        $stmt->bindValue(':P_ID', $id, PDO::PARAM_NULL);
        $stmt->bindValue(':P_TABLE', $this->table_name, PDO::PARAM_NULL);
        $stmt->execute();
    }

    public static function  get_perm($p_id_no)
    {
        $cursor =null;
        $stmt = DB::getPdo()->prepare("begin PERMISSION_PKG.GET_PERMISSIONS(:p_id_no, :out_cursor); end;");
        $stmt->bindValue(':p_id_no', $p_id_no, PDO::PARAM_NULL);
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);
        return $data;
    }

}
