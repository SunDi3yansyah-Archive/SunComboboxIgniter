<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_makul extends CI_Model
{
    function getSemester()
    {
        $result = $this->db->get('semester');
        if ($result->num_rows() > 0)
        {
            return $result->result_array();
        }
        else
        {
            return array();
        }
    }

    function getMakul($id_semester)
    {
        $this->db->where('id_semester',$id_semester);
        $result = $this->db->get('matakuliah');
        if ($result->num_rows() > 0)
        {
            return $result->result_array();
        }
        else
        {
            return array();
        }
    }
}