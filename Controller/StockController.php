<?php

class StockController
{
    private  $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }

   
    public function index()
    {
       
        $stock = $this->repo->getStock();

exit;
        include __DIR__ . "/../templates/prepa/dashboard.php";
    }

    // ➕ Add product batch
   public function store()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $this->repo->addStock(
            $_POST['product_id'],
            $_POST['lot_number'],
            $_POST['quantity'],
            $_POST['expiry_date'],
            $_POST['status'],
        );

        header("Location: index.php?action=preparateur_dashboard");
exit;
        
require_once '../src/Repository/StockBatchRepository.php';
    }
}

}