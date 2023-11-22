        <?php
        class Vehicle {
            private $brand;
            protected $color;
            public $fuelType;

            public function __construct($brand, $color, $fuelType){
                $this->brand = $brand;
                $this->color = $color;
                $this->fuelType = $fuelType;
            }

            // Add getter and setter methods as needed
            public function getBrand(){
                return $this->brand;
            }

            public function getColor(){
                return $this->color;
            }

            public function getFuelType(){
                return $this->fuelType;
            }
        }

        class Car extends Vehicle {
            private $numDoors;

            public function __construct($brand, $color, $fuelType, $numDoors) {
                parent::__construct($brand, $color, $fuelType);
                $this->numDoors = $numDoors;
            }

            public function getNumDoors() {
                return $this->numDoors;
            }
        }

        $vehicle = new Vehicle("Ford", "Grey", "Petrol");
        $car = new Car("Toyota", "Red", "Gasoline", 4);
        ?>

<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Information</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        body{
            margin: 40px;
            padding: 10px;
        }
        table{
            border: 1px solid black;
            width: 30%;
            text-align: center;
        }
        td{
            border: 1px solid black;
        }
        .brand{
            background-color: aquamarine;
        }
    </style>
</head>
<body>
    <h2>Vehicle Details</h2><br>
    <table>
        <tr>
            <th>Property</th>
            <th>Value</th>
        </tr>
        <tr>
            <td class="brand">Brand</td>
            <td class="brand"><?php echo $vehicle->getBrand(); ?></td>
        </tr>
        <tr>
            <td>Color</td>
            <td><?php echo $vehicle->getColor(); ?></td>
        </tr>
        <tr>
            <td>Fuel Type</td>
            <td><?php echo $vehicle->getFuelType(); ?></td>
        </tr>
        <tr>
            <td class="brand">Brand</td>
            <td class="brand"><?php echo $car->getBrand(); ?></td>
        </tr>
        <tr>
            <td>Color</td>
            <td><?php echo $car->getColor(); ?></td>
        </tr>
        <tr>
            <td>Fuel Type</td>
            <td><?php echo $car->getFuelType(); ?></td>
        </tr>
        <tr>
            <td>Number of Doors</td>
            <td><?php echo $car->getNumDoors(); ?></td>
        </tr>
    </table>
</body>
</html>
