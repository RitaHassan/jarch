<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use PDO;

class Report extends MYModel
{
    use HasFactory;

    public static function TASK_RET(){
        $cursor =null;
        $data = array();
        // dd($P_ACTIVE);
        $P_recordsTotal = 0;
        //dd($P_NAME);
        $stmt = DB::getPdo()->prepare("begin REPORT_PKG.TASK_RET(:out_cursor); end;");
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);

        return ['data'=>$data];
    }

    public static function TEAM_RET(){
        $cursor =null;
        $data = array();
        // dd($P_ACTIVE);
        $P_recordsTotal = 0;
        //dd($P_NAME);
        $stmt = DB::getPdo()->prepare("begin REPORT_PKG.TEAM_RET(:out_cursor); end;");
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
        while($row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS)){
            $data[] = $row;
        }
        oci_free_cursor($cursor);

        return ['data'=>$data];
    }

    public static function SYSTEM_RET(){
        $cursor =null;
        $data = array();
        // dd($P_ACTIVE);
        $P_recordsTotal = 0;
        //dd($P_NAME);
        $stmt = DB::getPdo()->prepare("begin REPORT_PKG.SYSTEM_RET(:out_cursor); end;");
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
