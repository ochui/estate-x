<?php
class ModelPropertyAgent extends Model{
	public function addAgent($data){
		$sql="INSERT INTO " . DB_PREFIX . "property_agent set agentname='".$this->db->escape($data['agentname'])."',image='".$this->db->escape($data['image'])."',description='".$this->db->escape($data['description'])."',positions='".$this->db->escape($data['positions'])."',email='".$this->db->escape($data['email'])."',
		contact='".(int) $data['contact']."',sort_order='".(int) $data['sort_order']."',pincode='".(int) $data['pincode']."',address='".$this->db->escape($data['address'])."',	password='".$this->db->escape($data['password'])."',city='".$this->db->escape($data['city'])."',country_id='".$this->db->escape($data['country_id'])."',
		status='".(int)$data['status']."', date_added=now()";
		$this->db->query($sql);
	}

	public function getAgents($data){
		$sql="select * from " . DB_PREFIX . "property_agent where property_agent_id<>0  ";
		if (isset($data['filter_agentname'])){
			$sql .=" and agentname like '".$this->db->escape($data['filter_agentname'])."%'";
		}
		if (isset($data['filter_status'])){
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
		} 
		else {
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
	
	public function getpropertyform($property_agent_id){
		$sql="select * from " . DB_PREFIX . "property_agent where property_agent_id='".$property_agent_id."'";
		$query=$this->db->query($sql);
		return $query->row;
	}
	//// update or edit ////
	
	public function editAgent($property_agent_id,$data){
		$sql="update " . DB_PREFIX . "property_agent set agentname='".$this->db->escape($data['agentname'])."',	image='".$this->db->escape($data['image'])."',description='".$this->db->escape($data['description'])."',positions='".$this->db->escape($data['positions'])."',contact='".$this->db->escape($data['contact'])."',country_id='".(int) $data['country_id']."',
		status='".(int)$data['status']."',pincode='".$this->db->escape($data['pincode'])."',address='".$this->db->escape($data['address'])."',salt = '" . $this->db->escape($salt = token(9)) . "',password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) ."',	city='".$this->db->escape($data['city'])."',sort_order='".$this->db->escape($data['sort_order'])."',
		date_modified=now() where property_agent_id='".$property_agent_id."'";
		$query = $this->db->query($sql);
	}
	
	public function approve($property_agent_id){
		$this->db->query("UPDATE " . DB_PREFIX . "property_agent SET approved = '1' WHERE property_agent_id = '" . (int)$property_agent_id . "'");
	}

	public function Disapprove($property_agent_id){
		$this->db->query("UPDATE " . DB_PREFIX . "property_agent SET approved = '0' WHERE property_agent_id = '" . (int)$property_agent_id . "'");
	}

	//////// Select-edit ////////
	public function getAgent($property_agent_id){
		$sql="select * from " . DB_PREFIX . "property_agent where property_agent_id='".$property_agent_id."'";
		$query=$this->db->query($sql);
		return $query->row;
	}
	//// delete //////
	public function deleteAgent($property_agent_id){
		$sql="delete  from " . DB_PREFIX . "property_agent where property_agent_id='".$property_agent_id."'";
		$query=$this->db->query($sql);
	}
	

	public function getTotalAgent($data){
		$sql="SELECT COUNT(*) AS total FROM " . DB_PREFIX . "property_agent  where property_agent_id<>0";
		if (isset($data['filter_agentname'])){
			$sql .=" and agentname like '".$this->db->escape($data['filter_agentname'])."%'";
		}
		if (isset($data['filter_status'])){
			$sql .=" and status like '".$this->db->escape($data['filter_status'])."%'";
		}
		$query = $this->db->query($sql);
			return $query->row['total'];	
	}
}