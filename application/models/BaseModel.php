<?php
class BaseModel extends CI_Model
{
    public $tableName;
    private $pk;
    public function __construct($tableName, $pk) {
        $this->tableName = $tableName;
        $this->pk = $pk;
    }
    public function base()
    {
        return $this->db;
    }
    public function getData()
    {
        return $this->base()->get($this->tableName)->result();
    }
    public function insertData($data)
    {
        return $this->db->insert($this->tableName, $data);
    }
    public function updateData($data, $id)
    {
        return $this->db->where($this->pk, $id)->update($this->tableName, $data);
    }
    public function deleteData($id)
    {
        return $this->db->set("status",0)
                    ->where($this->pk, $id)
                    ->update($this->tableName);
    }
}
