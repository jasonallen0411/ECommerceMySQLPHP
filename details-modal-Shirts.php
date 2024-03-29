<div class="modal fade details-2" id="details-2" tableindex="-1" role="dialog" aria-labelledby="details-2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modalTitle">
                <h4 class="modal-title text-center">Shirts</h4>
                </div>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="center-block">
                                <img src="images/shirt.jpg" alt="Shirts" class="details img-responsive" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h4>Details</h4>
                            <p>These shirts are the best! You will never be uncomfortable anymore!</p>
                            <hr />
                            <p>Price: $9.99</p>
                            <p>Brand: Levi's</p>
                            <form action="add_cart.php" method="post">
                                <div class="form-group">
                                    <div class="col-xs-3">
                                        <label for="quantity" id="quantity-label">Quantity:</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity" />
                                    </div><br />
                                    <div class="form-group">
                                        <label for="size">Size:</label>
                                        <select name="size" id="size" class="form-control">
                                            <option value=""></option>
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Large">Large</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add to Cart</button>
            </div>
        </div>
    </div>
</div>