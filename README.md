# 🧩 Lali CRUD

**Lali CRUD** is a simple and clean Laravel + Livewire-based CRUD application for managing products. It demonstrates how to build dynamic, real-time interfaces using Livewire components, Alpine.js, and TailwindCSS.

---

## 🚀 Features

- ✅ Create, Read, Update, Delete products
- 🎯 Realtime form handling with Livewire
- 🔄 Inline editing with scroll-to highlight effect
- 💬 SweetAlert2 integration for user feedback
- 📄 Pagination with accurate index across pages
- ✨ Clean UI using TailwindCSS and Flux UI components

---

## 📂 Technologies Used

- [Laravel 10+](https://laravel.com/)
- [Livewire](https://livewire.laravel.com/)
- [Alpine.js](https://alpinejs.dev/)
- [Tailwind CSS](https://tailwindcss.com/)
- [SweetAlert2](https://sweetalert2.github.io/)
- [Flux UI (custom component set)](https://github.com/your-org/flux-ui) *(if available)*

---

## 🛠️ Setup Instructions

```bash
# 1. Clone the repository
git clone https://github.com/dc-class/lali-crud.git
cd lali-crud

# 2. Install dependencies
composer install
npm install && npm run dev

# 3. Configure environment
cp .env.example .env
php artisan key:generate

# 4. Setup the database
php artisan migrate --seed

# 5. Run the app
php artisan serve
