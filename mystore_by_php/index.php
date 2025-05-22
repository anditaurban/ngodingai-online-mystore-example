<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>MyStore E-commerce Website</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>

<body class="flex flex-col min-h-screen">
  <!-- Header -->
  <header
    class="sticky top-0 z-30 bg-white shadow-md flex flex-col sm:flex-row items-center justify-between px-6 py-4 gap-4 sm:gap-0">
    <div class="text-2xl font-bold text-indigo-600 cursor-pointer select-none">
      MyStore
    </div>
    <form class="flex-grow max-w-full sm:max-w-lg mx-0 sm:mx-6 w-full"
      onsubmit="event.preventDefault(); alert('Search: ' + this.search.value);">
      <input
        class="w-full rounded-full border border-indigo-300 px-4 py-2 text-gray-700 placeholder-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
        name="search" placeholder="Search products..." required="" type="text" />
    </form>
    <nav class="flex space-x-8 font-semibold text-indigo-700">
      <a class="hover:text-indigo-900 transition flex items-center gap-1" href="#"
        onclick="alert('Login clicked')">LOGIN <i class="fas fa-sign-in-alt"></i></a>
      <a class="hover:text-indigo-900 transition flex items-center gap-1" href="#" onclick="showCart()">
        CART <i class="fas fa-shopping-cart"></i>
        <span id="cart-count" class="ml-1 bg-indigo-600 text-white text-xs font-bold rounded-full px-2 py-0.5">0</span>
      </a>
    </nav>
  </header>
  <!-- Hero -->
  <section
    class="relative text-white flex flex-col justify-center items-center h-72 sm:h-80 md:h-96 text-center px-6 overflow-hidden rounded-b-3xl shadow-lg">
    <img alt="Hero background showing shopping bags and a laptop on a wooden table"
      class="absolute inset-0 w-full h-full object-cover brightness-75"
      src="https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=1470&q=80" />
    <div class="relative z-10 max-w-4xl px-2">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold drop-shadow-lg">
        Welcome to MyStore
      </h1>
      <p class="mt-3 max-w-xl text-base sm:text-lg md:text-xl drop-shadow-md">
        Find the best products at unbeatable prices.
      </p>
      <button
        class="mt-6 bg-indigo-600 text-white font-semibold rounded-full px-6 sm:px-8 py-2 sm:py-3 shadow-lg hover:bg-indigo-700 transition"
        onclick="alert('Shop Now clicked')">
        Shop Now
      </button>
    </div>
  </section>
  <!-- Categories -->
  <section class="max-w-6xl mx-auto px-4 sm:px-6 py-10 sm:py-12 grid grid-cols-2 sm:grid-cols-4 gap-6 sm:gap-8">
    <div
      class="bg-white rounded-xl shadow-lg flex flex-col items-center p-4 sm:p-6 cursor-pointer hover:shadow-indigo-400 transition"
      onclick="alert('Electronics category clicked')">
      <img alt="Category image showing electronics" class="mb-3 sm:mb-4" height="70"
        src="https://storage.googleapis.com/a1aa/image/b69b7884-5e11-4b12-4c6f-76211f99745a.jpg" width="70" />
      <span class="text-base sm:text-lg font-semibold text-indigo-700">Electronics</span>
    </div>
    <div
      class="bg-white rounded-xl shadow-lg flex flex-col items-center p-4 sm:p-6 cursor-pointer hover:shadow-indigo-400 transition"
      onclick="alert('Fashion category clicked')">
      <img alt="Category image showing fashion" class="mb-3 sm:mb-4" height="70"
        src="https://storage.googleapis.com/a1aa/image/5530b78d-9676-4e56-8d81-8710430a9130.jpg" width="70" />
      <span class="text-base sm:text-lg font-semibold text-indigo-700">Fashion</span>
    </div>
    <div
      class="bg-white rounded-xl shadow-lg flex flex-col items-center p-4 sm:p-6 cursor-pointer hover:shadow-indigo-400 transition"
      onclick="alert('Home Goods category clicked')">
      <img alt="Category image showing home goods" class="mb-3 sm:mb-4" height="70"
        src="https://storage.googleapis.com/a1aa/image/104921b0-f785-4881-43b9-db46a47c7e28.jpg" width="70" />
      <span class="text-base sm:text-lg font-semibold text-indigo-700">Home Goods</span>
    </div>
    <div
      class="bg-white rounded-xl shadow-lg flex flex-col items-center p-4 sm:p-6 cursor-pointer hover:shadow-indigo-400 transition"
      onclick="alert('Sports category clicked')">
      <img alt="Category image showing sports" class="mb-3 sm:mb-4" height="70"
        src="https://storage.googleapis.com/a1aa/image/f5e84e7e-963e-4673-0316-e38503e03974.jpg" width="70" />
      <span class="text-base sm:text-lg font-semibold text-indigo-700">Sports</span>
    </div>
  </section>
  <!-- Featured Products -->
  <section class="max-w-6xl mx-auto px-6 pb-20">
    <h2 class="text-2xl sm:text-3xl font-bold text-indigo-800 mb-10 text-center">
      FEATURED PRODUCTS
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 product-scroll overflow-x-auto scrollbar-hide">
      <article class="bg-white rounded-xl shadow-lg flex flex-col hover:shadow-indigo-400 transition">
        <img alt="Featured product 1 image showing a smartphone" class="rounded-t-xl object-cover" height="160"
          src="https://storage.googleapis.com/a1aa/image/e9122a71-f7ae-4983-be74-89c260181c38.jpg" width="240" />
        <div class="p-8 flex flex-col flex-grow">
          <h3 class="font-semibold text-indigo-700 text-lg mb-3">Smartphone X100</h3>
          <p class="text-indigo-600 font-bold text-xl mb-4">$799</p>
          <p class="text-gray-600 flex-grow text-base leading-relaxed">
            Latest model with advanced features.
          </p>
          <!-- Smartphone X100 -->
          <button class="mt-8 bg-indigo-600 text-white rounded-full py-3 font-semibold hover:bg-indigo-700 transition"
            onclick="addToCart('Smartphone X100', 799)">
            ADD TO CART
          </button>
        </div>
      </article>
      <article class="bg-white rounded-xl shadow-lg flex flex-col hover:shadow-indigo-400 transition">
        <img alt="Featured product 2 image showing a stylish jacket" class="rounded-t-xl object-cover" height="160"
          src="https://storage.googleapis.com/a1aa/image/13d37277-88e5-42d5-0ea9-6f09aee26fb6.jpg" width="240" />
        <div class="p-8 flex flex-col flex-grow">
          <h3 class="font-semibold text-indigo-700 text-lg mb-3">Stylish Jacket</h3>
          <p class="text-indigo-600 font-bold text-xl mb-4">$129</p>
          <p class="text-gray-600 flex-grow text-base leading-relaxed">
            Perfect for all seasons.
          </p>
          <button class="mt-8 bg-indigo-600 text-white rounded-full py-3 font-semibold hover:bg-indigo-700 transition"
            onclick="addToCart('Stylish Jacket', 129)">
            ADD TO CART
          </button>
        </div>
      </article>
      <article class="bg-white rounded-xl shadow-lg flex flex-col hover:shadow-indigo-400 transition">
        <img alt="Featured product 3 image showing a modern lamp" class="rounded-t-xl object-cover" height="160"
          src="https://storage.googleapis.com/a1aa/image/181190f2-faf8-46e7-10db-9b25cf034c80.jpg" width="240" />
        <div class="p-8 flex flex-col flex-grow">
          <h3 class="font-semibold text-indigo-700 text-lg mb-3">Modern Lamp</h3>
          <p class="text-indigo-600 font-bold text-xl mb-4">$89</p>
          <p class="text-gray-600 flex-grow text-base leading-relaxed">
            Brighten your home with style.
          </p>

          <button class="mt-8 bg-indigo-600 text-white rounded-full py-3 font-semibold hover:bg-indigo-700 transition"
            onclick="addToCart('Modern Lamp', 89)">
            ADD TO CART
          </button>
        </div>
      </article>
      <article class="bg-white rounded-xl shadow-lg flex flex-col hover:shadow-indigo-400 transition">
        <img alt="Featured product 4 image showing a pair of running shoes" class="rounded-t-xl object-cover"
          height="160" src="https://storage.googleapis.com/a1aa/image/b9488a2a-168c-41a2-e4ad-eec674e7e874.jpg"
          width="240" />
        <div class="p-8 flex flex-col flex-grow">
          <h3 class="font-semibold text-indigo-700 text-lg mb-3">Running Shoes</h3>
          <p class="text-indigo-600 font-bold text-xl mb-4">$149</p>
          <p class="text-gray-600 flex-grow text-base leading-relaxed">
            Comfort and performance combined.
          </p>
          <button class="mt-8 bg-indigo-600 text-white rounded-full py-3 font-semibold hover:bg-indigo-700 transition"
            onclick="addToCart('Running Shoes', 149)">
            ADD TO CART
          </button>
        </div>
      </article>
    </div>
  </section>
  <!-- Testimonial Carousel -->
  <section class="max-w-4xl mx-auto px-4 sm:px-6 pb-16">
    <h2 class="text-2xl sm:text-3xl font-bold text-indigo-800 mb-8 text-center">
      TESTIMONIALS
    </h2>
    <div class="relative">
      <div id="testimonial-container" class="overflow-hidden rounded-lg shadow-lg bg-indigo-50 p-6 sm:p-8">
        <!-- Slides will be injected here -->
      </div>
      <!-- Navigation buttons -->
      <button id="prevBtn" aria-label="Previous testimonial"
        class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-indigo-600 text-white rounded-full p-2 hover:bg-indigo-700 transition">
        <i class="fas fa-chevron-left"></i>
      </button>
      <button id="nextBtn" aria-label="Next testimonial"
        class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-indigo-600 text-white rounded-full p-2 hover:bg-indigo-700 transition">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>
  </section>
  <!-- Promo -->
  <section class="max-w-5xl mx-auto px-4 sm:px-6 pb-24">
    <h2 class="text-2xl sm:text-3xl font-bold text-indigo-800 mb-8 text-center">PROMO</h2>
    <div
      class="bg-gradient-to-r from-indigo-500 via-indigo-600 to-indigo-700 rounded-xl p-14 sm:p-20 text-white text-center shadow-lg">
      <h3 class="text-4xl sm:text-5xl font-extrabold mb-5 drop-shadow-lg">
        Spring Sale - Up to 50% Off!
      </h3>
      <p class="mb-8 text-lg sm:text-xl drop-shadow-md">
        Shop now and save big on selected items.
      </p>
      <button
        class="bg-white text-indigo-700 font-bold rounded-full px-10 sm:px-12 py-4 sm:py-5 shadow-lg hover:bg-indigo-50 transition text-lg sm:text-xl"
        onclick="alert('Promo clicked!')">
        SHOP PROMO
      </button>
    </div>
  </section>
  <!-- Footer -->
  <footer
    class="border-t border-indigo-300 bg-white flex flex-wrap justify-between items-start px-8 sm:px-12 py-10 space-y-8 sm:space-y-0 max-w-7xl mx-auto w-full">
    <div class="flex space-x-12 sm:space-x-16 flex-wrap">
      <div class="flex flex-col space-y-3 min-w-[96px]">
        <span class="font-semibold text-indigo-700 text-sm tracking-wide">LINK</span>
        <a class="border-b border-indigo-300 w-12 hover:text-indigo-600 transition" href="#">About Us</a>
        <a class="border-b border-indigo-300 w-12 hover:text-indigo-600 transition" href="#">Careers</a>
        <a class="border-b border-indigo-300 w-12 hover:text-indigo-600 transition" href="#">Blog</a>
      </div>
      <div class="flex flex-col space-y-3 min-w-[96px]">
        <span class="font-semibold text-indigo-700 text-sm tracking-wide">LINK</span>
        <a class="border-b border-indigo-300 w-12 hover:text-indigo-600 transition" href="#">Support</a>
        <a class="border-b border-indigo-300 w-12 hover:text-indigo-600 transition" href="#">FAQs</a>
        <a class="border-b border-indigo-300 w-12 hover:text-indigo-600 transition" href="#">Contact</a>
      </div>
      <div class="flex flex-col space-y-3 min-w-[96px]">
        <span class="font-semibold text-indigo-700 text-sm tracking-wide">LINK</span>
        <a class="border-b border-indigo-300 w-12 hover:text-indigo-600 transition" href="#">Privacy</a>
        <a class="border-b border-indigo-300 w-12 hover:text-indigo-600 transition" href="#">Terms</a>
        <a class="border-b border-indigo-300 w-12 hover:text-indigo-600 transition" href="#">Sitemap</a>
      </div>
    </div>
    <div class="flex flex-col space-y-6 max-w-xs w-full">
      <div class="border border-indigo-300 rounded-lg p-5 bg-indigo-50 shadow-md">
        <h3 class="font-semibold text-indigo-700 text-sm mb-3 tracking-wide">
          ASK A QUESTION
        </h3>
        <form class="flex flex-col space-y-3" id="questionForm" onsubmit="submitQuestion(event)">
          <textarea
            class="border border-indigo-300 rounded-md px-3 py-2 text-indigo-700 placeholder-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition resize-none"
            id="questionInput" placeholder="Type your question here..." required rows="4"></textarea>
          <button class="bg-indigo-600 text-white rounded-md py-2 font-semibold hover:bg-indigo-700 transition"
            type="submit">
            SEND TO WHATSAPP
          </button>
        </form>
      </div>
      <div class="flex items-center space-x-6 justify-center sm:justify-start">
        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook"
          class="text-indigo-600 hover:text-indigo-800 transition text-3xl"><i class="fab fa-facebook-square"></i></a>
        <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" aria-label="Twitter"
          class="text-indigo-600 hover:text-indigo-800 transition text-3xl"><i class="fab fa-twitter-square"></i></a>
        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram"
          class="text-indigo-600 hover:text-indigo-800 transition text-3xl"><i class="fab fa-instagram-square"></i></a>
        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"
          class="text-indigo-600 hover:text-indigo-800 transition text-3xl"><i class="fab fa-linkedin"></i></a>
        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" aria-label="YouTube"
          class="text-indigo-600 hover:text-indigo-800 transition text-3xl"><i class="fab fa-youtube-square"></i></a>
      </div>
      <address class="text-indigo-700 text-sm not-italic">
        <strong class="block font-semibold mb-1">Our Address</strong>
        123 MyStore Street,<br />
        Shopping City, SC 12345<br />
        Phone: (123) 456-7890<br />
        Email: support@mystore.com
      </address>
    </div>
  </footer>
  <!-- Sticky WhatsApp CTA -->
  <a id="whatsapp-cta" href="https://wa.me/62895339977843" target="_blank" rel="noopener noreferrer"
    aria-label="Chat on WhatsApp" title="Chat on WhatsApp" style="
      position: fixed;
      bottom: 24px;
      right: 24px;
      background-color: #25d366;
      width: 56px;
      height: 56px;
      border-radius: 50%;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 1000;
      transition: background-color 0.3s ease;
    " onmouseover="this.style.backgroundColor='#1ebe57'" onmouseout="this.style.backgroundColor='#25d366'">
    <i class="fab fa-whatsapp text-white text-3xl"></i>
  </a>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="script.js"></script>
</body>
</html>