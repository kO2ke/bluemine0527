<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function threads()
    {
       return $this->hasMany("App\Thread");
    }
    public function posts(){
       return  $this->hasMany("App/Posts");
    }

    //
    private function getProfileImageSaveDir()
    {
        return public_path() . "/img/profile/";
    }

    private function getProfileImageOpenDir()
    {
        return "./img/profile/";
    }
    
    //アイコン画像のファイル名作成
    private function makeIconName() {
        $imageName = "icon_" . $this->id . ".jpg";
        return $imageName;
    }

    private function makeIconMiniName() {
        $imageName = "iconMini_" . $this->id . ".jpg";
        return $imageName;
    }

    //保存先を出力
    public function makeIconPath() {
        return $this->getProfileImageSaveDir() . $this->makeIconName();
    }

    public function makeIconMiniPath() {
        return $this->getProfileImageSaveDir() . $this->makeIconMiniName();
    }

    //view参照用のパスを出力
    public function iconPath()
    {
        if( file_exists($this->makeIconPath())){
            return asset($this->getProfileImageOpenDir() . $this->makeIconName());
        }else{
            return asset($this->getProfileImageOpenDir() . "icon_default.jpg");
        }
    }
    public function iconMiniPath()
    {
        if( file_exists($this->makeIconMiniPath()))
        {
            return asset($this-> getProfileImageOpenDir() . $this->makeIconMiniName());
        }else{
            return asset($this-> getProfileImageOpenDir() . "iconMini_default.jpg");
        }
    }

    public static function cast($obj): User{
        return $obj;
    }
}
