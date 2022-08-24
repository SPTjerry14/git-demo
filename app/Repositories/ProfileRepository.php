<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ProfileRepository
 * @package App\Repositories
 * @author
 */
class ProfileRepository extends Repository
{
    public function __construct(Profile $profile)
    {
        $this->model = $profile;
    }

    public function hide($id)
    {
        return $this->safe(function () use ($id) {
            $profile = User::find($id)->profile;
            return $profile;
        });
    }

    public function updated(array $params, int $id): int
    {
        return $this->safe(function () use ($params, $id) {
            $profile = $this->model->where('user_id =', $id)->update($params);
            return $profile;
        });
    }

    public function list()
    {
        return DB::table('profiles')->get();
    }
}
