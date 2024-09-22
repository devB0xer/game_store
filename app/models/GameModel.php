<?php

namespace App\Models;

use App\Core\Model;

class GameModel extends Model
{
	public function get_data()
	{	
		return array(
			array(
                'title' => 'someTitle',
                'cost' => '100',
			),
			array(
				'title' => 'someTitle1',
                'cost' => '101',
			),
		);
	}
}