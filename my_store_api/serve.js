require('dotenv').config();
const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();

// Middleware
app.use(cors());
app.use(bodyParser.json());

// MySQL connection
const db = mysql.createConnection({
  host:     process.env.DB_HOST,
  user:     process.env.DB_USER,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_NAME
});

db.connect((err) => {
  if (err) throw err;
  console.log('Connected to MySQL database');
});

// POST /checkout endpoint
app.post('/checkout', (req, res) => {
  const { invoiceId, name, whatsapp, total, items } = req.body;

  const invoiceQuery = `INSERT INTO invoices (invoice_id, customer_name, whatsapp, total) VALUES (?, ?, ?, ?)`;

  db.query(invoiceQuery, [invoiceId, name, whatsapp, total], (err, result) => {
    if (err) {
      console.error('Error inserting invoice:', err);
      return res.status(500).json({ status: 'error', message: 'Failed to save invoice' });
    }

    const parsedItems = typeof items === 'string' ? JSON.parse(items) : items;

    const insertItems = parsedItems.map(item => [
    invoiceId,
    item.name,
    item.quantity,
    item.price,
    item.quantity * item.price
    ]);

    const itemsQuery = `INSERT INTO invoice_items (invoice_id, product_name, quantity, price, subtotal) VALUES ?`;

    db.query(itemsQuery, [insertItems], (err2) => {
      if (err2) {
        console.error('Error inserting items:', err2);
        return res.status(500).json({ status: 'error', message: 'Failed to save items' });
      }

      res.json({ status: 'success', message: 'Invoice saved successfully' });
    });
  });
});

// Start server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});
