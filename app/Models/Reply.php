<?php

namespace App\Models;

use CodeIgniter\Model;

class Reply extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'replies';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $insertID         = 0;
  protected $returnType       = 'object';
  protected $useSoftDeletes   = false;
  protected $protectFields    = true;
  protected $allowedFields    = [];

  // Dates
  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  // Validation
  protected $validationRules      = [];
  protected $validationMessages   = [];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;

  // Callbacks
  protected $allowCallbacks = true;
  protected $beforeInsert   = [];
  protected $afterInsert    = [];
  protected $beforeUpdate   = [];
  protected $afterUpdate    = [];
  protected $beforeFind     = [];
  protected $afterFind      = [];
  protected $beforeDelete   = [];
  protected $afterDelete    = [];


  public function replies(array $commentsIds)
  {
    return $this->select(
      'replies.id,replies.comment,users.firstName as userFirstName, users.lastName as userLastName, users.image as avatar,replies.created_at,replies.comment_id'
    )->join(
      'users',
      'users.id = replies.user_id'
    )->whereIn('comment_id', $commentsIds)->findAll();
  }
}
