<?php 

class Strategy 
{
    private $strategy;

    public function __construct($strategyId)
    {
        switch ($strategyId) {
            case "product": 
                $this->strategy = new Product();
            break;
            case "productType": 
                $this->strategy = new ProductType();
            break;
        }
    }
    public function getStrategy() {
      return $this->strategy;
    }
    public function store($request) {
      $this->strategy->store($request);
    }
    public function update($request) {
      return $this->strategy->update($request);
    }
    public function delete($request) {
      return $this->strategy->delete($request);
    }
    public function search($request) {
      return $this->strategy->search($request);
    }
}