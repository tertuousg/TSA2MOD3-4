<?php
namespace App\Controllers;
use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;
class Tasks extends BaseController
{
    public function index(){ return view('tasks/index',['title'=>'Task List','tasks'=>(new TaskModel())->where('is_archived',0)->orderBy('task_date','ASC')->findAll()]); }
    public function new(){ return view('tasks/form',['title'=>'New Task','task'=>null,'action'=>site_url('tasks')]); }
    public function create()
    {
        if(!$this->validate($this->rules())) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        (new TaskModel())->insert($this->taskData());
        return redirect()->to('/tasks')->with('success','Task created successfully.');
    }
    public function edit(int $id){ $task=$this->activeTask($id); return view('tasks/form',['title'=>'Edit Task','task'=>$task,'action'=>site_url('tasks/'.$id)]); }
    public function update(int $id)
    {
        $this->activeTask($id);
        if(!$this->validate($this->rules())) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        (new TaskModel())->update($id,$this->taskData());
        return redirect()->to('/tasks')->with('success','Task updated successfully.');
    }
    public function archive(int $id)
    {
        $this->activeTask($id);
        (new TaskModel())->update($id,['is_archived'=>1]);
        return redirect()->to('/tasks')->with('success','Task archived successfully.');
    }
    private function rules():array{return ['title'=>'required|max_length[150]','task_date'=>'required|valid_date[Y-m-d]','status'=>'required|in_list[pending,completed]'];}
    private function taskData():array{return ['title'=>trim((string)$this->request->getPost('title')),'task_date'=>$this->request->getPost('task_date'),'status'=>$this->request->getPost('status')];}
    private function activeTask(int $id):array{ $task=(new TaskModel())->where('id',$id)->where('is_archived',0)->first(); if(!$task) throw PageNotFoundException::forPageNotFound('Task not found.'); return $task; }
}
