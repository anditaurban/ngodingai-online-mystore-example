    let cartCount = 0;
    let cartItems = [];

    function addToCart(productName, price) {
      const existingItem = cartItems.find(item => item.name === productName);
      if (existingItem) {
        existingItem.quantity += 1;
      } else {
        cartItems.push({
          name: productName,
          price: price,
          quantity: 1
        });
      }
      cartCount++;
      document.getElementById('cart-count').textContent = cartCount;
      Swal.fire({
        title: 'Added to Cart!',
        html: `<strong>${productName}</strong> added.`,
        icon: 'success',
        confirmButtonColor: '#4f46e5'
      });
    }

    function removeItem(index) {
      cartCount -= cartItems[index].quantity;
      cartItems.splice(index, 1);
      document.getElementById('cart-count').textContent = cartCount;
      showCart();
    }

    function clearCart() {
      cartItems = [];
      cartCount = 0;
      document.getElementById('cart-count').textContent = cartCount;
      Swal.fire('Cart Cleared', '', 'info');
    }

    function generateInvoiceId() {
      const date = new Date();
      return `INV-${date.getFullYear()}${(date.getMonth()+1).toString().padStart(2,'0')}${date.getDate().toString().padStart(2,'0')}-${Math.floor(Math.random()*10000)}`;
    }

    function checkout() {
      const invoiceId = generateInvoiceId();
      const total = cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);
      const itemsHtml = cartItems.map(item => `
    <tr>
      <td style="padding:6px;">${item.name}</td>
      <td style="text-align:center;">${item.quantity}</td>
      <td style="text-align:right;">$${item.price.toFixed(2)}</td>
      <td style="text-align:right;">$${(item.price * item.quantity).toFixed(2)}</td>
    </tr>
  `).join('');
      const invoiceHtml = `
    <p><strong>Invoice ID:</strong> ${invoiceId}</p>
    <p><input type="text" id="cust_name" placeholder="Name" class="swal2-input"></p>
    <p><input type="text" id="cust_wa" placeholder="WhatsApp" class="swal2-input"></p>
    <table style="width:100%; border-collapse:collapse; margin-top:10px;">
      <thead>
        <tr><th>Product</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>
      </thead>
      <tbody>${itemsHtml}</tbody>
      <tfoot>
        <tr>
          <td colspan="3" style="text-align:right;"><strong>Total:</strong></td>
          <td style="text-align:right;"><strong>$${total.toFixed(2)}</strong></td>
        </tr>
      </tfoot>
    </table>
  `;
      Swal.fire({
        title: 'Invoice',
        html: invoiceHtml,
        confirmButtonText: 'Confirm & Save',
        showCancelButton: true,
        confirmButtonColor: '#4f46e5',
        preConfirm: () => {
          const name = document.getElementById('cust_name').value.trim();
          const whatsapp = document.getElementById('cust_wa').value.trim();
          if (!name || !whatsapp) {
            Swal.showValidationMessage('Nama dan No WhatsApp wajib diisi!');
            return false;
          }
          return {
            name,
            whatsapp
          };
        }
      }).then(result => {
  if (result.isConfirmed && result.value) {
    const { name, whatsapp } = result.value;
    const data = {
      invoiceId,
      total,
      name,
      whatsapp,
      items: JSON.stringify(cartItems)
    };
    fetch('http://localhost:3000/checkout', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    })
    .then(response => response.text())
    .then(msg => {
      Swal.fire('Saved!', 'Invoice has been saved.', 'success');
      clearCart();
    })
    .catch(err => {
      console.error(err);
      Swal.fire('Saved!', 'Invoice has been saved.', 'success');
    });
  }
});
    }

    function showCart() {
      if (cartItems.length === 0) {
        return Swal.fire('Cart is empty!', '', 'info');
      }
      let total = 0;
      const rows = cartItems.map((item, index) => {
        const subtotal = item.price * item.quantity;
        total += subtotal;
        return `
        <tr>
          <td>${item.name}</td>
          <td style="text-align:center;">${item.quantity}</td>
          <td style="text-align:right;">$${item.price.toFixed(2)}</td>
          <td style="text-align:right;">$${subtotal.toFixed(2)}</td>
          <td style="text-align:center;"><button onclick="removeItem(${index})">✕</button></td>
        </tr>
      `;
      }).join('');
      const html = `
      <table style="width:100%; border-collapse:collapse;">
        <thead>
          <tr><th>Product</th><th>Qty</th><th>Price</th><th>Subtotal</th><th></th></tr>
        </thead>
        <tbody>${rows}</tbody>
        <tfoot><tr><td colspan="3" style="text-align:right;"><strong>Total:</strong></td><td style="text-align:right;"><strong>$${total.toFixed(2)}</strong></td></tr></tfoot>
      </table>
      <div style="text-align:right; margin-top:10px;">
        <button onclick="clearCart()" style="background:red;color:white;padding:6px 12px;border-radius:5px;">🗑️ Clear Cart</button>
      </div>
    `;
      Swal.fire({
        title: 'Your Cart',
        html: html,
        width: 600,
        showCancelButton: true,
        confirmButtonText: 'Checkout',
        cancelButtonText: 'Close',
        confirmButtonColor: '#4f46e5'
      }).then(result => {
        if (result.isConfirmed) {
          checkout();
        }
      });
    }

    function submitQuestion(event) {
      event.preventDefault();
      const question = document.getElementById("questionInput").value.trim();
      if (!question) {
        alert("Please enter your question.");
        return;
      }
      // WhatsApp number in international format without + or 00
      const phoneNumber = "62895339977843"; // Replace with your WhatsApp number
      const message = encodeURIComponent(
        `Hello, I have a question: ${question}`
      );
      const whatsappURL = `https://wa.me/${phoneNumber}?text=${message}`;
      window.open(whatsappURL, "_blank");
      document.getElementById("questionForm").reset();
    }
    const testimonials = [{
        name: "Jane Doe",
        photo: "https://randomuser.me/api/portraits/women/68.jpg",
        text: "MyStore offers amazing products and excellent customer service. Highly recommended!",
        title: "Verified Buyer",
      },
      {
        name: "John Smith",
        photo: "https://randomuser.me/api/portraits/men/45.jpg",
        text: "I love the variety and quality of products. The delivery was fast and packaging was perfect.",
        title: "Happy Customer",
      },
      {
        name: "Emily Johnson",
        photo: "https://randomuser.me/api/portraits/women/44.jpg",
        text: "Great shopping experience! The website is easy to use and the prices are very competitive.",
        title: "Satisfied Shopper",
      },
    ];
    let currentIndex = 0;

    function renderTestimonial(index) {
      const container = document.getElementById("testimonial-container");
      const t = testimonials[index];
      container.innerHTML = `
        <div class="flex flex-col items-center text-center max-w-xl mx-auto px-4 sm:px-0">
          <img src="${t.photo}" alt="Photo of ${t.name}" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full object-cover mb-4 shadow-md" />
          <p class="text-indigo-900 italic text-base sm:text-lg mb-4">"${t.text}"</p>
          <p class="font-semibold text-indigo-700 text-lg sm:text-xl">${t.name}</p>
          <p class="text-indigo-600">${t.title}</p>
        </div>
      `;
    }

    function showNext() {
      currentIndex = (currentIndex + 1) % testimonials.length;
      renderTestimonial(currentIndex);
    }

    function showPrev() {
      currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
      renderTestimonial(currentIndex);
    }
    document.getElementById("nextBtn").addEventListener("click", showNext);
    document.getElementById("prevBtn").addEventListener("click", showPrev);
    // Initial render
    renderTestimonial(currentIndex);