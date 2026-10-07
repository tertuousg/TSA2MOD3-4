<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'status',
        'task_date',
        'created_at',
        'is_archived'
    ];

    protected $beforeInsert = ['stampCreatedAt'];

    protected function stampCreatedAt(array $data): array
    {
        $data['data']['created_at'] ??= date('Y-m-d H:i:s');
        return $data;
    }
}
