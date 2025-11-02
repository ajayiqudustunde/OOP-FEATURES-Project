<?php
// -------------------------------------------------------------
// REAL ESTATE MANAGEMENT SYSTEM (OOP in PHP)
// Demonstrates: Encapsulation, Abstraction, Inheritance, Polymorphism
// Programmer: AJAYI QUDUS TUNDE (LASU)
// -------------------------------------------------------------

// 1. ABSTRACTION & ENCAPSULATION
abstract class Property {
    private $propertyID;
    private $location;
    private $price;
    private $status; // e.g. "Available", "Sold", "Rented"

    public function __construct($propertyID, $location, $price, $status = "Available") {
        $this->propertyID = $propertyID;
        $this->location = $location;
        $this->price = $price;
        $this->status = $status;
    }

    // Abstract method — must be defined by subclasses
    abstract public function displayDetails();

    // Encapsulated getters/setters
    public function getPropertyID() {
        return $this->propertyID;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    // Abstraction: controlled method to update price
    public function updatePrice($newPrice) {
        if ($newPrice > 0) {
            $this->price = $newPrice;
            echo "Price updated successfully.<br>";
        } else {
            echo "Invalid price value.<br>";
        }
    }
}

// 2. INHERITANCE
class ResidentialProperty extends Property {
    private $numBedrooms;
    private $numBathrooms;

    public function __construct($propertyID, $location, $price, $bedrooms, $bathrooms, $status = "Available") {
        parent::__construct($propertyID, $location, $price, $status);
        $this->numBedrooms = $bedrooms;
        $this->numBathrooms = $bathrooms;
    }

    // Implement abstract method (Abstraction)
    public function displayDetails() {
        echo "<strong>Residential Property:</strong><br>";
        echo "ID: " . $this->getPropertyID() . "<br>";
        echo "Location: " . $this->getLocation() . "<br>";
        echo "Price: $" . number_format($this->getPrice()) . "<br>";
        echo "Bedrooms: {$this->numBedrooms}, Bathrooms: {$this->numBathrooms}<br>";
        echo "Status: " . $this->getStatus() . "<br><br>";
    }
}

// 3. POLYMORPHISM
class CommercialProperty extends Property {
    private $businessType;
    private $floorArea; // in square meters

    public function __construct($propertyID, $location, $price, $businessType, $floorArea, $status = "Available") {
        parent::__construct($propertyID, $location, $price, $status);
        $this->businessType = $businessType;
        $this->floorArea = $floorArea;
    }

    // Polymorphic version of displayDetails()
    public function displayDetails() {
        echo "<strong>Commercial Property:</strong><br>";
        echo "ID: " . $this->getPropertyID() . "<br>";
        echo "Location: " . $this->getLocation() . "<br>";
        echo "Price: $" . number_format($this->getPrice()) . "<br>";
        echo "Business Type: {$this->businessType}<br>";
        echo "Floor Area: {$this->floorArea} sqm<br>";
        echo "Status: " . $this->getStatus() . "<br><br>";
    }
}

// -------------------------------------------------------------
// MAIN PROGRAM EXECUTION (Procedural flow)
// -------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Real Estate Management System (OOP)</title>
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: white;
            padding: 30px 50px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
            text-align: center;
            width: 650px;
        }
        h2 {
            color: #0066cc;
        }
        h3 {
            margin-top: 25px;
            color: #333;
        }
        p {
            font-size: 15px;
            color: #555;
        }
        hr {
            margin: 20px 0;
        }
        .author {
            margin-top: 30px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🏘️ REAL ESTATE MANAGEMENT SYSTEM (OOP in PHP)</h2>
    <hr>

    <?php
    // Create property objects
    $house = new ResidentialProperty("R001", "Lekki Phase 1, Lagos", 45000000, 4, 3);
    $shop = new CommercialProperty("C002", "Ikeja, Lagos", 12000000, "Retail Store", 120);

    // Display property details
    echo "<h3>Property Listings:</h3>";
    $house->displayDetails();
    $shop->displayDetails();

    // Demonstrate Encapsulation & Abstraction
    echo "<h3>System Operations:</h3>";
    $house->updatePrice(46000000);
    $house->setStatus("Sold");
    $shop->setStatus("Rented");

    // Show updated details
    $house->displayDetails();
    $shop->displayDetails();
    ?>

    <div class="author">
        <h3>👨‍💻 PROGRAMMER INFORMATION</h3>
        <p><strong>Name:</strong> AJAYI QUDUS TUNDE</p>
        <p><strong>Matric Number:</strong> 24310591767</p>
        <p><strong>Department:</strong> Computer Science (MSc)</p>
        <p><strong>School:</strong> Lagos State University</p>
    </div>
</div>

</body>
</html>
