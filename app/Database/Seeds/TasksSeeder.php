<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class TasksSeeder extends Seeder
{
    public function run()
    {
        $now=date('Y-m-d H:i:s'); $today=date('Y-m-d');
        $this->db->table('tasks')->insertBatch([['title'=>'Finish Web System activity','status'=>'pending','task_date'=>$today,'is_archived'=>0,'created_at'=>$now],['title'=>'Review CodeIgniter MVC','status'=>'completed','task_date'=>$today,'is_archived'=>0,'created_at'=>$now],['title'=>'Prepare project documentation','status'=>'pending','task_date'=>date('Y-m-d',strtotime('+1 day')),'is_archived'=>0,'created_at'=>$now]]);
        $this->db->table('users')->insert(['username'=>'student01','full_name'=>'Paul Terence Guadalupe','email'=>'student01@example.com','password'=>password_hash('password123',PASSWORD_DEFAULT),'created_at'=>$now]);
    }
}
