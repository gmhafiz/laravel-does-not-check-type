<?php

namespace App\Http\Trait;

use App\Class\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

trait Type
{
    private function testFromTrait()
    {
        $user_ids = [1,2];
        $users = User::whereIn('id', $user_ids)->get();
        $user_ids = $users->map(function ($x) { return $x->id; }); // oops, $user_ids is now a type of Collection.

        // both phpstorm and phpstan can't find this bug.
        (new Group())->accept_on_array($user_ids);
    }

    private function CollectionDB()
    {
        $user_ids = new Collection([1,2]);

        // phpstorm offers to cast $user_ids to array but phpstan can't find this bug.
        (new Group())->accept_on_array($user_ids);
    }


    private function CollectionSupport()
    {
        $user_ids = new \Illuminate\Support\Collection([1,2]);

        // phpstorm offers to cast $user_ids to array but phpstan can't find this bug.
        (new Group())->accept_on_array($user_ids);
    }
}
