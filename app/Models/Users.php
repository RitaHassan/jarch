<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use PDO;

class User extends MYModelTest
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ID',
        'ID_NO',
        'FIRST_NAME',
        'FATHER_NAME',
        'GRAND_FATHER_NAME',
        'FAMAILY_NAME',
        'TITLE',
        'MOBILE',
        'NEAREST_MOSQUE',
        'FOLLOWED_TO_TYPE',
        'FOLLOWED_TO',
        'WORK_NATURE',
        'WORK_AREA',
        'WORK_PLACE',
        'WORK_START_DT',
        'CARD_ID',
        'IMAGE_URL',
        'CREATED_BY',
        'UPDATED_BY'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function __construct() {
        parent::__construct();
        $this->table_name = $this->table_names['users'];
    }

    public static function GET_INFO($P_ID_NO){
        $cursor =null;
        $stmt = DB::getPdo()->prepare("begin USER_PKG.GET_INFO(:P_ID_NO, :out_cursor); end;");
        $stmt->bindValue(':P_ID_NO', $P_ID_NO, PDO::PARAM_NULL);
        $stmt->bindParam(':out_cursor', $cursor, PDO::PARAM_STMT, 0, \OCI_B_CURSOR);
        $stmt->execute();
        oci_execute($cursor, OCI_DEFAULT);
       $row = oci_fetch_object($cursor, OCI_ASSOC | OCI_RETURN_NULLS);
        oci_free_cursor($cursor);
        return $row;
    }

    public static function LOAD_DATA($P_ID_NO,$P_CARD_ID,$P_COMPANY_NUM,$P_COMPANY_NAME,$P_WORK_START_DT_FROM,$P_WORK_START_DT_TO,$P_STRAT,$P_LENGTH){
        $cursor =null;
        $data = array();
        $P_recordsTotal = 0;
        $stmt = DB::getPdo()->prepare("begin USER_PKG.LOAD_DATA(:P_ID_NO, :P_CARD_ID, :P_COMPANY_NUM, :P_COMPANY_NAME, :P_WORK_START_DT_FROM, :P_WORK_START_DT_TO, :P_STRAT, :P_LENGTH, :P_recordsTotal, :out_cursor); end;");
        $stmt->bindValue(':P_ID_NO', $P_ID_NO, PDO::PARAM_NULL);
        $stmt->bindValue(':P_CARD_ID', $P_CARD_ID, PDO::PARAM_NULL);
        $stmt->bindValue(':P_COMPANY_NUM', $P_COMPANY_NUM, PDO::PARAM_NULL);
        $stmt->bindValue(':P_COMPANY_NAME', $P_COMPANY_NAME, PDO::PARAM_NULL);
        $stmt->bindValue(':P_WORK_START_DT_FROM', $P_WORK_START_DT_FROM, PDO::PARAM_NULL);
        $stmt->bindValue(':P_WORK_START_DT_TO', $P_WORK_START_DT_TO, PDO::PARAM_NULL);
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
        $stmt = DB::getPdo()->prepare("begin USER_PKG.SAVE(:P_ID_NO,:P_TITLE,:P_MOBILE,:P_NEAREST_MOSQUE,:P_FOLLOWED_TO_TYPE,:P_FOLLOWED_TO,:P_WORK_NATURE,:P_WORK_AREA,:P_WORK_PLACE,:P_WORK_START_DT,:P_CARD_ID,:P_IMAGE_URL,:P_CREATED_BY); end;");
        foreach ($array_in as $key => $value) {
            $stmt->bindValue(":$key",$value , PDO::PARAM_NULL);
        }
        $stmt->execute();
    }

    public static function Update_($array_in){
        $stmt = DB::getPdo()->prepare("begin USER_PKG.UPDATE_USER(:P_ID,:P_ID_NO,:P_TITLE,:P_MOBILE,:P_NEAREST_MOSQUE,:P_FOLLOWED_TO_TYPE,:P_FOLLOWED_TO,:P_WORK_NATURE,:P_WORK_AREA,:P_WORK_PLACE,:P_WORK_START_DT,:P_CARD_ID,:P_IMAGE_URL,:P_UPDATED_BY); end;");
        foreach ($array_in as $key => $value) {
            $stmt->bindValue(":$key",$value , PDO::PARAM_NULL);
        }
        $stmt->execute();
    }

    public static function Block($id){
        $stmt = DB::getPdo()->prepare("begin USER_PKG.BLOCK_USER(:P_ID); end;");
        $stmt->bindValue(':P_ID', $id, PDO::PARAM_NULL);
        $stmt->execute();
    }
}
