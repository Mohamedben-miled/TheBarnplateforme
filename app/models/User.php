<?php

class User extends BaseModel {
    protected $table = 'users';

    public function findByEmail($email) {
        return $this->findOne(['email' => $email]);
    }

    public function createUser($data) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->create($data);
    }

    public function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    public function updateProfile($userId, $data) {
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']);
        }
        return $this->update($userId, $data);
    }

    public function getUserInterests($userId) {
        $sql = "SELECT i.* FROM interests i
                INNER JOIN user_interests ui ON i.id = ui.interest_id
                WHERE ui.user_id = :user_id";
        return $this->db->fetchAll($sql, ['user_id' => $userId]);
    }

    public function setUserInterests($userId, $interestIds) {
        // Remove existing interests
        $this->db->query("DELETE FROM user_interests WHERE user_id = :user_id", ['user_id' => $userId]);
        
        // Add new interests
        if (!empty($interestIds)) {
            foreach ($interestIds as $interestId) {
                $this->db->query(
                    "INSERT INTO user_interests (user_id, interest_id) VALUES (:user_id, :interest_id)",
                    ['user_id' => $userId, 'interest_id' => $interestId]
                );
            }
        }
    }

    public function requestOrganizerRole($userId) {
        return $this->update($userId, ['organizer_status' => 'pending']);
    }

    public function approveOrganizer($userId) {
        return $this->update($userId, [
            'role' => 'organizer',
            'organizer_status' => 'approved'
        ]);
    }

    public function rejectOrganizer($userId) {
        return $this->update($userId, ['organizer_status' => 'rejected']);
    }

    public function getPendingOrganizers() {
        return $this->findAll(['organizer_status' => 'pending']);
    }

    public function hasEmailNotifications($userId) {
        $user = $this->findById($userId);
        return $user && $user['email_notifications'] == 1;
    }
}

