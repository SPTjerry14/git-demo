<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 * @package App\Repositories
 * @author
 */

class UserRepository extends Repository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function list()
    {
        $users = DB::table('users')->paginate();
        return $users;
    }

    public function role()
    {
        $role = DB::table('roles')->get();
        return $role;
    }

    public function roleUser($id)
    {
        $role = User::find($id)->roles;
        return $role;
    }
}
