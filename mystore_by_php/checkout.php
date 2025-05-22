<?php

// Konfigurasi koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "mystore";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  http_response_code(500);
  echo json_encode(["error" => "Database connection failed"]);
  exit;
}

// Ambil data JSON dari request
$data = json_decode(file_get_contents('php://input'), true);

// Validasi data dasar
if (
  !isset($data['invoiceId'], $data['name'], $data['whatsapp'], $data['total'], $data['items']) ||
  !is_array($data['items']) || count($data['items']) === 0
) {
  http_response_code(400);
  echo json_encode(["error" => "Invalid input data"]);
  exit;
}

$invoiceId = $conn->real_escape_string($data['invoiceId']);
$name = $conn->real_escape_string($data['name']);
$wa = $conn->real_escape_string($data['whatsapp']);
$total = floatval($data['total']);
$items = $data['items'];

// Mulai transaksi
$conn->begin_transaction();

try {
  // Simpan ke tabel invoice
  $stmtInvoice = $conn->prepare("INSERT INTO invoices (invoice_id, customer_name, whatsapp, total) VALUES (?, ?, ?, ?)");
  $stmtInvoice->bind_param("sssi", $invoiceId, $name, $wa, $total);
  $stmtInvoice->execute();

  // Simpan item-item ke tabel invoice_items
  $stmtItems = $conn->prepare("INSERT INTO invoice_items (invoice_id, product_name, quantity, price, subtotal) VALUES (?, ?, ?, ?, ?)");

  foreach ($items as $item) {
    $itemName = $item['name'];
    $qty = intval($item['quantity']);
    $price = floatval($item['price']);
    $subtotal = $price * $qty;

    $stmtItems->bind_param("ssiii", $invoiceId, $itemName, $qty, $price, $subtotal);
    $stmtItems->execute();
  }

  // Commit transaksi
  $conn->commit();

  echo json_encode(["status" => "success", "message" => "Invoice saved"]);

  $stmtInvoice->close();
  $stmtItems->close();
} catch (Exception $e) {
  $conn->rollback();
  http_response_code(500);
  echo json_encode(["status" => "error", "message" => "Transaction failed", "error" => $e->getMessage()]);
}

$conn->close();