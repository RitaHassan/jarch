<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;
class Tenant extends Model
{
    use HasFactory;


    public static function get(){
        $cursor =null;
        $data = array();
        $stmt = DB::getPdo()->prepare("begin TENANT_PKG.TENANT(:out_cursor); end;");
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        $row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS);
        oci_free_cursor($cursor);
        return $row;
    }
}
