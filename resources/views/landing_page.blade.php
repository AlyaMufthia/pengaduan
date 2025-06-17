<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADUIN SAJA.MDN - Layanan Pengaduan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Poppins", sans-serif;
      }

      /* Loading Animation */
      .loader-circle {
        animation: pulse 1.5s ease-in-out infinite;
      }

      .loader-circle:nth-child(2) {
        animation-delay: 0.2s;
      }

      .loader-circle:nth-child(3) {
        animation-delay: 0.4s;
      }

      @keyframes pulse {
        0%,
        100% {
          transform: scale(0.8);
          opacity: 0.5;
        }
        50% {
          transform: scale(1.2);
          opacity: 1;
        }
      }

      .progress-bar {
        width: 0%;
        transition: width 0.3s ease;
      }

      .fade-out {
        animation: fadeOut 0.5s forwards;
      }

      @keyframes fadeOut {
        to {
          opacity: 0;
          visibility: hidden;
        }
      }

      /* Custom Scrollbar */
      ::-webkit-scrollbar {
        width: 8px;
      }

      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }

      ::-webkit-scrollbar-thumb {
        background: #3b82f6;
        border-radius: 4px;
      }

      ::-webkit-scrollbar-thumb:hover {
        background: #2563eb;
      }

      /* Card Hover Effect */
      .complaint-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
      }

      /* Like/Dislike Animation */
      .reaction-btn:hover {
        transform: scale(1.1);
      }

      .reaction-btn.active {
        transform: scale(1.2);
      }
    </style>
  </head>
  <body class="bg-gray-50">
    <!-- Loading Screen -->
    <div
      id="loading-container"
      class="fixed inset-0 bg-white flex flex-col items-center justify-center z-50 transition-opacity duration-500"
    >
      <div class="text-center mb-8">
        <div class="text-4xl font-bold mb-4">
          <span class="text-blue-600">ADUIN</span>
          <span class="text-yellow-400">SAJA</span>
          <span class="text-blue-600">.MDN</span>
        </div>
        <p class="text-gray-600">Memuat layanan pengaduan masyarakat...</p>
      </div>

      <div class="flex space-x-4 mb-8">
        <div class="loader-circle w-4 h-4 bg-blue-600 rounded-full"></div>
        <div class="loader-circle w-4 h-4 bg-yellow-400 rounded-full"></div>
        <div class="loader-circle w-4 h-4 bg-blue-600 rounded-full"></div>
      </div>

      <div class="w-64 h-2 bg-gray-200 rounded-full mb-8 overflow-hidden">
        <div
          id="progress-bar"
          class="progress-bar h-full bg-gradient-to-r from-blue-600 to-yellow-400"
        ></div>
      </div>

      <div class="text-center">
        <div id="percentage" class="text-xl font-bold mb-2 text-blue-600">
          0%
        </div>
      </div>
    </div>

    <!-- Main App Container -->
    <div id="app-container" class="hidden min-h-screen flex flex-col">
      <!-- Header -->
      <header class="bg-blue-600 text-white shadow-md">
        <div
          class="container mx-auto px-4 py-4 flex justify-between items-center"
        >
          <div class="flex items-center">
            <div class="text-2xl font-bold">
              <span>ADUIN</span>
              <span class="text-yellow-300">SAJA</span>
              <span>.MDN</span>
            </div>
          </div>
          <nav>
            <ul class="flex space-x-6">
              <li>
                <a
                  href="#"
                  id="nav-home"
                  class="hover:text-yellow-300 font-medium"
                  >Beranda</a
                >
              </li>
              <li>
                <a href="#" id="nav-complaints" class="hover:text-yellow-300"
                  >Pengaduan</a
                >
              </li>
              <li>
                <a href="#" id="nav-submit" class="hover:text-yellow-300"
                  >Buat Pengaduan</a
                >
              </li>
              <li>
                <a href="#" id="nav-login" class="hover:text-yellow-300"
                  >Masuk</a
                >
              </li>
              <li>
                <a
                  href="#"
                  id="nav-admin"
                  class="hidden bg-yellow-400 text-blue-800 px-4 py-2 rounded-full font-medium hover:bg-yellow-300"
                  >Admin</a
                >
              </li>
              <li>
                <a
                  href="#"
                  id="nav-logout"
                  class="hidden bg-red-500 text-white px-4 py-2 rounded-full font-medium hover:bg-red-600"
                  >Keluar</a
                >
              </li>
            </ul>
          </nav>
        </div>
      </header>

      <!-- Main Content -->
      <main class="flex-grow container mx-auto px-4 py-8">
        <!-- Home Page -->
        <div id="home-page">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <div class="md:flex">
              <div class="md:w-1/2 p-8">
                <h1 class="text-3xl font-bold text-blue-600 mb-4">
                  Layanan Pengaduan Masyarakat
                </h1>
                <p class="text-gray-700 mb-6">
                  Sampaikan keluhan, kritik, dan saran Anda untuk kemajuan
                  bersama. Kami siap mendengar dan menindaklanjuti setiap
                  pengaduan dengan serius.
                </p>
                <div class="flex space-x-4">
                  <button
                    id="btn-start-complaint"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-all"
                  >
                    <i class="fas fa-pencil-alt mr-2"></i> Buat Pengaduan
                  </button>
                  <button
                    id="btn-view-complaints"
                    class="bg-yellow-400 hover:bg-yellow-500 text-blue-800 px-6 py-3 rounded-lg font-medium transition-all"
                  >
                    <i class="fas fa-list-ul mr-2"></i> Lihat Pengaduan
                  </button>
                </div>
              </div>
              <div
                class="md:w-1/2 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center p-8"
              >
                <img
                  src="https://cdn-icons-png.flaticon.com/512/2991/2991473.png"
                  alt="Complaint Illustration"
                  class="w-64 h-64 object-contain"
                />
              </div>
            </div>
          </div>

          <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div
              class="bg-white p-6 rounded-lg shadow-md border-t-4 border-blue-600"
            >
              <div class="text-blue-600 mb-4">
                <i class="fas fa-shield-alt text-3xl"></i>
              </div>
              <h3 class="font-bold text-lg mb-2">Aman & Terpercaya</h3>
              <p class="text-gray-600">
                Data Anda dilindungi dan hanya digunakan untuk keperluan
                pengaduan.
              </p>
            </div>
            <div
              class="bg-white p-6 rounded-lg shadow-md border-t-4 border-yellow-400"
            >
              <div class="text-yellow-400 mb-4">
                <i class="fas fa-clock text-3xl"></i>
              </div>
              <h3 class="font-bold text-lg mb-2">Proses Cepat</h3>
              <p class="text-gray-600">
                Pengaduan akan diproses maksimal 3 hari kerja setelah
                diverifikasi.
              </p>
            </div>
            <div
              class="bg-white p-6 rounded-lg shadow-md border-t-4 border-blue-600"
            >
              <div class="text-blue-600 mb-4">
                <i class="fas fa-eye text-3xl"></i>
              </div>
              <h3 class="font-bold text-lg mb-2">Transparan</h3>
              <p class="text-gray-600">
                Anda bisa melacak status pengaduan dan melihat pengaduan lain
                yang sudah diverifikasi.
              </p>
            </div>
          </div>
        </div>

        <!-- Login Page -->
        <div
          id="login-page"
          class="hidden max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8"
        >
          <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-blue-600">Masuk ke Akun Anda</h2>
            <p class="text-gray-600">
              Silakan masuk untuk membuat atau melacak pengaduan
            </p>
          </div>

          <form id="login-form">
            <div class="mb-4">
              <label
                for="login-email"
                class="block text-gray-700 font-medium mb-2"
                >Email</label
              >
              <input
                type="email"
                id="login-email"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="email@contoh.com"
                required
              />
            </div>

            <div class="mb-6">
              <label
                for="login-password"
                class="block text-gray-700 font-medium mb-2"
                >Password</label
              >
              <input
                type="password"
                id="login-password"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Password Anda"
                required
              />
            </div>

            <div class="flex items-center justify-between mb-6">
              <div class="flex items-center">
                <input
                  type="checkbox"
                  id="remember-me"
                  class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                />
                <label
                  for="remember-me"
                  class="ml-2 block text-sm text-gray-700"
                  >Ingat saya</label
                >
              </div>
              <a href="#" class="text-sm text-blue-600 hover:underline"
                >Lupa password?</a
              >
            </div>

            <button
              type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-medium transition-all mb-4"
            >
              <i class="fas fa-sign-in-alt mr-2"></i> Masuk
            </button>

            <div class="text-center">
              <p class="text-gray-600">
                Belum punya akun?
                <a
                  href="#"
                  id="show-register"
                  class="text-blue-600 hover:underline"
                  >Daftar disini</a
                >
              </p>
            </div>
          </form>

          <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
              <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
              <span class="px-2 bg-white text-gray-500"
                >Atau masuk sebagai</span
              >
            </div>
          </div>

          <button
            id="admin-login-btn"
            class="w-full bg-yellow-400 hover:bg-yellow-500 text-blue-800 py-3 px-4 rounded-lg font-medium transition-all"
          >
            <i class="fas fa-user-shield mr-2"></i> Admin
          </button>
        </div>

        <!-- Admin Login Page -->
        <div
          id="admin-login-page"
          class="hidden max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8"
        >
          <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-blue-600">
              Masuk sebagai Admin
            </h2>
            <p class="text-gray-600">Silakan masuk untuk mengelola pengaduan</p>
          </div>

          <form id="admin-login-form">
            <div class="mb-4">
              <label
                for="admin-username"
                class="block text-gray-700 font-medium mb-2"
                >Username Admin</label
              >
              <input
                type="text"
                id="admin-username"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Username admin"
                required
              />
            </div>

            <div class="mb-6">
              <label
                for="admin-password"
                class="block text-gray-700 font-medium mb-2"
                >Password</label
              >
              <input
                type="password"
                id="admin-password"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Password admin"
                required
              />
            </div>

            <button
              type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-medium transition-all mb-4"
            >
              <i class="fas fa-sign-in-alt mr-2"></i> Masuk
            </button>

            <div class="text-center">
              <button
                type="button"
                id="back-to-user-login"
                class="text-blue-600 hover:underline"
              >
                Kembali ke login user
              </button>
            </div>
          </form>
        </div>

        <!-- Register Page -->
        <div
          id="register-page"
          class="hidden max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8"
        >
          <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-blue-600">Daftar Akun Baru</h2>
            <p class="text-gray-600">Buat akun untuk mengajukan pengaduan</p>
          </div>

          <form id="register-form">
            <div class="mb-4">
              <label
                for="register-name"
                class="block text-gray-700 font-medium mb-2"
                >Nama Lengkap</label
              >
              <input
                type="text"
                id="register-name"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Nama Anda"
                required
              />
            </div>

            <div class="mb-4">
              <label
                for="register-email"
                class="block text-gray-700 font-medium mb-2"
                >Email</label
              >
              <input
                type="email"
                id="register-email"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="email@contoh.com"
                required
              />
            </div>

            <div class="mb-4">
              <label
                for="register-password"
                class="block text-gray-700 font-medium mb-2"
                >Password</label
              >
              <input
                type="password"
                id="register-password"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Minimal 8 karakter"
                required
                minlength="8"
              />
            </div>

            <div class="mb-6">
              <label
                for="register-confirm-password"
                class="block text-gray-700 font-medium mb-2"
                >Konfirmasi Password</label
              >
              <input
                type="password"
                id="register-confirm-password"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Ketik ulang password"
                required
              />
            </div>

            <button
              type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-medium transition-all mb-4"
            >
              <i class="fas fa-user-plus mr-2"></i> Daftar
            </button>

            <div class="text-center">
              <p class="text-gray-600">
                Sudah punya akun?
                <a
                  href="#"
                  id="show-login"
                  class="text-blue-600 hover:underline"
                  >Masuk disini</a
                >
              </p>
            </div>
          </form>
        </div>

        <!-- User Profile Form -->
        <div
          id="profile-form-page"
          class="hidden max-w-2xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8"
        >
          <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-blue-600">Data Diri Pengadu</h2>
            <p class="text-gray-600">
              Silakan lengkapi data diri Anda sebelum membuat pengaduan
            </p>
          </div>

          <form id="profile-form">
            <div class="grid md:grid-cols-2 gap-6 mb-6">
              <div>
                <label
                  for="profile-name"
                  class="block text-gray-700 font-medium mb-2"
                  >Nama Lengkap</label
                >
                <input
                  type="text"
                  id="profile-name"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Nama Lengkap"
                  required
                />
              </div>

              <div>
                <label
                  for="profile-phone"
                  class="block text-gray-700 font-medium mb-2"
                  >Nomor Telepon/HP</label
                >
                <input
                  type="tel"
                  id="profile-phone"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="08xxxxxxxxxx"
                  required
                />
              </div>
            </div>

            <div class="mb-6">
              <label
                for="profile-address"
                class="block text-gray-700 font-medium mb-2"
                >Alamat Lengkap</label
              >
              <textarea
                id="profile-address"
                rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Alamat lengkap termasuk RT/RW"
                required
              ></textarea>
            </div>

            <div class="flex justify-end">
              <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-medium transition-all"
              >
                <i class="fas fa-arrow-right mr-2"></i> Lanjut ke Pengaduan
              </button>
            </div>
          </form>
        </div>

        <!-- Complaint Form -->
        <div
          id="complaint-form-page"
          class="hidden max-w-3xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8"
        >
          <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-blue-600">Formulir Pengaduan</h2>
            <p class="text-gray-600">
              Silakan isi formulir pengaduan dengan lengkap dan jelas
            </p>
          </div>

          <form id="complaint-form">
            <div class="mb-6">
              <label
                for="complaint-title"
                class="block text-gray-700 font-medium mb-2"
                >Judul Pengaduan</label
              >
              <input
                type="text"
                id="complaint-title"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Contoh: Jalan Rusak di Perumahan XYZ"
                required
              />
            </div>

            <div class="mb-6">
              <label
                for="complaint-category"
                class="block text-gray-700 font-medium mb-2"
                >Kategori Pengaduan</label
              >
              <select
                id="complaint-category"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
              >
                <option value="">Pilih Kategori</option>
                <option value="Pembunuhan">Pembunuhan</option>
                <option value="Pembegalan">Pembegalan</option>
                <option value="Pencurian">Pencurian</option>
                <option value="lainnya">Lainnya</option>
              </select>
            </div>

            <div class="mb-6">
              <label
                for="complaint-description"
                class="block text-gray-700 font-medium mb-2"
                >Deskripsi Pengaduan</label
              >
              <textarea
                id="complaint-description"
                rows="5"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Jelaskan pengaduan Anda secara rinci"
                required
              ></textarea>
            </div>

            <div class="mb-6">
              <label
                for="complaint-location"
                class="block text-gray-700 font-medium mb-2"
                >Lokasi Kejadian</label
              >
              <input
                type="text"
                id="complaint-location"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Lokasi tepat kejadian"
                required
              />
            </div>

            <div class="mb-6">
              <label class="block text-gray-700 font-medium mb-2"
                >Upload Bukti</label
              >
              <div
                class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center"
              >
                <div id="upload-area" class="cursor-pointer">
                  <i
                    class="fas fa-cloud-upload-alt text-4xl text-blue-500 mb-2"
                  ></i>
                  <p class="text-gray-600">
                    Seret dan lepas file di sini atau klik untuk memilih
                  </p>
                  <p class="text-sm text-gray-500 mt-2">
                    Format yang didukung: JPG, PNG (Maks. 5MB)
                  </p>
                </div>
                <input
                  type="file"
                  id="complaint-photo"
                  class="hidden"
                  accept="image/*"
                />
                <div id="preview-container" class="mt-4 hidden">
                  <img
                    id="image-preview"
                    src="#"
                    alt="Preview"
                    class="max-h-48 mx-auto"
                  />
                  <button
                    type="button"
                    id="remove-image"
                    class="mt-2 text-red-500 hover:text-red-700"
                  >
                    <i class="fas fa-times mr-1"></i> Hapus Gambar
                  </button>
                </div>
              </div>
            </div>

            <div class="flex justify-between">
              <button
                type="button"
                id="back-to-profile"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-3 px-6 rounded-lg font-medium transition-all"
              >
                <i class="fas fa-arrow-left mr-2"></i> Kembali
              </button>
              <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-medium transition-all"
              >
                <i class="fas fa-paper-plane mr-2"></i> Kirim Pengaduan
              </button>
            </div>
          </form>
        </div>

        <!-- Complaints List Page -->
        <div id="complaints-page" class="hidden">
          <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-blue-600">
              Daftar Pengaduan Masyarakat
            </h2>
            <div class="relative">
              <select
                id="complaint-filter"
                class="appearance-none bg-white border border-gray-300 rounded-lg pl-4 pr-8 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
              >
                <option value="all">Semua Kategori</option>
                <option value="Pencurian">Pencurian</option>
                <option value="Pembegalan">Pembegalan</option>
                <option value="Pembunuhan">Pembunuhan</option>
                <option value="lainnya">Lainnya</option>
              </select>
              <div
                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
              >
                <i class="fas fa-chevron-down"></i>
              </div>
            </div>
          </div>

          <div
            id="complaints-list"
            class="grid md:grid-cols-2 lg:grid-cols-3 gap-6"
          >
            <!-- Complaint cards will be added here dynamically -->
          </div>

          <div class="mt-8 flex justify-center">
            <button
              id="load-more-complaints"
              class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg font-medium transition-all"
            >
              Muat Lebih Banyak
            </button>
          </div>
        </div>

        <!-- Complaint Detail Page -->
        <div id="complaint-detail-page" class="hidden max-w-4xl mx-auto">
          <button
            id="back-to-complaints"
            class="flex items-center text-blue-600 hover:text-blue-800 mb-6"
          >
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Pengaduan
          </button>

          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">
              <div class="flex justify-between items-start mb-4">
                <div>
                  <span
                    id="detail-category"
                    class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full uppercase font-semibold"
                    >Infrastruktur</span
                  >
                  <h2
                    id="detail-title"
                    class="text-2xl font-bold text-gray-800 mt-2"
                  >
                    Jalan Rusak di Perumahan XYZ
                  </h2>
                </div>
                <div class="text-right">
                  <div
                    id="detail-status"
                    class="inline-block bg-yellow-100 text-yellow-800 text-xs px-3 py-1 rounded-full font-semibold"
                  >
                    Menunggu Verifikasi
                  </div>
                  <div id="detail-date" class="text-gray-500 text-sm mt-1">
                    12 Juni 2023
                  </div>
                </div>
              </div>

              <div class="flex items-center mb-6">
                <div
                  class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold mr-3"
                >
                  AS
                </div>
                <div>
                  <div id="detail-author" class="font-medium">Anonim</div>
                  <div class="text-gray-500 text-sm">Pengadu</div>
                </div>
              </div>

              <div class="mb-6">
                <h3 class="font-bold text-gray-700 mb-2">Lokasi:</h3>
                <p id="detail-location" class="text-gray-600">
                  Jl. Contoh No. 123, RT 05/RW 02, Kelurahan Contoh, Kecamatan
                  Contoh
                </p>
              </div>

              <div class="mb-6">
                <h3 class="font-bold text-gray-700 mb-2">Deskripsi:</h3>
                <p id="detail-description" class="text-gray-600">
                  Jalan di depan rumah saya sudah rusak parah selama 3 bulan
                  terakhir. Lubang-lubang besar membuat kendaraan sulit melintas
                  dan berbahaya bagi pengendara sepeda motor. Sudah beberapa
                  kali terjadi kecelakaan kecil di lokasi ini.
                </p>
              </div>

              <div class="mb-6">
                <h3 class="font-bold text-gray-700 mb-2">Bukti Foto:</h3>
                <div class="bg-gray-100 rounded-lg overflow-hidden">
                  <img
                    id="detail-photo"
                    src="https://via.placeholder.com/800x450"
                    alt="Bukti Pengaduan"
                    class="w-full h-auto"
                  />
                </div>
              </div>

              <div
                class="flex items-center justify-between border-t border-gray-200 pt-4"
              >
                <div class="flex space-x-4">
                  <button
                    class="reaction-btn flex items-center text-gray-500 hover:text-blue-600"
                  >
                    <i class="far fa-thumbs-up mr-1"></i>
                    <span id="like-count">24</span>
                  </button>
                  <button
                    class="reaction-btn flex items-center text-gray-500 hover:text-red-600"
                  >
                    <i class="far fa-thumbs-down mr-1"></i>
                    <span id="dislike-count">3</span>
                  </button>
                </div>
                <div class="text-gray-500 text-sm">
                  <i class="fas fa-eye mr-1"></i>
                  <span id="view-count">156</span> dilihat
                </div>
              </div>
            </div>

            <div
              id="admin-actions"
              class="hidden bg-gray-50 p-4 border-t border-gray-200"
            >
              <h3 class="font-bold text-gray-700 mb-3">Tindakan Admin:</h3>
              <div class="flex space-x-3">
                <button
                  id="approve-complaint"
                  class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg font-medium transition-all"
                >
                  <i class="fas fa-check mr-1"></i> Verifikasi
                </button>
                <button
                  id="reject-complaint"
                  class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg font-medium transition-all"
                >
                  <i class="fas fa-times mr-1"></i> Tolak
                </button>
                <button
                  id="delete-complaint"
                  class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-medium transition-all"
                >
                  <i class="fas fa-trash mr-1"></i> Hapus
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Admin Dashboard -->
        <div id="admin-dashboard" class="hidden">
          <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-blue-600">Dashboard Admin</h2>
            <div class="flex items-center space-x-4">
              <div class="relative">
                <select
                  id="admin-complaint-filter"
                  class="appearance-none bg-white border border-gray-300 rounded-lg pl-4 pr-8 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                  <option value="all">Semua Status</option>
                  <option value="pending">Menunggu Verifikasi</option>
                  <option value="approved">Terverifikasi</option>
                  <option value="rejected">Ditolak</option>
                </select>
                <div
                  class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                >
                  <i class="fas fa-chevron-down"></i>
                </div>
              </div>
              <button
                id="refresh-complaints"
                class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-lg"
              >
                <i class="fas fa-sync-alt"></i>
              </button>
            </div>
          </div>

          <div class="grid md:grid-cols-4 gap-6 mb-8">
            <div
              class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-600"
            >
              <div class="text-gray-500 mb-2">Total Pengaduan</div>
              <div class="text-3xl font-bold text-blue-600">124</div>
            </div>
            <div
              class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-400"
            >
              <div class="text-gray-500 mb-2">Menunggu</div>
              <div class="text-3xl font-bold text-yellow-500">18</div>
            </div>
            <div
              class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500"
            >
              <div class="text-gray-500 mb-2">Terverifikasi</div>
              <div class="text-3xl font-bold text-green-500">96</div>
            </div>
            <div
              class="bg-white p-6 rounded-lg shadow-md border-l-4 border-red-500"
            >
              <div class="text-gray-500 mb-2">Ditolak</div>
              <div class="text-3xl font-bold text-red-500">10</div>
            </div>
          </div>

          <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                      Judul
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                      Pengadu
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                      Tanggal
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                      Status
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody
                  id="admin-complaints-list"
                  class="bg-white divide-y divide-gray-200"
                >
                  <!-- Admin complaints will be added here dynamically -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
      <footer class="bg-blue-600 text-white py-8">
        <div class="container mx-auto px-4">
          <div class="grid md:grid-cols-4 gap-8">
            <div>
              <h3 class="text-xl font-bold mb-4">ADUIN SAJA.MDN</h3>
              <p class="text-blue-100">
                Layanan pengaduan masyarakat untuk kemajuan bersama.
              </p>
            </div>
            <div>
              <h4 class="font-bold mb-4">Tautan Cepat</h4>
              <ul class="space-y-2">
                <li>
                  <a href="#" class="text-blue-100 hover:text-yellow-300"
                    >Beranda</a
                  >
                </li>
                <li>
                  <a href="#" class="text-blue-100 hover:text-yellow-300"
                    >Buat Pengaduan</a
                  >
                </li>
                <li>
                  <a href="#" class="text-blue-100 hover:text-yellow-300"
                    >Daftar Pengaduan</a
                  >
                </li>
                <li>
                  <a href="#" class="text-blue-100 hover:text-yellow-300"
                    >Masuk</a
                  >
                </li>
              </ul>
            </div>
            <div>
              <h4 class="font-bold mb-4">Kontak</h4>
              <ul class="space-y-2">
                <li class="flex items-center">
                  <i class="fas fa-map-marker-alt mr-2 text-yellow-300"></i>
                  <span class="text-blue-100"
                    >Jl. Contoh No. 123, Kota Contoh</span
                  >
                </li>
                <li class="flex items-center">
                  <i class="fas fa-phone-alt mr-2 text-yellow-300"></i>
                  <span class="text-blue-100">(0123) 456789</span>
                </li>
                <li class="flex items-center">
                  <i class="fas fa-envelope mr-2 text-yellow-300"></i>
                  <span class="text-blue-100">info@aduin-saja.mdn</span>
                </li>
              </ul>
            </div>
            <div>
              <h4 class="font-bold mb-4">Sosial Media</h4>
              <div class="flex space-x-4">
                <a
                  href="#"
                  class="w-10 h-10 bg-blue-700 rounded-full flex items-center justify-center hover:bg-yellow-400 hover:text-blue-800 transition-all"
                >
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a
                  href="#"
                  class="w-10 h-10 bg-blue-700 rounded-full flex items-center justify-center hover:bg-yellow-400 hover:text-blue-800 transition-all"
                >
                  <i class="fab fa-twitter"></i>
                </a>
                <a
                  href="#"
                  class="w-10 h-10 bg-blue-700 rounded-full flex items-center justify-center hover:bg-yellow-400 hover:text-blue-800 transition-all"
                >
                  <i class="fab fa-instagram"></i>
                </a>
                <a
                  href="#"
                  class="w-10 h-10 bg-blue-700 rounded-full flex items-center justify-center hover:bg-yellow-400 hover:text-blue-800 transition-all"
                >
                  <i class="fab fa-youtube"></i>
                </a>
              </div>
            </div>
          </div>
          <div
            class="border-t border-blue-500 mt-8 pt-6 text-center text-blue-100"
          >
            <p>
              &copy; 2023 ADUIN SAJA.MDN - Layanan Pengaduan Masyarakat. Semua
              hak dilindungi.
            </p>
          </div>
        </div>
      </footer>
    </div>

    <!-- Success Modal -->
    <div
      id="success-modal"
      class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
      <div class="bg-white rounded-xl p-8 max-w-md w-full mx-4">
        <div class="text-center">
          <div
            class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4"
          >
            <i class="fas fa-check text-green-500 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2" id="success-title">
            Berhasil!
          </h3>
          <p class="text-gray-600 mb-6" id="success-message">
            Pengaduan Anda telah berhasil dikirim dan sedang menunggu verifikasi
            admin.
          </p>
          <button
            id="close-success-modal"
            class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg font-medium transition-all"
          >
            Tutup
          </button>
        </div>
      </div>
    </div>

    <!-- Confirmation Modal -->
    <div
      id="confirm-modal"
      class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
      <div class="bg-white rounded-xl p-8 max-w-md w-full mx-4">
        <div class="text-center">
          <div
            class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4"
          >
            <i class="fas fa-exclamation text-yellow-500 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2" id="confirm-title">
            Konfirmasi
          </h3>
          <p class="text-gray-600 mb-6" id="confirm-message">
            Apakah Anda yakin ingin menghapus pengaduan ini?
          </p>
          <div class="flex justify-center space-x-4">
            <button
              id="cancel-confirm"
              class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-6 rounded-lg font-medium transition-all"
            >
              Batal
            </button>
            <button
              id="proceed-confirm"
              class="bg-red-500 hover:bg-red-600 text-white py-2 px-6 rounded-lg font-medium transition-all"
            >
              Ya, Hapus
            </button>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Sample data for complaints
      const sampleComplaints = [
        {
          id: 1,
          title: "Jalan Rusak di Perumahan XYZ",
          category: "infrastruktur",
          author: "Anonim",
          date: "12 Juni 2023",
          location: "Jl. Contoh No. 123, RT 05/RW 02",
          description:
            "Jalan di depan rumah saya sudah rusak parah selama 3 bulan terakhir. Lubang-lubang besar membuat kendaraan sulit melintas dan berbahaya bagi pengendara sepeda motor. Sudah beberapa kali terjadi kecelakaan kecil di lokasi ini.",
          photo: "https://via.placeholder.com/800x450",
          status: "pending",
          likes: 24,
          dislikes: 3,
          views: 156,
        },
        {
          id: 2,
          title: "Sampah Menumpuk di TPS",
          category: "lingkungan",
          author: "Budi S.",
          date: "8 Juni 2023",
          location: "TPS RW 03, Kelurahan Contoh",
          description:
            "Sampah di TPS RW 03 sudah tidak diangkut selama 1 minggu dan mulai menimbulkan bau tidak sedap serta mengundang lalat. Mohon segera ditindaklanjuti.",
          photo: "https://via.placeholder.com/800x450",
          status: "approved",
          likes: 42,
          dislikes: 5,
          views: 231,
        },
        {
          id: 3,
          title: "Pelayanan Lambat di Kantor Kelurahan",
          category: "pelayanan",
          author: "Anonim",
          date: "5 Juni 2023",
          location: "Kantor Kelurahan Contoh",
          description:
            "Proses pembuatan KTP di kantor kelurahan sangat lambat, antrian panjang dan petugas terlihat tidak sigap. Mohon diperbaiki pelayanannya.",
          photo: "https://via.placeholder.com/800x450",
          status: "approved",
          likes: 18,
          dislikes: 7,
          views: 189,
        },
        {
          id: 4,
          title: "Penerangan Jalan Tidak Berfungsi",
          category: "infrastruktur",
          author: "Citra L.",
          date: "1 Juni 2023",
          location: "Jl. Mawar No. 45 - 60",
          description:
            "Lampu penerangan jalan di sepanjang Jl. Mawar tidak berfungsi selama 2 minggu, membuat area tersebut gelap dan rawan tindak kejahatan di malam hari.",
          photo: "https://via.placeholder.com/800x450",
          status: "approved",
          likes: 31,
          dislikes: 2,
          views: 203,
        },
        {
          id: 5,
          title: "Parkir Liar di Trotoar",
          category: "keamanan",
          author: "Anonim",
          date: "28 Mei 2023",
          location: "Depan Pasar Contoh",
          description:
            "Banyak kendaraan parkir liar di trotoar depan pasar, membuat pejalan kaki terpaksa turun ke jalan raya yang berbahaya.",
          photo: "https://via.placeholder.com/800x450",
          status: "rejected",
          likes: 15,
          dislikes: 8,
          views: 127,
        },
      ];

      // State management
      let currentUser = null;
      let isAdmin = false;
      let currentPage = "home";
      let selectedComplaintId = null;
      let complaints = [...sampleComplaints];
      let filteredComplaints = [];

      // DOM Elements
      const loadingContainer = document.getElementById("loading-container");
      const progressBar = document.getElementById("progress-bar");
      const percentage = document.getElementById("percentage");
      const appContainer = document.getElementById("app-container");

      // Navigation Elements
      const navHome = document.getElementById("nav-home");
      const navComplaints = document.getElementById("nav-complaints");
      const navSubmit = document.getElementById("nav-submit");
      const navLogin = document.getElementById("nav-login");
      const navAdmin = document.getElementById("nav-admin");
      const navLogout = document.getElementById("nav-logout");

      // Page Elements
      const homePage = document.getElementById("home-page");
      const loginPage = document.getElementById("login-page");
      const adminLoginPage = document.getElementById("admin-login-page");
      const registerPage = document.getElementById("register-page");
      const profileFormPage = document.getElementById("profile-form-page");
      const complaintFormPage = document.getElementById("complaint-form-page");
      const complaintsPage = document.getElementById("complaints-page");
      const complaintDetailPage = document.getElementById(
        "complaint-detail-page"
      );
      const adminDashboard = document.getElementById("admin-dashboard");

      // Buttons
      const btnStartComplaint = document.getElementById("btn-start-complaint");
      const btnViewComplaints = document.getElementById("btn-view-complaints");
      const showRegister = document.getElementById("show-register");
      const showLogin = document.getElementById("show-login");
      const adminLoginBtn = document.getElementById("admin-login-btn");
      const backToUserLogin = document.getElementById("back-to-user-login");
      const backToProfile = document.getElementById("back-to-profile");
      const backToComplaints = document.getElementById("back-to-complaints");
      const loadMoreComplaints = document.getElementById(
        "load-more-complaints"
      );
      const refreshComplaints = document.getElementById("refresh-complaints");

      // Forms
      const loginForm = document.getElementById("login-form");
      const adminLoginForm = document.getElementById("admin-login-form");
      const registerForm = document.getElementById("register-form");
      const profileForm = document.getElementById("profile-form");
      const complaintForm = document.getElementById("complaint-form");

      // Modals
      const successModal = document.getElementById("success-modal");
      const closeSuccessModal = document.getElementById("close-success-modal");
      const confirmModal = document.getElementById("confirm-modal");
      const cancelConfirm = document.getElementById("cancel-confirm");
      const proceedConfirm = document.getElementById("proceed-confirm");

      // Image Upload
      const uploadArea = document.getElementById("upload-area");
      const complaintPhoto = document.getElementById("complaint-photo");
      const previewContainer = document.getElementById("preview-container");
      const imagePreview = document.getElementById("image-preview");
      const removeImage = document.getElementById("remove-image");

      // Admin Actions
      const approveComplaint = document.getElementById("approve-complaint");
      const rejectComplaint = document.getElementById("reject-complaint");
      const deleteComplaint = document.getElementById("delete-complaint");

      // Initialize the app
      function initApp() {
        // Check if user is logged in from localStorage
        const storedUser = localStorage.getItem("currentUser");
        const storedAdmin = localStorage.getItem("isAdmin");

        if (storedUser) {
          currentUser = JSON.parse(storedUser);
          isAdmin = storedAdmin === "true";
          updateNavForLoggedInUser();
        }

        // Set up event listeners
        setupEventListeners();

        // Show loading animation
        simulateLoading();
      }

      // Simulate loading progress
      function simulateLoading() {
        let progress = 0;

        const interval = setInterval(() => {
          progress += Math.floor(Math.random() * 5) + 1;
          if (progress > 100) progress = 100;

          progressBar.style.width = `${progress}%`;
          percentage.textContent = `${progress}%`;

          if (progress === 100) {
            clearInterval(interval);
            setTimeout(() => {
              loadingContainer.classList.add("fade-out");
              setTimeout(() => {
                loadingContainer.style.display = "none";
                appContainer.classList.remove("hidden");
                showPage("home");
              }, 500);
            }, 300);
          }
        }, 100);
      }

      // Set up all event listeners
      function setupEventListeners() {
        // Navigation
        navHome.addEventListener("click", (e) => {
          e.preventDefault();
          showPage("home");
        });

        navComplaints.addEventListener("click", (e) => {
          e.preventDefault();
          showPage("complaints");
        });

        navSubmit.addEventListener("click", (e) => {
          e.preventDefault();
          if (currentUser) {
            showPage("profile-form");
          } else {
            showPage("login");
          }
        });

        navLogin.addEventListener("click", (e) => {
          e.preventDefault();
          showPage("login");
        });

        navAdmin.addEventListener("click", (e) => {
          e.preventDefault();
          showPage("admin-dashboard");
        });

        navLogout.addEventListener("click", (e) => {
          e.preventDefault();
          logoutUser();
        });

        // Home page buttons
        btnStartComplaint.addEventListener("click", () => {
          if (currentUser) {
            showPage("profile-form");
          } else {
            showPage("login");
          }
        });

        btnViewComplaints.addEventListener("click", () => {
          showPage("complaints");
        });

        // Login/Register navigation
        showRegister.addEventListener("click", (e) => {
          e.preventDefault();
          showPage("register");
        });

        showLogin.addEventListener("click", (e) => {
          e.preventDefault();
          showPage("login");
        });

        adminLoginBtn.addEventListener("click", (e) => {
          e.preventDefault();
          showPage("admin-login");
        });

        backToUserLogin.addEventListener("click", (e) => {
          e.preventDefault();
          showPage("login");
        });

        // Forms
        loginForm.addEventListener("submit", handleLogin);
        adminLoginForm.addEventListener("submit", handleAdminLogin);
        registerForm.addEventListener("submit", handleRegister);
        profileForm.addEventListener("submit", handleProfileSubmit);
        complaintForm.addEventListener("submit", handleComplaintSubmit);

        // Back buttons
        backToProfile.addEventListener("click", () => {
          showPage("profile-form");
        });

        backToComplaints.addEventListener("click", () => {
          showPage("complaints");
        });

        // Load more complaints
        loadMoreComplaints.addEventListener("click", loadMoreComplaintsHandler);
        refreshComplaints.addEventListener("click", refreshComplaintsHandler);

        // Complaint filter
        document
          .getElementById("complaint-filter")
          .addEventListener("change", filterComplaints);
        document
          .getElementById("admin-complaint-filter")
          .addEventListener("change", filterAdminComplaints);

        // Image upload
        uploadArea.addEventListener("click", () => complaintPhoto.click());
        complaintPhoto.addEventListener("change", handleImageUpload);
        removeImage.addEventListener("click", removeUploadedImage);

        // Admin actions
        approveComplaint.addEventListener("click", () =>
          updateComplaintStatus("approved")
        );
        rejectComplaint.addEventListener("click", () =>
          updateComplaintStatus("rejected")
        );
        deleteComplaint.addEventListener("click", () =>
          showConfirmModal(
            "Hapus Pengaduan",
            "Apakah Anda yakin ingin menghapus pengaduan ini? Tindakan ini tidak dapat dibatalkan.",
            () => updateComplaintStatus("deleted")
          )
        );

        // Modals
        closeSuccessModal.addEventListener("click", () => {
          successModal.classList.add("hidden");
        });

        cancelConfirm.addEventListener("click", () => {
          confirmModal.classList.add("hidden");
        });

        proceedConfirm.addEventListener("click", () => {
          if (typeof confirmCallback === "function") {
            confirmCallback();
          }
          confirmModal.classList.add("hidden");
        });
      }

      // Show a specific page
      function showPage(page) {
        // Hide all pages first
        homePage.classList.add("hidden");
        loginPage.classList.add("hidden");
        adminLoginPage.classList.add("hidden");
        registerPage.classList.add("hidden");
        profileFormPage.classList.add("hidden");
        complaintFormPage.classList.add("hidden");
        complaintsPage.classList.add("hidden");
        complaintDetailPage.classList.add("hidden");
        adminDashboard.classList.add("hidden");

        // Update current page
        currentPage = page;

        // Show the selected page
        switch (page) {
          case "home":
            homePage.classList.remove("hidden");
            break;
          case "login":
            loginPage.classList.remove("hidden");
            break;
          case "admin-login":
            adminLoginPage.classList.remove("hidden");
            break;
          case "register":
            registerPage.classList.remove("hidden");
            break;
          case "profile-form":
            profileFormPage.classList.remove("hidden");
            break;
          case "complaint-form":
            complaintFormPage.classList.remove("hidden");
            break;
          case "complaints":
            complaintsPage.classList.remove("hidden");
            renderComplaints();
            break;
          case "complaint-detail":
            complaintDetailPage.classList.remove("hidden");
            break;
          case "admin-dashboard":
            adminDashboard.classList.remove("hidden");
            renderAdminComplaints();
            break;
          default:
            homePage.classList.remove("hidden");
        }
      }

      // Handle user login
      function handleLogin(e) {
        e.preventDefault();

        const email = document.getElementById("login-email").value;
        const password = document.getElementById("login-password").value;

        // Simple validation
        if (!email || !password) {
          alert("Silakan isi email dan password");
          return;
        }

        // In a real app, you would validate against your backend
        // For demo purposes, we'll just set a mock user
        currentUser = {
          name: "User Demo",
          email: email,
          phone: "081234567890",
          address: "Jl. Contoh No. 123",
        };

        isAdmin = false;

        // Save to localStorage
        localStorage.setItem("currentUser", JSON.stringify(currentUser));
        localStorage.setItem("isAdmin", isAdmin);

        // Update UI
        updateNavForLoggedInUser();

        // Redirect to profile form
        showPage("profile-form");
      }

      // Handle admin login
      function handleAdminLogin(e) {
        e.preventDefault();

        const username = document.getElementById("admin-username").value;
        const password = document.getElementById("admin-password").value;

        // Simple validation
        if (!username || !password) {
          alert("Silakan isi username dan password admin");
          return;
        }

        // In a real app, you would validate against your backend
        // For demo purposes, we'll just set a mock admin
        if (username === "admin" && password === "admin123") {
          currentUser = {
            name: "Admin",
            email: "admin@aduin-saja.mdn",
            role: "admin",
          };

          isAdmin = true;

          // Save to localStorage
          localStorage.setItem("currentUser", JSON.stringify(currentUser));
          localStorage.setItem("isAdmin", isAdmin);

          // Update UI
          updateNavForLoggedInUser();

          // Redirect to admin dashboard
          showPage("admin-dashboard");
        } else {
          alert("Username atau password admin salah");
        }
      }

      // Handle user registration
      function handleRegister(e) {
        e.preventDefault();

        const name = document.getElementById("register-name").value;
        const email = document.getElementById("register-email").value;
        const password = document.getElementById("register-password").value;
        const confirmPassword = document.getElementById(
          "register-confirm-password"
        ).value;

        // Simple validation
        if (!name || !email || !password || !confirmPassword) {
          alert("Silakan lengkapi semua field");
          return;
        }

        if (password !== confirmPassword) {
          alert("Password dan konfirmasi password tidak cocok");
          return;
        }

        if (password.length < 8) {
          alert("Password minimal 8 karakter");
          return;
        }

        // In a real app, you would register the user with your backend
        // For demo purposes, we'll just set a mock user
        currentUser = {
          name: name,
          email: email,
          phone: "",
          address: "",
        };

        isAdmin = false;

        // Save to localStorage
        localStorage.setItem("currentUser", JSON.stringify(currentUser));
        localStorage.setItem("isAdmin", isAdmin);

        // Update UI
        updateNavForLoggedInUser();

        // Redirect to profile form
        showPage("profile-form");

        // Clear form
        registerForm.reset();
      }

      // Handle profile form submission
      function handleProfileSubmit(e) {
        e.preventDefault();

        const name = document.getElementById("profile-name").value;
        const phone = document.getElementById("profile-phone").value;
        const address = document.getElementById("profile-address").value;

        // Simple validation
        if (!name || !phone || !address) {
          alert("Silakan lengkapi semua field");
          return;
        }

        // Update user data
        currentUser = {
          ...currentUser,
          name: name,
          phone: phone,
          address: address,
        };

        // Save to localStorage
        localStorage.setItem("currentUser", JSON.stringify(currentUser));

        // Redirect to complaint form
        showPage("complaint-form");

        // Clear form
        profileForm.reset();
      }

      // Handle complaint form submission
      function handleComplaintSubmit(e) {
        e.preventDefault();

        const title = document.getElementById("complaint-title").value;
        const category = document.getElementById("complaint-category").value;
        const description = document.getElementById(
          "complaint-description"
        ).value;
        const location = document.getElementById("complaint-location").value;
        const photo = complaintPhoto.files[0];

        // Simple validation
        if (!title || !category || !description || !location) {
          alert("Silakan lengkapi semua field");
          return;
        }

        // Create new complaint
        const newComplaint = {
          id: complaints.length + 1,
          title: title,
          category: category,
          author: currentUser.name,
          date: new Date().toLocaleDateString("id-ID", {
            day: "numeric",
            month: "long",
            year: "numeric",
          }),
          location: location,
          description: description,
          photo: photo
            ? URL.createObjectURL(photo)
            : "https://via.placeholder.com/800x450",
          status: "pending",
          likes: 0,
          dislikes: 0,
          views: 0,
        };

        // Add to complaints array
        complaints.unshift(newComplaint);

        // Show success modal
        showSuccessModal(
          "Pengaduan Terkirim!",
          "Terima kasih atas pengaduan Anda. Pengaduan akan diverifikasi oleh admin sebelum ditampilkan ke publik."
        );

        // Reset form
        complaintForm.reset();
        removeUploadedImage();

        // If admin, go to admin dashboard, else go to home
        if (isAdmin) {
          showPage("admin-dashboard");
        } else {
          showPage("home");
        }
      }

      // Handle image upload
      function handleImageUpload(e) {
        const file = e.target.files[0];

        if (file) {
          const reader = new FileReader();

          reader.onload = function (event) {
            imagePreview.src = event.target.result;
            previewContainer.classList.remove("hidden");
          };

          reader.readAsDataURL(file);
        }
      }

      // Remove uploaded image
      function removeUploadedImage() {
        imagePreview.src = "#";
        previewContainer.classList.add("hidden");
        complaintPhoto.value = "";
      }

      // Render complaints list
      function renderComplaints(filter = "all") {
        const complaintsList = document.getElementById("complaints-list");
        complaintsList.innerHTML = "";

        // Filter complaints
        filteredComplaints = complaints.filter((complaint) => {
          if (filter === "all") return true;
          return complaint.category === filter;
        });

        // Only show approved complaints for public view
        const publicComplaints = filteredComplaints.filter(
          (c) => c.status === "approved"
        );

        if (publicComplaints.length === 0) {
          complaintsList.innerHTML = `
                    <div class="col-span-3 text-center py-12">
                        <i class="fas fa-inbox text-4xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-600">Belum ada pengaduan</h3>
                        <p class="text-gray-500 mt-2">Tidak ada pengaduan yang ditemukan untuk kategori ini.</p>
                    </div>
                `;
          return;
        }

        // Render complaint cards
        publicComplaints.slice(0, 6).forEach((complaint) => {
          const card = document.createElement("div");
          card.className =
            "bg-white rounded-xl shadow-md overflow-hidden complaint-card transition-all duration-300";
          card.innerHTML = `
                    <div class="h-48 bg-gray-100 overflow-hidden">
                        <img src="${complaint.photo}" alt="${complaint.title}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full uppercase font-semibold">${complaint.category}</span>
                            <span class="text-xs text-gray-500">${complaint.date}</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">${complaint.title}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">${complaint.description}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Oleh: ${complaint.author}</span>
                            <button class="text-blue-600 hover:text-blue-800 text-sm font-medium" onclick="viewComplaintDetail(${complaint.id})">
                                Lihat Detail <i class="fas fa-chevron-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                `;

          complaintsList.appendChild(card);
        });
      }

      // View complaint detail
      function viewComplaintDetail(id) {
        const complaint = complaints.find((c) => c.id === id);

        if (!complaint) {
          alert("Pengaduan tidak ditemukan");
          return;
        }

        // Update view count
        complaint.views += 1;

        // Update UI
        document.getElementById("detail-title").textContent = complaint.title;
        document.getElementById("detail-category").textContent =
          complaint.category;
        document.getElementById("detail-author").textContent = complaint.author;
        document.getElementById("detail-date").textContent = complaint.date;
        document.getElementById("detail-location").textContent =
          complaint.location;
        document.getElementById("detail-description").textContent =
          complaint.description;
        document.getElementById("detail-photo").src = complaint.photo;
        document.getElementById("detail-status").textContent =
          complaint.status === "pending"
            ? "Menunggu Verifikasi"
            : complaint.status === "approved"
            ? "Terverifikasi"
            : "Ditolak";
        document.getElementById("detail-status").className =
          complaint.status === "pending"
            ? "inline-block bg-yellow-100 text-yellow-800 text-xs px-3 py-1 rounded-full font-semibold"
            : complaint.status === "approved"
            ? "inline-block bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-semibold"
            : "inline-block bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full font-semibold";
        document.getElementById("like-count").textContent = complaint.likes;
        document.getElementById("dislike-count").textContent =
          complaint.dislikes;
        document.getElementById("view-count").textContent = complaint.views;

        // Show/hide admin actions
        document
          .getElementById("admin-actions")
          .classList.toggle("hidden", !isAdmin);

        // Store selected complaint ID
        selectedComplaintId = id;

        // Show detail page
        showPage("complaint-detail");
      }

      // Render admin complaints
      function renderAdminComplaints(filter = "all") {
        const adminComplaintsList = document.getElementById(
          "admin-complaints-list"
        );
        adminComplaintsList.innerHTML = "";

        // Filter complaints for admin
        const adminFilteredComplaints = complaints.filter((complaint) => {
          if (filter === "all") return true;
          return complaint.status === filter;
        });

        if (adminFilteredComplaints.length === 0) {
          adminComplaintsList.innerHTML = `
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada pengaduan dengan status ini.
                        </td>
                    </tr>
                `;
          return;
        }

        // Render admin complaints table
        adminFilteredComplaints.forEach((complaint) => {
          const row = document.createElement("tr");

          // Status badge
          let statusBadge = "";
          if (complaint.status === "pending") {
            statusBadge =
              '<span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Menunggu</span>';
          } else if (complaint.status === "approved") {
            statusBadge =
              '<span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Terverifikasi</span>';
          } else if (complaint.status === "rejected") {
            statusBadge =
              '<span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Ditolak</span>';
          }

          row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">${complaint.title}</div>
                        <div class="text-sm text-gray-500">${complaint.category}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${complaint.author}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">${complaint.date}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        ${statusBadge}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button onclick="viewComplaintDetail(${complaint.id})" class="text-blue-600 hover:text-blue-900 mr-3">Detail</button>
                    </td>
                `;

          adminComplaintsList.appendChild(row);
        });
      }

      // Filter complaints
      function filterComplaints() {
        const filter = document.getElementById("complaint-filter").value;
        renderComplaints(filter);
      }

      // Filter admin complaints
      function filterAdminComplaints() {
        const filter = document.getElementById("admin-complaint-filter").value;
        renderAdminComplaints(filter);
      }

      // Load more complaints
      function loadMoreComplaintsHandler() {
        // In a real app, you would fetch more data from the server
        alert(
          'Fitur "Muat Lebih Banyak" akan mengambil data tambahan dari server'
        );
      }

      // Refresh complaints
      function refreshComplaintsHandler() {
        // In a real app, you would refresh data from the server
        renderAdminComplaints(
          document.getElementById("admin-complaint-filter").value
        );
        alert("Daftar pengaduan telah diperbarui");
      }

      // Update complaint status
      function updateComplaintStatus(status) {
        const complaintIndex = complaints.findIndex(
          (c) => c.id === selectedComplaintId
        );

        if (complaintIndex !== -1) {
          complaints[complaintIndex].status = status;

          // Show success message
          let message = "";
          if (status === "approved") {
            message =
              "Pengaduan telah berhasil diverifikasi dan akan ditampilkan ke publik.";
          } else if (status === "rejected") {
            message =
              "Pengaduan telah ditolak dan tidak akan ditampilkan ke publik.";
          } else if (status === "deleted") {
            message = "Pengaduan telah dihapus dari sistem.";
            complaints.splice(complaintIndex, 1);
          }

          showSuccessModal("Berhasil!", message);

          // Update views
          renderAdminComplaints(
            document.getElementById("admin-complaint-filter").value
          );

          // Go back to admin dashboard
          showPage("admin-dashboard");
        }
      }

      // Show success modal
      function showSuccessModal(title, message) {
        document.getElementById("success-title").textContent = title;
        document.getElementById("success-message").textContent = message;
        successModal.classList.remove("hidden");
      }

      // Show confirm modal
      let confirmCallback = null;
      function showConfirmModal(title, message, callback) {
        document.getElementById("confirm-title").textContent = title;
        document.getElementById("confirm-message").textContent = message;
        confirmCallback = callback;
        confirmModal.classList.remove("hidden");
      }

      // Update navigation for logged in user
      function updateNavForLoggedInUser() {
        if (currentUser) {
          navLogin.classList.add("hidden");
          navLogout.classList.remove("hidden");

          if (isAdmin) {
            navAdmin.classList.remove("hidden");
            navSubmit.classList.add("hidden");
          } else {
            navAdmin.classList.add("hidden");
            navSubmit.classList.remove("hidden");
          }
        } else {
          navLogin.classList.remove("hidden");
          navLogout.classList.add("hidden");
          navAdmin.classList.add("hidden");
          navSubmit.classList.remove("hidden");
        }
      }

      // Logout user
      function logoutUser() {
        currentUser = null;
        isAdmin = false;

        // Clear localStorage
        localStorage.removeItem("currentUser");
        localStorage.removeItem("isAdmin");

        // Update UI
        updateNavForLoggedInUser();

        // Redirect to home
        showPage("home");
      }

      // Initialize the app when DOM is loaded
      document.addEventListener("DOMContentLoaded", initApp);

      // Global functions for inline event handlers
      window.viewComplaintDetail = viewComplaintDetail;
    </script>
  </body>
</html>
