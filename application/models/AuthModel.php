<?php
class AuthModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function check_email_duplication($email)
    {
        $this->db->where("email", $email);
        $query    =    $this->db->get('fb_login_details');
        return $query->result();
    }
    public function insert_registration_details($where_arr='')
	{
		$query=$this->db->insert('fb_register_details',$where_arr);
		return $this->db->insert_id();
	}
    public function insert_employer_login($logindet){
		$ressuc = $this->db->insert('fb_login_details',$logindet);
		return $ressuc;
	}
    public function update_activation_details($urlkey='',$_act_data='')
	{
		$this->db->where(array('activation_key'=>$urlkey));
		$query=$this->db->update('fb_login_details',$_act_data);
		return $query;
	}
    function get_activation_details($where_array='')
	{
		$this->db->where(array('activation_key'=>$where_array));
		$query = $this->db->get('fb_login_details');
		return $query->result();
	}
	function get_user_by_email($where_array='')
	{
		$this->db->where($where_array);
		$query = $this->db->get('fb_login_details');
		return $query->result();
	}

	public function get_registration_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('fb_register_details');
		return $query->result_array();
	}
}
