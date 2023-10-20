<?php
/**
 * 重置管理员 1 的邮箱
 * @author Prk
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ResetAdminEmail extends Command {

    protected $signature = 'reset:email {email} {user_id?}';
    protected $description = 'Reset the password of user' . PHP_EOL . 'Usage: php artisan reset:email user@email.com [1]';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        $email = $this->argument('email');
        if (!$email) {
            $this->warn('please input the user\'s email' . PHP_EOL);
            return false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->warn('Wrong EMail!' . PHP_EOL);
            return false;
        }

        $userID = $this->argument('user_id');
        if (isset($userID)) {
            $userID = intval($this->argument('user_id'));
            if (0 >= $userID) {
                $this->warn('Wrong user\'s ID' . PHP_EOL);
                return false;
            }
        } else $userID = 1;

        $user = \App\User::find($userID);
        if (!$user) {
            $this->warn('can\'t find the user: ' . $userID . PHP_EOL);
            return false;
        }

        $user->email = $email;
        $user->save();
        $this->info('the email of ' . $userID . ' has been set to ' . $email . PHP_EOL);
        return true;
    }
}
