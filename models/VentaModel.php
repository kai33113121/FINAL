public function contarVentas() {
    $stmt = $this->db->prepare("SELECT COUNT(*) FROM ventas");
    $stmt->execute();
    return $stmt->fetchColumn();
}