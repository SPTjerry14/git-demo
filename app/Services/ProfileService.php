<?php

namespace App\Services;

use App\Repositories\ProfileRepository;

/**
 * Class ProfileService
 * @package App\Services
 * @author
 */
class ProfileService extends Services
{
    /**
     * @var \App\Repositories\ProfileRepository
     */
    protected $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function store(array $params): \App\Models\Profile
    {
        return $this->profileRepository->store($params);
    }

    public function show(int $id): \App\Models\Profile
    {
        return $this->profileRepository->hide($id);
    }

    public function update(array $params, int $id): int
    {
        return $this->profileRepository->update($params, $id, 'user_id');
    }

    public function updated(array $params, int $id): int
    {
        return $this->profileRepository->updated($params, $id);
    }

    public function list()
    {
        return $this->profileRepository->list();
    }
}
