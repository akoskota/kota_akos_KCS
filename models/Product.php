<?php
require_once 'Database.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("
            SELECT p.*, c.name, c.phone, c.email
            FROM products p
            JOIN contacts c ON p.contact_id = c.id
            WHERE p.status != 'Kész' OR p.last_status_update = CURDATE()
            ORDER BY FIELD(p.status, 'Beérkezett', 'Hibafeltárás', 'Alkatrész beszerzés alatt', 'Javítás', 'Kész')
        ");
        return $stmt->fetchAll();
    }

    public function create($data) {
        $stmtContact = $this->db->prepare("
            INSERT INTO contacts (name, phone, email) VALUES (:name, :phone, :email)
        ");
        $stmtContact->execute([
            ':name' => $data['name'],
            ':phone' => $data['phone'],
            ':email' => $data['email']
        ]);
        $contactId = $this->db->lastInsertId();

        $stmtProduct = $this->db->prepare("
            INSERT INTO products (serial_number, manufacturer, type, status, submission_date, last_status_update, contact_id)
            VALUES (:serial, :manufacturer, :type, 'Beérkezett', CURDATE(), CURDATE(), :contact_id)
        ");
        return $stmtProduct->execute([
            ':serial' => $data['serial'],
            ':manufacturer' => $data['manufacturer'],
            ':type' => $data['type'],
            ':contact_id' => $contactId
        ]);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare("
            UPDATE products SET status = :status, last_status_update = CURDATE() WHERE id = :id
        ");
        return $stmt->execute([':status' => $status, ':id' => $id]);
    }
}
