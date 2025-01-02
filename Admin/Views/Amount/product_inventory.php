<!-- product_inventory.php -->
<div class="inventory-container">
    <h2>Danh sách sản phẩm tồn kho</h2>
    <table class="inventory-table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng tồn kho</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productList as $product): ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['amount']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- CSS -->
<style>
    .inventory-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        font-family: Arial, sans-serif;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    .inventory-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .inventory-table th, .inventory-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .inventory-table th {
        background-color: #4CAF50;
        color: white;
    }

    .inventory-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .inventory-table tr:hover {
        background-color: #f1f1f1;
    }

    .inventory-table td {
        color: #555;
    }
</style>
