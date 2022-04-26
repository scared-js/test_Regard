<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    static public function test(){
        $query = static::query();
        $query->limit(50);
        $query->join('manager','manager.id','order.manager_id');
        $query->selectRaw('"order".*');
        $query->selectRaw('(manager."firstName" || manager."lastName") as fullName');
        return $query->get();
    }
}
