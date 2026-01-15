<?php

class Event extends BaseModel {
    protected $table = 'events';

    public function getUpcomingEvents($limit = null) {
        $sql = "SELECT e.*, u.first_name, u.last_name, u.email as organizer_email,
                p.name as partner_name
                FROM events e
                LEFT JOIN users u ON e.organizer_id = u.id
                LEFT JOIN partners p ON e.partner_id = p.id
                WHERE e.status = 'approved' AND e.event_date >= CURDATE()
                ORDER BY e.event_date ASC, e.start_time ASC";
        
        if ($limit) {
            $sql .= " LIMIT " . (int)$limit;
        }
        
        return $this->db->fetchAll($sql);
    }

    public function getEventWithDetails($eventId) {
        $sql = "SELECT e.*, u.first_name, u.last_name, u.email as organizer_email,
                p.name as partner_name, p.type as partner_type
                FROM events e
                LEFT JOIN users u ON e.organizer_id = u.id
                LEFT JOIN partners p ON e.partner_id = p.id
                WHERE e.id = :id";
        return $this->db->fetchOne($sql, ['id' => $eventId]);
    }

    public function getEventInterests($eventId) {
        $sql = "SELECT i.* FROM interests i
                INNER JOIN event_interests ei ON i.id = ei.interest_id
                WHERE ei.event_id = :event_id";
        return $this->db->fetchAll($sql, ['event_id' => $eventId]);
    }

    public function setEventInterests($eventId, $interestIds) {
        // Remove existing interests
        $this->db->query("DELETE FROM event_interests WHERE event_id = :event_id", ['event_id' => $eventId]);
        
        // Add new interests
        if (!empty($interestIds)) {
            foreach ($interestIds as $interestId) {
                $this->db->query(
                    "INSERT INTO event_interests (event_id, interest_id) VALUES (:event_id, :interest_id)",
                    ['event_id' => $eventId, 'interest_id' => $interestId]
                );
            }
        }
    }

    public function createEvent($data, $interestIds = []) {
        $eventId = $this->create($data);
        if (!empty($interestIds)) {
            $this->setEventInterests($eventId, $interestIds);
        }
        return $eventId;
    }

    public function updateEvent($eventId, $data, $interestIds = null) {
        $this->update($eventId, $data);
        if ($interestIds !== null) {
            $this->setEventInterests($eventId, $interestIds);
        }
    }

    public function approveEvent($eventId) {
        return $this->update($eventId, ['status' => 'approved']);
    }

    public function rejectEvent($eventId, $reason = '') {
        return $this->update($eventId, [
            'status' => 'rejected',
            'rejection_reason' => $reason
        ]);
    }

    public function getPendingEvents() {
        return $this->findAll(['status' => 'pending'], 'created_at DESC');
    }

    public function getEventsByOrganizer($organizerId) {
        return $this->findAll(['organizer_id' => $organizerId], 'event_date DESC, start_time DESC');
    }

    public function checkTimeConflict($eventDate, $startTime, $endTime, $excludeEventId = null) {
        $sql = "SELECT COUNT(*) as count FROM events 
                WHERE event_date = :event_date 
                AND status = 'approved'
                AND (
                    (start_time <= :start_time AND end_time > :start_time) OR
                    (start_time < :end_time AND end_time >= :end_time) OR
                    (start_time >= :start_time AND end_time <= :end_time)
                )";
        
        $params = [
            'event_date' => $eventDate,
            'start_time' => $startTime,
            'end_time' => $endTime
        ];

        if ($excludeEventId) {
            $sql .= " AND id != :exclude_id";
            $params['exclude_id'] = $excludeEventId;
        }

        $result = $this->db->fetchOne($sql, $params);
        return $result['count'] > 0;
    }

    public function getRegisteredUsers($eventId) {
        $sql = "SELECT u.*, er.status as registration_status, er.registered_at
                FROM event_registrations er
                INNER JOIN users u ON er.user_id = u.id
                WHERE er.event_id = :event_id AND er.status != 'cancelled'
                ORDER BY er.registered_at DESC";
        return $this->db->fetchAll($sql, ['event_id' => $eventId]);
    }

    public function registerUser($eventId, $userId) {
        // Check if already registered
        $existing = $this->db->fetchOne(
            "SELECT * FROM event_registrations WHERE event_id = :event_id AND user_id = :user_id",
            ['event_id' => $eventId, 'user_id' => $userId]
        );

        if ($existing) {
            return false;
        }

        // Check capacity
        $event = $this->findById($eventId);
        if ($event['max_participants']) {
            $registered = $this->db->fetchOne(
                "SELECT COUNT(*) as count FROM event_registrations 
                 WHERE event_id = :event_id AND status != 'cancelled'",
                ['event_id' => $eventId]
            );
            if ($registered['count'] >= $event['max_participants']) {
                return false;
            }
        }

        $this->db->query(
            "INSERT INTO event_registrations (event_id, user_id, status) 
             VALUES (:event_id, :user_id, 'confirmed')",
            ['event_id' => $eventId, 'user_id' => $userId]
        );
        return true;
    }

    public function getEventsByInterest($interestId) {
        $sql = "SELECT DISTINCT e.*, u.first_name, u.last_name
                FROM events e
                INNER JOIN event_interests ei ON e.id = ei.event_id
                LEFT JOIN users u ON e.organizer_id = u.id
                WHERE ei.interest_id = :interest_id 
                AND e.status = 'approved' 
                AND e.event_date >= CURDATE()
                ORDER BY e.event_date ASC";
        return $this->db->fetchAll($sql, ['interest_id' => $interestId]);
    }
}

