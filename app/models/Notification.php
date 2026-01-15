<?php

class Notification extends BaseModel {
    protected $table = 'notifications';

    public function createNotification($userId, $type, $title, $message, $relatedId = null, $relatedType = null) {
        $data = [
            'user_id' => $userId,
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'related_id' => $relatedId,
            'related_type' => $relatedType
        ];
        return $this->create($data);
    }

    public function getUserNotifications($userId, $unreadOnly = false) {
        $sql = "SELECT * FROM notifications WHERE user_id = :user_id";
        $params = ['user_id' => $userId];

        if ($unreadOnly) {
            $sql .= " AND read_at IS NULL";
        }

        $sql .= " ORDER BY created_at DESC LIMIT 50";
        return $this->db->fetchAll($sql, $params);
    }

    public function markAsRead($notificationId) {
        $sql = "UPDATE notifications SET read_at = NOW() WHERE id = :id";
        return $this->db->query($sql, ['id' => $notificationId]);
    }

    public function markAllAsRead($userId) {
        $sql = "UPDATE notifications SET read_at = NOW() WHERE user_id = :user_id AND read_at IS NULL";
        return $this->db->query($sql, ['user_id' => $userId]);
    }

    public function getUnreadCount($userId) {
        $result = $this->db->fetchOne(
            "SELECT COUNT(*) as count FROM notifications WHERE user_id = :user_id AND read_at IS NULL",
            ['user_id' => $userId]
        );
        return $result['count'] ?? 0;
    }
}

