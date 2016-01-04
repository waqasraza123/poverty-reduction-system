<?php
 
class db_functions {
 
    private $conn;
 
    // constructor
    function __construct() {
        // connecting to database
		require_once 'db_connect_x.php';
        $db = new db_connect_x();
        $this->conn = $db->connect("ots");
    }
 
    // destructor
    function __destruct() {
         
    }
 
    /**
     * Storing new user
     * returns user details
     */
	public function FindUser($id) {
        $stmt = $this->conn->prepare("SELECT * FROM user_profile WHERE id = ?");
        $stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        if ($result) {
			return $result;
		} else {
			return false;
		}
	}
    public function storeUserProfile($id, $dateOfBirth, $gender, $contactNum, $address) {
 
        $stmt = $this->conn->prepare("INSERT INTO user_profile(id, date_of_birth, gender, contact_num, address) VALUES(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $id, $dateOfBirth, $gender, $contactNum, $address);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
			$stmt = $this->conn->prepare("SELECT * FROM user_profile WHERE id = ?");
			$stmt->bind_param("s", $id);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return false;
        }
    }
	public function storeUserDP($id, $imagetmp) {
        $stmt = $this->conn->prepare("UPDATE user_profile SET `image` = ? WHERE id = ?");
        $stmt->bind_param("ss", $imagetmp , $id);
        $result = $stmt->execute();
        $stmt->close();
        // check for successful store
        if ($result) {

            return true;
        } else {
            return false;
        }
    }
	
	public function updateCourseInfo($course_id, $course_name, $description) {
        $stmt = $this->conn->prepare("UPDATE courses_info SET `course_name` = ?, `description` = ? WHERE course_id = ?");
        $stmt->bind_param("sss", $course_name, $description, $course_id);
		$result = $stmt->execute();
        $stmt->close();
        if ($result) {
			return $result;
		} else {
			return false;
		}
    }
	
	public function updateChapter($course, $chapter_no, $chapter_name, $video_link, $video_summary) {
		$sql = "UPDATE `" . $course . "` SET `chapter_name` = '".$chapter_name."', `video_link` = '".$video_link."', `video_summary` = '".$video_summary."' WHERE chapter_no = '".$chapter_no."'";
		$result = $this->conn->query($sql);
        if ($result) {
			return $result;
		} else {
			return false;
		}
    }
	
	public function getCourseInfo($course_id) {
        $stmt = $this->conn->prepare("SELECT * FROM courses_info WHERE course_id = ?");
        $stmt->bind_param("s", $course_id);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        if ($result) {
			return $result;
		} else {
			return false;
		}
    }
	
	public function getCourseData($course) {
		$sql = "SELECT * FROM `" . $course . "`";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			return $result;
		}
		else {
			return false;
		}
    }
	
	public function enrollStudent($course_id, $course_name, $student_id) {
        $stmt = $this->conn->prepare("INSERT INTO enrollment_table(id, course_name, student_id) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $course_id, $course_name, $student_id);
        $result = $stmt->execute();
        $stmt->close();
		if ($result) {
			return true;
		}
		else {
			return false;
		}
    }
	
	public function getEnrollmentData($id, $course_id) {
        $stmt = $this->conn->prepare("SELECT * FROM enrollment_table WHERE student_id = ? and id = ?");
        $stmt->bind_param("ss", $id, $course_id);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        if ($result) {
			return $result;
		} else {
			return false;
		}
    }
	public function getEnrollment($id) {
		$sql = "SELECT * FROM enrollment_table WHERE student_id = '".$id."'";
		$result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}
    }
}
 
?>