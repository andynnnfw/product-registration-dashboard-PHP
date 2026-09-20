# PHP Product Dashboard 🚀

A sleek, dark-themed product management dashboard built with PHP. This project provides a streamlined interface for registering new products along with multiple image uploads, real-time thumbnail previews and a dynamic gallery that displays every image stored in the database.

## ✨ Features

* **Modern Dark UI:** A responsive, dashboard-style interface styled with pure CSS.
* **Product Registration:** Captures essential product details (name, description, value).
* **Multiple Image Upload:** Allows users to attach multiple images to a single product.
* **Live Image Preview:** Vanilla JavaScript implementation that displays image thumbnails instantly before form submission.
* **Dynamic Image Gallery:** The products page reads the images from the database and renders them automatically, with no need to edit the HTML when new images are uploaded.
* **Secure Database Handling:** Uses PDO and prepared statements to prevent SQL Injection.
* **Output Escaping:** Image names and product names are escaped before being rendered in the page.

## 🛠️ Technologies Used

* **Backend:** PHP 8+
* **Database:** MySQL / MariaDB (via PDO)
* **Frontend:** HTML5, CSS3 (Custom Dark Theme)
* **Scripting:** Vanilla JavaScript (for DOM manipulation and file previews)

## ⚙️ Prerequisites

To run this project locally, you will need a local server environment such as:
* [XAMPP](https://www.apachefriends.org/), WAMP, or MAMP.
* A web browser.

## 📁 Project Structure

```
loja/
├── classe/
│   ├── Imagem.class.php     # Image upload, listing and deletion
│   └── Produto.class.php    # Product registration
├── css/                     # Stylesheets
├── js/
│   └── scripts.js           # Live image preview
├── sql/
│   └── loja.sql             # Database and tables
├── uploads/                 # Uploaded image files
├── produtos.php             # Product registration form
├── produtoEstatico.php      # Gallery with all uploaded images
└── teste.php                # Database connection test
```

## 🚀 Getting Started

1. Clone this repository into your server folder (e.g. `htdocs` on XAMPP):
```bash
   git clone https://github.com/andynnnfw/product-registration-dashboard-PHP.git
```
2. Start **Apache** and **MySQL** in your local server panel.
3. Import `loja/sql/loja.sql` (via phpMyAdmin or the MySQL CLI). It creates the `store` database with the `produto` and `imagem` tables.
4. Check the connection settings inside `Produto.class.php` and `Imagem.class.php`. The defaults are:
   * Database: `store`
   * User: `root`
   * Password: *(empty)*
5. Make sure the `loja/uploads/` folder exists and is writable.
6. Open in your browser (adjust the path to where you placed the project):
```
   http://localhost/product-registration-dashboard-PHP/loja/produtos.php
```
7. *(Optional)* Open `teste.php` to confirm the database connection is working.

## 🖼️ How It Works

1. On `produtos.php`, fill in the product data and select one or more images.
2. Each file is saved in `uploads/` with a unique name, and that name is stored in the `imagem` table, linked to the product.
3. Click **PRODUCTS** to open `produtoEstatico.php`, which calls `Imagem::mostraTodasImagens()` and displays every stored image in a responsive grid.
