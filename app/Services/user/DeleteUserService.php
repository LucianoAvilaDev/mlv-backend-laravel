<?php

namespace App\Services\user;

use App\Models\User;
use Error;
use Illuminate\Support\Facades\DB;

class DeleteUserService
{
    public static function run(User $user)
    {
        try {
            DB::beginTransaction();

            $deletedUser = $user->delete();

            if ($deletedUser) {
                DB::commit();
                return true;
            }

            throw new \Exception();
        } catch (\Exception $e) {
            DB::rollback();

            throw new Error("Erro ao tentar excluir o registro");
        }
    }
}


