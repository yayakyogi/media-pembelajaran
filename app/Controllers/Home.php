<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MateriModel;
class Home extends BaseController
{
	public function index()
	{
		return view('index');
	}
	public function modul()
	{
		$model = new MateriModel();
		$data['post'] = $model->getMateri()->getResult();
		echo view ('modul',$data);
	}
	//--------------------------------------------------------------------

}
