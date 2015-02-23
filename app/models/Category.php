<?php



class Category extends Eloquent{

	//use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';
	protected $guarded = array();

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function tasks(){
		return $this->belongsToMany('Task','categories_tasks');
	}

}
