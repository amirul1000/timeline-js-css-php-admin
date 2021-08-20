<?php

/**
 * Author: Amirul Momenin
 * Desc:Timeline Model
 */
class Timeline_model extends CI_Model
{
	protected $timeline = 'timeline';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get timeline by id
	 *@param $id - primary key to get record
	 *
     */
    function get_timeline($id){
        $result = $this->db->get_where('timeline',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('timeline');
			foreach ($fields as $field)
			{
			   $result[$field] = ''; 	  
			}
		}
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all timeline
	 *
     */
    function get_all_timeline(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('timeline')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit timeline
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_timeline($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('timeline')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count timeline rows
	 *
     */
	function get_count_timeline(){
       $result = $this->db->from("timeline")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-timeline
	 *
     */
    function get_all_users_timeline(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('timeline')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-timeline
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_timeline($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('timeline')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-timeline rows
	 *
     */
	function get_count_users_timeline(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("timeline")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new timeline
	 *@param $params - data set to add record
	 *
     */
    function add_timeline($params){
        $this->db->insert('timeline',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update timeline
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_timeline($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('timeline',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete timeline
	 *@param $id - primary key to delete record
	 *
     */
    function delete_timeline($id){
        $status = $this->db->delete('timeline',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
