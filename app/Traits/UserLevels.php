<?php 


namespace app\Traits;

use Auth;
use App\User;

trait UserLevels 
{

    /**
     * If the current user is super admin then allow
     *
     * @param  User  $user     
     * @return bool
     */
    public function ifSuperAdmin(User $user) {
        return $user->level_id == 5;
    }    

    /**
     * If the current user is admin or higher then allow
     *
     * @param  User  $user     
     * @return bool
     */
    public function ifAdmin(User $user) {
        return $user->level_id >= 4;
    }
    
    /**
     * If the current user is moderator or higher then allow
     *
     * @param  User  $user     
     * @return bool
     */
    public function ifModerator(User $user) {
        return $user->level_id >= 3;
    }
    
    /**
     * If the current user is editor or higher then allow
     *
     * @param  User  $user
     * @param  Book  $book
     * @return bool
     */
    public function ifEditor(User $user) {
        return $user->level_id >= 2;
    }   
    
    /**
     * If the current user is a user then allow
     *
     * @param  User  $user
     * @param  Book  $book
     * @return bool
     */
    public function ifUser(User $user) {
        return $user->level_id == 1;
    }    


}