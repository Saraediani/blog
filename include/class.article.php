<?php

// include "db_config.php";

class Article extends DB_con{


    public function getAll(){
            $query = "SELECT * FROM posts";
			
			$result = $this->db->query($query) or die($this->db->error);
			
			if($result){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
    }

    public function add($title,$slug,$body,$image){
            $query = "INSERT INTO posts (title,slug,body,image) VALUES ('".$title."','".$slug."','".$body."','".$image."')";
                
            $result = $this->db->query($query) or die($this->db->error);
            
            if($result){
                return true;
            }else{
                return false;
            }
    }

    public function find($id){
            $query = "SELECT * FROM posts WHERE id=".$id;
			
			$result = $this->db->query($query) or die($this->db->error);
			
			if($result){
                return $result->fetch_assoc();
            }else{
                return false;
            }
    }

    public function update($id,$title,$slug,$body,$image){
        $query = "UPDATE posts SET title='".$title."',slug='".$slug."',body='".$body."',image='".$image."' WHERE id=".$id;
            
        $result = $this->db->query($query) or die($this->db->error);
        
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function delete($id){
        $query = "DELETE FROM posts WHERE id=".$id;
            
        $result = $this->db->query($query) or die($this->db->error);
        
        if($result){
            return true;
        }else{
            return false;
        }
    }


}