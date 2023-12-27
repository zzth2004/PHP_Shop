<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style>
body {
    background-color: #f8f9fa;
    font-family: 'Arial', sans-serif;
}

.container {
    margin-top: 50px;
}

.card {
    height: 220px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.card:hover {
    transform: scale(1.03);
}

.card-body {
    text-align: center;
    position: relative;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    margin-top: 10px;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.card-title {
    margin-bottom: 0.5rem;
    display: flex;
    justify-content: center;
}

.card-text,
.btn {
    margin-top: 1rem;
}

.action-icons {
    position: absolute;
    top: 10px;
    right: 10px;
    display: flex;
    align-items: center;
}

.action-icons img {
    width: 20px;
    margin-left: 5px;
    cursor: pointer;
}

/* Style for the product card */
.product-card {
    text-decoration: none;
    color: inherit;
}

.product-image {
    max-width: 80px;
    margin: 0 auto;
}
</style>
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2> Dashbord</h2>
        <div class="block">
            Welcome admin panel

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <a href="productadd.php" class="product-card">
                                <img src="../assets/product_img/addnew.png" alt="addnew" class="product-image">
                            </a>
                            <h5 class="card-title">Add product</h5>
                            <p class="card-text">Add new product here.</p>
                            <a href="productadd.php" class="btn btn-primary">Take action</a>
                        </div>
                    </div>
                </div>



                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <a href="productlist.php" class="product-card">
                                <img src="../assets/product_img/seelist.png" alt="addnew" class="product-image">
                            </a>
                            <h5 class="card-title">See list product</h5>
                            <p class="card-text">Click to see product list.</p>
                            <a href="productlist.php" class="btn btn-primary">Take action</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <a href="catadd.php" class="product-card">
                                <img src="../assets/product_img/addnew.png" alt="addnew" class="product-image">
                            </a>
                            <h5 class="card-title">ADD new category</h5>
                            <p class="card-text">ADD new category here.</p>
                            <a href="catadd.php" class="btn btn-primary">Take action</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <a href="catlist.php" class="product-card">
                                <img src="../assets/product_img/seelist.png" alt="addnew" class="product-image">
                            </a>
                            <h5 class="card-title">See list category</h5>
                            <p class="card-text">Click to seecategory list.</p>
                            <a href="catlist.php" class="btn btn-primary">Take action</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <a href="brandadd.php" class="product-card">
                                <img src="../assets/product_img/addnew.png" alt="addnew" class="product-image">
                            </a>
                            <h5 class="card-title">Add Brands</h5>
                            <p class="card-text">ADD new brand here.</p>
                            <a href="brandadd.php" class="btn btn-primary">Take action</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <a href="brandlist.php" class="product-card">
                                <img src="../assets/product_img/seelist.png" alt="addnew" class="product-image">
                            </a>
                            <h5 class="card-title">See list Brand</h5>
                            <p class="card-text">Click to see Brands list.</p>
                            <a href="brandlist.php" class="btn btn-primary">Take action</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>