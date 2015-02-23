<?php



class Task extends Eloquent{

	//use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';
	protected $guarded = array();

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function categories(){
		return $this->belongsToMany('Category','categories_tasks');
	}

	public function tasks(){
		return $this->belongsTo('User','user_id');
	}

}
