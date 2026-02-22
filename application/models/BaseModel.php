<?php
class BaseModel extends CI_Model
{
    private $tableName;
    private $pk;
    public function __construct($tableName, $pk) {
        $this->tableName = $tableName;
        $this->pk = $pk;
    }
    public function getData()
    {
        return $this->db->get($this->tableName)->result();
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
        return $this->db->where($this->pk, $id)->delete($this->tableName);
    }
}
