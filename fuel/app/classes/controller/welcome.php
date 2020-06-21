<?php

class Controller_Welcome extends Controller_rest
{

	public function get_index()
	{
		return Response::forge(view::forge('welcome/index.html'));
	}

	public function get_info()
	{
		$data = model_todo::find('all');
		$info = Format::forge($data)->to_array();

        return ($info);
	}

	public function post_add()
	{
		$new = model_todo::forge();

		if(isset($_POST['fieldinput']) && !empty($_POST['fieldinput']))
		{
			$new->inputfield = $_POST['fieldinput'];
		}
		if(isset($_POST['status']) && !empty($_POST['status']))
		{
			$new->status = $_POST['status'];
		}
		$new->save();

		$json = array(

			"object" => $new,

		);

		return ($json);
	}

	public function post_update($id)
	{
		$data = model_todo::find($id);

		if($data['status']==1)
		{
			$data['status']=2;
		}
		else
		{
			$data['status']=1;
		}

		$data->save();

		$json = array(
			"inputfield" => $data['inputfield'],
			"status" => $data['status'],

		);

		return ($json);
	}



	public function post_delete($id)
	{
		var_dump($id);

		$data = model_todo::find($id);

		var_dump($data);

		$data->delete();

		$status = array(
			"status" => true,
		);

		return ($status);
	}

}
