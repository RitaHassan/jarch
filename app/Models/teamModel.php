<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use PDO;

class teamModel extends MYModelTest
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'TEAM_SEQ',
        'TEAM_NAME',
        'ADD_BY',
        'UPDATE_BY'
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
        $this->table_name = $this->table_names['TEAM_NAME_TB'];
    }

    public static function Save_($array_in){
        $stmt = DB::getPdo()->prepare("begin TEAM_NAME_PKG.SaveTeamName(:P_TEAM_NAME,:P_ADD_BY); end;");
        foreach ($array_in as $key => $value) {
            $stmt->bindValue(":$key",$value , PDO::PARAM_NULL);
        }
        $stmt->execute();
    }



    
}
