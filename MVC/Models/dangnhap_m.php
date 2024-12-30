<?php
class dangnhap_m extends connectDB {

    public function checkdangnhap($username, $password) {
        $sql = "
        SELECT u.username, u.password, r.role_name AS Role
        FROM user u
        JOIN user_roles ur ON u.id = ur.user_id
        JOIN roles r ON ur.role_id = r.id
        WHERE u.username = ? AND u.password = ?
        ";
        $stmt = $this->con->prepare($sql);
    
        if (!$stmt) {
            die('Lỗi chuẩn bị SQL: ' . $this->con->error);
        }
    
        $stmt->bind_param("ss", $username, $password);
    
        if (!$stmt->execute()) {
            die('Lỗi thực thi SQL: ' . $stmt->error);
        }
    
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return [
                'username' => $user['username'],
                'role' => $user['Role'],
            ];
        }
    
        return false;
    }
    
}
?>
