<?php
class Modelagentagent extends Model {

	public function addAgent($data){

		$sql="INSERT INTO " . DB_PREFIX . "property_agent set agentname='".$this->db->escape($data['agentname'])."',image='".$this->db->escape($data['image'])."',

		description='".$this->db->escape($data['description'])."',positions='".$this->db->escape($data['positions'])."',email='".$this->db->escape($data['email'])."',

		facebook='".$this->db->escape($data['facebook'])."',twitter='".$this->db->escape($data['twitter'])."',googleplus='".$this->db->escape($data['googleplus'])."',

		pinterest='".$this->db->escape($data['pinterest'])."',instagram='".$this->db->escape($data['instagram'])."',contact='".$this->db->escape($data['contact'])."',plans_id='".(int) $data['plans_id']."',country_id='".(int) $data['country_id']."',pincode='".$this->db->escape($data['pincode'])."',	zone_id='".(int) $data['zone_id']."',

		address='".$this->db->escape($data['address'])."',salt = '" . $this->db->escape($salt = token(9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt .sha1($data['password'])))) ."',

		city='".$this->db->escape($data['city'])."',approved=1,status=1,date_added=now()";

		$this->db->query($sql);

		$property_agent_id = $this->db->getLastId();

		$sql="INSERT INTO " . DB_PREFIX . "agent_member SET property_agent_id = '" .(int) $property_agent_id . "',plans_id='".(int) $data['plans_id']."',date_added=now()";

		$this->db->query($sql);

		

	}

	public  function getMailInfo($type){
		$query=$this->db->query("select * from " . DB_PREFIX . "mail vm LEFT JOIN " . DB_PREFIX . "mail_language vml on(vm.mail_id=vml.mail_id) where vm.type='" .$type."'and vml.language_id = '" . (int)$this->config->get('config_language_id') . "'");
		
		return $query->row;
		
	}

	public function getplasid($property_agent_id){

		$sql="select * from " . DB_PREFIX . "agent_member where	property_agent_id='".$property_agent_id."' ";	

		$query=$this->db->query($sql);

		return $query->row;

	

	}



	public function getShowAgent($property_agent_id){

		$sql="select * from " . DB_PREFIX . "property_agent where property_agent_id='".$this->agent->getId()."'";

		$query=$this->db->query($sql);

		return $query->row;

	}

	public function getouragent($property_agent_id){

		$sql="select * from " . DB_PREFIX . "property_agent where property_agent_id='".$property_agent_id."'";

			$query=$this->db->query($sql);

			return $query->row;

	}

	

	public function getouragenticon($property_agent_id){

		$sql="select * from " . DB_PREFIX . "property_agent where property_agent_id='".$property_agent_id."'";

			$query=$this->db->query($sql);

			return $query->rows;

	}

	

	public function editCode($email, $code) {

		$this->db->query("UPDATE `" . DB_PREFIX . "property_agent` SET code = '" . $this->db->escape($code) . "' WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

	}

	

	

	public function editPassword($email, $password) {

		$this->db->query("UPDATE " . DB_PREFIX . "property_agent SET salt = '" . $this->db->escape($salt = token(9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($password)))) . "', code = '' WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

	}

	

	

	public function getAgentByEmail($email) {

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "property_agent WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");



		return $query->row;

	}

	public function getTotalAgentByEmail($email) {

		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "property_agent WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");



		return $query->row['total'];

	}

	

	

	

	

	public function getAgent($property_agent_id){

		$sql="select * from " . DB_PREFIX . "property_agent where 

		property_agent_id='".$property_agent_id."'";

		$query=$this->db->query($sql);

		return $query->row;

	}

	public function editAgent($property_agent_id,$data){

		$sql="update " . DB_PREFIX . "property_agent set agentname='".$this->db->escape($data['agentname'])."',	image='".$this->db->escape($data['image'])."',description='".$this->db->escape($data['description'])."',facebook='".$this->db->escape($data['facebook'])."',twitter='".$this->db->escape($data['twitter'])."',googleplus='".$this->db->escape($data['googleplus'])."',

		pinterest='".$this->db->escape($data['pinterest'])."',instagram='".$this->db->escape($data['instagram'])."',positions='".$this->db->escape($data['positions'])."',

		contact='".$this->db->escape($data['contact'])."',country_id='".(int) $data['country_id']."',pincode='".$this->db->escape($data['pincode'])."',	zone_id='".(int) $data['zone_id']."',

		address='".$this->db->escape($data['address'])."',salt = '" . $this->db->escape($salt = token(9)) ."',

		city='".$this->db->escape($data['city'])."',date_modified=now() where property_agent_id='".$this->agent->getId()."'";

		$query = $this->db->query($sql);

	}

	public function getAgents($data){

		$sql="select * from " . DB_PREFIX . "property_agent where property_agent_id<>0  and approved=1";

		if(isset($data['filter_agentname'])){

			$sql .=" and agentname like '".$this->db->escape($data['filter_agentname'])."%'";

		}

		if(isset($data['filter_status'])){

			$sql .=" and status like '".$this->db->escape($data['filter_status'])."%'";

		}

		$sort_data = array(

			'agentname',

			'status'

		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)){

			$sql .= " ORDER BY " . $data['sort'];

		}else{

			$sql .= " ORDER BY agentname";

		}if (isset($data['order']) && ($data['order'] == 'DESC')){

			$sql .= " DESC";

		}else {

			$sql .= " ASC";

		}

		if(isset($data['start']) || isset($data['limit'])) {

			if ($data['start'] < 0) 

			{

				$data['start'] = 0;

			}

			if ($data['limit'] < 1) 

			{

				$data['limit'] = 20;

			}

				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];

			}

			$query = $this->db->query($sql);

			return $query->rows;	

	}

		

	public function getAgentstotal($data){

		$sql="select count(*) as total from " . DB_PREFIX . "property_agent where property_agent_id<>0";

		$query=$this->db->query($sql);

		return $query->row['total'];

	}

 }