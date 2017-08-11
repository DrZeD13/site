<?php
include "application/models/adm/model_adm_tags.php";
class Controller_Adm_Tags extends Controller 
{

	function __construct() 
	{	
		$this->model = new Model_Adm_Tags();
		$this->view = new View();
		//��������� ���� �� ������ � ����� �������
		$this->model->Get_Access($this->model->table_name);
		// �������� �����
		$this->model->data = $this->model->GetFixed();
	}
	
	function action_index()	
	{		
		$this->view->generate_adm('template_view.php', 'tags.php', $this->model->data, $this->model->get_data());		
	}
	
	function action_add()
	{
		$this->view->generate_adm('template_view.php', 'tags_details.php', $this->model->data, $this->model->Add());		
	}
	
	function action_edit()
	{
		$this->view->generate_adm('template_view.php', 'tags_details.php', $this->model->data, $this->model->Edit());		
	}
	
	function action_edit_error($edit = "update")
	{
		$this->view->generate_adm('template_view.php', 'tags_details.php', $this->model->data, $this->model->Edit_error($edit));		
	}
	
	function action_activate()
    {
        $this->model->GetActivate();        
    }
	
	function action_del()
	{
		$this->model->Delete();
		$this->action_index();
	}
	
	function action_insert()
	{
		if ($this->model->Insert())
		{
			//�������� �� ������ ������
			$this->action_index();
		}
		else
		{
			$this->action_edit_error("insert");			
		}
	}
	
	function action_update()
	{
		if ($this->model->Update())
		{
			//�������� �� ������ ������
			$this->action_index();
		}
		else
		{
			//��� ������ ������ ���� ������ ��������� ��� ��� ������������ �����			
			$this->action_edit_error();			
		}
	}
	
	function action_up()	
	{		
		$this->model->Up();
		$this->action_index();			
	}
	
	function action_down()	
	{		
		$this->model->Down();
		$this->action_index();			
	}
	
}