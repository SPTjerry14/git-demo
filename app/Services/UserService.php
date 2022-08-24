<?php

namespace App\Services;

use App\Repositories\ProfileRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @package App\Services
 * @author
 */
class UserService extends Services
{
    /**
     * @var \APP\Repositories\UserRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list()
    {
        return $this->userRepository->list();
    }

    public function store(array $params): \App\Models\User
    {
        $params['password'] = Hash::make($params['password']);
        return $this->userRepository->store($params);
    }

    public function show(int $id): \App\Models\User
    {
        return $this->userRepository->show($id);
    }

    public function update(array $params, int $id): int
    {
        // dd($this->userRepository);
        return $this->userRepository->update($params, $id);
    }

    public function destroy($id)
    {
        // dd($id);
        return $this->userRepository->destroy($id);
    }

    public function role()
    {
        return $this->userRepository->role();
    }

    public function roleUser($id)
    {
        return $this->userRepository->roleUser($id);
    }
}
