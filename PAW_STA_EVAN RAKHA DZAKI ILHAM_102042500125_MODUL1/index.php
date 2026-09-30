<?php
$products = [
    [
        "nama"     => "Monitor AOC 27 Inch 4K",
        "kategori" => "Display",
        "harga"    => 1800000,
        "stok"     => 4
    ],
    [
        "nama"     => "Laptop Legion 5",
        "kategori" => "Computer",
        "harga"    => 8500000,
        "stok"     => 3
    ],
    [
        "nama"     => "Keyboard Mechanical F75",
        "kategori" => "Accessories",
        "harga"    => 750000,
        "stok"     => 8
    ],
    [
        "nama"     => "Mouse Wireless MX Master 3",
        "kategori" => "Accessories",
        "harga"    => 250000,
        "stok"     => 0
    ],
    [
        "nama"     => "Headset Gaming HyperX Cloud II",
        "kategori" => "Audio",
        "harga"    => 1200000,
        "stok"     => 5
    ],
    [
        "nama"     => "Webcam Full HD Logitech C920",
        "kategori" => "Camera",
        "harga"    => 450000,
        "stok"     => 0
    ]
];

$total_produk = count($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="logo">Cia Store</div>
        <nav>
            <a href="#">Home</a>
            <a href="#products">Products</a>
            <a href="#">About</a>
        </nav>
    </header>

    <div class="hero-container">
        <section class="hero">
            <span>CIA STORE</span>
            <h1>Simple Tech Store.</h1>
            <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
            <a href="#products" class="hero-btn">Lihat Produk</a>
        </section>
    </div>

    <main class="catalog-container" id="products">
        <div class="catalog-header">
            <div>
                <div class="sub-title">OUR PRODUCTS</div>
                <h2>Katalog Produk</h2>
            </div>
            <div class="total-badge">
                Total Produk: <?php echo $total_produk; ?>
            </div>
        </div>

        <div class="product-grid">
            <?php 
            foreach ($products as $item) : 
                $has_discount = $item['harga'] >= 1000000;
                $discount_percent = 10;
                
                if ($has_discount) {
                    $harga_akhir = $item['harga'] - ($item['harga'] * ($discount_percent / 100));
                } else {
                    $harga_akhir = $item['harga'];
                }

                $harga_normal_formatted = "Rp" . number_format($item['harga'], 0, ',', '.');
                $harga_akhir_formatted = "Rp" . number_format($harga_akhir, 0, ',', '.');
            ?>

                <article class="product-card">
                    <div>
                        <?php if ($has_discount): ?>
                            <span class="badge-discount">DISKON <?php echo $discount_percent; ?>%</span>
                        <?php endif; ?>

                        <div class="category"><?php echo htmlspecialchars($item['kategori']); ?></div>
                        <h3><?php echo htmlspecialchars($item['nama']); ?></h3>

                        <div class="price-container">
                            <?php if ($has_discount): ?>
                                <div class="original-price"><?php echo $harga_normal_formatted; ?></div>
                            <?php endif; ?>
                            <div class="final-price"><?php echo $harga_akhir_formatted; ?></div>
                        </div>

                        <div class="stock-info">
                            Stok: <?php echo $item['stok']; ?>
                        </div>

                        <div>
                            <?php if ($item['stok'] > 0): ?>
                                <span class="status-badge status-available">Tersedia</span>
                            <?php else: ?>
                                <span class="status-badge status-empty">Stok Habis</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <?php if ($item['stok'] > 0): ?>
                            <button class="buy-button">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="buy-button disabled" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </article>

            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>