<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupsHasUsers extends Model
{
	protected $fillable = ['groups_idgroups','users_idusers'];
}
